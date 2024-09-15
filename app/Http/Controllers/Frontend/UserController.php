<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Registration()
    {
        return view('frontend.user.registration');
    }

    public function RegistrationPost(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'userImage' => 'required',
                'name' => 'required|string|max:50',
                'email' => 'required|email|max:50|unique:users,email',
                'password' => 'required|string|min:5'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('userImage')) {
                $image = $request->file('userImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/teacherImages', $imageName);
                $UserImg = asset('storage/teacherImages/' . $imageName);
            }

            DB::beginTransaction();
            User::create([
                'image' => $imageName,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            DB::commit();
            return redirect('/')->with('success', 'You have registered successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('User create Exception caught: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function Login()
    {
        return view('frontend.user.login');
    }

    public function LoginPost(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credential = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credential)) {
            return redirect('/')->with('success', 'Successfully logged in.');
        } else {
            return redirect()->back()->with('error', 'Credential not matched.');
        }
    }

    public function Logout()
    {
        $user = Auth::guard('user')->user();
        // dd($user);
        if ($user) {
            Auth::guard('user')->logout();
            return redirect('/login')->with('success', 'Successfully Logged out');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function StudentList()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('frontend.student.list', compact('students'));
    }

    public function StudentAdd(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'subject' => 'required',
                'mark' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $student = Student::where('name', $request->name)->where('subject', $request->subject)->first();
            // dd($student);
            if ($student) {
                $student->update([
                    'mark' => $request->mark
                ]);
                return redirect()->back()->with('success', 'Name and subject already found! Marks have been updated.');
            } else {

                DB::beginTransaction();
                Student::create([
                    'name' => $request->name,
                    'subject' => $request->subject,
                    'mark' => $request->mark
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Student created successfully.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('Student create Exception caught: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }


    public function StudentView($id){
        // dd($id);
        $student = Student::where('id', $id)->first();
        // dd($student);
        return view('frontend.student.view', compact('student'));
    }

    public function StudentEdit($id){
        $student = Student::where('id', $id)->first();
        return view('frontend.student.edit', compact('student'));
    }

    public function StudentEditPost(Request $request, $id){
        // dd($id);
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'mark' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::where('id', $id)->first();
        if($student){
            $student->update([
                'name' => $request->name,
                'subject' => $request->subject,
                'mark' => $request->mark
            ]);

            return redirect('/student-list')->with('success', 'Student details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found!.');
        }

    }

    public function StudentDelete($id){
        // dd($id);
        $student = Student::where('id', $id)->first();
        if($student){
            $student->delete();
            return redirect('/student-list')->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found!.');
        }
    }



}

<x-frontend.layout.master>
    <style>
        .firstLetterCapital {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
    @if (Session::has('error'))
        <div class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissible">
            <span>{{ Session::get('error') }}</span>
            <button type="button" class="close position-absolute" style="top: 0; right: 0; padding: 1rem;"
                data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible">
            <span>{{ Session::get('success') }}</span>
            <button type="button" class="close position-absolute" style="top: 0; right: 0; padding: 1rem;"
                data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title">
                    <h3>Student List</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        + Add Student
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-4 d-flex">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Mark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <span class="firstLetterCapital">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </span>
                                            {{ $student->name }}
                                        </div>
                                    </td>
                                    <td>{{ $student->subject }}</td>
                                    <td>{{ $student->mark }}</td>
                                    <td>
                                        <a href="{{ url('/student-view' . '/' . $student->id) }}"
                                            class="btn btn-secondary m-1">View</a>
                                        <a href="{{ url('/student-edit' . '/' . $student->id) }}"
                                            class="btn btn-primary m-1">Edit</a>
                                        <a href="{{ url('/student-delete' . '/' . $student->id) }}"
                                            onclick="return confirm('Are you sure you want to delete this student?');"
                                            class="btn btn-danger m-1">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('/student-add') }}" method="post" id="addStudentForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-form-label">Name:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Subject:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-book-open-reader"></i>
                                    </span>
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="Enter subject">
                                </div>
                                @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Mark:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </span>
                                    <input type="text" name="mark" class="form-control" placeholder="Enter mark">
                                </div>
                                @error('mark')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-frontend.layout.master>

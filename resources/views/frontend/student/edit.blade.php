<x-frontend.layout.master>
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

    <div class="container">
        <div class="row mt-4 d-flex">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Student details!</h2>
                        </div>
                    </div>
                    <form action="{{ url('/student-edit'.'/'.$student->id) }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-form-label">Name:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Enter name">
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
                                    <input type="text" name="subject" value="{{ $student->subject }}" class="form-control" placeholder="Enter subject">
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
                                    <input type="tel" name="mark" value="{{ $student->mark }}" class="form-control" placeholder="Enter mark">
                                </div>
                                @error('mark')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 m-auto" style="width:fit-content">
                                <a href="{{ url('/student-list') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout.master>

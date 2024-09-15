<x-frontend.layout.master>
    <div class="container">
        <div class="row mt-4 d-flex">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Student details!</h2>
                        </div>
                    </div>
                    <form>
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-form-label">Name:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" value="{{ $student->name }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Subject:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-book-open-reader"></i>
                                    </span>
                                    <input type="text" value="{{ $student->subject }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Mark:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-bookmark"></i>
                                    </span>
                                    <input type="text" value="{{ $student->mark }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="mb-3 m-auto row" style="width:fit-content">
                                <a href="{{ url('/student-list') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout.master>

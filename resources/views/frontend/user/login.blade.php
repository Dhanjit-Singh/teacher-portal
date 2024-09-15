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
                            <h2>Login page!</h2>
                        </div>
                    </div>
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="mb-3 row">
                                <label class="col-form-label">Email:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="text" name="email" class="form-control" placeholder="Enter email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Password:</label>
                                <div class="input-group flex-nowrap">
                                    <span class="col-sm-1 input-group-text">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 m-auto row" style="width:fit-content">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout.master>

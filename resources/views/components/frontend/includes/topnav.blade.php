<style>
    .teacherProfileImg{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                @if (Auth::guard('user')->check())
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/student-list') }}">Student List</a>
                    </li>
                @endif
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::guard('user')->check())
                        <li class="nav-item d-flex align-items-center">
                            <img src="{{ asset('storage/teacherImages/' . Auth::guard('user')->user()->image) ?: asset('teacherImages/dummy-user.png') }}"
                                alt="Teacher image" class="teacherProfileImg">
                            <a class="nav-link active" aria-current="page" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ url('/registration') }}">Registration</a>
                        </li>
                    @endif
                </ul>
            </form>
        </div>
    </div>
</nav>

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
    @if (Auth::guard('user')->check())
        <h1>Hello {{ Auth::guard('user')->user()->name }}</h1>
    @else
        <h1>Hello Teacher</h1>
    @endif
</x-frontend.layout.master>

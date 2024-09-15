<x-frontend.includes.header />
<x-frontend.includes.topnav />
{{-- <div class="content-wrapper"> --}}
    <section class="content">
        {{-- <div class="container-fluid"> --}}
            {{ $slot }}
        {{-- </div> --}}
    </section>
{{-- </div> --}}
<x-frontend.includes.footer />
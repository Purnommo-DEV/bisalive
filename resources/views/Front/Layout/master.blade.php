<!DOCTYPE html>
<html lang="en">

        @include('Front.Layout.head')

    <body style="background:linear-gradient(#fff, rgba(52, 182, 183, 0.18)), url({{ asset('All/assets/img/bg_bisalive.jpg') }}); background-size: cover; background-attachment: fixed;">
        {{-- @include('Front.Layout.spinner') --}}
        @include('Front.Layout.topbar')
        @include('Front.Layout.navbar')

        @yield('konten')

        @include('Front.Layout.footer')
        @include('Front.Layout.script')

        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    </body>

</html>

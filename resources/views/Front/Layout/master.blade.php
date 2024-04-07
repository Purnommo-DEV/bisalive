<!DOCTYPE html>
<html lang="en">

        @include('Front.Layout.head')

    <body>

        {{-- @include('Front.Layout.spinner') --}}
        @include('Front.Layout.topbar')
        @include('Front.Layout.navbar')

        @yield('konten')

        @include('Front.Layout.footer')
        @include('Front.Layout.script')

        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    </body>

</html>

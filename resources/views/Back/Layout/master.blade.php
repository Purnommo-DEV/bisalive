<!DOCTYPE html>
<html lang="en">

@include('Back.Layout._head')

<body class="g-sidenav-show bg-gray-200">
    @include('sweetalert::alert')

    @include('Back.Layout._sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('Back.Layout._navbar')

        <div class="container-fluid py-4">
            @yield('konten')
        </div>
    </main>
    @include('Back.Layout._script')
</body>

</html>

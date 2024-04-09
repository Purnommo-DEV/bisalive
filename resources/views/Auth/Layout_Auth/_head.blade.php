<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="../Back/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../Back/assets/img/favicon.png">
    <title>
        {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('Back/assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('All/assets/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Back/vendors/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Back/vendors/datatables/css/dataTables.bootstrap4.min.css') }}">
</head>

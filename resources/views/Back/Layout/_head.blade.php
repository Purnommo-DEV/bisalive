<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="../Back/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../Back/assets/img/favicon.png">
    <title>
        Admin
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('Back/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('Back/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('Back/assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <link rel="stylesheet" href="{{ asset('Back/assets/js/plugins/datatables/css/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="{{ asset('Front/asset/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Back/assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <style>
        .loading {
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            width: 100px;
            color: #FFF;
            margin: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .loading span {
            position: absolute;
            height: 10px;
            width: 84px;
            top: 50px;
            overflow: hidden;
        }

        .loading span>i {
            position: absolute;
            height: 4px;
            width: 4px;
            border-radius: 50%;
            -webkit-animation: wait 4s infinite;
            -moz-animation: wait 4s infinite;
            -o-animation: wait 4s infinite;
            animation: wait 4s infinite;
        }

        .loading span>i:nth-of-type(1) {
            left: -28px;
            background: yellow;
        }

        .loading span>i:nth-of-type(2) {
            left: -21px;
            -webkit-animation-delay: 0.8s;
            animation-delay: 0.8s;
            background: lightgreen;
        }

        @-webkit-keyframes wait {
            0% {
                left: -7px
            }

            30% {
                left: 52px
            }

            60% {
                left: 22px
            }

            100% {
                left: 100px
            }
        }

        @-moz-keyframes wait {
            0% {
                left: -7px
            }

            30% {
                left: 52px
            }

            60% {
                left: 22px
            }

            100% {
                left: 100px
            }
        }

        @-o-keyframes wait {
            0% {
                left: -7px
            }

            30% {
                left: 52px
            }

            60% {
                left: 22px
            }

            100% {
                left: 100px
            }
        }

        @keyframes wait {
            0% {
                left: -7px
            }

            30% {
                left: 52px
            }

            60% {
                left: 22px
            }

            100% {
                left: 100px
            }
        }
    </style>
</head>

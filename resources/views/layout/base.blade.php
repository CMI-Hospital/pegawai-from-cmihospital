<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMI | @yield('title')</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="shortcut icon" href="{{ URL::to('/public/img') }}/favicon.ico" type="image/x-icon">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/public/admin') }}/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- Page level plugins -->
    <script src="{{ URL::to('/public/chart') }}/Chart.min.js"></script>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/visualization/d3/d3.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/visualization/d3/d3_tooltip.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/forms/styling/switchery.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/ui/headroom/headroom.min.js">
    </script>
    <script type="text/javascript"
        src="{{ URL::to('/public/admin') }}/assets/js/plugins/ui/headroom/headroom_jquery.min.js"></script>
    <script type="text/javascript"
        src="{{ URL::to('/public/admin') }}/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/forms/selects/select2.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/forms/styling/uniform.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/notifications/jgrowl.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/pages/form_layouts.js"></script>
    <script type="text/javascript"
        src="{{ URL::to('/public/admin') }}/assets/js/pages/datatables_extension_fixed_header.js"></script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/plugins/pickers/daterangepicker.js">
    </script>
    <script type="text/javascript" src="{{ URL::to('/public/admin') }}/assets/js/pages/dashboard.js"></script>

    <!-- /theme JS files -->
    <!-- ... other head elements ... -->
    <script src="https://cdn.tiny.cloud/1/4aje8oxkbjh7r5ksuoc7zt133gpiu88if1vg8ratkk7u0j18/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        // tinymce.init({
        //     selector: 'textarea',
        //     plugins: 'advlist autolink lists link image charmap print preview anchor',
        //     toolbar: 'undo redo | formatselect | bold italic backcolor | \
        //               alignleft aligncenter alignright alignjustify | \
        //               bullist numlist outdent indent | removeformat | help'
        // });
    </script>




</head>

<body class="navbar-top">
    <!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        @include('layout.navbar')
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-fixed ">
                <div class="sidebar-content">

                    <!-- User menu -->
                    @include('layout.userMenu')
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            @include('layout.sidebar')
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                @yield('content_header')
                <!-- /page header -->
                @include('sweetalert::alert')


                <!-- Content area -->
                <div class="content">
                    @yield('content')

                    <!-- Footer -->
                    <div class="footer text-muted">&copy; 2024. <a href="#">CMI Hospital</a> by <a href="#"
                            target="_blank">CMI IT Team</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /dashboard content -->



            </div>
            <!-- /content area -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->

    @yield('custom_script')


</body>

</html>

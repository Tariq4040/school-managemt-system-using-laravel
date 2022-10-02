<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>SMS</title>
    @include('admin.backendBody.css_js_external_files.css_js')
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
<script>
    NProgress.configure({showSpinner: false});
    NProgress.start();
</script>

<div class="mobile-sticky-body-overlay"></div>

<div class="wrapper">

    <!--
====================================
——— LEFT SIDEBAR WITH FOOTER
=====================================
-->
    @include('admin.backendBody.left_sidebar.left_sidebar')

    <div class="page-wrapper">
        <!-- Header -->
        @include('admin.backendBody.header.header')


        <div class="content-wrapper">
            <div class="content">

                @yield('admin')

            </div>
        </div>

        @include('admin.backendBody.footer.footer')

    </div>
</div>

</body>
</html>

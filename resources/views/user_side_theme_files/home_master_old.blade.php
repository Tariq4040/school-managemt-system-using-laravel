
@include('user_side_theme_files.css_js')

<!-- ======= Header ======= -->
@include('user_side_theme_files.header')
<!-- End Header -->

<!-- ======= Hero Section ======= -->
@include('user_side_theme_files.hero_section')
<!-- End Hero -->

<!-- #main body -->
<main id="main">
@yield('admin')
</main>
<!-- End #main body-->

<!-- ======= Footer ======= -->
{{--@include('user_side_theme_files.footer')--}}
<!-- End Footer -->

{{--<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>--}}


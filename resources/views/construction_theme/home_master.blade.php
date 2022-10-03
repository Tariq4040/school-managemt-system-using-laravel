


@include('construction_theme.css_js')
@include('construction_theme.top_header')
@include('construction_theme.header')
@include('construction_theme.hero_section')

<title>
    SMS | @yield('title')
</title>

@yield('body_content')

@include('construction_theme.footer')

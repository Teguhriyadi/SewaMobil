<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('') }}/assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        @yield("title") - {{ config("app.name") }}
    </title>

    @include("page.layouts.partials.css.style")

    @yield('css')

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include("page.layouts.components.sidebar")

            <div class="layout-page">
                @include("page.layouts.components.navbar")

                <div class="content-wrapper">

                    @yield("content")

                    @include("page.layouts.components.footer")

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>

        <div class="drag-target"></div>
    </div>

    @include('page.layouts.partials.javascript.style')

    @yield('javascript')

</body>

</html>

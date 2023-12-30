
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ url('') }}/assets/" data-template="horizontal-menu-template-no-customizer">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>
        @yield('title') - {{ config("app.name") }}
    </title>

    @include("page.theme.partials.css.style")

    @yield('css')

  </head>

  <body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">

        @include('page.theme.partials.components.navbar')

        <div class="layout-page">
          <div class="content-wrapper">

            @include('page.theme.partials.components.aside')

            <div class="container-xxl flex-grow-1 container-p-y">
                @yield("content")
            </div>

            @include('page.theme.partials.components.footer')

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    @include('page.theme.partials.javascript.style')

    @yield('javascript')

  </body>
</html>

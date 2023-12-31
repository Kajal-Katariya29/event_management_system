<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.head')
    <body class="sb-nav-fixed">
        @include('admin.layouts.header')
        <div id="layoutSidenav">
            @include('admin.layouts.sidebaar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('body')
                </main>
                @include('admin.layouts.footer')
            </div>
        </div>
        @include('admin.layouts.scripts')
        @yield('scripts')
    </body>
</html>

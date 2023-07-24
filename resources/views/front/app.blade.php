<!DOCTYPE html>
<html lang="en">
    @include('front.layouts.head')
    @yield('style')
    <body class="h-100">
        <main>
            @yield('body')
        </main>
        @include('front.layouts.scripts')
        @yield('scripts')
    </body>
</html>

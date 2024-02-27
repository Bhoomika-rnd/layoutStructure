@include('admin.layouts.header')
<div class="wrapper ">
    @include('admin.layouts.sidebar')
    <div class="main-panel">
        @include('admin.layouts.navbar')
        @yield('content')
        @include('admin.layouts.footer')
    </div>
</div>
@include('admin.layouts.scripts')
</body>
</html>
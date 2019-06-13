@include('user.layouts.header')
<body>


<!--Main Navigation-->
<header>
    @include('user.layouts.navbar')
    @include('admin.partials._errors')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @yield('slider_homepage')

</header>
<!--Main Navigation-->

@section('mainContent')

@show


@include('user.layouts.footer')
@include('user.layouts.footer_script')
@section('scripts')
@show
</body>
</html>

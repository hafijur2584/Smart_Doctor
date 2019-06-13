@include('user.layouts.header')
    <body>


        <!-- Start your project here-->

        <html lang="en" class="full-height">

        <!--Main Navigation-->
        <header>

            @section('styles')
                @show
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

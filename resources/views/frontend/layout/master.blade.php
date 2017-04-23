<!DOCTYPE html>

<html lang="en">

@section('header')
    @include('frontend.partials.header')
@show

@yield('css')

<body>

     


     <!-- Main content -->
     <section class="content">
         <!-- Your Page Content Here -->
         @yield('main-content')<!-- /.content -->
     </section><!-- /.content-wrapper -->

     

    @include('frontend.partials.footer')


    @yield('js')

    <!-- custom js functions -->
    @yield('script')
    <!-- ./custom js functions -->



</body>



</html>
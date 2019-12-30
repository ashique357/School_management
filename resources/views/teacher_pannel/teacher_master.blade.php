<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>
        <!-- -->


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


        <script type="text/javascript" src="{{ URL::to('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/demo.js') }}"></script>
        <a href="javascript:" id="return-to-top"><i class="icofont icofont-arrow-up"></i>

          <!--js strat-->
          <script type="text/javascript" src="{{ URL::to('js/jquery-1.12.4-min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/jquery.counterup.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/waypoints.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/jquery.magnific-popup.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/mixitup.min.js') }}"></script>
          <script type="text/javascript" src="{{ URL::to('js/main_demo.js') }}"></script>


          <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
          <link href="{{ asset('css/icofont.css') }}" rel="stylesheet">
          <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
          <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
          <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
          <link href="{{ asset('css/style.css') }}" rel="stylesheet">


        <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
          <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

          <!-- Fonts -->
          <link rel="dns-prefetch" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



          <link rel="icon" href="Favicon.png">

          <!-- Bootstrap CSS
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
-->
    </head>

    <body>
      
      @include('teacher_pannel.sidebar')
      <main class="page-content">
          <div class="row">
              <div class="form-group col-md-12">
                <hr>
                 <strong> <h2>Teacher Dashboard</h2> </strong>
                <hr>
              </div>
            </div>
      @yield('component')
    </body>
</html>

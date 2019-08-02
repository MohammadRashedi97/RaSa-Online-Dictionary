<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- Site Icon -->
     <link rel="shortcut icon" type="/image/png" href="/img/logo.png"/>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- Page Title -->
     <title>@yield('title' , 'MyBlog')</title>

     <!-- Stylesheets -->

          <!-- Bootstrap -->
          <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">

          <!-- Font Awesome -->
          <link rel="stylesheet" href="{{asset('/css/fontawesome.min.css')}}">

          <!-- jquery-ui -->
          <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

          <!-- custom frontend Stylesheet -->
          <link rel="stylesheet" href="{{asset('/css/frontend.css')}}">

          <!-- Footer Stylesheet -->
          <link rel="stylesheet" href="{{asset('/css/footer.css')}}">

     <!-- /Stylesheets -->
</head>

<body>

     {{-- Website Body --}}
     <div id="app">
          {{-- Navigation Bar --}}
          @include('layouts.frontend.navbar')

          {{-- Search Functionality (if needed) --}}
          @yield('search')

          {{-- Main Content Container --}}
          <main class="container">
               @yield('content')
          </main>

          {{-- Footer --}}
          @include('layouts.frontend.footer')
     </div>
     {{-- /Website Body --}}

     <!-- Scripts -->

          <!-- jquery -->
          <script src="{{asset('/js/jquery.min.js')}}"></script>

          <!-- jquery-ui -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

          <!-- Bootstrap -->
          <script src="{{asset('/js/bootstrap.min.js')}}"></script>

          <!-- CKEditor -->
          <script src="{{asset('/plugins/ckeditor/ckeditor.js')}}"></script>

          <!-- CKEditor Config File -->
          <script src="{{asset('/plugins/ckeditor/config.js')}}"></script>

          <!-- Custom Javascript Code for the Application -->
          <script src="{{ asset('/js/app.js') }}"></script>

          <!-- Responsive Voice -->
          <script src="https://code.responsivevoice.org/responsivevoice.js?key=Nj4ER0PH"></script>

          <!-- Custom Script for a specific page -->
          @yield('script')

     <!-- /Scripts -->

</body>

</html>



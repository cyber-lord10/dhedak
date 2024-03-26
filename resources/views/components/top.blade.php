
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="engine, spare, parts, wind shield, brake, car, vehicle" />
      <meta name="description" content="A platform for purchasing car spare parts at a very cheap cost" />
      <meta name="author" content="Cyber Lord" />

      <!-- Token meta tag -->
      @if (request()->path()=='user/profile')
      
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <!-- Fonts -->
          <link rel="preconnect" href="https://fonts.bunny.net">
          <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

          <!-- Laravel styles inclusion -->
          @livewireStyles

      @elseif (request()->path()=='forgot-password')

          <!-- Fonts -->
          <link rel="preconnect" href="https://fonts.bunny.net">
          <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

          <!-- Laravel styles inclusion -->
          @livewireStyles

      @endif

      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])

      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="" >
      
      <title>{{$tab??false}} | Extra Spare parts</title>

      {{-- Bootstrap v5.32 CDN --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

      

      
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- My Font-Awesome -->
      <script src="https://kit.fontawesome.com/469d0ce037.js" crossorigin="anonymous"></script>

      {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}
      

      <!-- Downloaded icons injection -->
      <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">


      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
          
      <!-- Inclusion of JQUERY CDN-->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <!-- My personally made JS -->
      <script src="{{asset('home/js/my-script.js')}}"></script>

      <!-- code for jQuery -->
      <script src="{{asset('home/js/jquery.js')}}"></script>

   </head>
   <body>
      <div class="hero_area">
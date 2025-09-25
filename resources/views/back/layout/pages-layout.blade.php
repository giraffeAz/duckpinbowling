<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>TDBMS - @yield('title')</title>

	<!--logo-->
	<link rel="shortcut icon" href="{{ url('images/modernlogo.ico') }}">

	<!--Bootstrap CSS-->

	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/remixicon/remixicon.css') }}">

	<!---Styles---->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	
	@stack('stylesheets')

	
</head>
<body > 
 

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <div class="d-flex align-items-center justify-content-between logoside">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TDBMS</span>
      </a>
      
    </div><!-- End Logo -->

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Tournament</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
           <li>
            <a href="{{ route('setup')}}">
              <span>Set Up</span>
            </a>
          </li>
          <li>
            <a href="{{ route('organize')}}">
              <span>Organize</span>
            </a>
          </li>
          <li>
            <a href="{{ route('player-registration') }}">
              <span>Player/Team Registration</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bracket') }}">
              <span>Generate Bracket</span>
            </a>
          </li>
          <li>
            <a href="{{ route('matches') }}">
              <span>Match Schedules</span>
            </a>
          </li>
        
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('scoring') }}">
          <i class="bi bi-journal-text"></i>
          <span>Scoring</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('leaderboard') }}">
          <i class="bi bi-bar-chart"></i>
          <span>Leaderboard</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->


	<!-- Content Page -->
	@yield('content')

    @stack('scripts')
	<!--Livewire Framework----->
	@livewireScripts
	<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/main.js')}}"></script>
  <script src="{{asset ('vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset ('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset ('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset ('vendor/php-email-form/validate.js')}}"></script>

</body>
</html>
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
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TDBMS</span>
      </a>
      
    </div><!-- End Logo -->

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Tournament</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
           <li>
            <a href="components-alerts.html">
              <span>Set Up</span>
            </a>
          </li>
          <li>
            <a href="components-alerts.html">
              <span>Organize</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <span>Player/Team Registration</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <span>Bracket</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <span>Match</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Scoring</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Leaderboard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->


	<!-- Content Page -->
	@yield('content')

    @stack('scripts')
	<!--Livewire Framework----->
	@livewireScripts
	<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" type="type/javascript" ></script>
	<script src="{{ asset('js/main.js')}}"></script>
</body>
</html>
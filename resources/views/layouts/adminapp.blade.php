<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr"> 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> Peoplfone</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/extensions/unslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/app-assets/css/pages/timeline.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <!-- END Custom CSS-->

    @yield('style')
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="stack admin logo" src="{{ url('admin/app-assets/images/logo/stack-logo-light.png') }}">
                <h2 class="brand-text">Peoplefone</h2></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Explore Stack...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i><span>
              @php
              $unreadNotifications = auth()->user()->unreadNotifications()
              ->where('data->expiry_date', '>', date('Y-m-d'))
              ->count();
              @endphp

              {{ $unreadNotifications ? $unreadNotifications : '' }}</span></a>
            
            </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{ url('admin/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"><i></i></span><span class="user-name">{{ auth()->user()->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="fa fa-id-card-o"></i> View Profile</a>
                   <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="ft-power"></i>Logout</button>
                    </form>
                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="#"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="fa fa-table"></i><span class="menu-title" data-i18n="">Users</span></a>
                   <ul class="menu-content">
                   <li><a class="menu-item" href="{{ route('users.index') }}">Users List</a>
                   </li>
                  </ul>
                </li>
                @impersonating($guard = null)
                <li class=" nav-item"><a href="{{ route('impersonate.leave') }}"><i class="ft-power"></i><span class="menu-title" data-i18n="">Leave Impersonation</span></a>
                </li>
                @endImpersonating
            </ul>
        </div>
    </div>


   @yield('content')

    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2024 <a class="text-bold-800 grey darken-2" href="#" target="_blank">Peoplefone </a>, All rights reserved. </span></p>
    </footer>

    <script src="{{ url('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/charts/raphael-min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/charts/morris.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/extensions/unslider-min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/timeline/horizontal-timeline.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/core/app.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/scripts/customizer.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/jszip.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/pdfmake.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/vfs_fonts.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/scripts/tables/datatables/datatable-advanced.js') }}"></script>
   
    <script src="{{ url('admin/app-assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="{{ url('admin/app-assets/js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>

      @yield('extra-js')
  </body>

</html>
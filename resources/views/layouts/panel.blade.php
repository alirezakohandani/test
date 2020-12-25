@auth
@include('layouts.header')
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">




    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
   
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
         
       
          <li class=" navigation-header"><span>داشبورد</span>
          </li>
         
          <li class=" nav-item"><a href="#"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Content">فایل ها</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('admin.file.form') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Grid">ایجاد فایل</span></a>
              </li>
              <li><a href="content-typography.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Typography">مدیریت فایل</span></a>
              </li>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <div class="breadcrumb-wrapper col-12">
                   @yield('content')
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Filled Buttons start -->

        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/components.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/footer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>
@endauth

@guest
  <a href="{{ route('auth.login.form') }}">لطفا لاگین کند.</a>
@endguest
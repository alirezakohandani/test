@auth
@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/data-list-view.min.css')}}">
    <!-- END: Vendor CSS-->
</head>
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include('sweet::alert')
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
              <li><a href="{{ route('admin.file.manage') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Typography">مدیریت فایل</span></a>
              </li>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Content">پست ها</span></a>
            <ul class="menu-content">
              <li><a href="{{ route('admin.post.form') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Grid">ایجاد پست</span></a>
              </li>
              <li><a href=""><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Typography">مدیریت پست</span></a>
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
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/components.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/footer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
    <!-- END: Page JS-->
    <script>
      $(document).ready(function() {
          $("form.ajax-form").submit(function(e) {
                  e.preventDefault();
                  var form = $(this);
                  var resultBox = form.find('.result');
                  resultBox.html("...");
                  $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                  }); 
                  $.ajax({
                      type: form.attr('method'),
                      url: form.attr('action'),
                      data: form.serialize(),
                      timeout: 10000,
                      success: function(response) {
                          resultBox.html(response);
                          form.trigger("reset");
                      },
                      error: function() {
                          resultBox.html("خطایی رخ داده است.");
                      }
                  });
  
              });   
             
      });
  </script>
  </body>
  <!-- END: Body-->
</html>
@endauth

@guest
  <a href="{{ route('auth.login.form') }}">لطفا لاگین کند.</a>
@endguest
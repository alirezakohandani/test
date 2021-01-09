@include('layouts.header')
@include('partials.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/app-ecommerce-shop.min.css') }}">
</head>
  <!-- BEGIN: Body-->
  <body class="horizontal-layout horizontal-menu 2-columns ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
<h3 style="text-align: center">فروشگاه</h3>
<hr>
<br>
<section>
  <form action="{{ route('shop.search') }}" method="GET" role="search">
    <div class="input-group">
        <input type="text" class="form-control" name="s"
            placeholder="جستجو در فایل ها"> 
    </div>
    <h4 class="success" style="text-align: center">{{ session('successInsertStore') }}</h4>
</form>
</section>
<section id="wishlist" class="grid-view wishlist-items">

@foreach ($files as $k=>$file)
<div class="card ecommerce-card">
    <div class="card-content">
      <div class="item-img text-center">
        <a href="app-ecommerce-details.html">
          <img class="img-fluid" src="{{ $address . $file->thumb }}" alt="img-placeholder"></a>
      </div>
      <div class="card-body">
        <div class="item-wrapper">
          <div class="item-rating">
           
          </div>
          <div>
            <h6 class="item-price"> {{ $file->price }} ريال</h6>
          </div>
        </div>
        <div class="item-name">
          <a href="app-ecommerce-details.html">{{ $file->title }}</a>
          <p class="item-company">توسط<span class="company-name">Google</span></p>
        </div>
        <div>
          <p class="item-description">{{ $file->description }}</p>
        </div>
      </div>
      <div class="item-options text-center">
        <div class="item-wrapper">
          <div class="item-rating">
            <div class="badge badge-primary badge-md">
              <span>4</span> <i class="feather icon-star"></i>
            </div>
          </div>
          <div class="item-cost">
            <h6 class="item-price"> 3,999,000 ريال</h6>
          </div>
        </div>
    @auth
    <form method="POST" action="{{ route('cart.redis.store') }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <input type="hidden" name="file_id" value="{{ $file->id }}">
      {!! csrf_field() !!}
      <button type="submit" class="btn btn-info">
          افزودن به سبد خرید
      </button>
  </form>
    @endauth
    @guest
    <a href="{{ route('auth.login.form') }}"><button type="submit" class="btn btn-info">
      افزودن به سبد خرید
  </button>
    </a>
    @endguest
      
      </div>
    </div>
  </div>
@endforeach
 

</section>
<div>
  {{ $files->links() }}
</div>
<!-- Wishlist Ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/components.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/footer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/app-assets/js/scripts/pages/app-ecommerce-shop.min.js')}}"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>
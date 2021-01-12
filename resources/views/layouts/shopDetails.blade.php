@include('partials.navbar')
</head>
<body>
<section class="app-ecommerce-details">
    <div class="card">
      <div class="card-body">
        <div class="row mb-5 mt-2">
          <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
            <div class="d-flex align-items-center justify-content-center">
              <img src="{{ THUMB_ADDR .$file->thumb }}" class="img-fluid" alt="product image">
            </div>
          </div>
          <div class="col-12 col-md-6">
            <h5>{{ $file->title }}</h5>
            <p class="text-muted">{{ $file->type }}</p>
            <div class="ecommerce-details-price d-flex flex-wrap">
  
              <p class="text-primary font-medium-3 mr-1 mb-0">{{ $file->price }} تومان</p>
              <span class="pl-1 font-medium-3 border-left">
                <i class="feather icon-star text-warning"></i>
                <i class="feather icon-star text-warning"></i>
                <i class="feather icon-star text-warning"></i>
                <i class="feather icon-star text-warning"></i>
                <i class="feather icon-star text-secondary"></i>
              </span>
              <span class="ml-50 text-dark font-medium-1">424 رتبه</span>
            </div>
            <hr>
            <p>{{ $file->description }}</p>
            <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i> ارسال رایگان</p>
            <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i> گزینه های EMI در دسترس است</p>
            <hr>
            <div class="form-group">
              <label class="font-weight-bold">رنگ</label>
              <ul class="list-unstyled mb-0 product-color-options">
                <li class="d-inline-block selected">
                  <div class="color-option b-primary">
                    <div class="filloption bg-primary"></div>
                  </div>
                </li>
                <li class="d-inline-block">
                  <div class="color-option b-success">
                    <div class="filloption bg-success"></div>
                  </div>
                </li>
                <li class="d-inline-block">
                  <div class="color-option b-danger">
                    <div class="filloption bg-danger"></div>
                  </div>
                </li>
                <li class="d-inline-block">
                  <div class="color-option b-warning">
                    <div class="filloption bg-warning"></div>
                  </div>
                </li>
                <li class="d-inline-block">
                  <div class="color-option b-black">
                    <div class="filloption bg-black"></div>
                  </div>
                </li>
              </ul>
            </div>
            <hr>
            <p>موجود -<span class="text-success">در انبار</span></p>
            <div class="d-flex flex-column flex-sm-row">
                @auth
                <form method="POST" action="{{ route('cart.store') }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="file_id" value="{{ $file->id }}">
                {!! csrf_field() !!}
                <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light"><i class="feather icon-shopping-cart mr-25"></i>افزودن به سبد خرید</button>
            </form> 
            @endauth
                <button class="btn btn-outline-danger waves-effect waves-light"><i class="feather icon-heart mr-25"></i>لیست علاقه مندی</button>
              </div>
            <hr>
            <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-facebook"></i></button>
            <button type="button" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1 waves-effect waves-light"><i class="feather icon-twitter"></i></button>
            <button type="button" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light"><i class="feather icon-youtube"></i></button>
            <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-instagram"></i></button>
          </div>
        </div>
      </div>
     
      <div class="card-body">
        <div class="mt-4 mb-2 text-center">
          <h2>محصولات مرتبط</h2>
          <p>افراد همچنین این موارد را جستجو می کنند</p>
        </div>
        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2 swiper-container-initialized swiper-container-horizontal swiper-container-rtl">
          <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
            <div class="swiper-slide rounded swiper-shadow swiper-slide-active" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0">
                  Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                </p>
                <p>
                  <small>به وسیله</small>
                  <small>Bowers &amp; Wilkins</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-2 py-75">
                <img src="{{ asset('assets//app-assets/images/elements/apple-watch.png')}}" class="img-fluid" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">199,800 ريال</p>
              </div>
            </div>
            <div class="swiper-slide rounded swiper-shadow swiper-slide-next" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0">
                  Alienware - 17.3" Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce GTX 1070 - 1TB Hard Drive +
                  128GB Solid State Drive - Silver
                </p>
                <p>
                  <small>به وسیله</small>
                  <small>Alienware</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-2 py-75">
                <img src="{{ asset('assets//app-assets/images/elements/beats-headphones.png')}}" class="img-fluid" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">359,800 ريال</p>
              </div>
            </div>
            <div class="swiper-slide rounded swiper-shadow" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0"> Canon - دوربین EOS 5D Mark IV DSLR با لنزهای 24-70 میلی متر f / 4L IS USM</p>
                <p>
                  <small>به وسیله</small>
                  <small>Canon</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-3 py-50">
                <img src="{{ asset('assets//app-assets/images/elements/macbook-pro.png" class="img-fluid')}}" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">499,800 ريال</p>
              </div>
            </div>
            <div class="swiper-slide rounded swiper-shadow" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0">
                  Apple - 27" iMac with Retina 5K display - Intel Core i7 - 32GB Memory - 2TB Fusion Drive - Silver
                </p>
                <p>
                  <small>به وسیله</small>
                  <small>Apple</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-2 py-75">
                <img src="{{ asset('assets//app-assets/images/elements/homepod.png" class="img-fluid')}}" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">299,800 ريالٍ</p>
              </div>
            </div>
            <div class="swiper-slide rounded swiper-shadow" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0">
                  Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                </p>
                <p>
                  <small>به وسیله</small>
                  <small>Bowers &amp; Wilkins</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-2 py-75">
                <img src="{{ asset('assets//app-assets/images/elements/magic-mouse.png')}}" class="img-fluid" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">999,800 ريال</p>
              </div>
            </div>
            <div class="swiper-slide rounded swiper-shadow" style="width: 203.25px; margin-left: 55px;">
              <div class="item-heading">
                <p class="text-truncate mb-0"> Garmin - fenix 3 Sapphire Watch GPS - نقره</p>
                <p>
                  <small>به وسیله</small>
                  <small>Garmin</small>
                </p>
              </div>
              <div class="img-container w-50 mx-auto my-2 py-75">
                <img src="{{ asset('assets//app-assets/images/elements/iphone-x.png')}}" class="img-fluid" alt="image">
              </div>
              <div class="item-meta">
                <div class="product-rating">
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-warning"></i>
                  <i class="feather icon-star text-secondary"></i>
                </div>
                <p class="text-primary mb-0">599,800 ريال</p>
              </div>
            </div>
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
          <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
  
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
    </div>
  </section>
 <!-- BEGIN: Vendor JS-->
 <script src="{{ asset('assets//app-assets/vendors/js/vendors.min.js')}}"></script>
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <script src="{{ asset('assets//app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
 <script src="{{ asset('assets//app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->
 <script src="{{ asset('assets//app-assets/js/core/app-menu.min.js')}}"></script>
 <script src="{{ asset('assets//app-assets/js/core/app.min.js')}}"></script>
 <script src="{{ asset('assets//app-assets/js/scripts/components.min.js')}}"></script>
 <script src="{{ asset('assets//app-assets/js/scripts/customizer.min.js')}}"></script>
 <script src="{{ asset('assets//app-assets/js/scripts/footer.min.js')}}"></script>
 <!-- END: Theme JS-->

 <!-- BEGIN: Page JS-->
 <script src="{{ asset('assets//app-assets/js/scripts/pages/app-ecommerce-details.min.js')}}"></script>
 <script src="{{ asset('assets//app-assets/js/scripts/forms/number-input.min.js')}}"></script>
 <!-- END: Page JS-->
</body>
</html>
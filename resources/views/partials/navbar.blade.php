@include('layouts.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-default">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ route('home') }}">صفحه اصلی <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('shop') }}">فروشگاه</a>
                    </li>
                      <li class="nav-item dropdown">
                      <a href="{{ route('cart.show') }}"><div class="fonticon-wrap"><i class="fa fa-shopping-cart fa-2x"></i></div></a>
                      </li>
                  </ul>

            
                </div>
                @auth
              
                  <form class="form-inline my-2 my-lg-0">
                    @if (Auth::user()->role == 1)
                    <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-info mr-1 mb-1 waves-effect waves-light">پنل</button></a>
                       @endif
                  </form>
                  @endauth
     
                @guest
                <form class="form-inline my-2 my-lg-0">
                    <a href="{{ route('auth.register.form') }}"><button type="button" class="btn btn-success mr-1 mb-1 waves-effect waves-light">ثبت نام</button></a>
                    <a href="{{ route('auth.login.form') }}"><button type="button" class="btn btn-info mr-1 mb-1 waves-effect waves-light">ورود</button></a>
                  </form>
                @endguest
                @auth
                <form class="form-inline my-2 my-lg-0">

                    <a href="{{ route('auth.logout') }}"><button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">خروج</button></a>
                </form>
                @endauth
              </nav>
            </div>
        </div>
    </div>

  
       <br>
       <br>
       @auth
       <p class="text-left">سلام {{ Auth::user()->name }}</p>
       @if (Auth::user()->role == 1)
       نقش : ادمین
       </html>
   @endif
       @endauth
  



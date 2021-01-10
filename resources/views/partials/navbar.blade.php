
   
               
<a href="{{ route('shop') }}">فروشگاه</a>   
<br>

       
@guest
<a href="{{ route('auth.register.form') }}"><button type="button" class="btn btn-success mr-1 mb-1 waves-effect waves-light">ثبت نام</button></a>
<a href="{{ route('auth.login.form') }}"><button type="button" class="btn btn-info mr-1 mb-1 waves-effect waves-light">ورود</button></a>
@endguest

@auth
   <p>سلام {{ Auth::user()->name }}</p>
   <a href="{{ route('auth.logout') }}"><button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">خروج</button></a>
   @if (Auth::user()->role == 1)
       نقش : ادمین
       <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-info mr-1 mb-1 waves-effect waves-light">پنل</button></a>
   @endif
@endauth
<a href="{{ route('cart.show') }}"><div class="fonticon-wrap"><i class="fa fa-shopping-cart fa-2x"></i></div></a>
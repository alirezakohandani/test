
   
               
             
@guest
<a href="{{ route('auth.register.form') }}"><button type="button" class="btn btn-success mr-1 mb-1 waves-effect waves-light">ثبت نام</button></a>
<a href="{{ route('auth.login.form') }}"><button type="button" class="btn btn-info mr-1 mb-1 waves-effect waves-light">ورود</button></a>
@endguest

@auth
   <p>سلام {{ Auth::user()->name }}</p>
   <a href="{{ route('auth.logout') }}"><button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">خروج</button></a>
@endauth

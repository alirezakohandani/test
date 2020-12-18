
@if (session('registred'))
    <h5 style="text-align: center; color:green">ثبت نام با موفقیت انجام شد.</h5>
@endif
<div style="color: red"> {{ session('message') }} </div>
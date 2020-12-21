




    <strong>{{ $user->name }}</strong> <span>عزیز</span> سلام

    <p style="margin:10px 0">
        برای تایید ایمیل خود در سامانه مدیریت مالی بر روی دکمه زیر کلیک کنید
    </p>

    دکمه تایید ایمیل در مدیریت مالی:

    <div style="text-align: center; margin-top: 12px">
        <a class="btn btn-primary" href="{{ route('email.verify', ['token' => $token]) }}">
           active links
        </a>
    </div>

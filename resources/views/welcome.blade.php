@extends('layouts.app')

@section('content')
@include('partials.alert')
<br>
<br>
<br>

  
@auth
      
@if (!Auth::user()->email_vrified_at)
شما ایمیل خود را ثبت نکرده اید لطفا به ایمیل خود مراجعه کنید ، ایمیل را تایید کنید.
اگر ایمیلتان ثبت نشده لطفا <a href="{{ route('send.verify.email') }}">کلیک کنید.</a>
@endif
<h5 style="text-align: center">content for <b>{{ Auth::user()->name }} </b></h5>

 
@endauth  
@endsection
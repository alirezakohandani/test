@extends('layouts.app')





@section('content')
@include('partials.alert')
<br>
<br>
<br>
@auth
<h5 style="text-align: center">content for <b>{{ Auth::user()->name }} </b></h5>

@endauth

@endsection
@extends('layouts.app')
 
@section('content')


        <div class="row match-height">
            <div class="col-md-6 col-12" style="margin-right: auto; margin-left: auto; position:relative">
                <div class="card" style="height: ۶99.75px;">
                    <div class="card-header">
                        <h4 class="card-title">فرم ثبت نام</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">ایمیل</label>
                                                <input type="email" id="first-name-vertical" class="form-control" name="email" placeholder="ایمیل">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">نام</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="name" placeholder="نام">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">پسورد</label>
                                                <input type="password" id="first-name-vertical" class="form-control" name="password" placeholder="پسورد">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">تکرار پسورد</label>
                                                <input type="password" id="first-name-vertical" class="form-control" name="password_confirmation" placeholder="تکرار پسورد">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">شماره همراه</label>
                                                <input type="text" id="password-vertical" class="form-control" name="cellphone" placeholder="شماره همراه">
                                            </div>
                                        </div>
                                
                              <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ارسال</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @include('partials.validation-errors')
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection






















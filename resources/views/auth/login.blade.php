@extends('layouts.app')

@section('content')

        
    <div class="row match-height">
        <div class="col-md-6 col-12" style="margin-right: auto; margin-left: auto; position:relative">
            <div class="card" style="height: 350.75px;">
                <div class="card-header">
                    <h4 class="card-title">فرم ورود</h4>
                </div>
                <h5 style="color: red; text-align: right"> {{ session('message') }} </h5>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="{{ route('auth.login') }}">
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
                                            <label for="first-name-vertical">پسورد</label>
                                            <input type="password" id="first-name-vertical" class="form-control" name="password" placeholder="پسورد">
                                        </div>
                                    </div>
           
                                  </div>
                                  <div class="form-group col-12">
                                    <fieldset class="checkbox">
                                      <div class="vs-checkbox-con vs-checkbox-primary">
                                        <input name="remember" type="checkbox">
                                        <span class="vs-checkbox">
                                          <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                          </span>
                                        </span>
                                        <span class="">مرا به خاطر بسپار</span>
                                      </div> 
                                    </fieldset> 
                                  </div>
                                  <div class="col-12">
                                        <button type="submit"  class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ورود</button>
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


  


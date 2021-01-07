@extends('layouts.panel')

@section('content')
<div class="row match-height">
    <div class="col-md-6 col-12" style="margin-right: auto; margin-left: auto; position:relative">
        <div class="card" style="height: ۶99.75px;">
            <h4 class="success">{{ session('success') }}</h4>
            <div class="card-header">
                <h4 class="card-title">فرم بارگذاری محصولات </h4>
            </div>
            <div class="card-content">

                <div class="card-body">
                    {{ session('success') }}
                    <form class="form.ajax form form-vertical" method="POST" action="{{ route('admin.post.send') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">عنوان</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="title" placeholder="عنوان">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">توضیحات</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="description" placeholder="توضیحات">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">انتخاب تگ</label>
                                        <select name="tags">
                                            @foreach (\App\Models\Tag::all() as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}<option>   
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">تصویر</label>
                                        <input type="file" id="password-vertical" class="form-control" name="image">
                                    </div>
                                </div>
                           <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">ارسال</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @include('admin.partials.validation-errors')
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
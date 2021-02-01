
@extends('layouts.panel')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/file-uploaders/dropzone.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/data-list-view.min.css')}}">
<!-- END: Vendor CSS-->
</head>
<body>

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                   <h5 class="danger"> {{ session('success') }} </h5>
                    <div class="card-header">
                        <h4 class="card-title">مدیریت فایل ها</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length">
                                    </div>
                                </div>
                            <div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12">
                                    <table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="موقعیت: activate to sort column ascending" style="width: 299px;">#</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام: activate to sort column descending" style="width: 157px;">عکس</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="موقعیت: activate to sort column ascending" style="width: 299px;">عنوان</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="دفتر: activate to sort column ascending" style="width: 140px;">توضیحات</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 126px;">حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                @foreach ($posts as $post)
                                    <tr role="row" class="odd">
                                            <td {{ $post->deleted  }}><p>{{$loop->index+1}}</p></td>
                                            <td {{ $post->deleted  }} class="sorting_1"><img style="width: 50px; height: 50px" src="{{ $address.$post->image }}"></td>
                                            <td {{ $post->deleted  }} ><p>{{ $post->title }}</p></td>
                                            <td {{ $post->deleted  }}>{{ Str::limit($post->description, 15) }}</td>
                                            <td {{ $post->deleted  }}>

                                        <form action="{{ route('admin.post.delete', $post) }}" method="post">
                                            {{ csrf_field() }}
                                            @method('delete')
                                              <button type="submit">
                                                <div class="fonticon-wrap"><i class="fa fa-trash-o"></i></div>
                                              </button>
                                        </form> 
                                   
                                        <div class="fonticon-wrap"><a href="{{ route('admin.file.form.update', $post->id) }}"><i class="fa fa-pencil"></i></a></div>
                                    @if ($post->deleted_at !== null)
                                    <form action="{{ route('admin.post.softDelete', $post) }}" method="post">
                                        {{ csrf_field() }}
                                          <button type="submit">
                                            <div class="fonticon-wrap"><i class="fa fa-refresh"></i></div>
                                          </button>
                                    </form> 
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody> 
                                  
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 29 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </section>
    <p class="editable-text card-text example" role="button" tabindex="0" title="Click to edit">Click this text to edit it.</p>

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/js/scripts/components.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('assets/app-assets/js/scripts/footer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/app-assets/js/scripts/ui/data-list-view.min.js') }}"></script>
<!-- END: Page JS -->

@endsection
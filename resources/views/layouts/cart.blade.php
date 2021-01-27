@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/data-list-view.min.css')}}">
    <!-- END: Vendor CSS-->
</head>
<body>
<section id="data-list-view" class="data-list-view-header">
    <!-- DataTable starts -->
    <div class="table-responsive">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
      </div>
<div class="clear">
    </div>
    <h4 style="text-align: center" class="danger">{{ session('deleteWithRedis') }}</h4>
    <div class="row">
    <div class="col-md-8">
    <table class="table data-list-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
        <thead>
          <tr role="row">
            <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;" data-col="0" aria-label=""><input type="checkbox" class="mac-checkbox"></th>
            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام: activate to sort column descending" style="width: 514px;">ردیف</th>
            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام: activate to sort column descending" style="width: 514px;">تصویر</th>
            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام: activate to sort column descending" style="width: 514px;">عنوان محصول</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="دسته بندی: activate to sort column ascending" style="width: 117px;">نوع</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="مردم: activate to sort column ascending" style="width: 47px;">تعداد سفارش</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="قیمت: activate to sort column ascending" style="width: 151px;">قیمت</th>
            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="اقدام: activate to sort column ascending" style="width: 65px;">اقدام</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
        <tr role="row" class="odd">
            <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes mac-checkbox"></td>
            <td class="product-name sorting_1">{{ $loop->iteration }}</td>
            <td class="product-name sorting_1"><img style="width: 20px; height: 20px" src="{{ $address.$cart['thumb'] }}"></td>
            <td class="product-name sorting_1">{{ $cart['title'] }}</td>
            <td class="product-category">{{ $cart['type'] }}</td>
            <td>
              {{ $number[$cart['id']] }}
              </div>
            </td>
            <td class="product-price">{{ $number[$cart['id']] * $cart['price'] }}</td>
            <td class="product-action">
              <form action="{{ route('cart.destroy') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $cart['id'] }}">
                  <button type="submit">
                    <div class="fonticon-wrap"><span class="action-delete"><i class="feather icon-trash"></i></span></div>
                  </button>
            </form> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <div class="table-responsive">
        <table class="table table-borderless text-center">
          <tbody>
            <tr>
              <th>مجموع خرید</th>
              <td>{{ $total_price }} تومان</td>
            </tr>
            <tr>
              <th>هزینه حمل</th>
              <td>{{ $shipment }} تومان</td>
            </tr>
            <tr>
              <th>مبلغ قابل پرداخت</th>
              <td> {{ $total_price + $shipment}} تومان</td>
            </tr>
          </tbody>
        </table>
        <a href=""><button class="btn btn-success btn-default mx-auto d-block">ثبت و ادامه سفارش</button></a>
      </div>
    </div>
    </div>
    </div>
    <!-- DataTable ends -->
  </section>
 <div>
    <div class="container">
      <div class="row">
        
        <div class="col-md-4">
          <a href="{{ route('shop') }}"><button class="btn btn-success btn-block">ادامه خرید</button></a>
        </div>
        <div class="col-md-4">
          <form action="{{ route('cart.clear') }}" method="post">
            {{ csrf_field() }}
              <button type="submit" class="btn btn-danger btn-block">حذف کل سبد خرید</button>
          </form> 
         
        </div>
      </div>
    </div>
 </div>

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
<!-- END: Page JS-->
</body>
</html>
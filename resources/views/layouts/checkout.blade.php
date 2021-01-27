@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/data-list-view.min.css')}}">
    <!-- END: Vendor CSS-->
</head>

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
            <td>{{ 20000 }} تومان</td>
          </tr>
          <tr>
            <th>مبلغ قابل پرداخت</th>
            <td> {{ $total_price + 20000}} تومان</td>
          </tr>
        </tbody>
      </table>
      <a href="{{ route('cart.checkout.form') }}"><button class="btn btn-success btn-default mx-auto d-block">ثبت و ادامه سفارش</button></a>
    </div>
  </div>
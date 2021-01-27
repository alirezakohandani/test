@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/data-list-view.min.css')}}">
    <!-- END: Vendor CSS-->
</head>
<div class="container">
    <div class="row">
<div class="col-md-4 mt-5">
    <div class="table-responsive">
      <table class="table table-borderless text-center" border="1">
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
    </div>
  </div>
  <div class="col-md-8 mt-5"> 
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">روش پرداخت</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                    <form method="post" action="{{ route('cart.checkout') }}">
                        @csrf
                  <ul class="list-unstyled mb-0">
                    <li class="d-inline-block mr-2">
                      <fieldset>
                        <label>
                          <input type="radio" name="method" value="online"> آنلاین</label>
                          <select name="gateway">
                              <option value="zarinpal">زرین پال</option>
                              <option value="saman">سامان</option>
                          </select>
                      </fieldset>
                    </li>
                    <li class="d-inline-block mr-2">
                      <fieldset>
                        <label>
                          <input type="radio" name="method" value="cashe"> پرداخت نقدی</label>
                      </fieldset>
                    </li>
                    <li class="d-inline-block mr-2">
                      <fieldset>
                        <label>
                          <input type="radio" name="method" value="cart-to-cart">کارت به کارت</label>
                      </fieldset>
                    </li>
                  </ul>
                  <a href="{{ route('cart.checkout.form') }}"><button class="btn btn-success btn-default mx-auto d-block mt-3">ثبت و ادامه سفارش</button></a>
                    </form>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                          <p style="color: red">  {{ $error }} </p>
                        @endforeach  
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
    </div></div>
  
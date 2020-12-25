@include('layouts.header')
<body>
    <section id="basic-buttons">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
    @include('partials.navbar')
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
    </section>
    <section id="basic-vertical-layouts">
    @yield('content')
    </section>
    <script href="{{ asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script href="{{ asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
    <script href="{{ asset('assets/app-assets/js/core/app.min.js')}}"></script>
    <script href="{{ asset('assets/app-assets/js/scripts/components.min.js')}}"></script>
    <script href="{{ asset('assets/app-assets/js/scripts/customizer.min.js')}}"></script>
    <script href="{{ asset('assets/app-assets/js/scripts/footer.min.js')}}"></script>
        </body>
    </html>
    
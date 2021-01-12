@include('layouts.header')
 
<body>
    <section id="basic-buttons">
      
    @include('partials.navbar')

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
    
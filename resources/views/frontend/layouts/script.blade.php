
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.smartmenus.js') }}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <!-- To Slider JS -->
    <script src="{{ asset('frontend/js/sequence.js') }}"></script>
    <script src="{{ asset('frontend/js/sequence-theme.modern-slide-in.js') }}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.simpleLens.js') }}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('frontend/js/slick.js') }}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{ asset('frontend/js/nouislider.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @stack('front_script')
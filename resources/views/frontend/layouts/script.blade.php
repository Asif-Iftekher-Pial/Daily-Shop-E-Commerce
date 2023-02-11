
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
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script>
        //  $('.slider').slick();
         $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 8,
                slidesToScroll: 4

            });

            $('#rightArrow').click(function(){
                $('.slider').slick('slickNext');
            });
            $('#leftArrow').click(function(){
                $('.slider').slick('slickPrev');
            });
    </script>
    <script>
         $(document).on('click', '.quickView', function(e) {
                e.preventDefault();
                var slug = $(this).attr('href');
                // alert(slug);
                var url = "{{ route('quickView', ':slug') }}"
                url = url.replace(':slug', slug);
                // alert(url);
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        // console.log(response);
                        $('#title').html(response.product.title)
                        $('#price').html('$' + response.product.offer_price)
                        $('#summary').html(response.product.summary)
                        if (response.productAttribute.length === 0) {
                            $('#size').html('<p>No Size Available </p>');
                        } else {
                            var sizeLinks = '';
                            $.each(response.productAttribute, function(index, attribute) {
                                sizeLinks += '<a href="#">' + attribute.attribute_size
                                    .toUpperCase() + '</a>';
                            });
                            $('#size').html(sizeLinks);
                        }
                        $('#catName').html(response.subCategory.sub_cat_name)

                        // var loadingImage = "{{ asset('admin/images/products/') }}/" + response.product.image;
                        var imagePath = "{{ asset('admin/images/products/') }}/" + response
                            .product.image;
                        $('.simpleLens-big-image').attr('src', imagePath);
                        $('.simpleLens-lens-image').attr('data-lens-image', imagePath);

                        $('#demo .simpleLens-big-image').simpleLens({
                            loading_image: imagePath
                        });
                    }
                });

            });
    </script>
    @stack('front_script')
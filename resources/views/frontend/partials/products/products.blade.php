@extends('frontend.master.master')
@section('front_main')
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <form action="{{ route('productFilter') }}" method="post">
                    @csrf
                    <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                        <div class="aa-product-catg-content">
                            <div class="aa-product-catg-head">
                                <div class="aa-product-catg-head-left">

                                    <div style="display: flex">
                                        <label for="">Sort by:</label>
                                        <select name="sortBy" onchange="this.form.submit();" class="form-control">
                                            <option>Default</option>
                                            <option value="Date" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'Date') selected @endif>Latest
                                            </option>

                                            <option value="Name" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'Name') selected @endif>Name
                                            </option>
                                            <option value="Price" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'Price') selected @endif>
                                                Price-(Lower to higher)</option>
                                            <option value="PriceDesc" @if (!empty($_GET['sortBy']) && $_GET['sortBy'] == 'PriceDesc') selected @endif>
                                                Price-(Higher to Lower)</option>
                                        </select>
                                    </div>
                                    {{-- <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </form> --}}
                                </div>
                                <div class="aa-product-catg-head-right">
                                    <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                    <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                                </div>
                            </div>
                            <div class="aa-product-catg-body">
                                <ul class="aa-product-catg">
                                    <!-- start single product item -->
                                    @foreach ($products as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img
                                                        src="{{ asset('admin/images/products/' . $item->image) }}"
                                                        alt="polo shirt img"></a>
                                                <a class="aa-add-card-btn" href="#"><span
                                                        class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a
                                                            href="{{ route('viewProductDetail', $item->slug) }}">{{ ucfirst($item->title) }}</a>
                                                    </h4>
                                                    <span class="aa-product-price">${{ $item->offer_price }}</span><span
                                                        class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                    <p class="aa-product-descrip">{{ $item->summary }}</p>
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Add to Wishlist"><span
                                                        class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Compare"><span class="fa fa-exchange"></span></a>
                                                <a href="{{ $item->slug }}" class="quickView" data-toggle2="tooltip"
                                                    data-placement="top" title="" data-toggle="modal"
                                                    data-target="#quick-view-modal" data-original-title="Quick View"><span
                                                        class="fa fa-search"></span></a>
                                            </div>
                                            <!-- product badge -->
                                            <span
                                                class="aa-badge {{ $item->conditions == 'hot' ? 'hot' : 'sale' }}">{{ ucfirst($item->conditions) }}!</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- quick view modal -->
                                <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                                <div class="row">
                                                    <!-- Modal view slider -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-slider">
                                                            <div class="simpleLens-gallery-container" id="demo">
                                                                <div class="simpleLens-container">
                                                                    <div class="simpleLens-big-image-container">
                                                                        <a class="simpleLens-lens-image"
                                                                            data-lens-image=""><img src=""
                                                                                class="simpleLens-big-image">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="simpleLens-thumbnails-container">
                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                                                    data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                                                    <img
                                                                        src="img/view-slider/thumbnail/polo-shirt-1.png">
                                                                </a>
                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                                                    data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                                                    <img
                                                                        src="img/view-slider/thumbnail/polo-shirt-3.png">
                                                                </a>

                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                                                    data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                                                    <img
                                                                        src="img/view-slider/thumbnail/polo-shirt-4.png">
                                                                </a>
                                                            </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal view content -->
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="aa-product-view-content">
                                                            <h3 id="title"></h3>
                                                            <div class="aa-price-block">
                                                                <span class="aa-product-view-price" id="price"></span>
                                                                <p class="aa-product-avilability">Avilability:
                                                                    <span>In stock</span>
                                                                </p>
                                                            </div>
                                                            <p id="summary"></p>
                                                            <h4>Size</h4>
                                                            <div class="aa-prod-view-size" id="size">

                                                            </div>
                                                            <div class="aa-prod-quantity">
                                                                <input type="number" name="qty" id=""
                                                                    value="1" min="1" max="5"
                                                                    style="width:45px">
                                                                <p class="aa-prod-category">
                                                                    Category: <a href="#" id="catName"></a>
                                                                </p>
                                                            </div>
                                                            <div class="aa-prod-view-bottom">
                                                                <a href="#" class="aa-add-to-cart-btn"><span
                                                                        class="fa fa-shopping-cart"></span>Add To
                                                                    Cart</a>
                                                                <a href="#" class="aa-add-to-cart-btn">View
                                                                    Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!-- / quick view modal -->
                            </div>
                            <div class="aa-product-catg-pagination">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                        <aside class="aa-sidebar">


                            <!-- single sidebar --Categiry -->
                            <div class="aa-sidebar-widget">
                                <h3>Category</h3>
                                <ul class="aa-catg-nav">
                                    @if (!empty($_GET['category']))
                                        @php
                                            $filter_cat = explode(',', $_GET['category']);
                                        @endphp
                                    @endif
                                    @foreach ($category as $cat)
                                        {{-- <li><a href="{{ route('categorizedProduct', $cat->cat_name_slug) }}">{{ $cat->cat_name }}</a></li> --}}
                                        <li><input type="checkbox" class="my-5"
                                                @if (!empty($filter_cat) && in_array($cat->cat_name_slug, $filter_cat)) checked @endif
                                                onchange="this.form.submit();" value="{{ $cat->cat_name_slug }}"
                                                name="category[]" id="{{ $cat->cat_name_slug }}">
                                            {{ ucfirst($cat->cat_name) }} ({{ count($cat->getProducts) }})</li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- single sidebar --Shop By Price-->
                            <div class="aa-sidebar-widget">
                                <h3>Shop By Price</h3>
                                <!-- price range -->
                                <div class="aa-sidebar-price-range">
                                    <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">

                                    </div>
                                    <input type="hidden" id="price_range_min" value="" name="price_range_min">
                                    <input type="hidden" id="price_range_max" value="" name="price_range_max">
                                    <span id="skip-value-lower" class="example-val"></span>
                                    <span id="skip-value-upper" class="example-val"></span>
                                    <button class="aa-filter-btn" id="filterButton" type="button">Filter</button>

                                </div>

                            </div>
                            <!-- single sidebar Shop By Color-->
                            <div class="aa-sidebar-widget">
                                <h3>Shop By Color</h3>
                                <div class="aa-color-tag">
                                    <a class="aa-color-green" href="#"></a>
                                    <a class="aa-color-yellow" href="#"></a>
                                    <a class="aa-color-pink" href="#"></a>
                                    <a class="aa-color-purple" href="#"></a>
                                    <a class="aa-color-blue" href="#"></a>
                                    <a class="aa-color-orange" href="#"></a>
                                    <a class="aa-color-gray" href="#"></a>
                                    <a class="aa-color-black" href="#"></a>
                                    <a class="aa-color-white" href="#"></a>
                                    <a class="aa-color-cyan" href="#"></a>
                                    <a class="aa-color-olive" href="#"></a>
                                    <a class="aa-color-orchid" href="#"></a>
                                </div>
                            </div>

                            <!-- single sidebar -->
                            <div class="aa-sidebar-widget">
                                <h3>Recently Views</h3>
                                <div class="aa-recently-views">
                                    <ul>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-2.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-1.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-2.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar -->
                            <div class="aa-sidebar-widget">
                                <h3>Top Rated Products</h3>
                                <div class="aa-recently-views">
                                    <ul>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-2.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-1.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="aa-cartbox-img"><img alt="img"
                                                    src="img/woman-small-2.jpg"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
@push('front_script')
    <script>
        $(document).ready(function() {

            /* ----------------------------------------------------------- */
            /*  9. PRICE SLIDER  (noUiSlider SLIDER)
            /* ----------------------------------------------------------- */

            jQuery(function() {
                if ($('body').is('.productPage')) {

                    var skipSlider = document.getElementById('skipstep');
                    var minPrice = {!! json_encode(minPrice()) !!}
                    var maxPrice = {!! json_encode(maxPrice()) !!}
                    noUiSlider.create(skipSlider, {
                        range: {
                            'min': minPrice,
                            'max': maxPrice
                        },
                        // snap: true,
                        connect: true,
                        start: [minPrice, maxPrice]
                    });
                    // for value print

                    var skipValues = [
                        document.getElementById('skip-value-lower'),
                        document.getElementById('skip-value-upper')
                    ];


                    skipSlider.noUiSlider.on('update', function(values, handle) {
                        skipValues[handle].innerHTML = values[handle];
                    });
                }
            });


            $(document).ready(function () {
                $(document).on('click', '#filterButton', function(e) {
                    e.preventDefault();
                    var min = parseInt($('#skip-value-lower').html());
                    var max = parseInt($('#skip-value-upper').html());

                   $('#price_range_min').val(min);
                  $('#price_range_max').val(max);
                   
                    // alert(min + ' -- ' + max);
                    this.form.submit();
                });
                
                
            });

            /* ----------------------------------------------------------- */
        });
    </script>
@endpush

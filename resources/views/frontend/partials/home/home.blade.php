@extends('frontend.master.master')
@section('front_main')

    <!-- Start slider -->

    @if (count($sliders) > 0)
        <section id="aa-slider">
            <div class="aa-slider-area">
                <div id="sequence" class="seq">
                    <div class="seq-screen">
                        <ul class="seq-canvas">
                            @foreach ($sliders as $slider)
                                <!-- single slide item -->
                                <li>
                                    <div class="seq-model">
                                        <img data-seq src="{{ asset('admin/images/banner/' . $slider->image) }}"
                                            alt="{{ $slider->title }}" />
                                    </div>
                                    <div class="seq-title">
                                        <span data-seq>Save Up to 75% Off</span>
                                        <h2 data-seq>{{ $slider->title }}</h2>
                                        <p data-seq>{{ $slider->summary }}</p>
                                        <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- slider navigation btn -->
                    <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                        <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                        <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                    </fieldset>
                </div>
            </div>
        </section>
    @else
        <p class="badge badge-danger">No Sliders found..!</p>
    @endif

    <!-- / slider -->
    <!-- Start Promo section -->
    <section id="aa-promo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-promo-area">
                        <div class="row">
                            @foreach ($promos as $promo)
                                <div class="col-md-4">
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('admin/images/promo/' . $promo->image) }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>{{ $promo->summary }}</span>
                                                <h4><a href="#" style="color:#ff6666 !important">For
                                                        {{ $promo->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <!-- promo left -->
                            <div class="col-md-5 no-padding">
                                <div class="aa-promo-left">
                                    <div class="aa-promo-banner">
                                        <img src="{{ asset('frontend/img/promo-banner-1.jpg') }}" alt="img">
                                        <div class="aa-prom-content">
                                            <span>75% Off</span>
                                            <h4><a href="#">For Women</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- promo right -->
                            <div class="col-md-7 no-padding">
                                <div class="aa-promo-right">
                                    @foreach ($promos as $promo)
                                    <div class="aa-single-promo-right">
                                        <div class="aa-promo-banner">
                                            <img src="{{ asset('admin/images/promo/'.$promo->image) }}" alt="img">
                                            <div class="aa-prom-content">
                                                <span>{{ $promo->summary }}</span>
                                                <h4><a href="#" style="color:#ff6666 !important">For {{ $promo->title }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Promo section -->
    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#popular" id="popularTab" data-toggle="tab">Popular</a></li>
                                    <li><a href="#feature" data-toggle="tab">Feature</a></li>
                                    <li><a href="#hot" data-toggle="tab">Hot</a></li>
                                    <li><a href="#sale" data-toggle="tab">Sale</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Start men product category -->
                                    <div class="tab-pane fade in active" id="popular">
                                        <ul class="aa-product-catg">
                                            @foreach ($popular as $item)
                                                <!-- start single product item -->
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img
                                                                src="{{ asset('admin/images/products/' . $item->image) }}"
                                                                alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="#">{{ $item->title }}</a></h4>
                                                            <span
                                                                class="aa-product-price">${{ $item->offer_price }}</span><span
                                                                class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Compare">
                                                            <span class="fa fa-exchange"></span>
                                                        </a>
                                                        <a href="{{ $item->slug }}" class="quickView"
                                                            data-toggle2="tooltip" data-placement="top" title=""
                                                            data-toggle="modal" data-target="#quick-view-modal"
                                                            data-original-title="Quick View">
                                                            <span class="fa fa-search"></span>
                                                        </a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-sale"
                                                        href="#">{{ ucfirst($item->choice) }} !</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="aa-browse-btn" href="{{ $item->choice }}">Browse all Product <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / men product category -->
                                    <!-- start women product category -->
                                    <div class="tab-pane fade" id="feature">
                                        <ul class="aa-product-catg">
                                            @foreach ($feature as $item)
                                                <!-- start single product item -->
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img
                                                                src="{{ asset('admin/images/products/' . $item->image) }}"
                                                                alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="#">{{ $item->title }}</a></h4>
                                                            <span
                                                                class="aa-product-price">${{ $item->offer_price }}</span><span
                                                                class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Compare"><span
                                                                class="fa fa-exchange"></span></a>
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                            title="" data-toggle="modal"
                                                            data-target="#quick-view-modal"
                                                            data-original-title="Quick View"><span
                                                                class="fa fa-search"></span></a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-sale"
                                                        href="#">{{ ucfirst($item->choice) }} !</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="aa-browse-btn" href="{{ $item->choice }}">Browse all Product <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / women product category -->
                                    <!-- start sports product category -->
                                    <div class="tab-pane fade" id="hot">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            @foreach ($hot as $item)
                                                <!-- start single product item -->
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img
                                                                src="{{ asset('admin/images/products/' . $item->image) }}"
                                                                alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span
                                                                class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a
                                                                    href="#">{{ $item->title }}</a></h4>
                                                            <span
                                                                class="aa-product-price">${{ $item->offer_price }}</span><span
                                                                class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="aa-product-hvr-content">
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Add to Wishlist"><span
                                                                class="fa fa-heart-o"></span></a>
                                                        <a href="#" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Compare"><span
                                                                class="fa fa-exchange"></span></a>
                                                        <a href="#" data-toggle2="tooltip" data-placement="top"
                                                            title="" data-toggle="modal"
                                                            data-target="#quick-view-modal"
                                                            data-original-title="Quick View"><span
                                                                class="fa fa-search"></span></a>
                                                    </div>
                                                    <!-- product badge -->
                                                    <span class="aa-badge aa-sale" href="#"
                                                        style="background-color:rgb(44, 157, 244)">{{ ucfirst($item->conditions) }}
                                                        !</span>
                                                </li>
                                            @endforeach
                                            <!-- start single product item -->

                                        </ul>
                                        <a class="aa-browse-btn" href="{{ $item->conditions }}">Browse all Product <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / sports product category -->
                                    <!-- start electronic product category -->
                                    <div class="tab-pane fade" id="sale">
                                        <ul class="aa-product-catg">
                                            <!-- start single product item -->
                                            <ul class="aa-product-catg">
                                                <!-- start single product item -->
                                                @foreach ($sale as $item)
                                                    <!-- start single product item -->
                                                    <li>
                                                        <figure>
                                                            <a class="aa-product-img" href="#"><img
                                                                    src="{{ asset('admin/images/products/' . $item->image) }}"
                                                                    alt="polo shirt img"></a>
                                                            <a class="aa-add-card-btn" href="#"><span
                                                                    class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                            <figcaption>
                                                                <h4 class="aa-product-title"><a
                                                                        href="#">{{ $item->title }}</a></h4>
                                                                <span
                                                                    class="aa-product-price">${{ $item->offer_price }}</span><span
                                                                    class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="aa-product-hvr-content">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="Add to Wishlist"><span
                                                                    class="fa fa-heart-o"></span></a>
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="Compare"><span
                                                                    class="fa fa-exchange"></span></a>
                                                            <a href="#" data-toggle2="tooltip" data-placement="top"
                                                                title="" data-toggle="modal"
                                                                data-target="#quick-view-modal"
                                                                data-original-title="Quick View"><span
                                                                    class="fa fa-search"></span></a>
                                                        </div>
                                                        <!-- product badge -->
                                                        <span class="aa-badge aa-sold-out"
                                                            href="#">{{ ucfirst($item->conditions) }} !</span>
                                                    </li>
                                                @endforeach
                                                <!-- start single product item -->

                                            </ul>
                                            <a class="aa-browse-btn" href="{{ $item->conditions }}">Browse all Product
                                                <span class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / electronic product category -->
                                </div>
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
                                                            <p id="summary">Lorem ipsum dolor sit amet, consectetur
                                                                adipisicing elit.
                                                                Officiis animi, veritatis quae repudiandae quod nulla
                                                                porro quidem, itaque quis quaerat!</p>
                                                            <h4>Size</h4>
                                                            <div class="aa-prod-view-size" id="size">

                                                            </div>
                                                            <div class="aa-prod-quantity">
                                                                <form action="">
                                                                    <select name="" id="">
                                                                        <option value="0" selected="1">1
                                                                        </option>
                                                                        <option value="1">2</option>
                                                                        <option value="2">3</option>
                                                                        <option value="3">4</option>
                                                                        <option value="4">5</option>
                                                                        <option value="5">6</option>
                                                                    </select>
                                                                </form>
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
                                </div><!-- / quick view modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area">
                            <a href="#"><img src="frontend/img/fashion-banner.jpg" alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular section -->
    <section id="aa-popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-popular-category-area">
                            <!-- start prduct navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#popularSlider" data-toggle="tab">Popular</a></li>
                                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                                <li><a href="#latest" data-toggle="tab">Latest</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men popular category -->
                                <div class="tab-pane fade in active" id="popularSlider">
                                    <ul class="aa-product-catg aa-popular-slider">
                                        @foreach ($Slider_popular as $item)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="#"><img
                                                            src="{{ asset('admin/images/products/' . $item->image) }}"
                                                            alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="#"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="#">{{ $item->title }}</a></h4>
                                                        <span
                                                            class="aa-product-price">${{ $item->offer_price }}</span><span
                                                            class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                    </figcaption>
                                                </figure>
                                                <div class="aa-product-hvr-content">
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Add to Wishlist"><span
                                                            class="fa fa-heart-o"></span></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Compare"><span
                                                            class="fa fa-exchange"></span></a>
                                                    <a href="#" data-toggle2="tooltip" data-placement="top"
                                                        title="" data-toggle="modal"
                                                        data-target="#quick-view-modal"
                                                        data-original-title="Quick View"><span
                                                            class="fa fa-search"></span></a>
                                                </div>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale"
                                                    href="#">{{ ucfirst($item->choice) }} !</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <a class="aa-browse-btn" href="{{ $item->choice }}">Browse all Product <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <!-- / popular product category -->

                                <!-- start featured product category -->
                                <div class="tab-pane fade" id="featured">
                                    <ul class="aa-product-catg aa-featured-slider">
                                        <!-- start single product item -->
                                        @foreach ($Slider_feature as $item)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="#"><img
                                                            src="{{ asset('admin/images/products/' . $item->image) }}"
                                                            alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="#"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="#">{{ $item->title }}</a></h4>
                                                        <span
                                                            class="aa-product-price">${{ $item->offer_price }}</span><span
                                                            class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                    </figcaption>
                                                </figure>
                                                <div class="aa-product-hvr-content">
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Add to Wishlist"><span
                                                            class="fa fa-heart-o"></span></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Compare"><span
                                                            class="fa fa-exchange"></span></a>
                                                    <a href="#" data-toggle2="tooltip" data-placement="top"
                                                        title="" data-toggle="modal"
                                                        data-target="#quick-view-modal"
                                                        data-original-title="Quick View"><span
                                                            class="fa fa-search"></span></a>
                                                </div>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-hot" href="#">{{ ucfirst($item->choice) }}
                                                    !</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <a class="aa-browse-btn" href="{{ $item->choice }}">Browse all Product <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <!-- / featured product category -->

                                <!-- start latest product category -->
                                <div class="tab-pane fade" id="latest">
                                    <ul class="aa-product-catg aa-latest-slider">
                                        <!-- start single product item -->
                                        @foreach ($latest as $item)
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="#"><img
                                                            src="{{ asset('admin/images/products/' . $item->image) }}"
                                                            alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="#"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="#">{{ $item->title }}</a></h4>
                                                        <span
                                                            class="aa-product-price">${{ $item->offer_price }}</span><span
                                                            class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                    </figcaption>
                                                </figure>
                                                <div class="aa-product-hvr-content">
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Add to Wishlist"><span
                                                            class="fa fa-heart-o"></span></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Compare"><span
                                                            class="fa fa-exchange"></span></a>
                                                    <a href="#" data-toggle2="tooltip" data-placement="top"
                                                        title="" data-toggle="modal"
                                                        data-target="#quick-view-modal"
                                                        data-original-title="Quick View"><span
                                                            class="fa fa-search"></span></a>
                                                </div>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-hot" href="#">{{ ucfirst($item->choice) }}
                                                    !</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <a class="aa-browse-btn" href="#">Browse all Product <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <!-- / latest product category -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / popular section -->
    <!-- Support Shipping section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->
    <!-- Testimonial -->
    <section id="aa-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-testimonial-area">
                        <ul class="aa-testimonial-slider">
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="img/testimonial-img-2.jpg"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Allison</p>
                                        <span>Designer</span>
                                        <a href="#">Dribble.com</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="img/testimonial-img-1.jpg"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>KEVIN MEYER</p>
                                        <span>CEO</span>
                                        <a href="#">Alphabet</a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg"
                                        alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                        possimus, facere, quidem qui.</p>
                                    <div class="aa-testimonial-info">
                                        <p>Luner</p>
                                        <span>COO</span>
                                        <a href="#">Kinatic Solution</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Testimonial -->

    <!-- Latest Blog -->
    <section id="aa-latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-latest-blog-area">
                        <h2>LATEST BLOG</h2>
                        <div class="row">
                            <!-- single latest blog -->
                            <div class="col-md-4 col-sm-4">
                                <div class="aa-latest-blog-single">
                                    <figure class="aa-blog-img">
                                        <a href="#"><img src="img/promo-banner-1.jpg" alt="img"></a>
                                        <figcaption class="aa-blog-img-caption">
                                            <span href="#"><i class="fa fa-eye"></i>5K</span>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                            <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                            <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                        </figcaption>
                                    </figure>
                                    <div class="aa-blog-info">
                                        <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                            Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                            repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                            corporis.</p>
                                        <a href="#" class="aa-read-mor-btn">Read more <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single latest blog -->
                            <div class="col-md-4 col-sm-4">
                                <div class="aa-latest-blog-single">
                                    <figure class="aa-blog-img">
                                        <a href="#"><img src="img/promo-banner-3.jpg" alt="img"></a>
                                        <figcaption class="aa-blog-img-caption">
                                            <span href="#"><i class="fa fa-eye"></i>5K</span>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                            <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                            <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                        </figcaption>
                                    </figure>
                                    <div class="aa-blog-info">
                                        <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                            Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                            repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                            corporis.</p>
                                        <a href="#" class="aa-read-mor-btn">Read more <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- single latest blog -->
                            <div class="col-md-4 col-sm-4">
                                <div class="aa-latest-blog-single">
                                    <figure class="aa-blog-img">
                                        <a href="#"><img src="img/promo-banner-1.jpg" alt="img"></a>
                                        <figcaption class="aa-blog-img-caption">
                                            <span href="#"><i class="fa fa-eye"></i>5K</span>
                                            <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                            <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                            <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                        </figcaption>
                                    </figure>
                                    <div class="aa-blog-info">
                                        <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                            Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                            repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                            corporis.</p>
                                        <a href="#" class="aa-read-mor-btn">Read more <span
                                                class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Latest Blog -->

    <!-- Client Brand -->
    <section id="aa-client-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-client-brand-area">
                        <ul class="aa-client-brand-slider">
                            <li><a href="#"><img src="img/client-brand-java.png" alt="java img"></a></li>
                            <li><a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a>
                            </li>
                            <li><a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a></li>
                            <li><a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a></li>
                            <li><a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a>
                            </li>
                            <li><a href="#"><img src="img/client-brand-joomla.png" alt="joomla img"></a>
                            </li>
                            <li><a href="#"><img src="img/client-brand-java.png" alt="java img"></a></li>
                            <li><a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a>
                            </li>
                            <li><a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a></li>
                            <li><a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a></li>
                            <li><a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Client Brand -->

@endsection


@push('front_script')
    <script>
        $(document).ready(function() {
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
        });
    </script>
@endpush

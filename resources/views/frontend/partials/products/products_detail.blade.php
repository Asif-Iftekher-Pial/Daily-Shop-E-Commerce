@extends('frontend.master.master')
@section('front_main')
    {{-- <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
      <div class="container">
       <div class="aa-catg-head-banner-content">
         <h2>T-Shirt</h2>
         <ol class="breadcrumb">
           <li><a href="index.html">Home</a></li>         
           <li><a href="#">Product</a></li>
           <li class="active">T-shirt</li>
         </ol>
       </div>
      </div>
    </div>
</section> --}}
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container"><a
                                                        data-lens-image="{{ asset('admin/images/products/' . $product->image) }}"
                                                        class="simpleLens-lens-image"><img
                                                            src="{{ asset('admin/images/products/' . $product->image) }}"
                                                            class="simpleLens-big-image">
                                                        <div class="simpleLens-mouse-cursor"></div>
                                                    </a></div>
                                            </div>
                                            <div class="simpleLens-thumbnails-container">
                                                @foreach ($product->imageAttribute as $img)
                                                    <a data-big-image="{{ asset('admin/images/products/attributes/' . $img->attribute_image) }}"
                                                        data-lens-image="{{ asset('admin/images/products/attributes/' . $img->attribute_image) }}"
                                                        class="simpleLens-thumbnail-wrapper" href="#"
                                                        style="width:50px">
                                                        <img src="{{ asset('admin/images/products/attributes/' . $img->attribute_image) }}"
                                                            style="width:50px">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $product->title }}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price">${{ $product->offer_price }}</span>
                                            <p class="aa-product-avilability">Avilability: <span>{{ $product->total_stock }}
                                                    - items In stock</span></p>
                                        </div>
                                        <p>{!! $product->summary !!}</p>
                                        <h4>Size</h4>
                                        <div class="aa-prod-view-size">
                                            @if (count($product->productAttribute) > 0)
                                                @foreach ($product->productAttribute as $sizes)
                                                    <a href="">{{ $sizes->attribute_size }}</a>
                                                @endforeach
                                            @else
                                                <p style="color: #ff6666">No sizes found for this product</p>
                                            @endif


                                        </div>
                                        <h4>Color</h4>
                                        <div class="aa-color-tag">
                                            @if (count($product->productAttribute) > 0)
                                                @foreach ($product->productAttribute as $sizes)
                                                    <a href="#" class="aa-color-green"
                                                        style="background-color:{{ $sizes->attribute_color }} "></a>
                                                @endforeach
                                            @else
                                                <p style="color: #ff6666">No color found for this product</p>
                                            @endif
                                        </div>
                                        <div class="aa-prod-quantity">
                                            Qty: <input type="number" name="qty" value="1" min="1"
                                                max="5" id="" style="width:45px">
                                            <p class="aa-prod-category">
                                                @php
                                                    $subCat_name = App\Models\SubCategory::where('id', $product->sub_category_id)
                                                        ->pluck('sub_cat_name')
                                                        ->first();
                                                @endphp
                                                Category: <a href="#">{{ $subCat_name }}</a>
                                            </p>
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                                            <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                                            <a class="aa-add-to-cart-btn" href="#">Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs" id="myTab2">
                                <li class="active"><a href="#description" data-toggle="tab"
                                        aria-expanded="true">Description</a></li>
                                <li class=""><a href="#review" data-toggle="tab" aria-expanded="false">Reviews</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="description">
                                    {!! $product->description !!}
                                </div>

                                {{-- Review --}}


                                <div class="tab-pane fade" id="review">
                                    <div class="aa-product-review-area">
                                        <h4>2 Reviews for T-Shirt</h4>
                                        <ul class="aa-review-nav">
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/testimonial-img-3.jpg"
                                                                alt="girl image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                                26, 2016</span></h4>
                                                        <div class="aa-product-rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="img/testimonial-img-3.jpg"
                                                                alt="girl image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March
                                                                26, 2016</span></h4>
                                                        <div class="aa-product-rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-o"></span>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h4>Add a review</h4>
                                        <div class="aa-your-rating">
                                            <p>Your Rating</p>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                        </div>
                                        <!-- review form -->
                                        <form action="" class="aa-review-form">
                                            <div class="form-group">
                                                <label for="message">Your Review</label>
                                                <textarea class="form-control" rows="3" id="message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@gmail.com">
                                            </div>

                                            <button type="submit"
                                                class="btn btn-default aa-review-submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Related product -->
                        <div class="aa-product-related-item">
                            <h3>Related Products</h3>
                            <ul class="aa-product-catg aa-related-item-slider slick-initialized slick-slider">
                                <button type="button" data-role="none" class="slick-prev slick-arrow"
                                    aria-label="Previous" role="button" aria-disabled="true"
                                    style="display: block;" id="leftArrow" >Previous</button>
                                <!-- start single product item -->
                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track slider" role="listbox"
                                        style="opacity: 1; width: 2392px; left: 0px;">
                                        @foreach ($randProd as $item)
                                            <li class="slick-slide slick-current" data-slick-index="0"
                                                aria-hidden="false" tabindex="-1" role="option"
                                                aria-describedby="slick-slide00" style="width: 244px;">
                                                <figure>
                                                    <a class="aa-product-img" href="{{ route('viewProductDetail', $item->slug) }}" tabindex="0"><img
                                                            src="{{ asset('admin/images/products/' . $item->image) }}"
                                                            alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="#" tabindex="0"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a
                                                                href="{{ route('viewProductDetail', $item->slug) }}"
                                                                tabindex="0">{{ ucfirst($item->title) }}</a></h4>
                                                        <span class="aa-product-price">${{ $item->offer_price }}</span>
                                                        <span
                                                            class="aa-product-price"><del>${{ $item->price }}</del></span>
                                                    </figcaption>
                                                </figure>
                                                <div class="aa-product-hvr-content">
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Add to Wishlist"
                                                        tabindex="0"><span class="fa fa-heart-o"></span></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="" data-original-title="Compare" tabindex="0"><span
                                                            class="fa fa-exchange"></span></a>

                                                </div>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale"
                                                    href="#">{{ $product->conditions }}!</span>
                                            </li>
                                        @endforeach

                                    </div>
                                </div>


                                <button type="button" id="rightArrow" data-role="none" class="slick-next slick-arrow" aria-label="Next"
                                    role="button" style="display: block;" aria-disabled="false">Next</button>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('front_main')
    <script>
        $(document).ready(function(){
            
    });
    </script>
@endsection

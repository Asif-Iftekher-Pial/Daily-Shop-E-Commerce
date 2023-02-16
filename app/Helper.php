<?php

use App\Models\Product;

function minimize_title($string){
    $max_length = 8;
    $title = $string;
    if (strlen($string) > $max_length) {
        $title = substr($string, 0, $max_length) . "...";
    }
    return $title;
}

function minPrice(){
    
    return floor(Product::min('offer_price'));
}

function maxPrice(){
    return floor(Product::max('offer_price'));
}
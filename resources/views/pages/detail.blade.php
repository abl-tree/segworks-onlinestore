@extends('layouts.app')

@section('content')
<div id="content">
    <div class="container">
    <div class="row bar">
        <!-- LEFT COLUMN _________________________________________________________-->
        <div class="col-lg-12">
        <!-- <p class="lead">Built purse maids cease her ham new seven among and. Pulled coming wooded tended it answer remain me be. So landlord by we unlocked sensible it. Fat cannot use denied excuse son law. Wisdom happen suffer common the appear ham beauty her had. Or belonging zealously existence as by resources.</p> -->
        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>
        <div id="productMain" class="row">
            <div class="col-sm-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                @foreach($item[0]->images as $image)
                    <button class="owl-thumb-item"><img src="{{$image->image}}" alt="" class="img-fluid"></button>
                @endforeach
            </div>
            </div>
            <div class="col-sm-6">
            <div class="box" id="addtocart">
                <form class="addtocart" v-on:submit.prevent="onSubmit">
                <input type="hidden" v-model="store.item_id = {{$item[0]->id}}">
                <div class="sizes">
                    <h3>Available sizes</h3>
                    <select class="bs-select" v-model="store.size">
                        <option value="small" selected>Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="x-large">X Large</option>
                    </select>
                </div>
                <div class="sizes">
                    <h3>Quantity</h3>
                    <input type="number" class="bs-select" style="display: inline;" v-model="store.quantity" required>
                    
                </div>
                <p class="price">Php {{$item[0]->price}}</p>
                <p class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                    <!-- <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-default"><i class="fa fa-heart-o"></i></button> -->
                </p>
                </form>
            </div>
            <div data-slider-id="1" class="owl-thumbs">
                @foreach($item[0]->images as $image)
                    <button class="owl-thumb-item"><img src="{{$image->image}}" alt="" class="img-fluid"></button>
                @endforeach
            </div>
            </div>
        </div>
        <div id="details" class="box mb-4 mt-4">
            <p></p>
            <h4>Product Name</h4>
            <p>{{$item[0]->name}}</p>
            <h4>Product details</h4>
            <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
            <h4>Material & care</h4>
            <ul>
            <li>Polyester</li>
            <li>Machine wash</li>
            </ul>
            <h4>Size & Fit</h4>
            <ul>
            <li>Regular fit</li>
            <li>The model (height 5'8 "and chest 33") is wearing a size S</li>
            </ul>
            <blockquote class="blockquote">
            <p class="mb-0"><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
            </blockquote>
        </div>
        </div>
        
    </div>
    </div>
</div>
@endsection

@section('pagejs')
<!-- <script>
    window.onload = function() {
        $('.addtocart').submit(function(e) {
            e.preventDefault();
            
            console.log($(this).serializeArray());
        });

    };
</script> -->
@endsection

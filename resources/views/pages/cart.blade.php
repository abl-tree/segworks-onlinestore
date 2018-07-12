@extends('layouts.app')

@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
        <div class="col-md-7">
        <h1 class="h2">Shopping Cart</h1>
        </div>
        <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Shopping Cart</li>
        </ul>
        </div>
    </div>
    </div>
</div>
<div id="content">
    <div class="container" id="cartdetails">
    <div class="row bar">
        <div class="col-lg-12">
        <p class="text-muted lead">You currently have {{count($cart)}} item(s) in your cart.</p>
        </div>
        <div id="basket" class="col-lg-9">
        <div class="box mt-0 pb-0 no-horizontal-padding">
            <form v-on:submit.prevent="checkout">
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Unit price</th>
                    <th colspan="2">Total</th>
                    </tr>
                </thead>
                <tbody>
                @if($cart)
                    @foreach($cart as $item)
                        <tr>
                            <td><a href="#"><img src="img/detailsquare.jpg" alt="White Blouse Armani" class="img-fluid"></a></td>
                            <td><a href="#">{{ $item['item']->name }}</a></td>
                            <td>
                                <input type="number" value="{{ $item['quantity'] }}" class="form-control">
                            </td>
                            <td>{{ $item['size'] }}</td>
                            <td>P{{ $item['item']->price }}</td>
                            <td>P{{ $item['total'] }}</td>
                            <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No item</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                    <tr>
                    <th colspan="5">Total</th>
                    <th colspan="2">P{{$overall}}</th>
                    </tr>
                </tfoot>
                </table>
                
                @if($cart && $couriers)
                <div class="sizes">
                    <h5>Shipping Fee</h5>
                    <select class="bs-select" v-model="selected" v-on:change="getCourier" :required="selected">
                        <option disabled value="">Please select shipping fee</option>
                        @foreach($couriers as $courier)
                            <option v-bind:value="{{$courier->id}}">{{$courier->name.'-'.$courier->fee}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
            
            <div class="box-footer d-flex justify-content-between align-items-center">
                <div class="left-col"><a href="{{route('home')}}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                <div class="right-col">
                <button type="submit" class="btn btn-template-outlined">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
            </form>
        </div>
        </div>
        <div class="col-lg-3">
        <div id="order-summary" class="box mt-0 mb-4 p-0">
            <div class="box-header mt-0">
            <h3>Order summary</h3>
            </div>
            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
            <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Order subtotal</td>
                    <th>P{{$overall}}</th>
                </tr>
                <tr>
                    <td>Shipping and handling</td>
                    <th>P@{{fee}}</th>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <th>P@{{total}}</th>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

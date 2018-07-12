@extends('layouts.app')

@section('content')
<div id="content">
    <div class="container" id="products">
    <div class="row bar">
        <div class="col-md-3">
        <!-- MENUS AND FILTERS-->
        <div class="panel panel-default sidebar-menu">
            <div class="panel-heading">
            <h3 class="h4 panel-title">Categories</h3>
            </div>
            <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm category-menu">
                @foreach($categories as $category)
                <li class="nav-item"><a href="javascript:void(0);" v-on:click="category({{$category->id}})" data-category-id="{{$category->id}}" class="nav-link d-flex align-items-center justify-content-between"><span>{{$category->description}} </span><span class="badge badge-secondary">{{$category->item_categories->count()}}</span></a>
                <ul class="nav nav-pills flex-column">
                    @foreach($category->subcategory as $subcategory)
                    <li class="nav-item"><a href="javascript:void(0);" v-on:click="subcategory({{$subcategory->id}})" data-subcategory-id="{{$subcategory->id}}" class="nav-link">{{$subcategory->description}} ({{$subcategory->item_categories->count()}})</a></li>
                    @endforeach
                </ul>
                </li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="panel panel-default sidebar-menu">
            <div class="panel-heading d-flex align-items-center justify-content-between">
            <h3 class="h4 panel-title">Brands</h3><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i><span class="d-none d-md-inline-block">Clear</span></a>
            </div>
            <div class="panel-body">
            <form>
                <div class="form-group">
                @foreach($brands as $brand)
                <div class="checkbox">
                    <label>
                    <input type="checkbox"> {{$brand->name}}  ({{ count($brand->products) }})
                    </label>
                </div>
                @endforeach
                </div>
                <button class="btn btn-sm btn-template-outlined"><i class="fa fa-pencil"></i> Apply</button>
            </form>
            </div>
        </div>
        </div>
        <div class="col-md-9">
        <div class="row products products-big">
            <products-component v-for="product in products" route="{{route('detail', 'id=')}}" v-bind:product="product" v-bind:key="product.id"></products-component>            
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

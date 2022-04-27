@extends('layouts.app')

@section('content')


<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">User Profile</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Profile</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- User profile section -->
<section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            @include('partial.sidebar')

            <div class="ec-shop-rightside col-lg-9 col-md-12">
                <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                    <div class="ec-vendor-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ec-vendor-block-profile">
                                    <img class="prod-img" src="/productcreate/{{ $product->image }}" alt="product image" height="200px">
                                        <form action="{{ route('product.update',$product) }}" method="POST" enctype="multipart/form-data">@csrf

                                            <div class="form-group">
                                                <label for="">Title of Product</label>
                                                <input type="text" name="title" class="form-control" value="{{$product->title}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select  name="category_id"  class="form-control">
                                                    <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" rows="10" >{{$product->description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input name="price" type="number" class="form-control" value="{{$product->price}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Image</label>

                                                <input name="image"  type="file" accept="image/*" class="form-control" value="{{ $product->image }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Quantity of Product</label>
                                                <input name="quantity"  type="number" class="form-control" value="{{$product->quantity}}">
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-info">UPLOAD</button>
                                            </div>


                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End User profile section -->
@endsection

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
                                    <div class="ec-vendor-dashboard-card space-bottom-30">
                                        <div class="ec-vendor-card-header">
                                            <h5>Product List</h5>
                                            <div class="ec-header-btn">
                                                <a class="btn btn-lg btn-primary" href="#">View All</a>
                                                <a class="btn btn-lg btn-primary" href="#">Add</a>
                                            </div>
                                        </div>
                                        <div class="ec-vendor-card-body">
                                            <div class="ec-vendor-card-table">
                                                <table class="table ec-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">category</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($products as $product)
                                                        <tr>
                                                            <th scope="row"><span>{{ $product->id }}</span></th>
                                                            <td><img class="prod-img" src="/productcreate/{{ $product->image }}" alt="product image"></td>
                                                            <td><span>{{ $product->title }}</span></td>
                                                            <td><span>${{ number_format($product->price) }}</span></td>
                                                            <td><span>{{$product->category->name}}</span></td>
                                                            <td><span>{{ $product->quantity }}</span></td>
                                                            <td>
                                                                <a href="{{route('product.edit', $product->id)}}">
                                                                    <button class="btn btn-primary">Edit</button>
                                                                </a>
                                                                <a href="{{route('product.delete', $product)}}">
                                                                    <button class="btn btn-danger">Delete</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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

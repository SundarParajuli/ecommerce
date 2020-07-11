@extends('admin::layout')
@section('title') Dashboard @endsection
@section('content')
    <!-- Main charts -->
    <div class="row panel panel-body border-top-danger">
        <div class="panel-heading">
            <i class="icon-home2"> {{ strtoupper(auth()->guard('admins')->user()->company->company_name) }}</i>
            <div class="heading-elements">
                <span style="size: 21px; color:darkgreen;"> Welcome {{ auth()->guard('admins')->user()->userProfile->full_name }} </span>
            </div>
        </div>
        <div class="col-sm-4 col-lg-4 hvr-grow ">
            <div class="panel">
                <a href="{{route('vendor.order.index')}}">
                    <div class="" style="padding:8px;color: #d97085;color: #d97085;">
                        <i class="fa fa-cart-plus fa-5x"></i>
                        <h2>ORDER</h2>
                    </div>
                </a>
                <div class="p-5">
                    <div class="media-body">
                        <strong>Order</strong>
                        <div class="text-muted mt-5"><i class="icon-cart text-size-base"></i> &nbsp; Total Order
                            &nbsp;{{ $order->total() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-lg-4 hvr-grow ">
            <div class="panel">
                <a href="{{route('vendor.product.index')}}">
                    <div class="" style="padding:8px;color: #d97085;color: #d97085;">
                        <i class="fa fa-shopping-basket fa-5x"></i>
                        <h2>PRODUCT</h2>
                    </div>
                </a>
                <div class="p-5">
                    <div class="media-body">
                        <strong>Product</strong>
                        <div class="text-muted mt-5"><i class="icon-basket text-size-base"></i> &nbsp; Total Product
                            &nbsp;{{ $product->total() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /main charts -->
@stop

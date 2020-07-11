@extends('admin::layout')
@section('title')  Customer  Detail @endsection
@section('breadcrumb')  <li class="active"> Customer </li>  @endsection



@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                        class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ route('customer.index') }}"><i class="icon-user position-left"></i> Customer  List</a></li>
                <li class="active">Customer  Detail</li>
            </ul>
        </div>

        <div class="panel panel-body">
            <div class="panel-body">
                <div class="text-right">
                    <ul class="icons-list">
                        <li>
                            <a href="{{route('customer.index')}}">
                                <p type="button" class="btn btn-success btn-icon btn-rounded legitRipple">
                                    <i class="icon-arrow-left52"></i>
                                    <span class="legitRipple-ripple"></span>
                                </p>
                            </a>
                        </li>
                    </ul>

        </div>

                <div class="row">
                    <div class="col-md-6">

                        <!-- List with text -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Basic Information</h5>
                            </div>

                            <ul class="media-list media-list-linked">

                                <li class="media">
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-user text-size-base">&nbsp; </i>Name</div>
                                        </div>
                                        <div class="media-right media-middle text-nowrap">
											<span class="text-muted">
                                                {{$customer->customerProfile->first_name . ' ' . $customer->customerProfile->last_name }}
											</span>
                                        </div>
                                    </a>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-mail5 text-size-base">&nbsp;</i>Email   @if($customer->is_email_verified == 1)
                                                    <span class="badge badge-success">Verified</span>
                                                @else
                                                    <span class="badge badge-warning">Unverified</span>
                                                @endif</div>
                                        </div>
                                        <div class="media-right media-middle text-nowrap">
											<span class="text-muted">
                                                    {{$customer->email}}
											</span>
                                        </div>
                                    </a>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-phone2 text-size-base">&nbsp;</i>Mobile</div>
                                        </div>
                                        <div class="media-right media-middle text-nowrap">
											<span class="text-muted">
                                                {{$customer->customerProfile->mobile}}
											</span>
                                        </div>
                                    </a>
                               {{--     <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-phone text-size-base"></i>&nbsp; Phone</div>
                                        </div>
                                        <div class="media-right media-middle text-nowrap">
											<span class="text-muted">
                                                {{$customer->customerProfile->phone}}
											</span>
                                        </div>
                                    </a>--}}
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold">	<i class="icon-calendar2 text-size-base"></i>&nbsp; Date Of Birth</div>
                                        </div>
                                        <div class="media-right media-middle text-nowrap">
											<span class="text-muted">
                                                {{$customer->customerProfile->dob}}
											</span>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- /list with text -->

                    </div>

                    <div class="col-md-6">

                        <!-- List with labels -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Other Information</h5>

                            </div>

                            <ul class="media-list media-list-linked">
                             {{--   <li>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-mail5 text-size-base"></i>&nbsp; Email Status</div>
                                        </div>
                                        <div class="media-right media-middle">
                                            @if($customer->is_email_verified == 1)
                                                <span class="badge badge-info">Verified</span>
                                            @else
                                                <span class="badge badge-warning">Unverified</span>
                                            @endif
                                        </div>
                                    </a>
                                </li>--}}
                                <li>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-satellite-dish2 text-size-base"></i>&nbsp; Registered IP</div>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span >{{$customer->registered_ip}}</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-users4 text-size-base"></i>&nbsp; Gender</div>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span >{{$customer->customerProfile->gender}}</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-users text-size-base"></i>&nbsp;Marital Status</div>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span >{{$customer->customerProfile->marital_status}}</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="media-link">
                                        <div class="media-body">
                                            <div class="media-heading text-semibold"><i class="icon-location4 text-size-base"></i>&nbsp; Address</div>
                                        </div>
                                        <div class="media-right media-middle">
                                            <span >{{$customer->customerProfile->address_line1}}</span>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- /list with labels -->

                    </div>
                </div>

    </div>
        </div>
@stop


@extends('admin::layout')
@section('title') List of Customer @endsection
@section('breadcrumb')
    <li class="active"> Customer</li>  @endsection
@section('content')
    <!-- HTML sourced data -->
    <div class="panel panel-flat">
        <div class="row">
            <div class="panel-heading">
                <h5 class="panel-title"> Customer List <span class="badge badge-info">{{ $customers->total() }}</span>
                </h5>
                <div class="col-xs-9">
                    <form action="{{ route('customer.index') }}" method="GET">
                        <div class="form-group input-group">
                            <div class="col-lg-3">{!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'First Name','class'=>'form-control']) !!}</div>

                            <div class="col-lg-3">{!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Last Name','class'=>'form-control']) !!}</div>
                            <div class="col-lg-3">{!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control']) !!}</div>
                            <div class="col-lg-3">
                                {!! Form::text('mobile', $value = null, ['id'=>'mobile','placeholder'=>'Mobile','class'=>'form-control']) !!}
                            </div>

                            <div class="col-lg-4">{!! Form::text('start_date', $value = null, ['id'=>'start_date','placeholder'=>'Start Date','class'=>'form-control datepicker','autocomplete'=>'off']) !!}</div>
                            <div class="col-lg-4"> {!! Form::text('end_date', $value = null, ['id'=>'end_date','placeholder'=>'End Date','class'=>'form-control datepicker']) !!}</div>
                            <div class="col-lg-4">{!! Form::select('is_email_verified',['1'=>'Verified','0'=>'Unverified'], null, ['id'=>'is_email_verified','placeholder' => 'Email Status','class'=>'form-control select2']) !!}</div>
                            <label class="input-group-btn">
                                <button type="submit" class="btn bg-success-400" type="button">
                                    <i class="fa fa-search"></i>Find
                                </button>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="heading-elements">
                    <ul class="icons-list">
                        {{--<li>--}}
                        {{--<a href="{{route('customer.create')}}">--}}
                        {{--<button type="button" class="btn btn-xs btn-primary" id="add-step"><i--}}
                        {{--class="icon-plus22"></i></button>--}}
                        {{--<button type="button"--}}
                        {{--class="btn btn-success btn-icon btn-rounded legitRipple btn-float">--}}
                        {{--<i class="icon-googleplus5"></i><span class="legitRipple-ripple">--}}
                        {{--</span>--}}
                        {{--</button>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{route('customer.index')}}">
                                <button type="button"
                                        class="btn btn-danger btn-icon btn-rounded legitRipple btn-float">
                                    <i class="icon-reload-alt"></i>
                                    <span class="legitRipple-ripple"></span>
                                </button>
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<button type="button"--}}
                        {{--class="btn btn-danger btn-icon btn-rounded legitRipple btn-float"--}}
                        {{--onclick="confirmAndSubmitForm()">--}}
                        {{--<i class="icon-trash"></i>--}}
                        {{--<span class="legitRipple-ripple"></span>--}}
                        {{--</button>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            {!! Form::open(['route' => 'customer.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr class="label-size-white-200 text-black">
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>Verified</th>
                    <th>
                        Mobile
                    </th>
                    <th>
                        Registered IP
                    </th>
                    <th>
                        Status
                    </th>
                    <th> Registered Date</th>
                    <th>
                        View
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($customers as $key=>$customer)
                    <tr>
                        <td>{{$customer->customerProfile->first_name}} {{$customer->customerProfile->last_name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>
                            @if ($customer->is_email_verified == 1)
                                <a href="#" class="btnStatus" data-status="{{ $customer->is_email_verified }}"
                                   data-id="{{ $customer->id}}" data-url="{!! route('customer.verify.status') !!}">
                                    <i class="fa fa-toggle-on fa-2x text-success-800">
                                    </i>
                                </a>
                            @else
                                <a href="#" class="btnStatus" data-status="{{$customer->is_email_verified }}"
                                   data-id="{{ $customer->id }}" data-url="{!! route('customer.verify.status') !!}">
                                    <i class="fa fa-toggle-off fa-2x text-danger-800">
                                    </i>
                                </a>
                            @endif
                        </td>
                        <td>{{$customer->customerProfile->mobile}}</td>
                        <td>{{$customer->registered_ip}}</td>
                        <td>
                            @if ($customer->status == 1)
                                <a href="#" class="btnStatus" data-status="{{ $customer->status }}"
                                   data-id="{{ $customer->id}}" data-url="{!! route('customer.status') !!}">
                                    <i class="fa fa-toggle-on fa-2x text-success-800">
                                    </i>
                                </a>
                            @else
                                <a href="#" class="btnStatus" data-status="{{$customer->status }}"
                                   data-id="{{ $customer->id }}" data-url="{!! route('customer.status') !!}">
                                    <i class="fa fa-toggle-off fa-2x text-danger-800">
                                    </i>
                                </a>
                            @endif
                        </td>
                        <td>{{\Carbon\Carbon::parse($customer->created_at)->diffForHumans()}}</td>
                        <td>
                            <a href="{{ route('customer.view',['id'=>$customer->id]) }}">
                                <img src="{{asset('admin/images/view.png')}}" style="height:25px;width:25px;">
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15">
                            <p class="text-danger text-center">No data found !</p>
                        </td>

                    </tr>
                @endforelse

                <tr>
                    <td colspan="12">
                        {{ $customers->links() }}
                        <span class="pull-right">
                            Records {{ $customers->firstItem() }} - {{ $customers->lastItem() }}
                            of {{ $customers->total() }}
                            (for page {{ $customers->currentPage() }} )
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /HTML sourced data -->
@stop

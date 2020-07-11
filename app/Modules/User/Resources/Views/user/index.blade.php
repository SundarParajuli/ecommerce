@extends('admin::layout')
@section('title') List of User @endsection
@section('breadcrumb')
    <li class="active"> User</li>  @endsection


@section('content')
    <!-- HTML sourced data -->
    <div class="panel panel-flat">
        <div class="row">
            <div class="panel-heading">
                <h5 class="panel-title">User List</h5>
                <div class="col-xs-8">
                    <form action="{{ route('user.index') }}" method="GET">
                        <div class="form-group input-group">
                            <div class="col-lg-3">{!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'First Name','class'=>'form-control']) !!}</div>

                            <div class="col-lg-3">{!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Last Name','class'=>'form-control']) !!}</div>
                            <div class="col-lg-3">{!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control']) !!}</div>
                            <div class="col-lg-3">
                                {!! Form::text('mobile', $value = null, ['id'=>'mobile','placeholder'=>'Mobile','class'=>'form-control']) !!}
                            </div>

                            <div class="col-lg-4">{!! Form::text('start_date', $value = null, ['id'=>'start_date','placeholder'=>'Start Date','class'=>'form-control datepicker']) !!}</div>
                            <div class="col-lg-4"> {!! Form::text('end_date', $value = null, ['id'=>'end_date','placeholder'=>'End Date','class'=>'form-control datepicker']) !!}</div>

                            <label class="input-group-btn">
                                <button type="submit" class="btn btn-material-orange btn-flat"
                                        type="button">
                                    <i class="fa fa-search">
                                    </i>
                                    Find
                                </button>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li>
                            <a href="{{route('user.create')}}">
                                {{--<button type="button" class="btn btn-xs btn-primary" id="add-step"><i--}}
                                {{--class="icon-plus22"></i></button>--}}
                                <button type="button"
                                        class="btn btn-success btn-icon btn-rounded legitRipple btn-float">
                                    <i class="icon-googleplus5"></i><span class="legitRipple-ripple">
                                </span>
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}">
                                <button type="button"
                                        class="btn btn-warning btn-icon btn-rounded legitRipple btn-float">
                                    <i class="icon-spinner4"></i>
                                    <span class="legitRipple-ripple"></span>
                                </button>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                    class="btn btn-danger btn-icon btn-rounded legitRipple btn-float"
                                    onclick="confirmAndSubmitForm()">
                                <i class="icon-trash"></i>
                                <span class="legitRipple-ripple"></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            {!! Form::open(['route' => 'user.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr class="label-size-white-200 text-black">
                    <th>Image</th>

                    <th>
                        Name
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Mobile
                    </th>

                    <th>
                        Status
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $key=>$user)
                    <tr>
                        <td>

                            @if(!empty($user->userProfile->profile_image) && $user->userProfile->profile_image != null  )
                                <a href="{{ $user->userProfile->profile_image }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{ $user->userProfile->profile_image}}" width="85"
                                         alt="" class="img-thumbnail"/>
                                </a>
                            @else

                                <a href="{{ asset('lib/filemanager/no_img.png') }}" class="highslide shadow-z-4"
                                   onclick="return hs.expand(this)">
                                    <img src="{{ asset('lib/filemanager/no_img.png') }}" width="85"
                                         alt="" class="img-thumbnail"/>
                                </a>
                            @endif
                        </td>

                        <td>{{$user->userProfile->first_name}} {{$user->userProfile->last_name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userProfile->mobile}}</td>
                        <td>
                            @if ($user->status == 1)
                                <a href="#" class="btnStatus" data-status="{{ $user->status }}"
                                   data-id="{{ $user->id}}" data-url="{!! route('user.status') !!}">
                                    <i class="fa fa-toggle-on fa-2x text-success-800">
                                    </i>
                                </a>
                            @else
                                <a href="#" class="btnStatus" data-status="{{$user->status }}"
                                   data-id="{{ $user->id }}" data-url="{!! route('user.status') !!}">
                                    <i class="fa fa-toggle-off fa-2x text-danger-800">
                                    </i>
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.edit',['id'=>$user->id]) }}">
                                <img src="{{asset('admin/images/edit.png')}}" style="height:25px;width:25px;">
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
                        {{ $users->links() }}
                        <span class="pull-right">
                            Records {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }}
                            (for page {{ $users->currentPage() }} )
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

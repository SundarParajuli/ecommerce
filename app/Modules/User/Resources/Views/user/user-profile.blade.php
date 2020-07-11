@extends('admin::layout')
@section('title') My Profile @endsection
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="active">My Profile</li>
@endsection
@section('content')
    <div class="panel panel-flat border-top-info">
        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">My Profile</li>
            </ul>
        </div>
    </div>
    <div class="row">

        <div class="col-md-9">

            <!-- Basic layout-->
            {!! Form::model($user,['method'=>'PUT','route'=>['user.updateProfile',$user->id],'class'=>'form-horizontal','role'=>'form']) !!}
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('first_name','Name',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-4">
                            {!! Form::text('first_name', $user->userProfile->first_name, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::text('last_name', $user->userProfile->last_name, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name']) !!}

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile:</label>
                        <div class="col-lg-4">
                            {!! Form::text('mobile', $user->userProfile->mobile, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::text('phone', $user->userProfile->phone, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Phone']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-9">
                            {!! Form::text('address_line1', $user->userProfile->address_line1, ['id'=>'address_line1','class'=>'form-control','placeholder'=>'Address 1']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Profile Image:</label>

                        <div class="col-lg-9">
                            {{Form::file('profile_image', ['id'=>'mobile','class'=>'file-styled'])}}
                            <span class="help-block">Accepted formats: png, jpg. Max file size 2Mb</span>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary legitRipple">Submit form <i
                                    class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- /basic layout -->

        </div>
        <div class="col-lg-3">
            <div class="thumbnail">
                <div class="thumb thumb-rounded thumb-slide">

                    @if($user->userProfile->profile_image)
                        <img src="{{ URL::to('uploads/userProfile'.$user->userProfile->profile_image.'.') }}">
                    @else
                        <img src="{{ URL::to('lib/filemanager/no_img.png') }}">
                    @endif
                </div>

                <div class="caption text-center">
                    <h6 class="text-semibold no-margin">{{$user->userProfile->first_name }} {{$user->userProfile->last_name }}
                    </h6>

                    <h6 class="text-semibold no-margin">
                        <small class="display-block">EMAIL: {{$user->email}}</small>
                    </h6>

                </div>

            </div>
        </div>
        <!-- /.col-lg-6 -->

    </div>
    <!-- /.row -->

@stop
@section('scripts')

@endsection


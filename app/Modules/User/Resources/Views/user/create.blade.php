@extends('admin::layout')
@section('title')  User Add @endsection
@section('breadcrumb')
    <li class="active"> User</li>
@endsection
@section('content')
    <div class="col-md-12">

        <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                        class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ route('user.index') }}"><i class="icon-user position-left"></i> User List</a></li>
                <li class="active">User Create</li>
            </ul>
        </div>
        <div class="panel panel-body">
            <div class="panel-body">
                {!! Form::open(['route' => 'user.store','method'=>'POST','class'=>'form-horizontal','user'=>'form','files' => true]) !!}


                <fieldset>
                    <div class="form-group">
                        {!! Form::label('first_name','Name',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-4">
                            {!! Form::text('first_name', $value = null, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                            @if($errors->first('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            {!! Form::text('last_name', $value = null, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name ']) !!}
                            @if($errors->first('first_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','E-mail',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('email', $value = null, ['id'=>'email','class'=>'form-control','placeholder'=>'E-mail']) !!}
                            @if($errors->first('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('mobile','Mobile',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('mobile', $value = null, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile']) !!}
                            @if($errors->first('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone','Phone',['class'=>'col-lg-3 control-label ']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('phone', $value = null, ['id'=>'phone','class'=>'form-control','placeholder'=>'Phone']) !!}
                            @if($errors->first('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address_line1','Address',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('address_line1', $value = null, ['id'=>'address_line1','class'=>'form-control','placeholder'=>'Address']) !!}
                            @if($errors->first('address_line1'))
                                <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('username','Username',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Username']) !!}
                            @if($errors->first('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password','Password',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Password']) !!}
                            @if($errors->first('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation','Confirm Password',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                            @if($errors->first('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        {!! Form::label('role','Select Role',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                {!! Form::select('role[]',$roles,$value = null, ['id'=>'role','class'=>'form-control role','multiple'=>'multiple']) !!}
                                @if($errors->first('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-3 control-label pull-left']) !!}
                        <div class="col-md-9">
                            <div class="thumbnail img-wrap">
                               <span class="close" onclick="confirmFirst('FileVal')">
                                    <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                               </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['field_id'=>'FileVal','type'=>'1','extensions'=>'["jpg","jpeg","png"]','required'=>true]) }}">
                                    <img src="{{ old('profile_image') !=null ? old('profile_image') : URL::to('lib/filemanager/no_img.png') }}"
                                         id="FileVal" style="height:200px;width: 200px;"/>
                                </a>
                            </div>

                            <p class="text-danger ">{{ $errors->first('profile_image') }}</p>
                            {!! Form::hidden('profile_image',null,['id'=>'hFileVal']) !!}
                        </div>
                    </div>
                </fieldset>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        {!! Form::submit('Save',['class'=>'btn btn-success btn-rounded legitRipple']) !!}
                        <a href="{{ route('user.index') }}">
                            {!! Form::button('Cancel',['class'=>'btn btn-warning btn-rounded legitRipple']) !!}
                        </a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('.role').select2({
                maximumSelectionLength: 5,
                placeholder: "Select Role"
            });

        });


    </script>
@endsection

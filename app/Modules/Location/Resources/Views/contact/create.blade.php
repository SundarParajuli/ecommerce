@extends('admin::layout')
@section('title') Create contact Details @endsection
@section('breadcrumb')
    <li><a href="{{route('contact.index')}}">Districts</a></li>
    <li class="active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-flat shadow-z-2">
                    <div class="panel-heading">
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li>
                                    <a href="{{route('contact.index')}}">
                                        <button type="button" class="btn btn-info btn-icon btn-rounded legitRipple">
                                            <i class=" icon-arrow-left52"></i>
                                            <span class="legitRipple-ripple"></span>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="panel-title">Create contact Details</h5>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::open(['route' => 'contact.store','method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}

                                <fieldset>

                                    <div class="form-group">
                                        {!! Form::label('firstName', 'First Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('firstName', $value = null, ['id'=>'firstName','placeholder'=>'First Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('middleName', 'Middle Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('middleName', $value = null, ['id'=>'middleName','placeholder'=>'Middle Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('middleName') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('lastName', 'Last Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('lastName', $value = null, ['id'=>'lastName','placeholder'=>'Last Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('street_address', 'Street Address', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('street_address', $value = null, ['id'=>'street_address','placeholder'=>' Street Address','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('street_address') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('city', 'City', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('city', $value = null, ['id'=>'city','placeholder'=>'City','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('phone_number', $value = null, ['id'=>'phone_number','placeholder'=>'Phone Number','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('fax_number', 'Fax', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('fax_number', $value = null, ['id'=>'fax_number','placeholder'=>'Fax','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('fax_number') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Phone','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('landline', 'Landline', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('landline', $value = null, ['id'=>'landline','placeholder'=>'Landline','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('landline') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('type', 'type', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('type', $value = null, ['id'=>'type','placeholder'=>'Type','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('pan', 'PAN', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('pan', $value = null, ['id'=>'pan','placeholder'=>'PAN','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('pan') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('description', $value = null, ['id'=>'pan','placeholder'=>'Description','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-2">
                                            {!! Form::submit('Save',['class'=>'btn btn-success btn-rounded legitRipple']) !!}
                                            <a href="{{ route('contact.index') }}">
                                                {!! Form::button('Cancel',['class'=>'btn btn-warning btn-rounded legitRipple']) !!}
                                            </a>
                                        </div>

                                    </div>


                                </fieldset>
                                <!-- /.col-lg-6 (nested) -->

                                {!! Form::close() !!}
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
    <!-- /.row -->

@stop

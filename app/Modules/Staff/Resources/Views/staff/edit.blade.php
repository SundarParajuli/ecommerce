@extends('admin::layout')
@section('title') Edit of Staff Details @endsection
@section('breadcrumb') 
    <li class="active">Edit</li>
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
                                    <a href="{{route('staff.index')}}">
                                        <button class="btn btn-xs btn-success"><i class="icon-arrow-left7"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="panel-title">Edit Staff Details</h5>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::model($staff,['route' => ['staff.update','id'=>$staff->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                                <fieldset>

                                   <div class="form-group">
                                        {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('joined_date', 'Joined Date', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('joined_date', $value = null, ['id'=>'joined_date','placeholder'=>'Joined Date','class'=>'form-control datepicker']) !!}
                                            <span class="text-danger">{{ $errors->first('joined_date') }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        {!! Form::label('referred_by', 'Referred By', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('referred_by', $value = null, ['id'=>'referred_by','placeholder'=>'Reffered By','class'=>'form-control datepicker']) !!}
                                            <span class="text-danger">{{ $errors->first('referred_by') }}</span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        {!! Form::label('address', 'Address', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('address', $value = null, ['id'=>'address','placeholder'=>'Address','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone Number', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Phone Number','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <div class="col-md-10 col-md-offset-2">
                                            <a href="{{ route('staff.index') }}">
                                                {!! Form::button('Cancel',['class'=>'btn btn-danger']) !!}
                                            </a>
                                            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
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

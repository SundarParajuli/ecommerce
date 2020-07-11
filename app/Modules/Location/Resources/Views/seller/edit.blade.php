@extends('admin::layout')
@section('title') Edit of Seller @endsection
@section('breadcrumb')
    <li><a href="{{route('seller.index')}}">Seller</a></li>
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
                                    <a href="{{route('seller.index')}}">
                                        <button class="btn btn-xs btn-success"><i class="icon-arrow-left7"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="panel-title">Edit Seller</h5>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::model($seller,['route' => ['seller.update','id'=>$seller->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                                <fieldset>

                                     <div class="form-group">
                                        {!! Form::label('name', 'Seller Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone Number', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('product_name', 'Product Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('product_name', $value = null, ['id'=>'product_name','placeholder'=>'Product Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-10 col-md-offset-2">
                                            <a href="{{ route('seller.index') }}">
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

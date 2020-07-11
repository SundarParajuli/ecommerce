@extends('admin::layout')
@section('title') Edit Product @endsection

@section('breadcrumb')
    <li><a href="{{route('product.index')}}">Product</a></li>
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
                                    <a href="{{route('product.index')}}">
                                        <button class="btn btn-xs btn-success"><i class="icon-arrow-left7"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h5 class="panel-title">Edit Product</h5>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                {!! Form::model($product,['method'=>'PUT','route'=>['product.update',$product->id],'class'=>'form-horizontal','role'=>'form']) !!}
                                <fieldset>

                                    
                                    <div class="form-group">
                                        {!! Form::label('name', 'Product Name', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Name','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('type', 'Type', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            
                                            {!! Form::select('type',$types,null, ['id'=>'type','class'=>'form-control select-border-color border-warning required']) !!}
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('unit', 'Unit', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('unit', $value = null, ['id'=>'unit','placeholder'=>'Unit','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('unit') }}</span>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <hr>
                                    <h4> Retail </h4>
                                    <hr>
                                    <div class="form-group">
                                        {!! Form::label('min_price_retail', 'Minimum Price', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('min_price_retail', $value = null, ['id'=>'min_price_retail','placeholder'=>'Minimum Price','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('min_price_retail') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        {!! Form::label('max_price_retail', 'Maximum Price', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('max_price_retail', $value = null, ['id'=>'max_price_retail','placeholder'=>'Maximum Price','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('max_price_retail') }}</span>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <h4> Wholesale </h4>
                                    <hr>
                                    <div class="form-group">
                                        {!! Form::label('min_price_wholesale', 'Minimum Price', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('min_price_wholesale', $value = null, ['id'=>'min_price_wholesale','placeholder'=>'Minimum Price','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('min_price_wholesale') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        {!! Form::label('max_price_wholesale', 'Maximum Price', ['class' => 'col-md-2 control-label required_label']) !!}
                                        <div class="col-md-10">
                                            {!! Form::text('max_price_wholesale', $value = null, ['id'=>'max_price_wholesale','placeholder'=>'Maximum Price','class'=>'form-control']) !!}
                                            <span class="text-danger">{{ $errors->first('max_price_wholesale') }}</span>
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="form-group">

                                        <div class="col-md-10 col-md-offset-2">
                                            <a href="{{ route('product.index') }}">
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

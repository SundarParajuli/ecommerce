@extends('admin::layout')
@section('title')  Role edit @endsection
@section('breadcrumb')  <li class="active"> Role</li>  @endsection

@section('page_wise_js')
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('app/assets/js/pages/form_layouts.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/inputs/duallistbox.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('app/assets/js/pages/form_dual_listboxes.js')}}"></script>

@endsection

@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Role Edit</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li>
                            <a href="{{route('role.index')}}">
                                <button class="btn btn-xs btn-success"><i class="icon-arrow-left7"></i>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::model($role,['route' => ['role.update','id'=>$role->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}


                <fieldset>
                    <legend class="text-semibold">Fill Fields Properly</legend>

                    <div class="form-group">
                        {!! Form::label('name','Role Name',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('name', $value = null, ['id'=>'name','class'=>'form-control','placeholder'=>' Role Name']) !!}
                            @if($errors->first('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('sort_order','Sort order',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('sort_order', $value = null, ['id'=>'sort_order','class'=>'form-control','placeholder'=>'Sort Order']) !!}
                            @if($errors->first('sort_order'))
                                <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('roles','Permissions',['class'=>'col-lg-3 control-label']) !!}

                        <div class="col-lg-9">

                            <select multiple="multiple" name="route_name[]" id="country_id" class="form-control listbox">
                                @foreach($routes as $key => $value)

                                        <option value="{{$key}}" @if(in_array($key,$assignedRoutes)) selected="selected" @endif>{{$value}}</option>

                                @endforeach
                            </select>

                            @if($errors->first('route_name'))
                                <span class="text-danger">{{ $errors->first('route_name') }}</span>
                            @endif
                        </div>
                    </div>

                </fieldset>

                <div class="form-group">

                    <div class="col-md-9 col-md-offset-3">
                        {!! Form::submit('Save',['class'=>'btn btn-success btn-rounded legitRipple']) !!}
                        <a href="{{ route('role.index') }}">
                            {!! Form::button('Cancel',['class'=>'btn btn-warning btn-rounded legitRipple']) !!}
                        </a>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>

        </div>

        <!-- /basic legend -->

    </div>
@stop

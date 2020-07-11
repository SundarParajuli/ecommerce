@extends('admin::layout')
@section('title')  Customer  edit @endsection
@section('breadcrumb')  <li class="active"> Customer </li>  @endsection



@section('content')
    <div class="col-md-12">

        <!-- Basic legend -->

        <div class="breadcrumb-line head-title"><a class="breadcrumb-elements-toggle"><i
                        class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="{{ route('customer.index') }}"><i class="icon-user position-left"></i> Customer  List</a></li>
                <li class="active">Customer  Edit</li>
            </ul>
        </div>

        <div class="panel panel-body">
            <div class="panel-body">
                {!! Form::model($customer,['route' => ['customer.update','id'=>$customer->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                <fieldset>
                    <div class="form-group">
                        {!! Form::label('first_name','Name',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-4">
                            {!! Form::text('first_name', $customer->customerProfile->first_name, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                            @if($errors->first('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-5">
                            {!! Form::text('last_name', $customer->customerProfile->last_name, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name ']) !!}
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
                            {!! Form::text('mobile', $customer->customerProfile->mobile, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile']) !!}
                            @if($errors->first('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('phone','Phone',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('phone', $customer->customerProfile->phone, ['id'=>'phone','class'=>'form-control','placeholder'=>'Phone']) !!}
                            @if($errors->first('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address_line1','Address',['class'=>'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('address_line1', $customer->customerProfile->address_line1, ['id'=>'address_line1','class'=>'form-control','placeholder'=>'Address']) !!}
                            @if($errors->first('address'))
                                <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('username','Customer name',['class'=>'col-lg-3 control-label']) !!}
                        <div class="col-lg-9">
                            {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Customer name','disabled']) !!}
                            @if($errors->first('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif

                        </div>
                    </div>



                    <div class="form-group">
                        {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-3 control-label required_label']) !!}
                        <div class="col-lg-8">
                            <div class="thumbnail img-wrap">
                                 <span class="close" onclick="confirmFirst('FileVal')">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                 </span>
                                <a class="standAloneFacnyBox"
                                   href="{{ route('standalone-filemanager',['filed_id'=>'FileVal']) }}">
                                    <img src="{{ $customer->customerProfile->profile_image !='' ? $customer->customerProfile->profile_image: URL::to('lib/filemanager/no_img.png') }}"
                                         id="FileVal" style="width: 300px;height: 300px;"/>
                                </a>
                            </div>
                            <p class="text-danger ">{{ $errors->first('profile_image') }}</p>
                            {!! Form::hidden('profile_image',$customer->customerProfile->profile_image,['id'=>'hFileVal']) !!}
                        </div>
                        <span class="error">{{ $errors->first('profile_image') }}</span>
                    </div>
                </fieldset>

                <div class="text-right">
                    <div class="form-wizard-actions">
                        {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                        <button class="btn btn-default" id="step-back" action="action"
                                onclick="window.history.go(-1); return false;" type="reset">Back
                        </button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>

        </div>

        <!-- /basic legend -->

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

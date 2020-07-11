@extends('site::layout')

@section('content')
    <div class="container">
        <div class="col-12">
            <ul class="breadcrumb">
            </ul>
            <div class="signupvendor">
                <div class="title">Login to access</div>
                <div id="logininBlock" style="display:block;">
                    <div class="container">
                        <div class="col-12">
                            <div class="wrap">
                                <div class="head">
                                    <h4>Vendor Login</h4>
                                    <span class="closeLogin" onclick="location.href = '{!! route('home') !!}';"><i class="fa fa-close"></i></span>
                                    @include('flash::message')
                                </div>
                                <div class="block">
                                    <div class="box">
                                        {!! Form::open(['route' => 'vendor.login.post','method'=>'POST','id'=>'sign_in']) !!}
                                        <div class="box-group">
                                            {!! Form::label('email', 'Email') !!}
                                            {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control','autofocus']) !!}
                                            @if($errors->has('email'))
                                                <p class="msg-error">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="box-group">
                                            {!! Form::label('password', 'Password') !!}
                                            {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                                            @if($errors->has('password'))
                                                <p class="msg-error">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="box-group">
                                            {!! Form::checkbox('remember',1,false, ['id'=>'remember_me','class'=>'form-control']) !!} Remember

                                        </div>
                                        <button type="submit">Proceed</button>
                                        {!! Form::close() !!}
                                        <div class="newSignup">New to RaraMart ? <a href="{{ route('vendor.register') }}">Sign up Now !</a>
                                        </div>
                                    </div>
                                    {{--<div class="box">--}}
                                        {{--<div class="head">Sign in with your Soscial Account</div>--}}
                                        {{--<div class="facebook"><a href="{{route('social.login','facebook')}}"><i class="fa fa-facebook"></i>Facebook</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="google"><a href="{{route('social.login','google')}}"><i class="fa fa-google-plus"></i>Google+</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

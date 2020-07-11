<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rara Mart Login </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('admin/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/colors.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <style>
        .divider {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: #e5e5e5;
        }
        .select2-selection--multiple .select2-selection__rendered{
            padding: 0;
            border-bottom: 1px solid #ddd;
        }
    </style>

</head>

<body class="navbar-bottom login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Registration form -->

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel registration-form">
                        <div class="panel-body">
                            @include('flash::message')
                            <form action="{{route('vendorRegister')}}" method="POST">

                                {!! csrf_field() !!}

                                <div class="text-center">
                                    <div class="icon-object border-success text-success"><i class="icon-plus3"></i>
                                    </div>
                                    <h5 class="content-group-lg">Sign Up As Vendor
                                        <small class="display-block">All fields are required</small>
                                    </h5>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('email'))
                                                <p class="error">{{ $errors->first('email') }}</p>
                                            @endif
                                            <input type="email" class="form-control" name="email"
                                                   placeholder="Your email">
                                            <div class="form-control-feedback">
                                                <i class="icon-mention text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('password')) <p
                                                    class="error">{{ $errors->first('password') }}</p>  @endif
                                            <input type="password" class="form-control"
                                                   name="password" placeholder="Create password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('password_confirmation')) <p
                                                    class="error">{{ $errors->first('password_confirmation') }}</p>  @endif
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   placeholder="Repeat password">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="divider col-lg-12"></div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('first_name')) <p
                                                    class="error">{{ $errors->first('first_name') }}</p>  @endif
                                            <input type="text" class="form-control"
                                                   name="first_name" placeholder="First Name">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('last_name')) <p
                                                    class="error">{{ $errors->first('last_name') }}</p>  @endif
                                            <input type="text" class="form-control" name="last_name"
                                                   placeholder="Last Name">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('company_name')) <p
                                                    class="error">{{ $errors->first('company_name') }}</p>  @endif
                                            <input type="text" class="form-control"
                                                   name="company_name" placeholder="Company Name">
                                            <div class="form-control-feedback">
                                                <i class="icon-briefcase3 text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('address_line1')) <p
                                                    class="error">{{ $errors->first('address_line1') }}</p>  @endif
                                            <input type="text" class="form-control"
                                                   name="address_line1" placeholder="Address">
                                            <div class="form-control-feedback">
                                                <i class="icon-mobile text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            @if($errors->first('mobile')) <p
                                                    class="error">{{ $errors->first('mobile') }}</p>  @endif
                                            <input type="text" class="form-control"
                                                   name="mobile" placeholder="Mobile Number">
                                            <div class="form-control-feedback">
                                                <i class="icon-mobile text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            {!! Form::select('industry[]',$industryType,$value = null, ['id'=>'name','class'=>'form-control industry','multiple'=>'multiple']) !!}
                                            <span class="text-danger">{{ $errors->first('industry') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            {!! Form::select('category[]',$categories,$value = null, ['id'=>'category','class'=>'form-control category','multiple'=>'multiple']) !!}
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="checkbox">
                                        <label>

                                            @if($errors->first('terms')) <p
                                                    class="error">{{ $errors->first('terms') }}</p>  @endif
                                            <input type="checkbox" class="styled" name="terms" value="1">
                                            Accept <a href="#">terms of service</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{route('login')}}" type="submit" class="btn btn-link"><i
                                                class="icon-arrow-left13 position-left"></i> Back to login form
                                    </a>
                                    <input type="submit"
                                           class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"
                                           value="Create account"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /registration form -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <ul class="nav navbar-nav visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i
                        class="icon-circle-up2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="footer">
        <div class="navbar-text">

        </div>

        <div class="navbar-right">

        </div>
    </div>
</div>
<!-- /footer -->

<!-- Core JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/forms/styling/uniform.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/pages/login.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins/ui/ripple.min.js')}}"></script>
<!-- /theme JS files -->
<script>
    $(document).ready(function () {
        $('.industry').select2({
            maximumSelectionLength: 5,
            placeholder: "Select Industry"
        });
        $('.category').select2({
            maximumSelectionLength: 5,
            placeholder: "Select Category"
        });
    });

</script>
</body>

</body>
</html>

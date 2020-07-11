@extends('admin::layout')
@section('title') Product @endsection
@section('content')
    <!-- Highlighting rows and columns -->
    <div class="panel panel-flat border-top-info">
        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                
            </ul>
        </div>
        <div class="panel-heading">
            <div class="col-xs-5">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="form-group input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search product" required/>
                        <label class="input-group-btn">
                            <button type="submit" class="btn btn-success"
                                    type="button">
                                <i class="fa fa-search">
                                </i>
                                Find
                            </button>
                        </label>
                    </div>
                </form>
            </div>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a href="{{route('product.create')}}">
                            {{--<button type="button" class="btn btn-xs btn-primary" id="add-step"><i--}}
                            {{--class="icon-plus22"></i></button>--}}
                            <button type="button" class="btn btn-success btn-icon btn-rounded legitRipple btn-float">
                                <i class="icon-googleplus5"></i><span class="legitRipple-ripple">
                                </span>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}">
                            <button type="button" class="btn btn-warning btn-icon btn-rounded legitRipple  btn-float" >
                                <i class="icon-spinner4"></i><span class="legitRipple-ripple">
                                </span>
                            </button>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple  btn-float" onclick="confirmAndSubmitForm()">
                            <i class="icon-trash"></i><span class="legitRipple-ripple">
                                </span>
                        </button>
                    </li>
                </ul>
            </div>

        </div>
        <br>
        <div class="panel-body">
            @include('flash::message')
        </div>

        {!! Form::open(['route' => 'product.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <div class="pretty p-default">
                            <input type="checkbox" id="checkAll"/>
                            <div class="state">
                                <label></label>
                            </div>
                        </div>
                    </th>
                    <th>
                         Name
                    </th>
                    <th>
                         Type
                    </th>
                    <th>
                         Retail Price
                    </th>
                    <th>
                         Wholesale Price
                    </th> 
                    
                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <div class="pretty p-default">
                                {!! Form::checkbox('toDelete[]',$product->id, false,['class'=>'checkItem']) !!}
                                <div class="state">
                                    <label></label>
                                </div>
                            </div>
                        </td>
                        <td>{{ucwords($product->name)}}</td>
                        <td>{{ucwords($product_types[$product->type])}}</td>
                        <td>
                            Min: {{ $product->min_price_retail }} <br>
                            Max: {{ $product->max_price_retail }} <br>
                            Average: {{round(($product->min_price_retail + $product->max_price_retail) / 2 )}}
                        </td>
                        <td>
                            Min: {{ $product->min_price_wholesale }} <br>
                            Max: {{ $product->max_price_wholesale }} <br>
                            Average: {{round(($product->min_price_wholesale + $product->max_price_wholesale) / 2 )}}
                        </td>
                        
                        <td class="text-center">
                            <a href="{{route('product.edit',$product->id)}}">
                                <img src=" {{asset('admin/images/edit.png')}}" alt="Edit"
                                     style="height:30px;width:30px;">
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="15">
                            <p class="text-danger text-center">No data found !</p>
                        </td>

                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /highlighting rows and columns -->
@endsection

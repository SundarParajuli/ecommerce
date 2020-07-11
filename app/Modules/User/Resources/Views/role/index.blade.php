@extends('admin::layout')
@section('title') List of Role @endsection
@section('breadcrumb')
    <li class="active"> Role</li>  @endsection

@section('page_wise_js')
    <script type="text/javascript"
            src="{{asset('app/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_advanced.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_data_sources.js')}}"></script>
    <script type="text/javascript" src="{{asset('app/assets/js/pages/datatables_extension_buttons_init.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


@endsection

@section('content')
    <!-- HTML sourced data -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Role List</h5>
            <div class="col-xs-6">
                <form action="{{ route('role.index') }}" method="GET">
                    <div class="form-group input-group">
                        <div class="col-lg-4">
                            {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Role Name','class'=>'form-control']) !!}
                        </div>

                        <div class="col-lg-4">{!! Form::text('start_date', $value = null, ['id'=>'start_date','placeholder'=>'Start Date','class'=>'form-control datepicker']) !!}</div>
                        <div class="col-lg-4"> {!! Form::text('end_date', $value = null, ['id'=>'end_date','placeholder'=>'End Date','class'=>'form-control datepicker']) !!}</div>

                        <label class="input-group-btn">
                            <button type="submit" class="btn btn-material-orange btn-flat"
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
                        <a href="{{route('role.create')}}">
                            {{--<button type="button" class="btn btn-xs btn-primary" id="add-step"><i--}}
                            {{--class="icon-plus22"></i></button>--}}
                            <button type="button" class="btn btn-success btn-icon btn-rounded legitRipple btn-float">
                                <i class="icon-googleplus5"></i><span class="legitRipple-ripple">
                                </span>
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('role.index')}}">
                            <button type="button" class="btn btn-warning btn-icon btn-rounded legitRipple btn-float">
                                <i class="icon-spinner4"></i><span class="legitRipple-ripple">
                                </span>
                            </button>
                        </a>
                    </li>
                    {{--<li>
                        <button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple btn-float"
                                onclick="confirmAndSubmitForm()">
                            <i class="icon-trash"></i><span class="legitRipple-ripple">
                                </span>
                        </button>
                    </li>--}}
                </ul>

            </div>
        </div>

        {!! Form::open(['route'=>'role.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
        <table class="table table-bordered table-hover ">
            <thead>
            <tr>
                <th>
                        Name
                </th>

                <th> Status</th>
                <th>
                        Created Date
                </th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($roles as $key=>$role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>
                        @if ($role->status == 1)
                            <a href="#" class="btnStatus" data-status="{{ $role->status }}"
                               data-id="{{ $role->id}}" data-url="{!! route('role.status') !!}">
                                <i class="fa fa-toggle-on fa-2x text-success-800">
                                </i>
                            </a>
                        @else
                            <a href="#" class="btnStatus" data-status="{{$role->status }}"
                               data-id="{{ $role->id }}" data-url="{!! route('role.status') !!}">
                                <i class="fa fa-toggle-off fa-2x text-danger-800">
                                </i>
                            </a>
                        @endif

                    </td>
                    <td>{{$role->created_at}}</td>
                    <td class="text-center">
                        <span>
                                <a href="{{route('role.edit',['id'=>$role->id])}}">
                                    <img src="{{ asset('admin/images/edit.png') }}" alt="Edit"
                                         style="height:25px;width:25px;">
                                </a>
                            </span>
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

        {{ $roles->links() }}
        {!! Form::close() !!}

    </div>
    <!-- /HTML sourced data -->
@stop

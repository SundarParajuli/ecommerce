@extends('admin::layout')
@section('title') Dashboard @endsection
@section('content')
    <!-- Main charts -->
    <div class="row panel panel-body border-top-danger">
        <div class="panel-heading">
            <i class="icon-home2"> DASHBOARD</i>
            <div class="heading-elements">
            </div>
        </div>

    </div>
    <!-- /main charts -->
@stop
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/js/plugins/data-tables/bootstrap-table.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('admin/js/plugins/data-tables/bootstrap-table.js') }}"></script>
@endsection

@extends('backEnd.master')
@section('mainContent')


<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.module') @lang('lang.permission') </h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.system_settings')</a>
                <a href="#">@lang('lang.module') @lang('lang.permission') </a> 
            </div>
        </div>
    </div>
</section>


<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('lang.role') @lang('lang.list')</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                @if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != "")
                                <tr>
                                    <td colspan="3">
                                        @if(session()->has('message-success-delete'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success-delete') }}
                                        </div>
                                        @elseif(session()->has('message-danger-delete'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger-delete') }}
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th width="30%">@lang('lang.role')</th>
                                    <th width="40%">@lang('lang.type')</th>
                                    <th width="30%">@lang('lang.action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->type}}</td>
                                    <td>
                                        <div class="dropdown">
                                            @if($role->type != "System")
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('lang.select')
                                            </button>
                                            @endif

                                            <div class="dropdown-menu dropdown-menu-right">
                                                
                                                
                                                <a class="dropdown-item" href="{{route('role_edit', [$role->id])}}">@lang('lang.edit')</a>
                                                <a class="dropdown-item deleteRole" data-toggle="modal" href="#" data-id="{{$role->id}}" data-target="#deleteRole">@lang('lang.delete')</a>
                                               
                                            </div>
                                            <a href="{{url('assign-module-permission', [$role->id])}}" class=""   >
                                                 <button type="button" class="primary-btn small fix-gr-bg"> @lang('lang.assign_permission') </button>
                                             </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade admin-query" id="deleteRole" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('lang.delete') @lang('lang.item')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                </div>

                <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                     {{ Form::open(['route' => 'role_delete', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                     <input type="hidden" name="id" id="role_id">
                    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                     {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Add fees</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.accounts')</a>
                <a href="#">Add fees</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
                     
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('bank-account')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add')
                </a>
            </div>
        </div>
        <div class="row">
          

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($student_fees))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('lang.fees')
                            </h3>
                        </div>
                        @if(isset($student_fees))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true,  'url' => 'add-fees/'.$student_fees->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                        @else
                         
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'add-fees',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                       
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">

                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(session()->has('message-success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message-success') }}
                                        </div>
                                        @elseif(session()->has('message-danger'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message-danger') }}
                                        </div>
                                        @endif
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('pay_by') ? ' is-invalid' : '' }}"
                                                type="text" name="pay_by" autocomplete="off" value="{{isset($student_fees)? $student_fees->pay_by:''}}">
                                            <input type="hidden" name="id" value="{{isset($student_fees)? $student_fees->id: ''}}">
                                            <label>Pay by <span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('pay_by'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pay_by') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters input-right-icon mt-35">
                                            <div class="col">
                                                <div class="input-effect">
                                                    <input class="primary-input date" id="startDate" type="text"
                                                           name="date"
                                                           value="{{isset($student_fees)? date('m/d/Y', strtotime($student_fees->date)): date('m/d/Y')}}">
                                                    <label>@lang('lang.date')</label>
                                                    <span class="focus-border"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
                                                </button>
                                            </div>
                                        </div>



                                <div class="row  mt-40">
                                    <div class="col-lg-12">

                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                                type="number" name="amount" autocomplete="off" value="{{isset($student_fees)? $student_fees->amount:''}}">
                                            <label>@lang('lang.amount')<span>*</span></label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                
                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                name="purpose">{{isset($student_fees)? $student_fees->purpose: ''}}</textarea>
                                            <label>@lang('lang.purpose') <span></span></label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                       <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            @if(isset($student_fees))
                                                @lang('lang.update')
                                            @else
                                                @lang('lang.save')
                                            @endif
                                            @lang('lang.fees')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('lang.fees') @lang('lang.list')</h3>
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
                                    <td colspan="6">
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
                                    <th>Pay By</th>
                                    <th>@lang('lang.date')</th>
                                    <th>@lang('lang.purpose')</th>
                                    <th>@lang('lang.amount')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($student_feess as $student_fees)
                                <tr>
                                    <td>{{$student_fees->pay_by}}</td>
                                    <td  data-sort="{{strtotime($student_fees->date)}}" >{{ !empty($student_fees->date)? App\SmGeneralSettings::DateConvater($student_fees->date):''}}</td>
                                    <td>{{$student_fees->purpose}}</td>
                                    <td>{{$student_fees->amount}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('lang.select')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                              

                                                <a class="dropdown-item" href="{{url('add-fees', [$student_fees->id])}}">@lang('lang.edit')</a>

                                                

                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteBankAccountModal{{$student_fees->id}}"
                                                    href="#">@lang('lang.delete')</a>

                                                    <a class="dropdown-item" href="{{url('fees-money-receipt', [$student_fees->id])}}">money receipt</a>
                                           
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade admin-query" id="deleteBankAccountModal{{$student_fees->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('lang.delete') @lang('lang.fees')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                                                     {{ Form::open(['url' => 'add-fees/'.$student_fees->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                                                     {{ Form::close() }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

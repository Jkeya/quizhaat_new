@extends('backEnd.master')
@section('mainContent')
@php  $setting = App\SmGeneralSettings::find(1); if(!empty($setting->currency_symbol)){ $currency = $setting->currency_symbol; }else{ $currency = '$'; } @endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>Legder Summary</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.accounts')</a>
                <a href="#">Legder Summary</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30">@lang('lang.select_criteria') </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('message-success') != "")
                        @if(session()->has('message-success'))
                        <div class="alert alert-success">
                            {{ session()->get('message-success') }}
                        </div>
                        @endif
                    @endif
                    <div class="white-box">
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'ledger-summary', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student']) }}
                            <div class="row">
                                <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                                <div class="col-lg-6 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control{{ $errors->has('date_from') ? ' is-invalid' : '' }}" id="startDate" type="text"
                                                     name="date_from" value="{{isset($date_from)? date('m/d/Y', strtotime($date_from)): date('m/d/Y')}}" readonly>
                                                    <label>@lang('lang.date_from')</label>
                                                    <span class="focus-border"></span>
                                                @if ($errors->has('date_from'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('date_from') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-30-md">
                                    <div class="no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control{{ $errors->has('date_to') ? ' is-invalid' : '' }}" id="startDate" type="text"
                                                     name="date_to" value="{{isset($date_to)? date('m/d/Y', strtotime($date_to)) : date('m/d/Y')}}" readonly>
                                                    <label>@lang('lang.date_to')</label>
                                                    <span class="focus-border"></span>
                                                @if ($errors->has('date_to'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('date_to') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        @lang('lang.search')
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            @if(isset($dates))

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">Ledger Summary</h3>
                            </div>
                        </div>
                    </div>

                
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Ledegr name</th>
                                        <th>@lang('lang.income') ({{$currency}})</th>
                                        <th>@lang('lang.expense') ({{$currency}})</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $total_income = 0;
                                        $total_expense = 0;
                                    @endphp

                                    @foreach($dates as $date)

                                    @php
                                        $incomes = App\SmAddIncome::where('date', $date)->get();

                                        $expenses = App\SmAddExpense::where('date', $date)->get();
                                    @endphp

                                    @foreach($incomes as $income)

                                    @php
                                        $total_income = $total_income + $income->amount;
                                        
                                    @endphp
                                   
                                    <tr>
                                        <td>{{$income->name}}</td>
                                        <td>{{number_format($income->amount, 2)}}</td>
                                        <td>0.00</td>
                                    </tr>

                                    @endforeach 

                                    @foreach($expenses as $expense)

                                    @php
                                        $total_expense = $total_expense + $expense->amount;
                                        
                                    @endphp
                                   
                                    <tr>
                                        <td>{{$expense->name}}</td>
                                        <td>0.00</td>
                                        <td>{{number_format($expense->amount, 2)}}</td>
                                    </tr>

                                    @endforeach


                                    @endforeach

                                     <tr>
                                        <td><strong>Total</strong></td>
                                        <td><strong>{{number_format($total_income, 2)}}</strong></td>
                                        <td><strong>{{number_format($total_expense, 2)}}</strong></td>
                                    </tr>

                                </tbody>
                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @endif
    </div>
</section>


@endsection

@extends('backEnd.master')
@section('mainContent')
<style>
    th{
        border: 1px solid black;
        text-align: center;
    }
    td{
        text-align: center;
    }
    td.subject-name{
        text-align: left;
        padding-left: 10px !important;
    }
    table.marksheet{
        width: 100%;
        border: 1px solid #828bb2 !important;
    }
    table.marksheet th{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet td{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet thead tr{
        border: 1px solid #828bb2 !important;
    }
    table.marksheet tbody tr{
        border: 1px solid #828bb2 !important;
    }

    .studentInfoTable{
        width: 100%;
        padding: 0px !important;
    }

    .studentInfoTable td{
        padding: 0px !important;
        text-align: left;
    }
    h4{
        text-align: left !important;
    }
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.mark_sheet_report') @lang('lang.student') </h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.reports')</a>
                <a href="#">@lang('lang.mark_sheet_report') @lang('lang.student')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30">@lang('lang.select_criteria')</h3>
                    </div>
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
                 @if(session()->has('message-danger') != "")
                    @if(session()->has('message-danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('message-danger') }}
                    </div>
                    @endif
                @endif
                <div class="white-box">
                    {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'mark_sheet_report_student', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student']) }}
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                            
                            <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('exam') ? ' is-invalid' : '' }}" name="exam">
                                    <option data-display="@lang('lang.select_exam') *" value="">@lang('lang.select_exam') *</option>
                                    @foreach($exams as $exam)
                                        <option value="{{$exam->id}}" {{isset($exam_id)? ($exam_id == $exam->id? 'selected':''):''}}>{{$exam->title}}</option>
                                       
                                    @endforeach
                                </select>
                                @if ($errors->has('exam'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('exam') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md">
                                <select class="w-100 bb niceSelect form-control {{ $errors->has('class') ? ' is-invalid' : '' }}" id="select_class" name="class">
                                    <option data-display="@lang('lang.select_class') *" value="">@lang('lang.select_class') *</option>
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}" {{isset($class_id)? ($class_id == $class->id? 'selected':''):''}}>{{$class->class_name}}</option>
                                   
                                    @endforeach
                                </select>
                                @if ($errors->has('class'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('class') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_section_div">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('section') ? ' is-invalid' : '' }} select_section" id="select_section" name="section">
                                    <option data-display="Select section *" value="">Select section *</option>
                                </select>
                                @if ($errors->has('section'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('section') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-lg-3 mt-30-md" id="select_student_div">
                                <select class="w-100 bb niceSelect form-control{{ $errors->has('student') ? ' is-invalid' : '' }}" id="select_student" name="student">
                                    <option data-display="@lang('lang.select_student') *" value="">@lang('lang.select_student') *</option>
                                </select>
                                @if ($errors->has('student'))
                                <span class="invalid-feedback invalid-select" role="alert">
                                    <strong>{{ $errors->first('student') }}</strong>
                                </span>
                                @endif
                            </div>

                            
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search"></span>
                                    @lang('lang.search')
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
</section>


@if(isset($is_result_available))
@php 
    $generalSetting= App\SmGeneralSettings::find(1);
    if(!empty($generalSetting)){
        $school_name =$generalSetting->school_name;
        $site_title =$generalSetting->site_title;
        $school_code =$generalSetting->school_code;
        $address =$generalSetting->address;
        $phone =$generalSetting->phone; 
    }

@endphp
<section class="student-details">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-30 mt-30">@lang('lang.mark_sheet_report')</h3>
                </div>
            </div>
            <div class="col-lg-8 pull-right">
                <div class="main-title">
                     <div class="print_button pull-right mt-30">
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'mark-sheet-report/print', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'mark_sheet_report', 'target' => '_blank']) }}
                          <input type="hidden" name="exam" value="{{$input['exam_id']}}">
                          <input type="hidden" name="class" value="{{$input['class_id']}}">
                          <input type="hidden" name="section" value="{{$input['section_id']}}"> 
                          <input type="hidden" name="student" value="{{$input['student_id']}}"> 
                          <button type="submit" class="primary-btn small fix-gr-bg">  <i class="ti-printer"> </i> Print </button> 
                       
                    </div>  
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single-report-admit">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div>
                                                <img class="logo-img" src="{{url($generalSetting->logo) }}" alt=""> 
                                            </div>
                                            <div class="ml-30">
                                                <h3 class="text-white"> {{isset($school_name)?$school_name:'Infix School Management ERP'}} </h3>
                                                <p class="text-white mb-0"> {{isset($address)?$address:'Infix School Adress'}} </p>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <img class="report-admit-img" src="{{asset($studentDetails->student_photo)}}" width="100" height="100" alt="{{asset($studentDetails->student_photo)}}">
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="offset-1 col-md-10">

                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <h4>Student Info</h4>
                                                                <table class="studentInfoTable">
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Name of Student :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->full_name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Father's Name :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->parents->fathers_name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Mother's Name :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->parents->mothers_name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Roll Number :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->roll_no}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Admission Number :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->admission_no}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Date of birth :
                                                                        </td>
                                                                        <td>
                                                                            {{$student_detail->date_of_birth != ""? App\SmGeneralSettings::DateConvater($student_detail->date_of_birth):''}}
                                                                        </td>
                                                                    </tr>


                                                                </table>
                                                            </td>
                                                            <td>
                                                                <h4>Exam Info</h4>
                                                                <table class="studentInfoTable">
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Exam Title :
                                                                        </td>
                                                                        <td>
                                                                            {{$exam_details->title}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Academic Class :
                                                                        </td>
                                                                        <td>
                                                                            {{$class_name->class_name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Academic Section :
                                                                        </td>
                                                                        <td>
                                                                            {{$section->section_name}}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                             <td>
                                                                <h4>Class Result</h4>
                                                                <table class="studentInfoTable">
                                                                     <tr>
                                                                        <td class="font-weight-bold">
                                                                            Class Lowest :
                                                                        </td>
                                                                        <td>
                                                                           {{min($student_final_marks)}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Class Highest :
                                                                        </td>
                                                                        <td>
                                                                            {{max($student_final_marks)}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Class Average :
                                                                        </td>
                                                                        <td>
                                                                           {{number_format(array_sum($student_final_marks)/count($student_final_marks), 2)}}
                                                                        </td>
                                                                    </tr> 
                                                                    <tr>
                                                                        <td class="font-weight-bold">
                                                                            Position :
                                                                        </td>
                                                                        <td>

                                                                            @php
                                                                            arsort($student_final_marks);

                                                                            $final_position_array = [];
                                                                            foreach($student_final_marks as $student_final_mark){
                                                                                $final_position_array[] = $student_final_mark;
                                                                            }


                                                                            echo array_search($total_marks_by_student,$final_position_array) + 1;

                                                                            @endphp


                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                            </div>
                                        </div>
                                        <table class="w-100 mt-30 mb-20 table   table-bordered marksheet">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">SL</th>
                                                    <th rowspan="2">Subject Name</th>


                                                    <th colspan="3">Marks Obtained</th>

                                                    <th rowspan="2">Letter Grade</th>
                                                    <th rowspan="2">Grade Point</th>
                                                    <th rowspan="2">GPA</th>
                                                </tr>
                                                <tr>

                                                @foreach($distributed_marks as $distributed_mark)
                                                        <th>{{$distributed_mark->exam_title}}({{$distributed_mark->exam_mark}}%) </th>
                                                    @endforeach
                                                    <th>Total(100%)</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                            @php $sum_gpa= 0;  $resultCount=1; $subject_count=1; $tota_grade_point=0; $this_student_failed=0; @endphp
                                            @foreach($subjects as $data)
                                                
                                                <tr>
                                                    <td>{{$subject_count++}}</td>
                                                    <td class="subject-name">{{$data->subject->subject_name}} </td>

                                                    @php

                                                    $distribute_marks = \App\SmMarkStore::where('exam_term_id', $input['exam_id'])->where('class_id', $input['class_id'])->where('section_id', $input['section_id'])->where('subject_id', $data->subject_id)->where('student_id', $input['student_id'])->get();

                                                    @endphp
                                                    
                                                    @foreach($distribute_marks as $distribute_mark)
                                                        <td>{{$distribute_mark->total_marks}}</td>
                                                    @endforeach



                                                    <td>
                                                             {{$tola_mark_by_subject=App\SmAssignSubject::getSumMark($student_detail->id, $data->subject_id, $class_id, $section_id, $exam_type_id)}}
                                                    </td>
                                                    <td>

                                                        @php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                        @endphp
                                                        {{$mark_grade->grade_name }}
                                                    </td>
                                                    <td>

                                                        @php
                                                            $mark_grade = App\SmMarksGrade::where([['percent_from', '<=', $tola_mark_by_subject], ['percent_upto', '>=', $tola_mark_by_subject]])->first();

                                                            $tota_grade_point = $tota_grade_point + $mark_grade->gpa ;
                                                            if($mark_grade->gpa<1){
                                                                $this_student_failed =1;
                                                            }
                                                        @endphp

                                                        {{ $mark_grade->gpa }}
                                                    </td>
                                                    @if($subject_count==2)


                                                        <td rowspan="{{count($subjects) + 1}}" style="vertical-align: middle">

                                                            @php

                                                            $get_avarage = $total_marks_by_student/count($subjects);


                                                            $final_gpa = App\SmMarksGrade::where([['percent_from', '<=', $get_avarage], ['percent_upto', '>=', $get_avarage]])->first();


                                                            echo @$final_gpa->gpa;

                                                            @endphp

                                                        </td>
                                                    @endif

                                                </tr>


                                                @endforeach
                                                 <tr>
                                                    <td></td>
                                                    <td>Total:</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        {{$total_marks_by_student}}
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        {{-- <div class="row">
                                            <div class="col-lg-12">

                                                <div class="row mt-35">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">
                                                            <input
                                                                    class="primary-input form-control"
                                                                    type="text" name="teacher_comment" autocomplete="off">
                                                            <label>Teacher's Comment</label>
                                                            <span class="focus-border"></span>
                                                        </div>

                                                    </div>
                                                </div> 
                                            </div>
                                        </div> --}}

                                        <div class="row mt-20">
                                            <div class="col-lg-12">
                                                <p class="result-date">
                                                    @php
                                                     $data = App\SmMarkStore::select('created_at')->where([
                                                        ['student_id',$student_detail->id],
                                                        ['class_id',$class_id],
                                                        ['section_id',$section_id],
                                                        ['exam_term_id',$exam_type_id],
                                                    ])->first();

                                                    @endphp
                                                    Date of Publication of Result : <b> {{date_format(date_create($data->created_at),"F j, Y, g:i a")}}</b>
                                                </p>
                                            </div>
                                        </div>

                                         </form> 


                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif
            

@endsection

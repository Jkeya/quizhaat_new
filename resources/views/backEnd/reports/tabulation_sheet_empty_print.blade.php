<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabulation Sheet </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
    table.tabluationsheet {
        width: 100%;
    }

    .tabluationsheet th, .tabluationsheet td {
        border: 1px solid #ddd;
        font-size: 9px;
        padding: 2px;
    }



    .tabluationsheet td {
        text-align: center;
    }

    body {
        padding: 0;
        font-family: "Poppins", sans-serif;
        font-weight: 300; 
        margin-top: 15px;
    }

    html {
        padding: 0px;
        margin: 0px;
        font-family: "Poppins", sans-serif;
        font-weight: 300;


    }

    .container-fluid {
        padding-bottom: 50px;
    }

    h1, h2, h3, h4 {

        font-family: "Poppins", sans-serif;
        font-weight: 300;
        margin-bottom: 15px;
    }

    .gradeChart tbody td{
        padding: 0;
        border-collapse: 1px solid #ddd;
    }
    table.gradeChart{
        padding: 0px;
        margin: 0px;
        width: 60%;
        text-align: right;
        font-size: 11px;
    }
    table.gradeChart thead th{
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
    }
    table.gradeChart tbody td{
        border: 1px solid #000000;
        border-collapse: collapse;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
    }
</style>
<body>


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

<div class="container-fluid">
    <table class="table" style="width: 100%;">
        <thead>
        <tr>

            <th class="" style="vertical-align: middle; text-align: right;">
                <img class="logo-img" src="{{ url('/')}}/{{$generalSetting->logo }}" alt="">
            </th>
            <th class="text-left">

                <h3 class="exam_title text-left text-capitalize">{{isset($school_name)?$school_name:'Infix School Management ERP'}} </h3>
                <h4 class="exam_title text-left text-capitalize">{{isset($address)?$address:'Infix School Adress'}} </h4>
                <h4 class="exam_title text-left text-uppercase"> tabulation sheet
                    of {{$tabulation_details['exam_term']}} in {{date('Y')}}</h4>
            </th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>


                            @if(@$tabulation_details['student_name'])
                                @if(@$tabulation_details['student_name'])
                                    <p class="student_name">
                                        <b>@lang('lang.student') @lang('lang.name') </b> {{$tabulation_details['student_name']}}
                                    </p>
                                @endif
                                @if(@$tabulation_details['student_roll'])
                                    <p class="student_name">
                                        <b>@lang('lang.student') @lang('lang.roll') </b> {{$tabulation_details['student_roll']}}
                                    </p>
                                @endif
                                @if(@$tabulation_details['student_admission_no'])
                                    <p class="student_name">
                                        <b>@lang('lang.student') @lang('lang.admission') </b> {{$tabulation_details['student_admission_no']}}
                                    </p>
                                @endif
                            @else
                                @foreach($tabulation_details['subject_list'] as $d)
                                    <p class="subject-list">{{$d}}</p>
                                @endforeach

                            @endif
                        </td>
                        <td>

                            @if(@$tabulation_details['student_class'])
                                <p class="student_name">
                                    <b>@lang('lang.class')  </b> {{$tabulation_details['student_class']}}
                                </p>
                            @endif
                            @if(@$tabulation_details['student_section'])
                                <p class="student_name">
                                    <b>@lang('lang.section') </b> {{$tabulation_details['student_section']}}
                                </p>
                            @endif
                            @if(@$tabulation_details['student_admission_no'])
                                <p class="student_name">
                                    <b> @lang('lang.exam') </b> {{$tabulation_details['exam_term']}}
                                </p>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                @if(@$tabulation_details)
                    <table class="table gradeChart table-bordered">
                        <thead>
                        <tr>
                            <th>Staring</th>
                            <th>Ending</th>
                            <th>GPA</th>
                            <th>Grade</th>
                            <th>Evalution</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tabulation_details['grade_chart'] as $d)
                            <tr>
                                <td>{{$d['start']}}</td>
                                <td>{{$d['end']}}</td>
                                <td>{{$d['gpa']}}</td>
                                <td>{{$d['grade_name']}}</td>
                                <td class="text-left">{{$d['description']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

            </td>
        </tr>
        </tbody>
    </table>


    <h3 style="width: 100%; text-align: center; border-bottom: 1px solid #ddd; padding: 10px;">Tabulation Sheet</h3>

    <table class="w-100 mt-30 mb-20 tabluationsheet">
        <thead>
        <tr>
            <th rowspan="2">@lang('lang.sl')</th>
            <th rowspan="2">@lang('lang.student') @lang('lang.name')</th>
            <th rowspan="2">@lang('lang.admission') @lang('lang.no')</th>
            @foreach($subjects as $subject)
                @php
                    $subject_ID     = $subject->subject_id;
                    $subject_Name   = $subject->subject->subject_name;
                    $mark_parts      = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                @endphp
                <th colspan="{{count($mark_parts)+2}}" class="text-center" > {{$subject_Name}}</th>
            @endforeach
            <th rowspan="2" class=" ">@lang('lang.total_mark')</th>
            <th rowspan="2" class=" ">@lang('lang.gpa')</th>
            <th rowspan="2" class="  text-center" nowrap>@lang('lang.gpa') @lang('lang.grade')</th>
        </tr>
        <tr>

            @foreach($subjects as $subject)
                @php
                    $subject_ID     = $subject->subject_id;
                    $subject_Name   = $subject->subject->subject_name;
                    $mark_parts     = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                @endphp

                @foreach($mark_parts as $sigle_part)
                    <th style="text-align: center;" class="total">{{$sigle_part->exam_title}} </th>
                @endforeach
                <th>@lang('lang.total')</th>
                <th>@lang('lang.gpa')</th>
            @endforeach
        </tr>
        </thead>

        <tbody>
        @php  $count=1;  @endphp
        @foreach($students as $student)
            @php $this_student_failed=0; $tota_grade_point= 0; $marks_by_students = 0; @endphp
            <tr>
                <td>{{$count++}}</td>
                <td> {{$student->full_name}}</td>
                <td> {{$student->admission_no}}</td>

                @foreach($subjects as $subject)
                     @php
                    $subject_ID     = $subject->subject_id;
                    $subject_Name   = $subject->subject->subject_name;
                    $mark_parts     = App\SmAssignSubject::getNumberOfPart($subject_ID, $class_id, $section_id, $exam_term_id);
                @endphp

                @foreach($mark_parts as $sigle_part)
                        <td class="total"></td>
                    @endforeach
                    <td class="total">
                        
                    </td>
                    <td>
                        
                    </td>

                @endforeach
                <td>
                </td>
                <td>
                </td>
                <td>
                   


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

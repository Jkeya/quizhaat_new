<!DOCTYPE html>
<html lang="en">
<head>
  <title>Merit List </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head> 
<style>
    th{
        border: 1px solid #ddd;
        text-align: center;
        padding: 5px !important;
        font-size: 11px;
    }
    td{
        text-align: center;
        padding: 5px !important;
        font-size: 11px;
    }
    td.subject-name{
        text-align: left;
        padding-left: 10px !important;
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
    <table  style="width: 100%; border: 0px;"> 
            <tr > 
                <td style="width: 15%">
                    <img class="logo-img" src="{{ url('/')}}/{{$generalSetting->logo }}" alt="" width="120" >
                </td>
                <td style="text-align: center; width: 70%"> 
                    <h3 class="text-white"> {{isset($school_name)?$school_name:'Infix School Management ERP'}} </h3> 
                    <p class="text-white mb-0"> {{isset($address)?$address:'Infix School Address'}} </p>
                </td> 
                <td style="width: 15%">
                    <img class="logo-img" src="{{ url('/')}}/{{$student_detail->student_photo }}" alt="" width="110" height="110"> 
                </td>
            </tr> 
    </table>



 
    <div class="container-fluid p-0"> 
        <div class="row">
            <div class="col-lg-12"> 
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single-report-admit">
                            <div class="card"> 
                               
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-1 col-md-10">

                                                <table class="table">
                                                    <tr>
                                                        <td>
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


                                                            </table>
                                                        </td>
                                                        <td>
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
                                                                            Class Position :
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
                                    <h4 style="text-align: center;">Marks Sheet of {{$exam_details->title}}</h4>
                                    <hr>

                                    <table class="w-100 mt-40 mb-20 table   table-bordered marksheet">
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

                                                    {{$mark_grade->gpa }}
                                                </td>
                                                @if($subject_count==2)
                                                    <td rowspan="{{count($subjects)}}" style="vertical-align: middle">
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
                                            <p class="footer-p">Teacher's Comment : {{$teacher_comment}}</p>
                                            
                                        </div>
                                    </div> --}}

               


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
</body>
</html>

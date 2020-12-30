<!DOCTYPE html>
<html lang="en">
<head>
  <title>Money Receipt </title>
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



 
    <div class="container-fluid p-0"> 
        <div class="row">
            <div class="col-lg-12"> 
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single-report-admit">
                            <div class="card"> 
                               
                                <div class="card-body">
                                    

                                    <table class="mt-40 mb-20 table   table-bordered marksheet">

                                        <tr>
                                            <td colspan="2">
                                                <h3>
                                                    Money Receipt
                                                </h3>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="text-left">
                                                receipt no. {{$student_fees->id}}
                                            </td>
                                            <td class="text-right">
                                                date: {{$student_fees->date}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><span>Received from. </span><span>{{$student_fees->pay_by}}</span> <span> the amount of </span><span>{{$student_fees->amount}}</span><span> for </span> <span>{{$student_fees->purpose}}.</span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-left"><span>Received by: </span> <span></span></td>
                                        </tr>

                                        
                                    </table>

               


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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmStudentFees;
use Toastr;
use PDF;

class SmStudentFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_feess = SmStudentFees::all();
        return view('backEnd.accounts.studentFees', compact('student_feess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pay_by' => "required",
            'date' => "required",
            'amount' => "required",
            'purpose' => "required"
        ]);


        $add_fees = new SmStudentFees();
        $add_fees->pay_by = $request->pay_by;
        $add_fees->date = date('Y-m-d', strtotime($request->date));
        $add_fees->amount = $request->amount;
        $add_fees->purpose = $request->purpose;
        $result = $add_fees->save();
        if ($result) {
            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_fees = SmStudentFees::find($id);
        $student_feess = SmStudentFees::all();
        return view('backEnd.accounts.studentFees', compact('student_feess', 'student_fees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pay_by' => "required",
            'date' => "required",
            'amount' => "required",
            'purpose' => "required"
        ]);


        $add_fees = SmStudentFees::find($id);
        $add_fees->pay_by = $request->pay_by;
        $add_fees->date = date('Y-m-d', strtotime($request->date));
        $add_fees->amount = $request->amount;
        $add_fees->purpose = $request->purpose;
        $result = $add_fees->save();
        if ($result) {
            Toastr::success('Operation successful', 'Success');
            return redirect('add-fees');
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bank_account = SmStudentFees::destroy($id);
        if ($bank_account) {
            Toastr::success('Operation successful', 'Success');
            return redirect('add-fees');
        } else {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function feesMoneyReceipt($id){

         $student_fees = SmStudentFees::find($id);


        //return view('backEnd.accounts.fees_money_receipt');




        $customPaper = array(0,0,600.00,600.80);
        $pdf = PDF::loadView('backEnd.accounts.fees_money_receipt', 
            [
                'student_fees' => $student_fees

            ])->setPaper($customPaper, 'landscape');
        return $pdf->stream('money_receipt.pdf');
    }

    public function ledgeSummary(){
        return view('backEnd.accounts.ledger_summary');
    } 


    public function ledgeSummarySearch(Request $request){

        $request->validate([
            'date_from' => "required",
            'date_to' => "required",
        ]);




        // Specify the start date. This date can be any English textual format  
        $date_from = $request->date_from;   
        $date_from = strtotime($date_from); // Convert date to a UNIX timestamp  
          
        // Specify the end date. This date can be any English textual format  
        $date_to = $request->date_to; 
        $date_to = strtotime($date_to); // Convert date to a UNIX timestamp  
          
        // Loop from the start date to end date and output all dates inbetween  
        $dates = [];

        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
            $dates[] =  date("Y-m-d", $i);  
        }  

        return view('backEnd.accounts.ledger_summary', compact('dates'));
    }



}

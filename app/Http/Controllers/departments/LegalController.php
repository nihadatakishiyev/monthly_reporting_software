<?php

namespace App\Http\Controllers\departments;

use App\Court;
use App\LegalAgreement;
use App\LegalCourt;
use App\LegalProblem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Count;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return view('departments.legal');
        $courts = DB::select("select * from legal_courts");
        $agrs = DB::select("select * from legal_agreements");
        $prbs = DB::select("select * from legal_problems");

       return view('departments.legal', compact('courts', 'agrs', 'prbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('legalCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      for ($i=1; $i<2; $i++){
          $temp1 = "company_name_" . $i;
          $temp2 = "debt_status_" . $i;
          $temp3 = "amount_" . $i;
          $temp4 = "amount_in_month_" . $i;

          $court = new LegalCourt;
          $court->company_name = $request->$temp1;
          $court->debt_status = $request->$temp2;
          $court->amount = $request->$temp3;
          $court->amount_in_month = $request->$temp4;
          $court->report_date = $request->date;
          $court->save();
        }
//<-------------------------------------------------------------------------------------------------------------------->
        for ($i=1; $i<2; $i++){
            $temp1 = "agr_type_" . $i;
            $temp2 = "agr_status_" . $i;
            $temp3 = "agr_count_" . $i;

            $agr = new LegalAgreement;
            $agr->agr_type = $request->$temp1;
            $agr->status = $request->$temp2;
            $agr->count = $request->$temp3;
            $agr->report_date = $request->date;
            $agr->save();
        }
//<-------------------------------------------------------------------------------------------------------------------->
        for ($i=1; $i<2; $i++){
            $temp1 = "problem_" . $i;
            $temp2 = "problem_status_" . $i;
            $temp3 = "problem_solution_" . $i;
            $temp4 = "execution_time_" . $i;

            $problem = new LegalProblem;
            $problem->problem = $request->$temp1;
            $problem->status = $request->$temp2;
            $problem->solution = $request->$temp3;
            $problem->execution_time = $request->$temp4;
            $problem->report_date = $request->date;
            $problem->save();
        }

        return Redirect::back()->with('success', 'Data added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

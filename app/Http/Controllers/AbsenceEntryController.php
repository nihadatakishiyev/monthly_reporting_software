<?php

namespace App\Http\Controllers;

use App\Absence_Entry_2018;
use App\AbsenceEntry;
use App\Traits\Methods;
use App\User;
use Illuminate\Http\Request;

class AbsenceEntryController extends Controller
{
    use Methods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->absEnt();
//        $absEnt = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmployeeAbsenceEntries";
//        $posVoc = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedVacationOrder";
//        $posSick = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedSickLeaveOrder";
//        $travOr = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedTravelOrder";
//        $othAbs = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedOtherAbsenceOrder";
//
//        $absData =  $this->curl($absEnt);
//
//        for ($i = 0; $i<sizeof($absData['value']); $i++){
//            $pn =  "P". substr($absData['value'][$i]['Employee_No'], -7);
//            $user = User::where('person_no', $pn)->first();
//            echo $i;
//            if($user!=""){
//                if (substr($absData['value'][$i]['Start_Date'], 0, -16) == "2019"){
//                    $absence = new AbsenceEntry;
//                    $absence->person_no = $pn;
//                    $absence->start_date = substr($absData['value'][$i]['Start_Date'], 0, -10);
//                    $absence->end_date = substr($absData['value'][$i]['End_Date'], 0, -10);
//                    $absence->description = $absData['value'][$i]['Description'];
//                    $type = $absData['value'][$i]['Time_Activity_Code'];
//                    if($type == "M"){
//                        $absence->type = "paid leave";
//                    }
//                    elseif($type == "ÖM"){
//                        $absence->type = "unpaid leave";
//                    }
//                    elseif($type == "SM"){
//                        $absence->type = "sick leave";
//                    }
//                    elseif($type == "E"){
//                        $absence->type = "business trip";
//                    }
//                    elseif($type == "X"){
//                        $absence->type = "paid temporary ability loss";
//                    }
//                    elseif ($type = "MA"){
//                        $absence->type = "add paid leave";
//                    }
//                    $absence->save();
//                }
//                elseif (substr($absData['value'][$i]['Start_Date'], 0, -16) == "2018"){
//                    $absence = new Absence_Entry_2018;
//                    $absence->person_no = $pn;
//                    $absence->start_date = substr($absData['value'][$i]['Start_Date'], 0, -10);
//                    $absence->end_date = substr($absData['value'][$i]['End_Date'], 0, -10);
//                    $absence->description = $absData['value'][$i]['Description'];
//                    $type = $absData['value'][$i]['Time_Activity_Code'];
//                    if($type == "M"){
//                        $absence->type = "paid leave";
//                    }
//                    elseif($type == "ÖM"){
//                        $absence->type = "unpaid leave";
//                    }
//                    elseif($type == "SM"){
//                        $absence->type = "sick leave";
//                    }
//                    elseif($type == "E"){
//                        $absence->type = "business trip";
//                    }
//                    elseif($type == "X"){
//                        $absence->type = "paid temporary ability loss";
//                    }
//                    elseif ($type = "MA"){
//                        $absence->type = "add paid leave";
//                    }
//                    $absence->save();
//                }
//            }
//        }
//
////        $absData =  $this->curl($absEnt);
////        $posData = $this->curl($posVoc);
////        $possData = $this->curl($posSick);
////        $travData = $this->curl($travOr);
////        $othAbs = $this->curl($othAbs);
////        return $this->curl($absEnt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absEnt = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmployeeAbsenceEntries";
        $posVoc = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedVacationOrder";
        $posSick = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedSickLeaveOrder";
        $travOr = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedTravelOrder";
        $othAbs = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedOtherAbsenceOrder";

        $absData =  $this->curl($absEnt);

        for ($i = 0; $i<sizeof($absData); $i++){
            return substr($absData['value'][$i]['Employee_No'], -7);
        }
        $posData = $this->curl($posVoc);
        $possData = $this->curl($posSick);
        $travData = $this->curl($travOr);
        $othAbs = $this->curl($othAbs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbsenceEntry  $absenceEntry
     * @return \Illuminate\Http\Response
     */
    public function show(AbsenceEntry $absenceEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbsenceEntry  $absenceEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsenceEntry $absenceEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbsenceEntry  $absenceEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsenceEntry $absenceEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbsenceEntry  $absenceEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsenceEntry $absenceEntry)
    {
        //
    }
}

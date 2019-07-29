<?php


namespace App\Traits;


use App\AbsenceEntry;
use App\AbsenceEntry2018;
use App\User;

trait Methods
{

    public function curl($url){
        $curl = curl_init();
        $usr = "110.NIA";
        $psw = "123qweasD";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD =>"$usr:$psw",
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $user = json_decode($response,true);
        $err = curl_error($curl);
        curl_close($curl);

        return $user;
    }


    public function absEnt(){
        $absEnt = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmployeeAbsenceEntries";
        $posVoc = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedVacationOrder";
        $posSick = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedSickLeaveOrder";
        $travOr = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedTravelOrder";
        $othAbs = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/PostedOtherAbsenceOrder";

        $absData =  $this->curl($absEnt);

        for ($i = 0; $i<sizeof($absData['value']); $i++){
            $pn =  "P". substr($absData['value'][$i]['Employee_No'], -7);
            $user = User::where('person_no', $pn)->first();
            if($user!=""){
                if (substr($absData['value'][$i]['Start_Date'], 0, -16) == "2019"){
                    $absence = new AbsenceEntry;
                    $absence->person_no = $pn;
                    $absence->start_date = substr($absData['value'][$i]['Start_Date'], 0, -10);
                    $absence->end_date = substr($absData['value'][$i]['End_Date'], 0, -10);
                    $absence->description = $absData['value'][$i]['Description'];
                    $type = $absData['value'][$i]['Time_Activity_Code'];
                    if($type == "M"){
                        $absence->type = "paid leave";
                    }
                    elseif($type == "ÖM"){
                        $absence->type = "unpaid leave";
                    }
                    elseif($type == "SM"){
                        $absence->type = "sick leave";
                    }
                    elseif($type == "E"){
                        $absence->type = "business trip";
                    }
                    elseif($type == "X"){
                        $absence->type = "paid temporary ability loss";
                    }
                    elseif ($type = "MA"){
                        $absence->type = "add paid leave";
                    }
                    $absence->save();
                }
                else {
                    $absence = new AbsenceEntry2018;
                    $absence->person_no = $pn;
                    $absence->start_date = substr($absData['value'][$i]['Start_Date'], 0, -10);
                    $absence->end_date = substr($absData['value'][$i]['End_Date'], 0, -10);
                    $absence->description = $absData['value'][$i]['Description'];
                    $type = $absData['value'][$i]['Time_Activity_Code'];
                    if($type == "M"){
                        $absence->type = "paid leave";
                    }
                    elseif($type == "ÖM"){
                        $absence->type = "unpaid leave";
                    }
                    elseif($type == "SM"){
                        $absence->type = "sick leave";
                    }
                    elseif($type == "E"){
                        $absence->type = "business trip";
                    }
                    elseif($type == "X"){
                        $absence->type = "paid temporary ability loss";
                    }
                    elseif ($type = "MA"){
                        $absence->type = "add paid leave";
                    }
                    $absence->save();
                }
            }
        }

//        $absData =  $this->curl($absEnt);
//        $posData = $this->curl($posVoc);
//        $possData = $this->curl($posSick);
//        $travData = $this->curl($travOr);
//        $othAbs = $this->curl($othAbs);
//        return $this->curl($absEnt);
    }
}
<?php

namespace App\Http\Controllers\departments;

use App\AbsenceEntry;
use App\AbsenceEntry2018;
use App\Traits\Methods;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HRController extends Controller
{
    use Methods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num =  User::all();

        $staff = DB::table('users')->where('type', 'staff')->count();
        $outsource = DB::table('users')->where('type', 'outsource')->count();
        $ministry = DB::table('users')->where('type', 'nazirlik')->count();
        $type = array($staff, $outsource, $ministry);

        $user_count = DB::table('users')->count();
        $male = DB::table('users')->where('gender', 'male')->count();
        $female = DB::table('users')->where('gender', 'female')->count();
        $gender = array($male, $female);

        $tam = DB::table('users')->where('education', 'tam orta')->count();
        $umumi = DB::table('users')->where('education', 'ümumi orta')->count();
        $orta = DB::table('users')->where('education', 'orta ixtisas')->count();
        $bachelor = DB::table('users')->where('education', 'ali')->count();
        $master = DB::table('users')->where('education', 'master')->count();
        $phd = DB::table('users')->where('education', 'PHD')->count();
        $edu = array($bachelor, $master, $phd, $tam, $umumi, $orta);

        $testt= DB::table('users')->select(DB::raw("AVG((TO_DAYS(NOW())-TO_DAYS(birth_date)))/365.242199 as cnt"))->pluck('cnt')[0];
        $num = 5;
        return view('departments.hr', compact('gender', 'edu', 'user_count','testt', 'type', 'num'));


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        return Redirect::back();
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

    public function fetch(){
//        $urlUser = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmployeeCard";
//        $user = $this->curl($urlUser);
//
//        for ($i = 0; $i < sizeof($user['value']); $i++){
//            if($user['value'][$i]['Termination_Date'] != "0001-01-01T00:00:00Z"){
//                continue;
//            }
//            else{
//                $usr = User::where('person_no', $user['value'][$i]['Person_No'])->first();
////              User not in db already
//                if ($usr==""){
//                    $this->createUser($user, $i);
//                }
////                user is in database, but there is a change in some of its data
//                else{
//                    $this->updateUser($usr, $user, $i);
//                }
//            }
//        }
//        return Redirect::back()->with('success', 'HR data is successfully updated');
        return "fetched successfully";
    }
//-----------------------------------------------------------------------------------------------------------------------------

    public function createUser(array $user, $i){
        $usr = new User;
        $this->updateUser($usr, $user, $i);
    }

    public function updateUser(User $usr, array $user, $i){
        $usr->person_no = $user['value'][$i]['Person_No'];
        $usr->name = $user['value'][$i]['First_Name'];
        $usr->surname = $user['value'][$i]['Last_Name'];
        $usr->status = "At work";
        $usr->birth_date = substr($user['value'][$i]['Birth_Date'], 0, -10);
        $usr->gender = $user['value'][$i]['Gender'];
        $usr->position = $user['value'][$i]['Job_Title'];
        $usr->org_unit = $user['value'][$i]['Org_Unit_Name'];
        $usr->email = $user['value'][$i]['Company_E_Mail'];
        $usr->password = Hash::make($user['value'][$i]['First_Name'] . "123");
        $urlEdu = "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmloyeeQualifications";
        $user = $this->curl($urlEdu);
        if($user['value'][$i]['Description'] == "Ali"){
            $usr->education = "ali";
            $usr->save();
        }
        elseif($user['value'][$i]['Description'] == "Ali (magistr)"){
            $usr->education = "master";
            $usr->save();
        }
        elseif($user['value'][$i]['Description'] == "Orta-ixtisas"){
            $usr->education = "orta-ixtisas";
            $usr->save();
        }
        AbsenceEntry::truncate();
        AbsenceEntry2018::truncate();
        $this->absEnt();
        $usr->save();
    }
//    public function curl($url){
//        $curl = curl_init();
//        $usr = "110.NIA";
//        $psw = "123qweasD";
//
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_USERPWD =>"$usr:$psw",
//            CURLOPT_ENCODING => "",
//            CURLOPT_TIMEOUT => 30000,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_HTTPHEADER => array(
//                // Set Here Your Requesred Headers
//                'Content-Type: application/json',
//            ),
//        ));
//        $response = curl_exec($curl);
//        $user = json_decode($response,true);
//        $err = curl_error($curl);
//        curl_close($curl);
//
//        return $user;
//    }
}

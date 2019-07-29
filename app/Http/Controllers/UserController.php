<?php

namespace App\Http\Controllers;

use App\Http\Resources\userResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
//        return userResource::collection($users);
        return view('userCollection')->with('users', $users);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =  new userResource(User::findOrFail($id));
        return view('user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit')->with('user', $user);
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
        $user = User::find($id);
        if ($request->name != ""){
            $user->name = $request->name;
        }
        if ($request->surname != ""){
            $user->surname = $request->surname;
        }
        if ($request->gender != ""){
        $user->gender = $request->gender;
        }
        if ($request->status != ""){
            $user->status = $request->status;
        }
        if ($request->position != ""){
            $user->position = $request->position;
        }
        if ($request->org != ""){
            $user->org_unit = $request->org;
        }
        if ($request->birthdate != ""){
            $user->birth_date = $request->birthdate;
        }
        if ($request->education != ""){
            $user->education = $request->education;
        }
        if ($request->email != ""){
            $user->email = $request->email;
        }
        if ($request->type != ""){
            $user->type = $request->type;
        }
        $user->save();
        return redirect('/users/'.$id)->with('success', 'User information updated succesfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect('/users/'.Auth::id())->with('info', 'User deleted successfully');
    }

    public function fetchUsers(){
        $curl = curl_init();
        $usr = "110.NIA";
        $psw = "123qweasD";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://10.10.7.201:7048/NAV-AZINTELECOM/ODataV4/Company('AZINTELECOM')/EmployeeCard",
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

//        return $user['value'][0]['Person_No'];
        for ($i = 0; $i < sizeof($user['value']); $i++){
            $usr = new User;
            if($user['value'][$i]['Termination_Date'] != "0001-01-01T00:00:00Z"){
                continue;
            }
            elseif($user['value'][$i]['Company_E_Mail'] == "Sabir.Rzayev@azintelecom.az"){
                $usr->person_no = $user['value'][$i]['Person_No'];
                $usr->name = $user['value'][$i]['First_Name'];
                $usr->surname = $user['value'][$i]['Last_Name'];
                $usr->status = "At work";
                $usr->birth_date = substr($user['value'][$i]['Birth_Date'], 0, -10);
                $usr->gender = $user['value'][$i]['Gender'];
                $usr->education = "";
                $usr->position = $user['value'][$i]['Job_Title'];
                $usr->org_unit = $user['value'][$i]['Org_Unit_Name'];
                $usr->email = $user['value'][$i]['Company_E_Mail'];
                $usr->password = $user['value'][$i]['First_Name'] . "123";
                $usr->save();
            }
            else{
                $usr->person_no = $user['value'][$i]['Person_No'];
                $usr->name = $user['value'][$i]['First_Name'];
                $usr->surname = $user['value'][$i]['Last_Name'];
                $usr->status = "At work";
                $usr->birth_date = substr($user['value'][$i]['Birth_Date'], 0, -10);
                $usr->gender = $user['value'][$i]['Gender'];
                $usr->education = "";
                $usr->position = $user['value'][$i]['Job_Title'];
                $usr->org_unit = $user['value'][$i]['Org_Unit_Name'];
                $usr->email = $user['value'][$i]['Company_E_Mail'];
                $usr->password = $user['value'][$i]['First_Name'] . "123";
                $usr->save();
            }
        }
    }
}

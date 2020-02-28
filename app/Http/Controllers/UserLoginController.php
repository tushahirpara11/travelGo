<?php

namespace App\Http\Controllers;

use App\user_login;
use App\login;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use DB;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
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
        $userdata = new user_login([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'mobileno' => $request->get('mobileno'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'isactive' => $request->get('isactive')
        ]);
        $check = user_login::where('mobileno', $userdata->mobileno)->orWhere('email', $userdata->email)->orWhere('username', $userdata->username)->get()->all();
        // dd(count($check));
        if (count($check) == 1) {
            ?>
            <script type="text/javascript">
                alert("User Already Exists");
                window.location.assign('/Travelgo');
            </script>;
        <?php
                } else {
                    session(['user' => $userdata->username]);
                    $userdata->save();
                    ?>
            <script type="text/javascript">
                window.location.assign('/Travelgo');
            </script>;
        <?php
                }
            }
            public function check_user(Request $request)
            {
                $userdata = new login([
                    'username' => $request->get('username'),
                    'password' => $request->get('password')
                ]);
                // dd($userdata);
                $check = user_login::where('username', $userdata->username)->Where('password', $userdata->password)->get();
                // dd(count($check));
                if (count($check) == 1) {
                    session(['user' => $userdata->username]);
                    ?>
            <script type="text/javascript">
                window.location.assign('/Travelgo');
            </script>;
        <?php
                } else {
                    ?>
            <script type="text/javascript">
                alert("Please Enter valid Username or Password");
                window.location.assign('/Travelgo');
            </script>;
        <?php
                }
            }
            public function reset(Request $request)
            {
                $email = $request->input('email');
                // dd($email);
                $check = user_login::where('email', $email)->get();
                // dd();
                if (count($check) == 1) {
                    $name = 'http://localhost/Travelgo/ResetPassowrd';
                    session(['reset'=>$check[0]->email]);
                    Mail::to($check[0]->email)->send(new SendMailable($name));
                    ?>
            <script type="text/javascript">
                alert("Email Sent Check your Email");
                window.location.assign('/Travelgo');
            </script>;
        <?php
                } else {
                    ?>
            <script type="text/javascript">
                alert("This Email is Not Register");
                window.location.assign('/Travelgo');
            </script>;
        <?php
                }
            }
            public function final_reset(Request $request)
            {
                $password = $request->input('confirm');
                // dd($password);
                $check = user_login::where('email', session('reset'))->get();                
                if (count($check) == 1) {
                    $update_pass=user_login::where('email', session('reset'))->update([
                        'password' => $password
                    ]);
                    // dd($update_pass);
                    ?>
            <script type="text/javascript">
                alert("Password Change Successfully");
                window.location.assign('/Travelgo');
            </script>;
            <?php
                        ?>
            <script type="text/javascript">
                window.location.assign('/Travelgo');
            </script>;
        <?php
                } else {
                    ?>
            <script type="text/javascript">
                alert("This Email is Not Register");
                window.location.assign('/Travelgo');
            </script>;
<?php
        }
    }
    public function getdata()
    {
        // dd(session('user'));
        $check = user_login::where('username', session('user'))->get();
        // dd($check);
        return view('editprofile')->with('userdata', $check);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_login  $user_login
     * @return \Illuminate\Http\Response
     */
    public function show(user_login $user_login)
    {
        $viewdata=user_login::get();
        return view('admin/userview')->with('viewdata',$viewdata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_login  $user_login
     * @return \Illuminate\Http\Response
     */
    public function edit(user_login $user_login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_login  $user_login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        user_login::where('username', $id)->update([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'mobileno' => $request->get('mobileno'),
            'email' => $request->get('email'),
            'username' => $id,
            'password' => $request->get('password'),
        ]);
        $userdata = DB::select("select * from user_logins where username='" . $id . "'");
        // dd($userdata);
        return redirect('editprofile')->with('userdata', $userdata);
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_login  $user_login
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $refresh = DB::delete('delete from user_logins where user_id=' . $id);        
        return \Redirect::back();                  
    }
    public function destroy()
    {
        Session::flash('user', 0);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\addhotel;
use App\addpackage;
use App\customhotel;
use App\custompackage;
use App\customplaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\pkg_bookingdetails;
use App\user_login;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function mail()
    {
        $name = 'Tushar';
        Mail::to("tusharhirpara11@gmail.com")->send(new SendMailable($name));
        return 'Email was sent';
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $user=user_login::get()->count();
        $pkg=addpackage::get()->count();
        $hotel=customhotel::get()->count();
        $places=customplaces::get()->count();
        $custombook=custompackage::get()->count();
        $booking=pkg_bookingdetails::get()->count();
        return view('admin/home')->with(['user'=>$user,'pkg'=>$pkg,'hotel'=>$hotel,'places'=>$places,'custombook'=>$custombook,'booking'=>$booking]);
    }
}

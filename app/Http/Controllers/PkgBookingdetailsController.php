<?php

namespace App\Http\Controllers;

use App\pkg_bookingdetails;
use App\addpackage;
use App\custompackage;
use Illuminate\Http\Request;
use DB;
use Carbon;
use PDF;
use Session;

class PkgBookingdetailsController extends Controller
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
        $savebook = new pkg_bookingdetails([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'package_id' => $request->package_id,
            'tourname' => $request->tour_name,
            'tourcode' => $request->tour_code,
            'traveldate' => $request->travel_date,
            'adult' => $request->adult,
            'child' => $request->child,
            'price' => ($request->adult * $request->price) + ($request->child * ($request->price / 2)),
            'currency' => $request->currency,
            'status' => 'pending'
        ]);
        $id = addpackage::where('package_id', $request->package_id)->get();
        if ($savebook->traveldate > Carbon\Carbon::now()->toDateString()) {
            if ($savebook->traveldate <= $id[0]->validto) {
                $savebook->save();
            } else {
                $msgfalse = "Select Date Betweeen Travel Period.";
                \Session::flash('book_date', $msgfalse);
                return \Redirect::back();
            }
        } else {
            $msgfalse = "Please Enter Valid Date.";
            \Session::flash('wrong_book_date', $msgfalse);
            return \Redirect::back();            
        }
        // dd(Session::get('user'));
        $booking = DB::table('pkg_bookingdetails')->where('User_name', session('user'))->get();
        $custombooking = custompackage::where('user_name', session('user_name'))->get();
        dd($custombooking);
        return view('mybooking')->with(['booking' => $booking, 'custombooking' => $custombooking]);
        // return view('mybooking')->with(['booking' => $booking]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pkg_bookingdetails  $pkg_bookingdetails
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $viewdata = pkg_bookingdetails::get();
        // dd($viewdata);
        return view('admin/viewbooking')->with('viewdata', $viewdata);
    }
    public function report(Request $request)
    {
        $viewdata = pkg_bookingdetails::whereBetween('Traveldate', [$request->input('startingdate'), $request->input('endingdate')])->get();
        return view('admin/bookingreport')->with(['viewdata' => $viewdata, 'startingdate' => $request->input('startingdate'), 'endingdate' => $request->input('endingdate')]);
    }
    public function pdfview(Request $request)
    {
        $items = pkg_bookingdetails::whereBetween('Traveldate', [$request->input('startingdate'), $request->input('endingdate')])->get();
        // dd($items);
        if (count($items) > 0) {
            session(['book' => $items]);
        }
        view()->share('items', session('book'));
        if ($request->has('download')) {
            $pdf = PDF::loadView('admin/BookingPDFview');
            return $pdf->download('BookingReport.pdf');
        }
        return view('admin/BookingPDFview');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pkg_bookingdetails  $pkg_bookingdetails
     * @return \Illuminate\Http\Response
     */
    public function edit(pkg_bookingdetails $pkg_bookingdetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pkg_bookingdetails  $pkg_bookingdetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pkg_bookingdetails $pkg_bookingdetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pkg_bookingdetails  $pkg_bookingdetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $refresh = DB::delete('delete from pkg_bookingdetails where BkgId=' . $id);
        return \Redirect::back();
    }
}

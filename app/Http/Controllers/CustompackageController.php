<?php

namespace App\Http\Controllers;

use Session;
use App\custompackage;
use App\City;
use App\customhotel;
use App\customplaces;
use DB;
use PDF;

use Illuminate\Http\Request;

class CustompackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['date' => $request->input('date')]);
        session(['days' => $request->input('days')]);
        session(['tocity' => $request->input('tocity')]);
        session(['star' => $request->input('star')]);
        session(['transport' => $request->input('transport')]);
        $citydata = DB::select("select city_id from cities where city_name='" . session('tocity') . "'");
        //find customplaces        
        $places = customplaces::where('city_id', $citydata[0]->city_id)->get();
        // dd($places);
        //check count > 0 than find hotel other wise not        
        if (count($places) > 0) {
            $hotel = customhotel::where('city_id', $citydata[0]->city_id)->get();
        } else
            return view('customselection')->with('No Such Record Found');
        return view('customselection')->with(['places' => $places, 'hotel' => $hotel]);
    }

    public function book(Request $request)
    {
        $book = new custompackage([
            'place_visit' => $request->input('places'),
            'hotels' => $request->input('hotel_name'),
            'name' => $request->input('name'),
            'user_name' => $request->input('user_name'),
            'departure_date' => $request->input('travel_date'),
            'arrival_date' => $request->input('return_date'),
            'adults' => $request->input('adult'),
            'child' => $request->input('child'),
            'days' => $request->input('days'),
            'nights' => $request->input('nights'),
            'mode_transport' => $request->input('mode_transport'),
            'tour_price' => $request->input('price'),
        ]);
        $book->save();
        $booking = DB::table('pkg_bookingdetails')->where(['User_name' => Session::get('user')])->get();
        $custombooking = custompackage::where('user_name', session('user_name', session('user')))->get();
        // dd($book);
        return view('mybooking')->with(['booking' => $booking, 'custombooking' => $custombooking]);
    }
    public function view()
    {
        $viewdata = custompackage::get();
        return view('admin/viewcustombooking')->with(['viewdata' => $viewdata]);
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
     * @param  \App\custompackage  $custompackage
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // session(['place' => $request->input('place')]);
        $data = $request->input('place');
        session(['place' => $data]);
        session(['hotel' => $request->input('hotel')]);
        session(['adult' => $request->input('adult')]);
        session(['child' => $request->input('child')]);
        $places = DB::select("select * from customplaces where place_id IN (" . implode(",", session('place')) . ")");
        $hotel = customhotel::where('hotel_id', session('hotel'))->get();
        //  dd($hotel);
        return view('custom_package_view')->with(['places' => $places, 'hotel' => $hotel]);
    }
    public function report(Request $request)
    {
        $viewdata = custompackage::whereBetween('departure_date', [$request->input('startingdate'), $request->input('endingdate')])->get();
        // dd($viewdata);
        return view('admin/custombookingreport')->with(['viewdata' => $viewdata, 'startingdate' => $request->input('startingdate'), 'endingdate' => $request->input('endingdate')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\custompackage  $custompackage
     * @return \Illuminate\Http\Response
     */
    public function edit(custompackage $custompackage)
    {
        //
    }
    public function pdfview(Request $request)
    {
        $items = custompackage::whereBetween('departure_date', [$request->input('startingdate'), $request->input('endingdate')])->get();
        if (count($items) > 0) {
            session(['custombook' => $items]);
        }
        view()->share('items', session('custombook'));
        if ($request->has('download')) {
            $pdf = PDF::loadView('admin/CustomBookingPDFview');
            return $pdf->download('CustomBookingReport.pdf');
        }
        return view('admin/CustomBookingPDFview');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\custompackage  $custompackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, custompackage $custompackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\custompackage  $custompackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $refresh = DB::delete('delete from custompackages where tour_id=' . $id);
        return \Redirect::back();
    }
}

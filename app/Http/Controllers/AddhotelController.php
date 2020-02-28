<?php

namespace App\Http\Controllers;

use App\addhotel;
use App\updatehotel;
use Illuminate\Http\Request;
use DB;
use App\Exports\HotelExport;
use App\Imports\HotelImport;
use Maatwebsite\Excel\Facades\Excel;

class AddhotelController extends Controller
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
    public function view()
    {
        $viewdata = DB::table('addhotels')->select(
            'hotel_master_id',
            'package_id',
            'hm_starcategory',
            'hm_name',
            'city_id',
            'hm_noofnights',
            'hm_address'
        )->get();
        // print_r($datas);
        // dd('datas', compact('datas'));
        return view('admin/viewhotel')->with('viewdata', $viewdata);
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
        $insertdata = new addhotel([
            'package_id' => $request->get('package_id'),
            'hm_starcategory' => $request->get('hm_starcategory'),
            'hm_name' => $request->get('hm_name'),
            'city_id' => $request->get('city_id'),
            'hm_noofnights' => $request->get('hm_noofnights'),
            'hm_address' => $request->get('hm_address')
        ]);
        $count = addhotel::where('hm_name', $insertdata->hm_name)->where('package_id', $insertdata->package_id)->get();
        // dd(count($count));
        if (count($count) == 1) {
            $msgfalse = "Hotel Exists..!";
            \Session::flash('hotel_exist', $msgfalse);
            return \Redirect::back();
        } else {
            $insertdata->save();
            if (isset($insertdata)) {
                echo "<alert type='text/javascript'>Record inserted successfully</alert>";
                return \Redirect::back();
            } else {
                echo "<alert type='text/javascript'>Something went Worng</alert>";
                return \Redirect::back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function show(addhotel $addhotel)
    {
        //
    }
    public function updatehotel($id)
    {
        $viewdata = DB::select('select * from addhotels where hotel_master_id=' . $id);
        $selected = DB::select('select * from addpackages where package_id=' . $viewdata[0]->package_id);
        $allcode = DB::select('select * from addpackages');
        $city = DB::select('select * from cities where city_id=' . $viewdata[0]->city_id);
        $allcity = DB::table('cities')->get();
        return view('admin/updatehotelchange')->with(['selected' => $selected, 'allcode' => $allcode, 'viewdata' => $viewdata, 'city' => $city, 'allcity' => $allcity]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function edit(addhotel $addhotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedata = DB::select('select * from addhotels where hotel_master_id=' . $id);
        $updatedata = new updatehotel();
        $updatedata->package_id = $request->get('package_id');
        $updatedata->hm_starcategory = $request->get('hm_starcategory');
        $updatedata->hm_name = $request->get('hm_name');
        $updatedata->city_id = $request->get('city_id');
        $updatedata->hm_noofnights = $request->get('hm_noofnights');
        $updatedata->hm_address = $request->get('hm_address');
        addhotel::where('hotel_master_id', $id)->update(array(
            'city_id' => $updatedata->city_id,
            'package_id' => $updatedata->package_id,
            'hm_name' => $updatedata->hm_name,
            'hm_address' => $updatedata->hm_address,
            'hm_starcategory' => $updatedata->hm_starcategory,
            'hm_noofnights' => $updatedata->hm_noofnights
        ));
        if (isset($updatedata)) {
            echo "<alert type='text/javascript'>Record Updated successfully</alert>";
            return \Redirect('admin/viewhotel');
        } else {
            echo "<alert type='text/javascript'>Something went Worng</alert>";
            return \Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\addhotel  $addhotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refresh = DB::delete('delete from addhotels where hotel_master_id=' . $id);
        // dd($refresh);        
        return \Redirect::back();
    }

    public function importExportView()
    {
       return view('hotelimport');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new HotelExport, 'HotelData.csv');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new HotelImport,request()->file('file'));           
        return back();
    }
}

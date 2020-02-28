<?php

namespace App\Http\Controllers;

use App\customplaces;
use Illuminate\Http\Request;
use DB;
use App\updatecustomplaces;

class CustomplacesController extends Controller
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
    public function selectplaces($id)
    {
        $viewdata = DB::select('select * from customplaces where place_id=' . $id);
        $selectcity = DB::select('select * from cities where city_id=' . $viewdata[0]->city_id);
        $cities = DB::table('cities')->get();
        return view('admin/updatecustomplaces')->with(['viewdata' => $viewdata, 'selectcity' => $selectcity, 'cities' => $cities]);
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
        $insertdata = new customplaces([
            'city_id' => $request->get('city_id'),
            'place_name' => $request->get('place_name'),
            'place_timing_details' => $request->get('place_timing_details'),
            'place_Image1' => $request->get('place_Image1'),
            'place_Image2' => $request->get('place_Image2'),
            'place_price' => $request->get('place_price'),
        ]);
        for ($i = 1; $i <= 2; $i++) {
            $image[$i] = $request->file('place_Image' . $i);
            if ($image[$i] != "") {
                $old_image = $insertdata->place_Image . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('place_Image' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["place_Image" . $i] = "packageimages/" . $imagename;
                }
                $insertdata->fill(array("place_Image" . $i => $input["place_Image" . $i]));
            }
        }
        $count = customplaces::where('city_id', $insertdata->city_id)->where('place_name', $insertdata->place_name)->get();
        // dd(count($count));
        if (count($count) == 1) {
            $msgfalse = "Place Exists..!";
            \Session::flash('place_exists', $msgfalse);
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
    public function view()
    {
        $viewdata = DB::select('select * from  customplaces');
        return view('admin/viewcustomplaces')->with('viewdata', $viewdata);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\customplaces  $customplaces
     * @return \Illuminate\Http\Response
     */
    public function show(customplaces $customplaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customplaces  $customplaces
     * @return \Illuminate\Http\Response
     */
    public function edit(customplaces $customplaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customplaces  $customplaces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatedata = DB::select('select * from customplaces where place_id=' . $id);
        $updatedata = new updatecustomplaces();
        $updatedata->city_id = $request->get('city_id');
        $updatedata->place_name = $request->get('place_name');
        $updatedata->place_timing_details = $request->get('place_timing_details');
        $updatedata->place_price = $request->get('place_price');
        for ($i = 1; $i <= 2; $i++) {
            $image[$i] = $request->file('place_Image' . $i);
            if ($image[$i] != "") {
                $old_image = $updatedata->place_Image . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('place_Image' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["place_Image" . $i] = "packageimages/" . $imagename;
                }
                $updatedata->fill(array("place_Image" . $i => $input["place_Image" . $i]));
            } else {
                $image[$i] = $request->get('hidden_place_Image' . $i);
                // dd($image[$i]);
                $updatedata->fill(array("place_Image" . $i => $image[$i]));
            }
        }
        customplaces::where('place_id', $id)->update(array(

            'city_id' => $updatedata->city_id,
            'place_name' => $updatedata->place_name,
            'place_timing_details' => $updatedata->place_timing_details,
            'place_Image1' => $updatedata->place_Image1,
            'place_Image2' => $updatedata->place_Image2,
            'place_price' => $updatedata->place_price
        ));
        // dd($updatedata);
        if (isset($updatedata)) {
            echo "<alert type='text/javascript'>Record Updated successfully</alert>";
            return \Redirect('admin/viewcustomplaces');
        } else {
            echo "<alert type='text/javascript'>Something went Worng</alert>";
            return \Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customplaces  $customplaces
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refresh = DB::delete('delete from customplaces where place_id=' . $id);
        // dd($refresh);        
        return \Redirect::back();
    }
}

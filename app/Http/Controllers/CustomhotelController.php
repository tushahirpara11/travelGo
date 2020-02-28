<?php

namespace App\Http\Controllers;

use App\customhotel;
use App\customplaces;
use Illuminate\Http\Request;
use DB;
use App\updatecustomhotel;


class CustomhotelController extends Controller
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
    public function selecthotel($id)
    {
        $viewdata = DB::select('select * from customhotels where hotel_id=' . $id);
        $selectcity = DB::select('select * from cities where city_id=' . $viewdata[0]->city_id);
        $cities = DB::table('cities')->get();
        return view('admin/update_custom_hotel')->with(['viewdata' => $viewdata, 'selectcity' => $selectcity, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertdata = new customhotel([
            'city_id' => $request->get('city_id'),
            'hotel_name' => $request->get('hotel_name'),
            'hotel_address' => $request->get('hotel_address'),
            'hotel_starCategory' => $request->get('hotel_starCategory'),
            'hotel_price' => $request->get('hotel_price'),
        ]);
        for ($i = 1; $i <= 3; $i++) {
            $image[$i] = $request->file('hotel_Image' . $i);
            if ($image[$i] != "") {
                $old_image = $insertdata->hotel_Image . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('hotel_Image' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["hotel_Image" . $i] = "packageimages/" . $imagename;
                }
                $insertdata->fill(array("hotel_Image" . $i => $input["hotel_Image" . $i]));
            }
        }
        $count = customhotel::where('city_id', $insertdata->city_id)->where('hotel_name', $insertdata->hotel_name)->get();
        // dd(count($count));        
        if (count($count) == 1) {
            $msgfalse = "Hotel alredy Exists..!";
            \Session::flash('custom_hotel_exist', $msgfalse);
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
        $insertdata->save();
        if (isset($insertdata)) {
            echo "<alert type='text/javascript'>Record inserted successfully</alert>";
            return \Redirect::back();
        } else {
            echo "<alert type='text/javascript'>Something went Worng</alert>";
            return \Redirect::back();
        }
    }

    public function view()
    {
        $viewdata = DB::select('select * from  customhotels');
        return view('admin/viewcustomhotel')->with('viewdata', $viewdata);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\customhotel  $customhotel
     * @return \Illuminate\Http\Response
     */
    public function show(customhotel $customhotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customhotel  $customhotel
     * @return \Illuminate\Http\Response
     */
    public function edit(customhotel $customhotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customhotel  $customhotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $updatedata = DB::select('select * from customhotels where hotel_id=' . $id);
        $updatedata = new updatecustomhotel();
        $updatedata->city_id = $request->get('city_id');
        $updatedata->hotel_name = $request->get('hotel_name');
        $updatedata->hotel_address = $request->get('hotel_address');
        $updatedata->hotel_starCategory = $request->get('hotel_starCategory');
        $updatedata->hotel_price = $request->get('hotel_price');
        for ($i = 1; $i <= 3; $i++) {
            $image[$i] = $request->file('hotel_Image' . $i);
            if ($image[$i] != "") {
                $old_image = $updatedata->hotel_Image . $i;
                $filename = base_path('storage/' . $old_image);
                $image[$i] = $request->file('hotel_Image' . $i);
                if (!empty($image[$i])) {
                    if (file_exists($filename) && !empty($old_image)) {
                        unlink(base_path('storage/' . $old_image));
                    }
                    $imagename = imgupload($image[$i], "packageimages");
                    $input["hotel_Image" . $i] = "packageimages/" . $imagename;
                }
                $updatedata->fill(array("hotel_Image" . $i => $input["hotel_Image" . $i]));
            } else {
                $image[$i] = $request->get('hidden_hotel_Image' . $i);
                // dd($image[$i]);
                $updatedata->fill(array("hotel_Image" . $i => $image[$i]));
            }
        }
        customhotel::where('hotel_id', $id)->update(array(

            'city_id'=> $updatedata->city_id,
            'hotel_name'=> $updatedata->hotel_name,
            'hotel_address'=> $updatedata->hotel_address,
            'hotel_starCategory'=> $updatedata->hotel_starCategory,
            'hotel_price'=> $updatedata->hotel_price,            
            'hotel_Image1'=> $updatedata->hotel_Image1,
            'hotel_Image2'=> $updatedata->hotel_Image2,
            'hotel_Image3'=> $updatedata->hotel_Image3,
        ));
        // dd($updatedata);
        if (isset($updatedata)) {
            echo "<alert type='text/javascript'>Record Updated successfully</alert>";
            return \Redirect('admin/viewcustomhotel');
        } else {
            echo "<alert type='text/javascript'>Something went Worng</alert>";
            return \Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customhotel  $customhotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refresh = DB::delete('delete from customhotels where hotel_id=' . $id);
        // dd($refresh);        
        return \Redirect::back();
    }
}

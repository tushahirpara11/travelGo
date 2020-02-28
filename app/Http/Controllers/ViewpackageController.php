<?php

namespace App\Http\Controllers;

use App\viewpackage;
use App\addpackage;
use Illuminate\Http\Request;
use DB;

class ViewpackageController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\viewpackage  $viewpackage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::table('addpackages')->where('package_id',$id)->get();
        $hotel=DB::table('addhotels')->where('package_id',$data[0]->package_id)->get();
        // dd($data);
        return view('viewpackage')->with(['data'=>$data,'hotel'=>$hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\viewpackage  $viewpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(viewpackage $viewpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\viewpackage  $viewpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, viewpackage $viewpackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\viewpackage  $viewpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(viewpackage $viewpackage)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\States;
use Illuminate\Http\Request;

class StatesController extends Controller
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

    public function create()
    {
        // $states = States::select('state_name', 'state_id')->get();
        // // dd($states);
        // return view('addpackage',['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
     * @param  \App\States  $states
     * @return \Illuminate\Http\Response
     */
    public function show(States $states)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\States  $states
     * @return \Illuminate\Http\Response
     */
    public function edit(States $states)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\States  $states
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, States $states)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\States  $states
     * @return \Illuminate\Http\Response
     */
    public function destroy(States $states)
    {
        //
    }
}

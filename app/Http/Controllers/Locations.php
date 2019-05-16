<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;
use DB;

class Locations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $location_detail = DB::table('locations')
                            ->where('user_id',$user_id)
                            ->get();
        return view('location/index')->with('location_detail',$location_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location/add_location');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $location = new Location;
        $location->user_id = auth()->user()->id;
        //dd($location);
        $location->customer_type = $request->input('customer_type');
        $location->location_name = $request->input('location_name');
        //dd($location);
        $location->save();
        return redirect('/location')->with('success',"Location added successfully");
        // $account->user_id = auth()->user()->id;
        // $account->account_type = $request->input('customer_type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);
        return view('location/edit_location')->with('location',$location);
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
        $location = Location::find($id);
        $location->user_id = auth()->user()->id;
        $location->customer_type = $request->input('customer_type');
        $location->location_name = $request->input('location_name');
        //dd($location);
        $location->save();
        return redirect('/location')->with('success',"Location updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();
        return redirect('/location')->with('warning',"Location Deleted Successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\User;
use App\Account;
use Auth;
use DB;

class Locations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission']);
    }
    
    public function index()
    {
        if (Auth::user()->user_role != 1) { //Other than Global Admin
            $account_id = Auth::user()->account_id;
            $location_detail = DB::table('locations')
                        ->join('accounts',"locations.account_id","=","accounts.id")
                        ->where('account_id',$account_id)
                        ->select('locations.*')
                        ->get();
                        
        }
        else{
            $location_detail = Location::all();
        }
        return view('location/index')->with('location_detail',$location_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_role !=1) {
            $customers = DB::table('accounts')
                            ->where('id',Auth::user()->account_id)
                            ->get();
        }else{
            $customers = Account::all();
        }
        return view('location/add_location')->with('customers',$customers);
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
        $location->created_by = Auth::user()->id;
        $location->account_id = $request->input('account_id');
        //$location->customer_type = $request->input('customer_type');
        $location->location_name = $request->input('location_name');
        $location->save();
        return redirect('/location')->with('success',"Location added successfully");
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
        if (Auth::user()->user_role !=1) {
            $customers = DB::table('accounts')
                            ->where('id',Auth::user()->account_id)
                            ->get();
        }else{
            $customers = Account::all();
        }
        $location = Location::find($id);
        return view('location/edit_location',compact(['location','customers']));
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
        $location->created_by = auth()->user()->id;
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
        return redirect('/location')->with('danger',"Location Deleted Successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Report;
use App\Location;
use APP\Report_image;
use Auth;
use DB;

class Reports extends Controller
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
            $report_detail = DB::table('reports')
                        ->join('accounts',"reports.account_id","=","accounts.id")
                        // ->join('locations',"reports.location_id","=","locations.id")
                        ->where('account_id',$account_id)
                        ->select('reports.*')
                        ->get();
           // dd($report_detail);
        }
        else{
            // $report_detail = Report::all();
            $report_detail = DB::table('reports')
                        ->join('locations','reports.location_id','=','locations.id')
                        ->select('reports.*','locations.location_name')
                        ->get();
        }
        return view('reports/index', compact("report_detail"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id = Auth::user()->account_id;
        if(Auth::user()->user_role != 1){
            $manager_detail = DB::table('users')
                        ->where('user_role',3)
                        ->where('account_id',$account_id)
                        ->get();
        }else{
            $manager_detail = DB::table('users')
                            ->where('user_role',3)
                            ->get();
        }
        
        /*
        else if(Auth::user()->user_role == 2){ // Administrator
            $location = DB::table('locations')
                        ->where('account_id', Auth::user()->account_id)
                        ->get();
        }
        else if(Auth::user()->user_role == 1){ // Global Administrator
            $location = DB::table('locations')
                        ->get();
        }*/
        return view('reports/add_report')->with('manager_detail',$manager_detail);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $report = new Report;
        $report->created_by = Auth::user()->id;
        $report->account_id = Auth::user()->account_id;
        $report->location_id =  $request->input('location_id');
        $report->vehicle_type = $request->input('vehicle_type');
        $report->steer_wheel_position = $request->input('small_wheel');
        $report->front_wheel_position = $request->input('front_wheel');
        $report->rear_wheel_position = $request->input('rear_wheel');
        $report->weight = $request->input('weight');
        $report->report_unit_num = $request->input('unit_number');
        $report->name = $request->input('name');
        $report->manager_id = $request->input('manager_id');
        $report->comments = $request->input('comments');

        //$report->user_id = auth()->user()->id;
        //dd($report);
        $report->save();
        return redirect('/reports')->with('success','Reports Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report_detail = Report::find($id);
        $user = User::all();
        dd($user);
        //dd($report_detail);
        //$location = Location::find($id);
        //dd($location);

        return view('reports/view_report',compact(['report_detail']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function upload_file(Request $request){
    //     echo "test";
    //     //$path = $request->file('file')->store('upload');
    //     //
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Report;
use App\Location;
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
        $account_id = Auth::user()->account_id;
        $report_detail = DB::table('reports')
                            ->where('account_id',$account_id)
                            ->get();
        return view('reports/index', compact("report_detail"));
       // return view('reports/index')->with('report_detail',$report_detail);
        // $user = User::find(1);
        // foreach($user->reports as $a):
        //     echo $a->vehicle_type."<br>";
        // endforeach;
        //echo '<pre>'; print_r(); exit;
        //dd("test");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_id = Auth::user()->account_id;
        $manager_detail = DB::table('users')
                    ->where('user_role',3)
                    ->where('account_id',$account_id)
                    ->get();
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
        $location = Location::find($id);
        return view('reports/view_report')->with('report_detail',$report_detail)->with('location',$location);
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
}

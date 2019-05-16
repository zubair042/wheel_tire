<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Report;
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
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user_id = auth()->user()->id;
        $report_detail = DB::table('reports')
                            ->where('user_id',$user_id)
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
        return view('reports/add_report');
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
        $report->user_id = auth()->user()->id;
        $report->vehicle_type = $request->input('vehicle_type');
        $report->wheel_option1 = $request->input('small_wheel');
        $report->wheel_option2 = $request->input('front_wheel');
        $report->wheel_option3 = $request->input('rear_wheel');
        $report->weight = $request->input('weight');
        $report->report_unit_num = $request->input('unit_number');
        $report->technition_name = $request->input('name');
        $report->position_at_company = $request->input('position_at_company');
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

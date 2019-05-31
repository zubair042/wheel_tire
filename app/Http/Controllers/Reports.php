<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use App\Report;
use App\Location;
use Illuminate\Support\Facades\Mail;
use JD\Cloudder\Facades\Cloudder;
use App\Mail\SendEmail;
use App\Comment;
use App\Report_image;
use Auth;
use DB;
//use Mail;

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
                        ->join('accounts','reports.account_id','=','accounts.id')
                        ->join('users',"reports.signature_by","=","users.id",'left outer')
                        ->join('comments','reports.id','=','comments.report_id','left outer')
                        ->where('reports.account_id',$account_id)
                        ->select('reports.*','comments.comments','users.first_name','users.last_name')
                        ->orderBy('reports.id','DESC')
                        ->get();
                        //dd($report_detail);
        }
        else{
            $report_detail = DB::table('reports')
                        ->join('locations','reports.location_id','=','locations.id','left outer')
                        ->join('comments','reports.id','=','comments.report_id','left outer')
                        ->join('users',"reports.signature_by","=","users.id",'left outer')
                        ->select('reports.*','locations.location_name','comments.comments','users.first_name','users.last_name')
                        ->orderBy('reports.id','DESC')
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
        $power_unit_left_stear = $request->file('power_unit_left_stear');
        $power_unit_right_stear = $request->file('power_unit_right_stear');
        $power_unit_left_front = $request->file('power_unit_left_front');
        $power_unit_right_front = $request->file('power_unit_right_front');
        $power_unit_left_rear = $request->file('power_unit_left_rear');
        $power_unit_right_rear = $request->file('power_unit_right_rear');
        $trailer_left_front = $request->file('trailer_left_front');
        $trailer_right_front = $request->file('trailer_right_front');
        $trailer_left_rear = $request->file('trailer_left_rear');
        $trailer_right_rear = $request->file('trailer_right_rear');
       // echo "<pre>"; print_r($power_unit_left_stear);exit;
        //$files = array();
        // $files = array_merge(
        //             (array)$power_unit_left_stear,(array)$power_unit_right_stear,
        //             (array)$power_unit_left_front,(array)$power_unit_right_front,
        //             (array)$power_unit_left_rear,(array)$power_unit_right_rear,
        //             (array)$trailer_left_front,(array)$trailer_left_rear,
        //             (array)$trailer_right_rear,(array)$trailer_right_front
        //         );
        //upload image
        foreach ($power_unit_left_stear as $pls) {
            $file = $pls->getRealPath();
            $cloud = Cloudder::upload($file, null);
            $c = Cloudder::getResult();
            $url = $c["url"];

            $image = new Report_image; 
            //$image->report_id = $id;
            $image->url = $url;
            $image->image_type = $pls->getClientOriginalExtension();
            //$image->image_type = $type;
            $image->created_by = Auth::user()->id;
            $image->save();
            //print_r($file);exit;
        }
        //$type = $request->input('name');
       
        




      //  if (isset($files)) {
        //     echo "<pre>"; print_r($files); exit;
        // //}
        // //$files = $request->file('power_unit_left_stear');
        // foreach ($files as $file) {
        // echo "<pre>"; print_r($file->getRealPath()); exit;
            
        // }
        // exit;
 
        // $this->validate($request,[
        //    'file'=>'required',
        // ]);

        // // Test path
        // //$file = "https://cdn.pixabay.com/photo/2014/06/03/19/38/board-361516__340.jpg";
        // $type = $request->input('name');
        // $file = $request->file('file')->getRealPath();

        // $cloud = Cloudder::upload($file, null);
        // $c = Cloudder::getResult();
        // $url = $c["url"];

        // $image = new Report_image; 
        // //$image->report_id = $id;
        // $image->url = $url;
        // //$image->image_type = $request->file->getClientOriginalExtension();
        // $image->image_type = $type;
        // $image->created_by = Auth::user()->id;
        // $image->save();


        //Mail::to("usama52966@gmail.com")->send(new SendEmail());
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
        $manager_info = User::find($report->manager_id);
        $manager_email = $manager_info->email;
        //dd($manager_email );
        $report->comment = $request->input('comments');
        
        $report->save();
        
        // $emails = ['usama52966@gmail.com'];
        // $message = 'asdfasdf';
        // Mail::send('emails.welcome', [], function($message) use ($manager_email){    
        //     $message->to($manager_email)->subject('wheels.mobilemaintaince');
        // });
        // var_dump( Mail:: failures());
        Mail::to($manager_email)->send(new SendEmail());
        //echo "<pre>"; print_r(new SendEmail()); exit;
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
        // $report_detail = Report::find($id);
        $report_detail = DB::table('reports')
                            ->join('users','reports.signature_by','=','users.id','left outer')
                            ->where('reports.id',$id)
                            ->select('reports.*','users.first_name','users.last_name')
                            ->first();
        // dd($report_detail);
        $user = DB::table('users')
                    ->where('user_role',Auth::user()->user_role)
                    ->where('id',Auth::user()->id)
                    ->first();
        $comment = DB::table('comments')
                    ->where('report_id',$report_detail->id)
                    //->where('created_by',Auth::user()->id)
                    ->first();
        $images = DB::table('report_images')
                    ->where('report_id',$report_detail->id)
                    ->get();
        //dd($images) ;          
        return view('reports/view_report',compact(['report_detail','user','comment','images']));
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
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }

    public function signature()
    {
        $signed = DB::table('reports')
                    ->where('id',$_POST['id'])
                    ->update(['signature' => 1 , 'signature_by'=> Auth::user()->id , 'signature_on' => date('Y-m-d H:i:s')]);

    }
}

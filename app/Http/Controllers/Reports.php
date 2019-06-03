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
                        ->where('reports.account_id',$account_id)
                        ->select('reports.*','users.first_name','users.last_name')
                        //->orderBy('reports.id','DESC')
                        ->get();
        }
        else{
            $report_detail = DB::table('reports')
                        ->join('locations','reports.location_id','=','locations.id','left outer')
                        ->join('users',"reports.signature_by","=","users.id",'left outer')
                        ->select('reports.*','locations.location_name','users.first_name','users.last_name')
                        //->orderBy('reports.created_at','desc')
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
        $account_id         = Auth::user()->account_id;

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
        // if($request->input('trailer_left_front') == 1){
        // } 
        // if($request->input('trailer_right_front') == 1){
        // } 
        // if($request->input('trailer_left_rear') == 1){
        // } 
        // if($request->input('trailer_right_rear') == 1){
        // } 
        // if($request->input('power_unit_left_stear') == 1){
        // } 
        // if($request->input('power_unit_right_stear') == 1){
        // } 
        // if($request->input('power_unit_left_front') == 1){
        // } 
        // if($request->input('power_unit_right_front') == 1){
        // } 
        // if($request->input('power_unit_left_rear') == 1){
        // } 
        // if($request->input('power_unit_right_rear') == 1){
        // }            
        $power_unit_left_stear  = $request->file('power_unit_left_stear');
        $power_unit_right_stear = $request->file('power_unit_right_stear');
        $power_unit_left_front  = $request->file('power_unit_left_front');
        $power_unit_right_front = $request->file('power_unit_right_front');
        $power_unit_left_rear   = $request->file('power_unit_left_rear');
        $power_unit_right_rear  = $request->file('power_unit_right_rear');
        $trailer_left_front     = $request->file('trailer_left_front');
        $trailer_right_front    = $request->file('trailer_right_front');
        $trailer_left_rear      = $request->file('trailer_left_rear');
        $trailer_right_rear     = $request->file('trailer_right_rear');


        //Mail::to("usama52966@gmail.com")->send(new SendEmail());
        $report = new Report;
        $report->created_by             = Auth::user()->id;
        $report->account_id             = Auth::user()->account_id;
        $report->location_id            = $request->input('location_id');
        $report->vehicle_type           = $request->input('vehicle_type');
        $report->steer_wheel_position   = $request->input('small_wheel');
        $report->front_wheel_position   = $request->input('front_wheel');
        $report->rear_wheel_position    = $request->input('rear_wheel');
        $report->weight                 = $request->input('weight');
        $report->report_unit_num        = $request->input('unit_number');
        $report->name                   = $request->input('name');
        $report->manager_id             = $request->input('manager_id');
        $report->comment                = $request->input('comments');
        $manager_info                   = User::find($report->manager_id);
        $manager_email                  = $manager_info->email;
        $report->save();
        $reportId                       = $report->id;

        // $emails = ['usama52966@gmail.com'];
        // $message = 'asdfasdf';
        // Mail::send('emails.welcome', [], function($message) use ($manager_email){    
        //     $message->to($manager_email)->subject('wheels.mobilemaintaince');
        // });
        // var_dump( Mail:: failures());
        //Mail::to($manager_email)->send(new SendEmail());
        //echo "<pre>"; print_r(new SendEmail()); exit;
       
       
       
        //upload photo to cloudnairy
        $picArr = array();

        //trailer array
        $picArr['trailer_left_front']         = $this->uploadCloudinary($trailer_left_front);
        $picArr['trailer_right_front']        = $this->uploadCloudinary($trailer_right_front);
        $picArr['trailer_left_rear']          = $this->uploadCloudinary($trailer_left_rear);
        $picArr['trailer_right_rear']         = $this->uploadCloudinary($trailer_right_rear);

        //power unit
        $picArr['power_unit_left_stear']      = $this->uploadCloudinary($power_unit_left_stear);
        $picArr['power_unit_right_stear']     = $this->uploadCloudinary($power_unit_right_stear);
        $picArr['power_unit_left_front']      = $this->uploadCloudinary($power_unit_left_front);
        $picArr['power_unit_right_front']     = $this->uploadCloudinary($power_unit_right_front);
        $picArr['power_unit_left_rear']       = $this->uploadCloudinary($power_unit_left_rear);
        $picArr['power_unit_right_rear']      = $this->uploadCloudinary($power_unit_right_rear);
       
        foreach($picArr as $type =>$typeArr){
            foreach($typeArr as $pic){
                if($pic != null){
                    $data['report_id']        = $reportId;
                    $data['image_type']       = $type;
                    $data['url']              = $pic;
                    $data['create_by']        = Auth::user()->id;
                    
                    $image = new Report_images;
                    $image->saveImage($data);
                }
            }
        }
        $reporturl = '/report/view/'.$reportId;
        return redirect($reporturl)->with('success','Reports Added Successfully');
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
        $report_detail  = DB::table('reports')
                            ->join('users','reports.signature_by','=','users.id','left outer')
                            ->join('locations','reports.location_id','=','locations.id','left outer')
                            ->where('reports.id',$id)
                            ->select('reports.*','users.first_name','users.last_name','locations.location_name')
                            ->first();

        $user           = DB::table('users')
                            ->where('user_role',Auth::user()->user_role)
                            ->where('id',Auth::user()->id)
                            ->first();

        $comments        = DB::table('comments')
                            ->join('users','users.id','=','comments.created_by')
                            ->where('report_id',$report_detail->id)
                            ->get();
                            //dd($comments);

        $images         = DB::table('report_images')
                            ->where('report_id',$report_detail->id)
                            ->get(); 

        return view('reports/view_report',compact(['report_detail','user','comments','images']));
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
        $signed     = DB::table('reports')
                        ->where('id',$_POST['id'])
                        ->update(['signature' => 1 , 'signature_by'=> Auth::user()->id , 'signature_on' => date('Y-m-d H:i:s')]);

    }
    public function uploadCloudinary($fileArr){
        $returnVal      = array();
        if ($fileArr!=null){
            foreach($fileArr as $file){
                $cloudFile  = $file->getRealPath();
                $cloud      = Cloudder::upload($cloudFile, null);
                $c          = Cloudder::getResult();
                $url        = $c["url"];
                array_push($returnVal, $url);
            }
        }
        return $returnVal;
    }
}

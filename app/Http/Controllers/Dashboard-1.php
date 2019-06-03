<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Role;
use App\Module_permission;


class Dashboard extends Controller
{
	public function __construct(){
        $this->middleware(['auth', 'permission']);
    }

    public function index(){
    	// $account_id = Auth::user()->account_id;
     //    //$user_id = auth()->user()->id;
     //    $report_detail = DB::table('reports')
     //                        ->where('account_id',$account_id)
     //                        ->get();
    	// return view('dashboard/index',compact("report_detail"));
        
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
}

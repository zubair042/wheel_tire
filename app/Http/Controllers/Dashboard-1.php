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
    	$user_id = Auth::user()->id;
        //$user_id = auth()->user()->id;
        $report_detail = DB::table('reports')
                            ->where('user_id',$user_id)
                            ->get();
    	return view('dashboard/index',compact("report_detail"));

        
    }
}

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
    	$account_id = Auth::user()->account_id;
        //$user_id = auth()->user()->id;
        $report_detail = DB::table('reports')
                            ->where('account_id',$account_id)
                            ->get();
    	return view('dashboard/index',compact("report_detail"));

        
    }
}

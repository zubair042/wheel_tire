<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use Auth;
use DB;

class Accounts extends Controller
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
        $user_id = Auth::user()->id;
        $account_detail = DB::table('accounts')
                            ->where('user_id',$user_id)
                            ->get();
        return view('accounts/index')->with('account_detail',$account_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_type = DB::table('account_types')->get();
        return view('accounts/add_account')->with('account_type',$account_type);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account;
        $account->user_id = Auth::user()->id;
        $account->account_id = $request->input('account_id');
        $account->account_type = $request->input('account_type');
        $account->company_name = $request->input('company_name');
        $account->account_address1 = $request->input('address');
        $account->account_address2 = $request->input('address2');
        $account->account_city = $request->input('city');
        $account->account_state = $request->input('state');
        $account->account_zip = $request->input('zip');
        $account->account_phone = $request->input('phone');
        $account->account_fax = $request->input('fax');
        $account->account_email = $request->input('email');
        $account->account_notes = $request->input('note');
        $account->save();
        return redirect('/accounts')->with('success',"Account created successfully");
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
        $account = Account::find($id);
        return view('accounts/edit_account')->with('account',$account);
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
        $account =Account::find($id);
        $account->user_id = Auth::user()->id;
        $account->account_type = $request->input('account_type');
        $account->company_name = $request->input('company_name');
        $account->account_address1 = $request->input('address');
        $account->account_address2 = $request->input('address2');
        $account->account_city = $request->input('city');
        $account->account_state = $request->input('state');
        $account->account_zip = $request->input('zip');
        $account->account_phone = $request->input('phone');
        $account->account_fax = $request->input('fax');
        $account->account_email = $request->input('email');
        $account->account_notes = $request->input('note');
        $account->save();
        return redirect('/accounts')->with('success',"Account Updated successfully");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accounts = Account::find($id);
        $accounts->delete();
        return redirect('/accounts')->with('warning',"Accounts Deleted Successfully");
    }
}

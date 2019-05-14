<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use DB;

class Accounts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
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
        return view('accounts/add_account');    
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
        $account->user_id = auth()->user()->id;
        $account->account_type = $request->input('account_type');
        $account->company_name = $request->input('company_name');
        $account->address = $request->input('address');
        $account->address2 = $request->input('address2');
        $account->city = $request->input('city');
        $account->state = $request->input('state');
        $account->zip = $request->input('zip');
        $account->phone = $request->input('phone');
        $account->fax = $request->input('fax');
        $account->email = $request->input('email');
        $account->note = $request->input('note');
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

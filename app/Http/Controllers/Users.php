<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Auth;
use DB;

class Users extends Controller
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
        $user_detail = DB::table('users')
                        ->where('account_id',$account_id)
                        ->get();
        return view('users/index', compact("user_detail")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Account::all();
        return view('users/add_user')->with('customers',$customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User;
        $users->parent_id = Auth::user()->id;

        $users->company_name = $request->input('company_name');
        $users->user_role = $request->input('user_role');
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        // $request->session()->put('user_id',$users->id);
        // $request->session()->put('user_role',$users->user_role);
        // $request->session()->put('account_id');
        $users->save();
        return redirect('/users')->with('success',"New User created successfully"); 
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
        $user = User::find($id);
        $customers = Account::all();
        return view('users/edit_user')->with('user',$user)
                                    ->with('customers',$customers);
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
        $users = User::find($id);
        $users->company_name = $request->input('company_name');
        $users->user_role = $request->input('user_role');
        $users->first_name = $request->input('first_name');
        $users->last_name = $request->input('last_name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        $users->save();
        return redirect('/users')->with('success',"Update User successfully");
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

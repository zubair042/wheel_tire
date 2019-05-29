<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Report_image;
use Auth;

class Report_images extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $this->validate($request,[
           'file'=>'required',
        ]);

        // Live path
        $file = $request->file('file')->getRealPath();
       
        // Test path
        //$file = "https://cdn.pixabay.com/photo/2014/06/03/19/38/board-361516__340.jpg";
       
        $cloud = Cloudder::upload($file, null);
        $c = Cloudder::getResult();
        $url = $c["url"];

        $image = new Report_image; 
        $image->report_id = $id;
        $image->url = $url;
        //$image->image_type = $request->file->getClientOriginalExtension();
        $image->image_type = $request->input('type');
        $image->created_by = Auth::user()->id;
        $image->save();
        return redirect('reports')->with('success','Image added Successfully');
        // $file = $request->file('file');
        // $file = $request->file;
        // if ($request->hasFile('file')) {
        //     $file_name = $request->file->getClientOriginalName();
        //     $path = $request->file->storeAs('uploads',$file_name);
        //     $file = new Report_image;
        //     $file->url = $path;
        //     //$file->save();
        // }
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

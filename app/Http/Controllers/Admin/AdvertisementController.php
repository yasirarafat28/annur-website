<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Advertisement::orderBy('created_at','DESC')->get();

        return view('admin.advertisement',compact('records'));
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
    public function store(Request $request)
    {
        $advertisment = Advertisement::first();
        if(!$advertisment){
            $advertisment = new Advertisement();
        }

        $advertisment->title = $request->title;

        if ($request->hasFile('image')) {

            $image      = $request->file('image');
            $imageName  = 'user_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $advertisment->image = $imageUrl;
        }
        $advertisment->status = 'active';
        $advertisment->save();
        return back()->withSuccess('Advertisement Add Successfull !');
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
        $advertisment = Advertisement::find($id);
        $advertisment->title = $request->title;

        if ($request->hasFile('image')) {

            $image      = $request->file('image');
            $imageName  = 'user_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $advertisment->image = $imageUrl;
        }
        $advertisment->status = $request->status;
        $advertisment->save();
        return back()->withSuccess('Advertisement Update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advertisement::destroy($id);
        return back()->withSuccess('Advertisement Delete Successfull !');
    }
}

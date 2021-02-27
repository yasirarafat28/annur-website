<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $records = Gallery::orderBy('id','DESC');
        if(isset($request->limit) && $request->limit=='-1'){
            $records = $records->paginate($records->count());
        }else{
            $records = $records->paginate(25);
        }
        return view('admin/galleries',compact('records'));
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
        //

        $gallery = new Gallery();
        $gallery->title = $request->title;

        if ($request->hasFile('file')) {

            $image      = $request->file('file');
            $imageName  = 'user_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->file = $imageUrl;
        }
        $gallery->status = 'active';
        $gallery->save();
        return back()->withSuccess('সফলভাবে সেভ করা হয়েছে');
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
        $gallery = Gallery::find($id);
        $gallery->title = $request->title;

        if ($request->hasFile('file')) {

            $image      = $request->file('file');
            $imageName  = 'user_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->file = $imageUrl ;
        }
        $gallery->status = 'active';
        $gallery->save();
        return back()->withSuccess('সফলভাবে এডিট করা হয়েছে');
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
        Gallery::destroy($id);
        return back()->withSuccess('সফলভাবে মুছে ফেলা হয়েছে');
    }
}

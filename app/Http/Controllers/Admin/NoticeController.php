<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notice;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Notice::orderBy('created_at','DESC')->paginate(15);

        return view('admin.notice',compact('records'));
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
        $this->validate($request,[
            'title'=>'required',
            'notice_details'=>'required'
        ]);

        $notice = new Notice();
        $notice->title = $request->title;
        $notice->notice_details = $request->notice_details;
        $notice->status = $request->status;
        $notice->save();

        return back()->with('success','Notice Add Successfull !');
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
        $this->validate($request,[
            'title'=>'required',
            'notice_details'=>'required'
        ]);

        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->notice_details = $request->notice_details;
        $notice->status = $request->status;
        $notice->save();

        return back()->with('success','Notice Update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::destroy($id);

        return back()->with('success','Notice Delete Successfull !');
    }
}

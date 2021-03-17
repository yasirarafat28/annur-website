<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Event::orderBy('created_at','DESC')->paginate(25);
        return view('admin.event',compact('records'));
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
            'place'=>'required'
        ]);

        $events = new Event();
        $events->title = $request->title;
        $events->place = $request->place;
        $events->start_date =$request->start_date;
        // $events->end_date =date('d-m-Y',strtotime($request->end_date));
        $events->time =$request->time;
        $events->time = $request->time;
        $events->note = $request->note;
        $events->status = $request->status;

        if ($request->hasFile('image')) {

            $image      = $request->file('image');
            $imageName  = 'events_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $events->image = $imageUrl;
        }

        $events->save();

        return back()->with('success','Event Added Successfull !');
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
            'place'=>'required'
        ]);

        $events = Event::find($id);
        $events->title = $request->title;
        $events->place = $request->place;
        $events->start_date =$request->start_date;
        // $events->end_date =date('d-m-Y',strtotime($request->end_date));
        $events->time =$request->time;
        $events->time = $request->time;
        $events->note = $request->note;
        $events->status = $request->status;

        if ($request->hasFile('image')) {

            $image      = $request->file('image');
            $imageName  = 'events_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $events->image = $imageUrl;
        }
        $events->save();

        return back()->with('success','Event Update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);

        return back()->with('success','Event Delete successfull !');
    }
}

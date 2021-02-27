<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Testimonials;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $records = Testimonials::orderBy('created_at','DESC')->paginate(25);
        return view('admin.testimonials',compact('records'));
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
            'name'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);

        $gallery = new Testimonials();
        $gallery->name = $request->name;
        $gallery->designation = $request->designation;
        $gallery->message = $request->message;

        if ($request->hasFile('photo')) {

            $image      = $request->file('photo');
            $imageName  = 'success_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->photo = $imageUrl;
        }

        $gallery->status = 'active';
        $gallery->save();
        return back()->withSuccess('Saved successfully!');
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
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);

        $gallery = Testimonials::find($id);
        $gallery->name = $request->name;
        $gallery->designation = $request->designation;
        $gallery->message = $request->message;

        if ($request->hasFile('photo')) {

            $image      = $request->file('photo');
            $imageName  = 'success_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->photo = $imageUrl;
        }

        $gallery->status = $request->status;
        $gallery->save();
        return back()->withSuccess('Saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $inquiry = Testimonials::destroy($id);

        return back()->withSuccess("Testimonial removed successfully!");
    }
}

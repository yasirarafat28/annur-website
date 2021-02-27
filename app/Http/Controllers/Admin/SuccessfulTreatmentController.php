<?php

namespace App\Http\Controllers\Admin;

use App\SuccessfulTreatment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
class SuccessfulTreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $records = SuccessfulTreatment::orderBy('id','DESC')->paginate(25);
        return view('admin/successful-treatment',compact('records'));
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

        $this->validate($request,[
            'patient_name'=>'required',
            'address'=>'required',
        ]);

        $gallery = new SuccessfulTreatment();
        $gallery->patient_name = $request->patient_name;
        $gallery->address = $request->address;

        if ($request->hasFile('before_photo')) {

            $image      = $request->file('before_photo');
            $imageName  = 'before_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->before_photo = $imageUrl;
        }

        if ($request->hasFile('after_photo')) {

            $image      = $request->file('after_photo');
            $imageName  = 'after_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->after_photo = $imageUrl;
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

        $this->validate($request,[
            'patient_name'=>'required',
            'address'=>'required',
        ]);

        $gallery = SuccessfulTreatment::find($id);
        $gallery->patient_name = $request->patient_name;
        $gallery->address = $request->address;

        if ($request->hasFile('before_photo')) {

            $image      = $request->file('before_photo');
            $imageName  = 'success_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->before_photo = $imageUrl;
        }

        if ($request->hasFile('after_photo')) {

            $image      = $request->file('after_photo');
            $imageName  = 'after_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/success/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $gallery->after_photo = $imageUrl;
        }
        $gallery->status = 'active';
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
        $gallery = SuccessfulTreatment::destroy($id);
        return back()->withSuccess('removed successfully!');

    }
}

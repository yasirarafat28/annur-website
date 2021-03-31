<?php

namespace App\Http\Controllers\Admin;

use App\Admission;
use App\Http\Controllers\Controller;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Admission::orderBy('created_at','DESC')->paginate(15);

        return view('admin.admission',compact('records'));
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
            // 'class_name'=>'required',
            'admission_details'=>'required'
        ]);

        $admissions = new Admission();
        // $admissions->class_name = $request->class_name;
        $admissions->admission_details = $request->admission_details;
        $admissions->status = $request->status;
        $admissions->save();

        return back()->with('success','Addmission Details Added Successfull !');
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
            // 'class_name'=>'required',
            'admission_details'=>'required'
        ]);

        $admissions = Admission::find($id);
        // $admissions->class_name = $request->class_name;
        $admissions->admission_details = $request->admission_details;
        $admissions->status = $request->status;
        $admissions->save();

        return back()->with('success','Addmission Details Update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admission::destroy($id);

        return back()->withSuccess('Admission Details Delete Successfull !');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Contact::orderBy('created_at','DESC')->paginate(25);
        return view('admin.contact',compact('records'));
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

        ]);

        $contacts = new Contact();
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->address = $request->address;
        $contacts->status = $request->status;
        $contacts->save();

        return back()->with('success','Contact Add successfull !');
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

            ]);

            $contacts = Contact::find($id);
            $contacts->email = $request->email;
            $contacts->phone = $request->phone;
            $contacts->address = $request->address;
            $contacts->status = $request->status;
            $contacts->save();

            return back()->with('success','Contact Update successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        return back()->with('success','Contact remove successfull !');
    }
}

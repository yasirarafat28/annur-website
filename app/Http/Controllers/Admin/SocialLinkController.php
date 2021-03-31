<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = SocialLink::orderBy('created_at','DESC')->paginate(15);

        return view('admin.social-link',compact('records'));
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

        $social = new SocialLink();
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->linkedin = $request->linkedin;
        $social->gmail = $request->gmail;
        $social->youtube = $request->youtube;
        $social->skype = $request->skype;
        $social->android = $request->android;
        $social->save();

        return back()->with('success','Social Link added Successfull !');
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

            $social =  SocialLink::find($id);
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->linkedin = $request->linkedin;
            $social->gmail = $request->gmail;
            $social->youtube = $request->youtube;
            $social->skype = $request->skype;
            $social->android = $request->android;
            $social->save();

            return back()->with('success','Social Link update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialLink::destroy($id);

        return back()->with('success','Social Link delete Successfull !');
    }
}

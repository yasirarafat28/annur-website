<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Blog::orderBy('created_at','DESC')->paginate(25);

        return view('admin.blog.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'content'=>'required'
        ]);

        $blogs = new Blog();
        $blogs->title = $request->title;
        $blogs->content = $request->content;
        $blogs->status = $request->status;

        if ($request->hasFile('photo')) {

            $image      = $request->file('photo');
            $imageName  = 'blogs_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $blogs->photo = $imageUrl;
        }

        $blogs->save();

        return redirect('/admin/blogs')->withSuccess('Blog Added Successfull !');

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
            'content'=>'required'
        ]);

        $blogs = Blog::find($id);
        $blogs->title = $request->title;
        $blogs->content = $request->content;
        $blogs->status = $request->status;

        if ($request->hasFile('photo')) {

            $image      = $request->file('photo');
            $imageName  = 'blogs_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/file/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;
            $blogs->photo = $imageUrl;
        }

        $blogs->save();

        return back()->withSuccess('Blog Update Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return back()->withSuccess('Blog Remove Successfull !');
    }
}

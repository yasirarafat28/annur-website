<?php

namespace App\Http\Controllers;

use App\About;
use App\Admission;
use App\Advertisement;
use App\Album;
use App\Appointment;
use App\Blog;
use App\Contact;
use App\Event;
use App\Gallery;
use App\Inquiry;
use App\Media;
use App\Notice;
use App\SocialLink;
use App\SuccessfulTreatment;
use App\Testimonials;
use Illuminate\Http\Request;
use SEO;

class FrontController extends Controller
{
    public function home(){

        $homepage = 'yes';

        SEO::setTitle("Home");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");


        $galleries = Gallery::where('status','active')->orderBy('created_at','DESC')->get();
        $blogs = Blog::where('status','active')->orderBy('created_at','DESC')->take(2)->get();
        $events = Event::where('status','active')->orderBy('created_at','DESC')->take(3)->get();
        $advertisment = Advertisement::where('status','active')->orderBy('created_at','DESC')->first();
        $albums = Album::where('status','active')->orderBy('created_at','DESC')->take(4)->get();


        return view('index',compact('galleries','homepage','blogs','events','advertisment','albums'));
    }

    public function testimonials(){

        SEO::setTitle("Happy Patients");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");



        $success_records = SuccessfulTreatment::where('status','active')->get();
        $testimonials = Testimonials::where('status','active')->get();

        return view('testimonials',compact('success_records','testimonials'));
    }



    public function media(){





        SEO::setTitle("Media Releases");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");

        $records = Media::where('status','active')->get();
        return view('media',compact('records'));
    }

    public function about_cp(){


        SEO::setTitle("Cerebral Palsy Treatment");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");

        return view('about_cp');
    }

    public function contact_us(){



        SEO::setTitle("Contact Us");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");

        $contact = Contact::where('status','active')->orderBy('created_at','DESC')->first();
        return view('contact',compact('contact'));
    }

    public function contactStore(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required',
            'message'=>'required'
        ]);

        $inquery = new Inquiry();
        $inquery->name = $request->name;
        $inquery->email = $request->email;
        $inquery->phone = $request->phone;
        $inquery->message = $request->message;
        $inquery->save();

        return back()->with('success','Your Message Sent Successfull !');

    }



    public function inquirySubmit(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);

        $inquery =new Inquiry();
        $inquery->name =$request->name;
        $inquery->email =$request->email;
        $inquery->message =$request->message;
        $inquery->phone =$request->phone;
        $inquery->save();

        return back()->withSuccess('Inquiry submnitted successfully!');

    }

    public function about_us(){




        SEO::setTitle("About Us");
        SEO::setDescription("Treatment for cerebral palsy can be complex, addressing a wide range of individual symptoms and conditions. As a result, doctors and medical specialists from multiple disciplines work together improving outcomes for children with CP. Early intervention and treatment have the greatest positive impact. ");

        $about = About::where('status','active')->orderBy('created_at','DESC')->first();
        return view('about-us',compact('about'));
    }

    public function event(){
        $events = Event::where('status','active')->orderBy('created_at','DESC')->get();
        return view('event',compact('events'));
    }

    public function appointment(){
        return view('appointment');
    }

    public function appointmentSubmit(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'age'=>'required',
            'date'=>'required',
        ]);

        $inquery =new Appointment();
        $inquery->name =$request->name;
        $inquery->email =$request->email;
        $inquery->message =$request->message;
        $inquery->phone =$request->phone;
        $inquery->age =$request->age;
        $inquery->date =$request->date;
        $inquery->save();


        return back()->withSuccess('Your appointment request has been sent successfully. Thank you!');
    }

    public function blog(){

        $blogs = Blog::where('status','active')->paginate(5);

        return view('blog',compact('blogs'));
    }
    public function singleBlog($id){

        $singleBlog = Blog::find($id);

        return view('single-blog',compact('singleBlog'));
    }

    public function eventDetails($id){

        $row = Event::find($id);
        return view('event_details',compact('row'));
    }

    public function addmission(){

        $admission = Admission::where('status','active')->orderBy('created_at','DESC')->first();
        return view('admission',compact('admission'));
    }

    public function notice(){

        $notices = Notice::where('status','active')->orderBy('created_at','DESC')->take(5)->get();
        return view('notice',compact('notices'));
    }

    public function noticeDetails($id){

        $notice_row = Notice::find($id);
        return view('notice-details',compact('notice_row'));
    }

}

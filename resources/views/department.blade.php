
@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <!-- bradcam_area_start  -->
    <div class="bradcam_text mt-1">
        <h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 6px;padding-bottom:0px;">{{$content->title}}</h3>
    </div>
  <!-- bradcam_area_end  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">

                  <div class="blog_details">
                     {{-- <h2>{{$admission->class_name??'N/A'}}
                     </h2> --}}

                     <p class="excert">
                        {!! $content->content??'N/A' !!}
                     </p>


                  </div>
               </div>


            </div>

         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

@endsection

@section('script')

@endsection

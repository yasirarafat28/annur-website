
@extends('layouts.app')

@section('style')

@endsection

@section('content')

  <!-- bradcam_area_start  -->
  <div class="bradcam_area breadcam_bg">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>Addmission</h3>
                  </div>
              </div>
          </div>
      </div>
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
                        {!! $admission->admission_details??'N/A' !!}
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

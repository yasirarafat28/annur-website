
@extends('layouts.app')

@section('content')


<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Happy Patients</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Happy Patients</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Patients</h2>
        <p>{!! App\PageContent::getContent('happy_patients') !!}</p>
      </div>

      <div class="row">


        @foreach ($success_records??array() as $item)
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="member-img col-md-6">
                        <img src="{{url($item->before_photo??'')}}" class="img-fluid" alt="">
                        <p class="text-info text-center">Before</p>
                        </div>

                        <div class="member-img col-md-6">
                        <img src="{{url($item->after_photo??'')}}" class="img-fluid" alt="">
                        {{-- <div class="social">
                            <a href=""><i class="icofont-twitter"></i></a>
                            <a href=""><i class="icofont-facebook"></i></a>
                            <a href=""><i class="icofont-instagram"></i></a>
                            <a href=""><i class="icofont-linkedin"></i></a>
                        </div> --}}
                        <p class="text-info text-center">After</p>
                        </div>
                </div>
                <div class="member-info">
                    <h4>{{$item->patient_name}}</h4>
                    <span>{{$item->address}}</span>
                </div>
                </div>
            </div>

        @endforeach



      </div>

    </div>
  </section><!-- End Doctors Section -->


  <section id="testimonials" class="testimonials">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonials</h2>
        <p>{!! App\PageContent::getContent('testimonials') !!}</p>
      </div>

      <div class="owl-carousel testimonials-carousel owl-loaded owl-drag aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">











        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-2220px, 0px, 0px); transition: all 0.25s ease 0s; width: 4070px;">

                @foreach ($testimonials??array() as $testimonial)

                    <div class="owl-item cloned" style="width: 370px;">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$testimonial->message}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="{{url($testimonial->photo??'')}}" class="testimonial-img" alt="">
                            <h3>{{$testimonial->name}}</h3>
                            <h4>{{$testimonial->designation}}</h4>
                        </div>
                    </div>

                @endforeach

            </div>
            <div class="owl-nav disabled">
                <button type="button" role="presentation" class="owl-prev">
                    <span aria-label="Previous">‹</span>
                </button>
                <button type="button" role="presentation" class="owl-next">
                    <span aria-label="Next">›</span>
                </button>
            </div>
            <div class="owl-dots">
                <button role="button" class="owl-dot">
                    <span></span>
                </button>
                <button role="button" class="owl-dot active">
                    <span></span>
                </button>
            </div>
        </div>
      </div>
  </section>
@endsection

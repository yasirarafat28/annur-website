
@extends('layouts.app')

@section('content')


<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Know Us</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Know Us</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Know Us</h2>

            <p>{!! App\PageContent::getContent('know_us') !!}</p>
          </div>

          <div class="row d-none">
            <div class="col-lg-6" data-aos="fade-right">
              <img src="/front/img/poster-1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
              <p class="font-italic">

                  Cerebral palsy is a highly individualized disorder, impacting each patient in unique ways. Each patient’s cerebral palsy treatment largely depends on their own individual desires, based on the severity of their situation, as well as other pertinent factors. What to Know About Treatment
                  Physical symptoms are not the only concern for doctors and therapists committed to the needs of CP patients. Social and emotional impacts must also be considered, calling for close collaboration between parents and various medical specialists.
                  Is the child content with his or her condition? Is a particular treatment in the child’s best interest? Are therapy and treatment stressful or demanding, beyond expected benefits?
                  Cerebral Palsy Disease এর রোগি গুলো পৃথিবীর কোথাও চিকিৎসায় ভালো হচ্ছে না! এই চিকিৎসা শুধু আমাদের কাছেই আছে! আমাদের চিকিৎসাধীন রোগি সম্পন্ন ভালো হয়ে যায়! দয়া করে আমাদের চিকিৎসা নেওয়ার আহ্বান জানাচ্ছি! আমাদের অভিজ্ঞ ডাক্তার রোগি ভালো না হলে টাকা নিবেন না!
              </p>
              {{-- <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul> --}}
              <p>

                  Dr. Faridul Islam Choudhury, Neurosurgeon, Neuro ICU Consaltant, Neuro Anesthesiologist, MBBS at Sylhet M.A.G Osmani Medical College, Neurosurgeon, Neuro ICU Consaltant, Neuro Anesthesiologist at Shaheed Ziaur Rahman Medical College, Bogura, Studied Post Graduate Diploma in Anesthesiology & critical care medicine at Bangabandhu Sheikh Mujib Medical University, Studied • MS Neurosurgery at Dhaka Medical College - DMC
                </p>
            </div>
          </div>

        </div>
      </section><!-- End About Us Section -->
@endsection

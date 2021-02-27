
@extends('layouts.app')

@section('content')


<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Cerebral Palsy Treatment</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Cerebral Palsy Treatment</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="departments" class="departments">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
        <h2>About CP Treatment</h2>
        <p>{!! App\PageContent::getContent('about_cp') !!}</p>
      </div>

      <div class="row aos-init aos-animate d-none" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link show active" data-toggle="tab" href="#tab-1">
                <h4>Cardiology</h4>
                <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-2">
                <h4>Neurology</h4>
                <p>Voluptas vel esse repudiandae quo excepturi.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-3">
                <h4>Hepatology</h4>
                <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
              </a>
            </li>
            <li class="nav-item mt-2">
              <a class="nav-link" data-toggle="tab" href="#tab-4">
                <h4>Pediatrics</h4>
                <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-lg-8">
          <div class="tab-content">
            <div class="tab-pane show active" id="tab-1">
              <h3>Cardiology</h3>
              <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <img src="/front/img/departments-1.jpg" alt="" class="img-fluid">
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
            <div class="tab-pane" id="tab-2">
              <h3>Neurology</h3>
              <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <img src="/front/img/departments-2.jpg" alt="" class="img-fluid">
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
            <div class="tab-pane" id="tab-3">
              <h3>Hepatology</h3>
              <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <img src="/front/img/departments-3.jpg" alt="" class="img-fluid">
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
            <div class="tab-pane" id="tab-4">
              <h3>Pediatrics</h3>
              <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <img src="/front/img/departments-4.jpg" alt="" class="img-fluid">
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

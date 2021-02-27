
@extends('layouts.app')

@section('content')


<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Appointment</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Appointment</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="appointment" class="appointment section-bg">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
        <h2>Make an Appointment</h2>
        <p>
            <p>{!! App\PageContent::getContent('appointment') !!}</p></p>
      </div>

      @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

      <form action="{{route('appointment.submnit')}}" method="post" role="form" class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        @csrf
        <div class="form-row">
          <div class="col-md-4 form-group">
            <input type="text" name="name" class="form-control" id="name" required placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group">
            <input type="tel" class="form-control" name="phone" id="phone" required placeholder="Your Phone" data-rule="minlen:8" data-msg="Please enter at least 8 chars">
            <div class="validate"></div>
          </div>

          <div class="col-md-4 form-group">
            <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>

          <div class="col-md-4 form-group">
            <input type="number" name="age" class="form-control" placeholder="Patient's Age" >
            <div class="validate"></div>
          </div>
        </div>

        <div class="form-group mb-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          <div class="validate"></div>
        </div>

        <div class="text-center"><button type="submit" class="appointment-btn scrollto">Make an Appointment</button></div>
      </form>

    </div>
  </section>
@endsection

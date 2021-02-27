
@extends('layouts.app')

@section('content')


<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Media Releases</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Media Releases</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section id="departments" class="departments">
    <div class="container aos-init aos-animate" data-aos="fade-up">

      <div class="section-title">
        <h2>Media Release </h2>
        <p>{!! App\PageContent::getContent('media_release') !!}</p>
      </div>

      <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <ul class="nav nav-tabs flex-column">

            @foreach ($records as $key=>$item)

                <li class="nav-item">
                    <a class="nav-link @if($key==0) show active @endif " data-toggle="tab" href="#tab-{{$key}}">
                    <h4>{{$item->title}}</h4>

                    {{-- <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p> --}}
                    </a>
                </li>

            @endforeach

          </ul>
        </div>
        <div class="col-lg-8">
          <div class="tab-content">

            @foreach ($records as $item)
                <div class="tab-pane  @if($key==0) show active @endif" id="tab-{{$key}}">
                    <h3>{{$item->title}}</h3>
                    <p class="font-italic">{{$item->description}}</p>

                    <a href="{{$item->url}}" target="_blank" class="text-link">Click here</a>
                    {{-- <img src="/front/img/departments-1.jpg" alt="" class="img-fluid">
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p> --}}
                </div>

            @endforeach
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection

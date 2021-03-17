
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
                        <h3>Recent Events</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Recent Event</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @foreach ($events?? array() as $event)

                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>{{date('d',strtotime($event->created_at??''))}}</span>
                            <p>{{date('F, Y',strtotime($event->created_at??''))}}</p>
                        </div>
                        <div class="event_info">
                            <a href="{{url('/event-details/'.$event->id)}}">
                                <h4>{{$event->title??'N/A'}}</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> {{$event->time??'N/A'}}</span> <span> <i class="flaticon-calendar"></i> {{date('d F, Y',strtotime($event->start_date))}} </span> <span> <i class="flaticon-placeholder"></i>{{$event->place??'N/A'}}</span> </p>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>03</span>
                            <p>Dec, 2020</p>
                        </div>
                        <div class="event_info">
                            <a href="event_details.html">
                                <h4>How to speake like a nativespeaker?</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                        </div>
                    </div>
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>10</span>
                            <p>Dec, 2020</p>
                        </div>
                        <div class="event_info">
                            <a href="event_details.html">
                                <h4>How to speake like a nativespeaker?</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- recent_event_area_end  -->
@endsection

@section('script')

@endsection

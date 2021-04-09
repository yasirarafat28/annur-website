
@extends('layouts.app')

@section('style')

@endsection

@section('content')

    <!-- bradcam_area_start  -->
    <div class="bradcam_text mt-1">
        <h3 style="text-align: center;background-color: #895621;color: #fff;padding-top: 6px;padding-bottom:0px;">Notice</h3>
    </div>
    <!-- bradcam_area_end  -->

    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Notice Board</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @foreach ($notices?? array() as $notice)

                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>{{date('d',strtotime($notice->created_at??''))}}</span>
                            <p>{{date('F, Y',strtotime($notice->created_at??''))}}</p>
                        </div>
                        <div class="event_info">
                            <a href="{{url('/notice-details/'.$notice->id)}}">
                                <h4>{{$notice->title??'N/A'}}</h4>
                             </a>
                            <p><span> {!! substr($notice->notice_details??"N/A",0,50) !!},,,</span> </p>
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


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
                        <h3>event details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <div class="event_details_area section__padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_event d-flex align-items-center">
                        <div class="thumb">
                            <img src="{{url($row->image)}}" alt="">
                            <div class="date text-center">
                                <h4>{{date('d',strtotime($row->created_at??''))}}</h4>
                                <span>{{date('F, Y',strtotime($row->created_at??''))}}</span>
                            </div>
                        </div>
                        <div class="event_details_info">
                            <div class="event_info">
                                <a href="#">
                                    <h4>{{$row->title??'N/A'}}</h4>
                                 </a>
                                <p><span> <i class="flaticon-clock"></i>{{$row->time??'N/A'}}</span> <span> <i class="flaticon-calendar"></i> {{date('d F, Y',strtotime($row->start_date))}} </span> <span> <i class="flaticon-placeholder"></i> {{$row->place??'N/A'}}</span> </p>
                            </div>
                            <p class="event_info_text">{!! $row->note??'N/A' !!}
                            </p>
                            {{-- <a href="#" class="boxed-btn3">Book a seat</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection

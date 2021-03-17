@extends('layouts.admin')
@section('style')

@endsection
@section('content')
<style>

</style>

<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

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
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Event List</h1>

            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Event List</a></li>
            </ul>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h2>Event List</h2>
                            </div>
                            <div class="float-right">
                                <a  data-toggle="modal" data-target="#eventCreateModal" class="btn btn-primary"><i class="fas fa-fw fa-plus"> </i> Add </i></a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-plaintable">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th>Title</th>
                                <th>image</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($records as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>
                                        <img src="{{url($item->image)}}" alt="" style="width:80px;">
                                    </td>
                                    <td>{{$item->title??'N/A'}}</td>
                                    <td>{!! substr($item->note??'N/A',0,20) !!},,,</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->start_date}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#eventEditModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"> </i></a>
                                        <a data-toggle="modal" data-target="#eventShowModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-eye"> </i></a>

                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/events', $item->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-times"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete user',
                                                    'onclick'=>'return confirm("Are you sure?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {!! $records->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

 <!-- Show Modal Start -->
 <div class="modal fade" id="eventCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong> Event</strong> Add</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{url('admin/events')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}



                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Title</small></label>
                                    <input type="text" placeholder="Title" name="title" class="form-control" >
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Place</small></label>
                                    <input type="text" placeholder="Place" name="place" class="form-control" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for=""><small>Start Date</small></label>
                                    <input type="date" placeholder="Place" name="start_date" class="form-control datepicker" >
                                </div>

                            </div>

                            {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for=""><small>End Date</small></label>
                                    <input type="date" placeholder="Place" name="end_date" class="form-control datepicker" >
                                </div>
                            </div> --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for=""><small>Time</small></label>
                                    <input type="time" placeholder="Time" name="time" class="form-control timepicker" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for=""><small>Image</small></label>
                                    <input type="file" placeholder="image" name="image" class="form-control" >
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Content</small></label>
                                    <textarea name="note" id="" placeholder="Content" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Status</small></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">

                                <button class="btn btn-primary btn-round"> Save</button>

                            </div>
                        </form>
                    </div>

        </div>
    </div>
</div>


    @foreach($records as $row)

     <!-- Edit Modal Start -->
     <div class="modal fade" id="eventEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                        <div class="modal-header">
                            <h2><strong> Event</strong> Update</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('admin/events/'.$row->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Title</small></label>
                                        <input type="text" placeholder="Title" name="title" class="form-control" value="{{$row->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Place</small></label>
                                        <input type="text" placeholder="Place" name="place" class="form-control" value="{{$row->place}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><small>Start Date</small></label>
                                        <input type="date" placeholder="Place" name="start_date" class="form-control datepicker" value="{{$row->start_date}}">
                                    </div>

                                </div>

                                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><small>End Date</small></label>
                                        <input type="date" placeholder="Place" name="end_date" class="form-control datepicker" >
                                    </div>
                                </div> --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><small>Time</small></label>
                                        <input type="time" placeholder="Time" name="time" class="form-control timepicker" value="{{$row->time}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for=""><small>Image</small></label>
                                        <input type="file" placeholder="image" name="image" class="form-control" value="{{$row->image}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Content</small></label>
                                        <textarea name="note" id="" placeholder="Content" class="form-control">{!! $row->note !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Status</small></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{$row->status=='active'?'selected':''}}>Active</option>
                                            <option value="inactive" {{$row->status=='inactive'?'selected':''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">

                                    <button class="btn btn-primary btn-round"> Save</button>

                                </div>
                            </form>
                        </div>

            </div>
        </div>
    </div>

    <!--Edit Modal End-->

    <!-- Show Modal Start -->
    <div class="modal fade" id="eventShowModal{{$row->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                        <div class="modal-header">
                            <h2><strong> Event</strong> Show</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <table class="table">
                                <tbody>

                                <tr>
                                    <td>Image </td>
                                    <td><img src="{{url($row->image)}}" alt="" style="width:200px;"></td>
                                </tr>
                                <tr>
                                    <td>Title </td>
                                    <td>{{$row->title??""}}</td>
                                </tr>
                                <tr>
                                    <td>Place </td>
                                    <td>{{$row->place??""}}</td>
                                </tr>
                                <tr>
                                    <td>Start Date </td>
                                    <td>{{$row->start_date??""}}</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>{{$row->time??""}}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{!! $row->note !!}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$row->status}}</td>
                                </tr>

                                <tr>
                                    <td>Created At </td>
                                    <td>{{($row->created_at)}}</td>
                                </tr>

                                </tbody>
                            </table>

                </div>

            </div>
        </div>
    </div>


    @endforeach



@endsection


@section('script')

<script src="/admin/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
<script src="/admin/js/forms/editors.js"></script>


<script>
    $(document).ready(function(){
        $( 'textarea.ckeditor' ).ckeditor();
    });
</script>
@endsection


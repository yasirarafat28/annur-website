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
                <h1 class="h3 mb-0 text-gray-800">Testimonials</h1>

                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Testimonials</a></li>
                </ul>
            </div>

            <div class="row">


            </div>


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h2>Testimonials </h2>
                            </div>
                            <div class="float-right">
                                <a data-toggle="modal" data-target="#largeModal" class="btn btn-primary"> <i class="fas fa-fw fa-plus"></i>Add </a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-plaintable">
                            <thead>
                            <tr>
                                <th># </th>
                                <th>Name </th>
                                <th>Designation </th>
                                <th>Status </th>
                                <th>Timestamp </th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th># </th>
                                <th>Name </th>
                                <th>Designation </th>
                                <th>Status </th>
                                <th>Timestamp </th>
                                <th>Action </th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($records??array() as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->designation}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#largeShowModal{{$item->id}}" class="btn btn-primary btn-sm" title="Show"><i class="fa fa-eye"> </i></a>
                                        <a data-toggle="modal" data-target="#UpdateModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"> </i></a>
                                        {!! Form::open([
                                           'method'=>'DELETE',
                                           'url' => ['/admin/testimonials', $item->id],
                                           'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash"></i> ', array(
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


@foreach($records??array() as $item)

    <!-- Show Modal Start -->
    <div class="modal fade" id="largeShowModal{{$item->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Show Inquery</strong></h2>
                        </div>
                        <div class="body">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>{{$item->name}}</td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td>{{$item->designation}}</td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td>{{html_entity_decode($item->message)}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                                <tr>
                                    <td>Create Date</td>
                                    <td>{{$item->created}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <!--Edit Modal End-->


    <div class="modal fade" id="UpdateModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <h4>Update Complain</h4>
                <form class="" method="POST" action="{{url('admin/testimonials/'.$item->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method("PATCH")
                    <div class="row book-input-row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for=""><small> Name</small></label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{$item->name}}">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for=""><small> Designation</small></label>
                                <input type="text" class="form-control" placeholder="Designation" value="{{$item->designation}}" name="designation">
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for=""><small>Photo</small></label>
                                <input type="file" class="form-control" placeholder="Photo" name="photo">
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for=""><small>Message</small></label>
                                <textarea name="message" class="form-control" placeholder="Description...">{{$item->message}}</textarea>
                            </div>
                        </div>

                        <div class="col-12 col">
                            <div class="lesson-input">
                                <label for="status">Status</label>
                                <select name="status" id="status">
                                    <option value="active" {{$item->status=='active'?'selected':''}}>active</option>
                                    <option value="inactive" {{$item->status=='inactive'?'selected':''}}>inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row card-courses-dec">
                        <div class="col-12 col">
                           <button type="submit" class="btn green radius-xl outline">Update</a>
                        </div>
                    </div>

                </form>
            </div>
            </div>
        </div>
    </div>

@endforeach

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong>Add  Succcessful Treatment</strong></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/testimonials')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small> Name</small></label>
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small> Designation</small></label>
                                        <input type="text" class="form-control" placeholder="Designation" name="designation">
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for=""><small>Photo</small></label>
                                        <input type="file" class="form-control" placeholder="Photo" name="photo">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for=""><small>Message</small></label>
                                        <textarea name="message" class="form-control" placeholder="Description..."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>


@endsection


@section('script')

@endsection


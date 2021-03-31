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
            <h1 class="h3 mb-0 text-gray-800">Admission List</h1>

            <ul class="breadcrumb float-md-right">
                {{-- <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> {{\App\Setting::setting()->app_name}}</a></li> --}}
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admission List</a></li>
            </ul>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h2>Admission List</h2>
                            </div>
                            <div class="float-right">
                                <a  data-toggle="modal" data-target="#admissionCreateModal" class="btn btn-primary"><i class="fas fa-fw fa-plus"> </i> Add </i></a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-plaintable">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th>Admission Details</th>
                                <th>Status  </th>
                                <th>Time</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($records as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    {{-- <td>{{$item->class_name??'N/A'}}</td> --}}
                                    <td>{!! substr($item->admission_details??'N/A',0,80) !!},,</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#admissionEditModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"> </i></a>
                                        <a data-toggle="modal" data-target="#admissionShowModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-eye"> </i></a>

                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/admissions', $item->id],
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
 <div class="modal fade" id="admissionCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong> Admission</strong> Add</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{url('admin/admissions')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}


                            {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Class name</small></label>
                                    <input type="text" placeholder="Class name" name="class_name" class="form-control">
                                </div>
                            </div> --}}

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Admission Details</small></label>
                                    <textarea name="admission_details" id="" placeholder="Admission Details" class="form-control"></textarea>
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
     <div class="modal fade" id="admissionEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                        <div class="modal-header">
                            <h2><strong> Admission</strong> Update</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('admin/admissions/'.$row->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}

                                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Class Name</small></label>
                                        <input type="text" placeholder="Class Name" name="class_name" class="form-control" value="{{$row->class_name}}">
                                    </div>
                                </div> --}}


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Admission Details</small></label>
                                        <textarea name="admission_details" id="" placeholder="Admission Details" class="form-control">{!! $row->admission_details !!}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Status</small></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{$row->status=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{$row->status=='inactive' ? 'selected' : ''}}>Inactive</option>
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
    <div class="modal fade" id="admissionShowModal{{$row->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                        <div class="modal-header">
                            <h2><strong> Admission</strong> Show</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <table class="table">
                                <tbody>

                                {{-- <tr>
                                    <td>Class Name </td>
                                    <td>{{$row->Class_name??"N/A"}}</td>
                                </tr> --}}
                                <tr>
                                    <td>Admissions Details</td>
                                    <td>{!! $row->admission_details !!}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{$row->status}}</td>
                                </tr>

                                <tr>
                                    <td>Time </td>
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


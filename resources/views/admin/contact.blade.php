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
            <h1 class="h3 mb-0 text-gray-800">Contact List</h1>

            <ul class="breadcrumb float-md-right">
                {{-- <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> {{\App\Setting::setting()->app_name}}</a></li> --}}
                <li class="breadcrumb-item"><a href="javascript:void(0);">Contact List</a></li>
            </ul>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h2>Contact List</h2>
                            </div>
                            <div class="float-right">
                                <a  data-toggle="modal" data-target="#contactCreateModal" class="btn btn-primary"><i class="fas fa-fw fa-plus"> </i> Add </i></a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-plaintable">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Email </th>
                                <th> Phone </th>
                                <th>Address</th>
                                <th>Status  </th>
                                <th>Time</th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($records as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{$item->email??'N/A'}}</td>
                                    <td>{{$item->phone??'N/A'}}</td>
                                    <td>{!! $item->address !!}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#contactEditModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"> </i></a>

                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/contacts', $item->id],
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
 <div class="modal fade" id="contactCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong> Contact</strong> Add</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{url('admin/contacts')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>E-mail</small></label>
                                    <input type="email" placeholder="E-mail" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Phone No</small></label>
                                    <input type="text" placeholder="Phone No" name="phone" class="form-control" >
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Adress</small></label>
                                    <textarea name="address" id="" placeholder="Adress" class="form-control"></textarea>
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
     <div class="modal fade" id="contactEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                        <div class="modal-header">
                            <h2><strong> Contaact</strong> Update</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('admin/contacts/'.$row->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>E-mail</small></label>
                                        <input type="email" placeholder="E-mail" name="email" class="form-control" value="{{$row->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Phone No</small></label>
                                        <input type="text" placeholder="Phone No" name="phone" class="form-control" value="{{$row->phone}}">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Address</small></label>
                                        <textarea name="address" id="" placeholder="Address" class="form-control">{!! $row->address !!}</textarea>
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


    @endforeach



@endsection


@section('script')
<script>
    $(document).ready(function(){
        $( 'textarea.ckeditor' ).ckeditor();
    });
</script>
@endsection


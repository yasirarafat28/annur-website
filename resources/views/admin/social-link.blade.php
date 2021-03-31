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
            <h1 class="h3 mb-0 text-gray-800">Socail Link List</h1>

            <ul class="breadcrumb float-md-right">
                {{-- <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> {{\App\Setting::setting()->app_name}}</a></li> --}}
                <li class="breadcrumb-item"><a href="javascript:void(0);">Socail Link List</a></li>
            </ul>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h2>Socail Link List</h2>
                            </div>
                            <div class="float-right">
                                <a  data-toggle="modal" data-target="#socialLinkCreateModal" class="btn btn-primary"><i class="fas fa-fw fa-plus"> </i> Add </i></a>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-plaintable">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th>Facebook</th>
                                <th>Google+</th>
                                <th>Youtube  </th>
                                <th>Status  </th>
                                <th>Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($records as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td>{{$item->facebook??'N/A'}}</td>
                                    <td>{{$item->gmail??'N/A'}}</td>
                                    <td>{{$item->youtube??'N/A'}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#socialLinkEditModal{{$item->id}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"> </i></a>
                                        <a data-toggle="modal" data-target="#socialLinkShowModal{{$item->id}}" class="btn btn-primary btn-sm" title="show"><i class="fa fa-eye"> </i></a>

                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/social-links', $item->id],
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
 <div class="modal fade" id="socialLinkCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong> Social Link</strong> Add</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{url('admin/social-links')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Facebook</small></label>
                                    <input type="text" placeholder="Facebook" name="facebook" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Twitter</small></label>
                                    <input type="text" placeholder="twitter" name="twitter" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Linkedin</small></label>
                                    <input type="text" placeholder="Linkedin" name="linkedin" class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Google+</small></label>
                                    <input type="text" placeholder="Google+" name="gmail" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Youtube</small></label>
                                    <input type="text" placeholder="Youtube" name="youtube" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Skype</small></label>
                                    <input type="text" placeholder="Skype" name="skype" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for=""><small>Android</small></label>
                                    <input type="text" placeholder="Android" name="android" class="form-control">
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
     <div class="modal fade" id="socialLinkEditModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                        <div class="modal-header">
                            <h2><strong> Social Link</strong> Update</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('admin/social-links/'.$row->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Facebook</small></label>
                                        <input type="text" placeholder="Facebook" name="facebook" class="form-control" value="{{$row->facebook}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Twitter</small></label>
                                        <input type="text" placeholder="twitter" name="twitter" class="form-control" value="{{$row->twitter}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Linkedin</small></label>
                                        <input type="text" placeholder="Linkedin" name="linkedin" class="form-control" value="{{$row->linkedin}}">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>E-mail</small></label>
                                        <input type="text" placeholder="E-mail" name="gmail" class="form-control" value="{{$row->gmail}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Youtube</small></label>
                                        <input type="text" placeholder="Youtube" name="youtube" class="form-control" value="{{$row->youtube}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Skype</small></label>
                                        <input type="text" placeholder="Skype" name="skype" class="form-control" value="{{$row->skype}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small>Android</small></label>
                                        <input type="text" placeholder="Android" name="android" class="form-control" value="{{$row->android}}">
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
    <div class="modal fade" id="socialLinkShowModal{{$row->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">


                        <div class="modal-header">
                            <h2><strong> Social Link</strong> Show</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <table class="table">
                                <tbody>

                                <tr>
                                    <td>Facebook</td>
                                    <td>{{$row->facebook??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>{{$row->twitter??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Linkedin</td>
                                    <td>{{$row->linkedin??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Google+</td>
                                    <td>{{$row->gmail??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Youtube</td>
                                    <td>{{$row->youtube??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Skype</td>
                                    <td>{{$row->skype??"N/A"}}</td>
                                </tr>
                                <tr>
                                    <td>Android</td>
                                    <td>{{$row->android??"N/A"}}</td>
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


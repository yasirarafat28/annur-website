@extends('layouts.admin')
@section('style')

@endsection
@section('content')
<style>

    .dropdown-item {

padding: 6px !important;

}

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
            <h1 class="h3 mb-0 text-gray-800">Album</h1>

            <ul class="breadcrumb float-md-right">
                <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Album</a></li>
            </ul>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card shadow">
                        <div class="header">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h2>Album </h2>
                                </div>
                                <div class="float-right">
                                    <a data-toggle="modal" data-target="#largeModal" class="btn btn-primary"> <i class="fas fa-fw fa-plus"></i> Add </a>
                                </div>
                            </div>

                        </div>
                    <div class="body d-flex">
                        @forelse ($records??array() as $album)
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="">
                                    <div class="card-body file_manager">
                                        <div class="file">
                                            <a target="_blank" href="{{url($album->image??'')}}">
                                                <div class="hover">
                                                    <div class="d-flex">
                                                    <button data-toggle="modal" data-target="#largeEditModal{{$album->id}}" class="dropdown-item" title="Edit"><i class="fa fa-edit"> </i> Edit</button>

                                                        {!! Form::open([
                                                            'method'=>'DELETE',
                                                            'url' => ['/admin/albums', $album->id],
                                                            'style' => 'display:inline'
                                                            ]) !!}
                                                            {!! Form::button('<i class="fa fa-trash"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'dropdown-item',
                                                                'title' => 'Delete user',
                                                                'onclick'=>'return confirm("Are you sure?")'
                                                                )) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                                <div class="icon">
                                                    {{-- <i class="fa fa-file"></i> --}}

                                                <img src="{{url($album->image??'')}}" style="width: 100%" alt="" onerror="this.src='/images/file/default-image.jpg';">
                                                </div>
                                                <div class="file-name">
                                                    <p class="m-b-5 text-muted">{{$album->title}}</p>
                                                    <small>
                                                        {{-- Size: {{number_format($gallery->size/1000000,2)}} MB  --}}
                                                        <span class="date text-muted">{{date('F d, Y',strtotime($album->created_at))}}</span></small>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty

                            <div class="col-md-12 text-center">
                                <h5><strong>Sorry!</strong> No record found!</h5>
                            </div>

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- #END# Exportable Table -->
</section>

<!-- Add Modal Start -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

                    <div class="modal-header">
                        <h2><strong>Add  album</strong></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/albums')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for=""><small> Title</small></label>
                                        <input type="text" class="form-control" placeholder="Title" name="title">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for=""><small>Image</small></label>
                                        <input type="file" class="form-control" placeholder="image" name="image">
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
<!--Add Modal End-->


        @foreach($records??array() as $item)
        <!-- Edit Modal Start -->
                <div class="modal fade" id="largeEditModal{{$item->id}}" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2><strong> album</strong> Edit</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('admin/albums/'.$item->id)}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    {{method_field('PATCH')}}
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for=""><small> Title</small></label>
                                                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$item->title}}">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for=""><small>Image</small></label>
                                                <input type="file" class="form-control" placeholder="Photo" name="image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for=""><small>Status</small></label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="active" {{$item->status=='active' ? 'selected' : ''}}>Active</option>
                                                    <option value="inactive" {{$item->status=='inactive' ? 'selected' : ''}}>Inactive</option>
                                                </select>
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


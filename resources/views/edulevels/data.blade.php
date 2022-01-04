@extends('main')

@section('title','Edulevels')
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edulevel</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Edulevel</a></li>
                    <li class="active">Data</i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">  
                {{ session('status') }} <i class="fa fa-check"></i>
            </div>
            
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Jenjang</strong>
                </div>
                <div class="pull-right">
                    <a href="{{url('edulevels/add')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus" ></i>Add
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                             <th>No</th>
                             <th>Name</th>
                             <th>Description</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edulevels as $data)
                            <tr>
                                <td>{{$loop -> iteration}}</td>
                                <td>{{$data ->name }}</td>
                                <td>{{$data ->desc }}</td>
                                <td class="text-center">
                                    <a href="{{url('edulevels/edit/'.$data->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{url('edulevels/'.$data->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data ini?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</div><!-- .content -->
@endsection
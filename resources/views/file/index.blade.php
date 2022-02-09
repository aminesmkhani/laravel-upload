@extends('layout.core')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Files List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Files List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload File List!</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Length</th>
                                    <th>Duration</th>
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td>{{$file->name}}</td>
                                    <td>{{$file->type}}</td>
                                    <td>{{number_format($file->size / (1024 * 1024), 2)}} MB</td>
                                    <td>
                                        @if($file->time == null)
                                            Have Not
                                        @else
                                            {{$file->time}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($file->is_private == 1)
                                            <span class="badge bg-cyan">Private</span>
                                        @else
                                            <span class="badge bg-success">Public</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('file.show', $file->id)}}" title="Download"  class="btn btn-info">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <a href="#" title="Delete"  class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

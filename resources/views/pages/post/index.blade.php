@extends('layouts.app')

@section('title', 'Artikel List')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Artikel Page</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Artikel Page</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    @if ($posts->count())
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Artikel List</h3>
            <div class="card-tools">
                <a href="{{ route('post.store') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i>
                    Buat artikel baru
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Cover</th>
                <th style="width: 40%">Judul</th>
                <th>Penulis</th>
                <th>Pada</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ \Storage::url($post->cover) }}" alt="">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                        {{ $post->user->name }}
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-primary">
                            <i class="fas fa-pen mr-1"></i>
                            edit</a>
                        <a href="" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i>
                            delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
    <!-- /.card -->

    @else
    <div class="card">
        <div class="p-5">
            <h2>
                belum ada post
            </h2>

            <a href="{{ route('post.store') }}" class="btn btn-primary">
                    <i class="fas fa-plus mr-1"></i>
                    Buat artikel baru
                </a>

        </div>
    </div>
    @endif

</section>
<!-- /.content -->

@endsection

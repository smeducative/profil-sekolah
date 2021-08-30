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

    @if (session()->has('success'))
        <div class="alert alert-success">
            <h5>
                <div class="icon fas fa-check"></div>
                Success!
            </h5>

            {{ session('success') }}
        </div>
    @endif

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
              <div class="card-body p-0">
                @if($posts->count())

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Cover</th>
                      <th width="35%">Judul</th>
                      <th>Penulis</th>
                      <th>Pada</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($posts as $post)

                    <tr>
                        <td class="p-1" width="18%">
                            <img src="{{ \Storage::url($post->cover) }}" style="max-width: 180px; max-height:150px;">
                        </td>
                        <td>
                            <a href="#">
                                {{ $post->title }}
                            </a> <br>
                            <small class="text-muted">
                                {{ $post->slug }}
                            </small>
                        </td>
                        <td>
                          {{ $post->user->name }}
                        </td>
                        <td> {{ $post->created_at->translatedFormat('D, d F Y H:i') }} </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a href="{{ route('post.edit', $post->slug) }}" class="dropdown-item">
                                        <i class="fas fa-pen mr-1"></i>
                                        edit
                                    </a>
                                    <a href="#" onclick="return confirm('yakin mau hapus post ini?') ? document.getElementById('d-post-{{ $post->id }}').submit() : false" class="dropdown-item text-danger">
                                        <div class="i fas fa-trash mr-1"></div>
                                        hapus
                                    </a>
                                </div>
                            </div>

                            <form action="{{ route('post.delete', $post->slug) }}" id="d-post-{{ $post->id }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                      @endforeach
                  </tbody>
                </table>
                @else
                <div class="px-5 py-3">
                    Belum ada post tersedia
                </div>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->

@endsection

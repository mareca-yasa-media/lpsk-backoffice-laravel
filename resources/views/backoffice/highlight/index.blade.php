@extends('backoffice.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Sorot</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Sorot</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sorot</h3>

                    <div class="card-tools">
                        {{-- <a href="/backoffice/highlight/tambah" class="btn btn-success btn-sm" title="Tambah">
                            <i class="fas fa-plus"></i> Tambah
                        </a> --}}
                        <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                            <span class="fa fa-plus"></span> Tambah
                        </button>

                        {{-- @if ($errors->any())
                            <script>
                                jQuery(function() {
                                    $('#tambah').modal('show');
                                });
                            </script>
                        @endif --}}

                        {{-- Modal --}}
                        @include('backoffice.highlight.modal.add')

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" highlight="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" highlight="alert">
                        <strong>Gagal </strong>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori</th>
                                <th>Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($highlights as $key => $highlight)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $highlight->highlightCategory->name }}</td>
                                <td class="text-left">
                                    <a href="/backoffice/news/{{ $highlight->news->id }}/detail" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    {{ $highlight->news->title }}
                                </td>  
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $highlight->id }}" title="Ubah">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $highlight->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($highlights as $highlight)
                        @include('backoffice.highlight.modal.edit')
                        @include('backoffice.highlight.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</section>

@endsection
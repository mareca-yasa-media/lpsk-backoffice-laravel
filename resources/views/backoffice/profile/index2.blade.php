@extends('backoffice.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Profil</li>
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
                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Profil</b>
                                </h3>
                            </div>
    
                            {{-- <div class="pl-4">
    
                            </div>
                            <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <input type="text" name="search" class="form-control ml-2" placeholder="Nama ..." value="{{ $search }}">
                                <label for="" class="ml-2">Kategori: </label>
                                <select name="category_id" class="form-control ml-2">
                                    <option value="">-- Kategori --</option>
                                    @foreach ($profileCategories as $profileCategory)
                                        <option value="{{ $profileCategory->id }}" {{ $category_id == $profileCategory->id ? 'selected' : '' }}>{{ $profileCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div> --}}
    
                            @if ($search || $category_id)
                                <div class="input-group ml-2">
                                    <a href="/backoffice/profile" class="btn btn-primary btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            @endif
    
                        </form>
                        <div class="card-tools">
                            <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                <span class="fa fa-plus"></span> Tambah
                            </button>
                            {{-- Modal --}}
                            @include('backoffice.profile.modal.add')
    
                            {{-- @if ($errors->any())
                            <script>
                                jQuery(function() {
                                        $('#tambah').modal('show');
                                    });
                            </script>
                            @endif --}}
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" profile="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" profile="alert">
                        <strong>Gagal </strong>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if ($search || $category_id)
                        <div class="search">
                            <div class="text-center">
                                <span class="fa fa-search"></span> Hasil Pencarian dari:
                                    @if ($search )
                                        <br> Nama: <b>{{ $search }}</b> 
                                    @endif
                                    @if ($category_id )
                                        <br> Kategori: <b>{{ $profileCategori->name }}</b>
                                    @endif
                            </div>
                            <hr>
                        </div>
                    @endif

                    <div class="row">

                        @foreach ($profiles as $profile)
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    {{-- <div class="user-block">
                                        @if ( $profile->foto != null )
                                        <img src="{{ Storage::disk('s3')->url($profile->foto) }}" alt="" class="img-circle rounded">
                                        @else
                                        <img src="{{ asset('images/backoffice/profile-default.jpg') }}" alt="" class="img-circle rounded">
                                        @endif
                                        <span class="username">
                                            <p>{{ $profile->name }}</p>
                                        </span>
                                        <span class="description">Menambahkan Profil -
                                            {{ $profile->created_at }}</span>
                                    </div> --}}
                                    <div class="card-tools">
                                        {{-- @if ($profile_id == auth()->user()->id) --}}
                                        <a href="/backoffice/profile/{{ $profile->id }}/detail" class="btn btn-tool btn-sm" title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button class="btn btn-tool" data-toggle="modal" data-target="#edit-{{ $profile->id }}" title="Ubah">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-tool" data-toggle="modal" data-target="#delete-{{ $profile->id }}" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {{-- @endif --}}
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ( $profile->foto != null )
                                    <div class="text-center">
                                        <img src="{{ Storage::disk('s3')->url($profile->foto) }}"
                                            class="img-fluid rounded" alt="" style="width: 40%; height: 240px">
                                    </div>
                                    @else
                                    <div class="text-center">
                                        <img src="{{ asset('images/no-image.jpg') }}" class="img-fluid rounded"
                                            alt="" style="width: 40%; height: 240px">
                                    </div>
                                    @endif
                                    <h4 class="mt-2">
                                        <b>{{ $profile->name }}</b>
                                    </h4>
                                    @if ( $profile->profile_category_id != null )
                                    <small> {{ $profile->profileCategory->name }} </small>
                                    @endif
                                    <div class="mb-2" style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        -webkit-line-clamp: 3;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;">
                                        {{-- <div> {!! html_entity_decode($profile->content) !!} </div> --}}
                                        {{-- <div> {!! $profile->content !!} </div> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{-- modal --}}
                    @foreach ($profiles as $profile)
                    @include('backoffice.profile.modal.edit')
                    @include('backoffice.profile.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
        <div class="col-md-12 d-flex justify-content-end">
            {{ $profiles->links() }}
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $("#addImage").click(function () {
    
        $("#formInputImage").append(
            `
                <div class="" id="inputImage">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="file" name="image[]"
                                    class="form-control @if ($errors->has('image')) is-invalid @endif"
                                    value="{{ old('image') }}" required
                                    oninvalid="this.setCustomValidity('Gambar harus diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" id="deleteImage">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `
        );
    });

    $("#formInputImage").on('click', '#deleteImage', function () {
        $(this).parents('#inputImage').remove();
    });
</script>
<script type="text/javascript">
    $("#addVideo").click(function () {
    
        $("#formInputVideo").append(
            `
                <div class="" id="inputVideo">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="file" name="video[]"
                                    class="form-control @if ($errors->has('video')) is-invalid @endif"
                                    value="{{ old('video') }}" required
                                    oninvalid="this.setCustomValidity('Video harus diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" id="deleteVideo">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `
        );
    });

    $("#formInputVideo").on('click', '#deleteVideo', function () {
        $(this).parents('#inputVideo').remove();
    });
</script>
<script type="text/javascript">
    $("#addDocument").click(function () {
    
        $("#formInputDocument").append(
            `
                <div class="" id="inputDocument">
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="file" name="document[]"
                                    class="form-control @if ($errors->has('document')) is-invalid @endif"
                                    value="{{ old('document') }}" required
                                    oninvalid="this.setCustomValidity('Dokumen harus diisi')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger" id="deleteDocument">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `
        );
    });

    $("#formInputDocument").on('click', '#deleteDocument', function () {
        $(this).parents('#inputDocument').remove();
    });
</script>

@endsection
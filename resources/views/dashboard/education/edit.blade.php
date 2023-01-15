@extends('dashboard.layout')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-primary">Kembali </a></div>

<form class="row g-3" action="{{ route('education.update',$page->id) }}" method="POST">
    @method('put')
    @csrf
    <div class="col-md-12">
        <label for="judul" class="form-label">Univeristas</label>
        <input type="text" class="form-control" name="judul" id="judul" value="{{ $page->judul }}">
        @error('judul')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="info1" class="form-label">Nama Fakultas</label>
        <input type="text" class="form-control" name="info1" id="info1" value="{{ $page->info1 }}">
    </div>

    <div class="col-md-12">
        <label for="info2" class="form-label">Nama Prodi</label>
        <input type="text" class="form-control" name="info2" id="info2" value="{{ $page->info2 }}">
    </div>

    <div class="col-md-12">
        <label for="info3" class="form-label">IPK</label>
        <input type="text" class="form-control" name="info3" id="info3" value="{{ $page->info3 }}">
    </div>

    <div>
        <div class="row">
            <div class="col-auto">Tanggal Mulai</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai"
                    value="{{ $page->tgl_mulai }}"></div>
            <div class="col-auto">Tanggal Berahir</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="ahir"
                    value="{{ $page->ahir }}"></div>

        </div>

    </div>



    {{-- <div class="col-md-12">
        <label for="isi" class="form-label">isi</label>
        <textarea type="textarea" class="form-control summernote" name="isi" id="isi"
            value="{{ Session::get('isi') }}"> </textarea>
        @error('isi')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div> --}}

    {{-- <div id="summernote"></div> --}}


    <div class="col-12">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection
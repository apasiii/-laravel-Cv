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

<div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-primary">Kembali </a></div>

<form class="row g-3" action="{{ route('experience.store') }}" method="POST">
    @csrf
    <div class="col-md-12">
        <label for="judul" class="form-label">Posisi</label>
        <input type="text" class="form-control" name="judul" id="judul" value="{{ Session::get('judul') }}">
        @error('judul')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="info1" class="form-label">Nama Perusahaan</label>
        <input type="text" class="form-control" name="info1" id="info1" value="{{ Session::get('info1') }}">
    </div>

    <div>
        <div class="row">
            <div class="col-auto">Tanggal Mulai</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai"
                    placeholder="dd/mm/yyyy"></div>
            <div class="col-auto">Tanggal Berahir</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="ahir"
                    placeholder="mm/dd/yyy"></div>

        </div>

    </div>



    <div class="col-md-12">
        <label for="isi" class="form-label">isi</label>
        <textarea type="textarea" class="form-control summernote" name="isi" id="isi"
            value="{{ Session::get('isi') }}"> </textarea>
        @error('isi')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    {{-- <div id="summernote"></div> --}}


    <div class="col-12">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection
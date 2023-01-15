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

<div class="pb-3"><a href="{{ route('halaman.index') }}" class="btn btn-primary">Kembali </a></div>

<form class="row g-3" action="{{ route('halaman.update',$page->id) }}" method="POST">
    @method('put')
    @csrf
    <div class="col-md-12">
        <label for="judul" class="form-label">judul</label>
        <input type="text" class="form-control" name="judul" id="judul" value="{{ $page->judul }}">
        @error('judul')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="isi" class="form-label">isi</label>
        <textarea type="textarea" class="form-control summernote" name="isi" id="isi">{{ $page->isi }} </textarea>
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
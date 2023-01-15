@extends('dashboard.layout')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form class="row g-3" action="{{ route('skill.update') }}" method="POST">
    @csrf
    <div class="col-md-12">
        <label for="judul" class="form-label">Programming Skill </label>
        <input type="text" class="form-control skill" name="_language" id="judul"
            value="{{ get_meta_value('_language') }}">
        @error('judul')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="isi" class="form-label">Workflow</label>
        <textarea type="textarea" class="form-control summernote" name="_workflow"
            id="isi"> {{ get_meta_value('_workflow') }} </textarea>
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

<script>
    $(document).ready(function() {
        $('.skill').tokenfield({
            autocomplete: {
                source: [{!! $skill !!}],
                delay: 100
            },
            showAutocompleteOnFocus: true
        });
    });
</script>

@endsection
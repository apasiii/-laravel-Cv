@extends('dashboard.layout')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<p class="card-title">Halaman </p>
<div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary"> + Tambah Halaman </a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th class="col">Judul</th>

                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
            <tr>

                <td>{{ $loop->iteration }} </td>
                <td>{{ $page->judul }}</td>

                <td>
                    <a href="{{ route('halaman.edit',$page->id) }}" class="btn btn-sm btn-warning">edit</a>
                    <form onsubmit=" return confirm('apakah anda yakin ?')" class="d-inline"
                        action="{{ route('halaman.destroy',$page->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm " name="hapus">Hapus</button>

                    </form>

                </td>



            </tr>
            @endforeach

    </table>
</div>

@endsection
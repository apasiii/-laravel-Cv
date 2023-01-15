<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\riwayat;

class experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.experience.index', [
            'pages' => riwayat::where('tipe', 'experien')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            // 'ahir' => 'required',
            // 'isi' => 'required',
        ], [
            'judul.required' => 'Judul halaman harus diisi',
            'info1.required' => 'Info 1 harus diisi',
            'tgl_mulai.required' => 'Tanggal awal harus diisi',
            // 'ahir.required' => 'Tanggal akhir harus diisi',
            // 'isi.required' => 'Isi halaman harus diisi'
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => 'experien',
            'info1' => $request->info1,
            'tgl_mulai' => $request->tgl_mulai,
            'ahir' => $request->ahir,
            'isi' => $request->isi,
        ];


        riwayat::create($data);

        return redirect('dashboard/experience')->with('success', 'Halaman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.experience.edit', [
            'page' => riwayat::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            // 'ahir' => 'required',
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul halaman harus diisi',
            'info1.required' => 'Info 1 harus diisi',
            'tgl_mulai.required' => 'Tanggal awal harus diisi',
            // 'ahir.required' => 'Tanggal akhir harus diisi',
            'isi.required' => 'Isi halaman harus diisi'
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => 'experien',
            'info1' => $request->info1,
            'tgl_mulai' => $request->tgl_mulai,
            'ahir' => $request->ahir,
            'isi' => $request->isi,
        ];


        riwayat::where('id', $id)->update($data);

        return redirect('dashboard/experience')->with('success', 'Halaman berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        riwayat::destroy($id);

        return redirect('dashboard/experience')->with('success', 'Halaman berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\riwayat;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.education.index', [
            'pages' => riwayat::where('tipe', 'education')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
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
            'info2' => 'required',
            'info3' => 'required',
            'tgl_mulai' => 'required',
            // 'ahir' => 'required'

        ], [
            'judul.required' => 'Nama Univeristas harus di isi',
            'info1.required' => 'Nama Fakultas Harus di isi',
            'info2.required' => 'Nama Prodi harus di isi',
            'info3.required' => 'IPK harus di isi',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => 'education',
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tgl_mulai' => $request->tgl_mulai,
            'ahir' => $request->ahir,
        ];

        riwayat::create($data);

        return redirect('dashboard/education')->with('success', 'Halaman berhasil ditambahkan');
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
        return view('dashboard.education.edit', [
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
            'info2' => 'required',
            'info3' => 'required',
            'tgl_mulai' => 'required',
            // 'ahir' => 'required'

        ], [
            'judul.required' => 'Nama Univeristas harus di isi',
            'info1.required' => 'Nama Fakultas Harus di isi',
            'info2.required' => 'Nama Prodi harus di isi',
            'info3.required' => 'IPK harus di isi',
        ]);

        $data = [
            'judul' => $request->judul,
            'tipe' => 'education',
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tgl_mulai' => $request->tgl_mulai,
            'ahir' => $request->ahir,
        ];

        riwayat::where('id', $id)->update($data);
        riwayat::where('id', $id)->update($data);

        return redirect('dashboard/education')->with('success', 'Halaman berhasil ditambahkan');
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
        return redirect('dashboard/education')->with('success', 'Halaman berhasil dihapus');
    }
}

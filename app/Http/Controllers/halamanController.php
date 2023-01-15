<?php

namespace App\Http\Controllers;

use App\Models\page;
use app\Models\halaman;
use app\Models\halamen;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.halaman.index', [
            'pages' => page::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Session::flash('judul', $request->judul);
        // Session::flash('isi', $request->isi);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul halaman harus diisi',
            'isi.required' => 'Isi halaman harus diisi'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];


        page::create($data);


        return redirect('dashboard/halaman')->with('success', 'Halaman berhasil ditambahkan');
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
        return view('dashboard.halaman.edit', [
            'page' => page::find($id)
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
            'isi' => 'required',
        ], [
            'judul.required' => 'Judul halaman harus diisi',
            'isi.required' => 'Isi halaman harus diisi'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
        ];


        page::where('id', $id)->update($data);


        return redirect('dashboard/halaman')->with('success', 'Halaman berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        page::where('id', $id)->delete();
        return redirect('dashboard/halaman')->with('success', 'Halaman berhasil di Hapus !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $murid = murid::all();
        return view('murid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('murid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nis' => 'required|unique:id',
            'telp' => 'required|max:12',
            'alamat' => 'required',
            'img' => 'mimes:png,jpg,jpeg',
            'dkr' => 'required',
        ]);
        $img_path = '';
        if ($request->file('img')) {
            $img_path = $request->file('img')->store('pro', 'public');
        }

        $murid = murid::create([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'jurusan' => $request->input('jurusan'),
            'nis' => $request->input('nis'),
            'telp' => $request->input('telp'),
            'alamat' => $request->input('alamat'),
            'img' => $img_path,
            'dkr' => $request->input('dkr'),
        ]);
        return redirect()->route('murid.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(murid $murid, $id)
    {
        //
        $murid = murid::find($id);
        return view('murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, murid $murid, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nis' => 'required|unique:id',
            'telp' => 'required|max:12',
            'alamat' => 'required',
            'img' => 'mimes:png,jpg,jpeg',
            'dkr' => 'required',
        ]);
        $img_path = '';
        if ($request->file('img')) {
            $img_path = $request->file('img')->store('pro', 'public');
        }
        $murid = murid::find($id);
        $murid->nama = $request->input('nama');
        $murid->kelas = $request->input('kelas');
        $murid->jurusan = $request->input('jurusan');
        $murid->nis = $request->input('nis');
        $murid->telp = $request->input('telp');
        $murid->alamat = $request->input('alamat');
        $murid->img = $request->input('img');
        $murid->dkr = $img_path;
        $murid->save();

        return redirect()->route('murid.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(murid $murid, $id)
    {
        //
        $murid = murid::find($id)->delete();
        return redirect()->back();
    }
}

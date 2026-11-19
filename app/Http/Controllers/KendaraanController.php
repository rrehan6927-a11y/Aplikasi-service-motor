<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|string|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required|string',
            'warna_kendaraan' => 'required|string',
        ]);
        Kendaraan::create($request->all());
        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    // API Methods (Menggunakan no_plat sebagai identifier string)
    public function apiIndex() { return response()->json(['status' => 'success', 'data' => Kendaraan::all()], 200); }
    public function apiStore(Request $request) {
        $k = Kendaraan::create($request->all());
        return response()->json(['status' => 'success', 'data' => $k], 201);
    }
    public function apiShow($id) {
        $k = Kendaraan::find($id);
        return $k ? response()->json(['status' => 'success', 'data' => $k]) : response()->json(['status' => 'error', 'message' => 'Not found'], 404);
    }
    public function apiUpdate(Request $request, $id) {
        $k = Kendaraan::find($id);
        if(!$k) return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        $k->update($request->all());
        return response()->json(['status' => 'success', 'data' => $k]);
    }
    public function apiDestroy($id) {
        $k = Kendaraan::find($id);
        if(!$k) return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        $k->delete();
        return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string|max:100',
        ]);
        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    // API Methods
    public function apiIndex() { return response()->json(['status' => 'success', 'data' => Pelanggan::all()], 200); }
    public function apiStore(Request $request) {
        $request->validate(['nama_lengkap' => 'required', 'no_hp' => 'required', 'alamat' => 'required', 'pekerjaan' => 'required']);
        $p = Pelanggan::create($request->all());
        return response()->json(['status' => 'success', 'data' => $p], 201);
    }
    public function apiShow($id) {
        $p = Pelanggan::find($id);
        return $p ? response()->json(['status' => 'success', 'data' => $p]) : response()->json(['status' => 'error', 'message' => 'Not found'], 404);
    }
    public function apiUpdate(Request $request, $id) {
        $p = Pelanggan::find($id);
        if(!$p) return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        $p->update($request->all());
        return response()->json(['status' => 'success', 'data' => $p]);
    }
    public function apiDestroy($id) {
        $p = Pelanggan::find($id);
        if(!$p) return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        $p->delete();
        return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);
    }
}
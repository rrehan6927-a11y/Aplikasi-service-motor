<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController
{
    public function index() { $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])->get(); return view('daftar_service.index', compact('daftarServices')); }
    public function create() { $pelanggans = Pelanggan::all(); $kendaraans = Kendaraan::all(); return view('daftar_service.create', compact('pelanggans', 'kendaraans')); }
    public function store(Request $request) {
        $request->validate(['no_plat' => 'required', 'id_pelanggan' => 'required', 'nama_pelanggan' => 'required', 'keluhan_kendaraan' => 'required', 'tanggal_servis' => 'required']);
        DaftarService::create($request->all());
        return redirect()->route('daftar-service.index')->with('success', 'Berhasil ditambahkan.');
    }
    public function getPelanggan($id) {
        $p = Pelanggan::find($id);
        return response()->json(['nama_lengkap' => $p ? $p->nama_lengkap : '']);
    }

    // API Methods
    public function apiIndex() { return response()->json(['status' => 'success', 'data' => DaftarService::with(['pelanggan', 'kendaraan'])->get()]); }
    public function apiStore(Request $request) { $ds = DaftarService::create($request->all()); return response()->json(['status' => 'success', 'data' => $ds], 201); }
    public function apiShow($id) { $ds = DaftarService::with(['pelanggan', 'kendaraan'])->find($id); return $ds ? response()->json(['status' => 'success', 'data' => $ds]) : response()->json(['message' => 'Not found'], 404); }
    public function apiUpdate(Request $request, $id) { $ds = DaftarService::find($id); if(!$ds) return response()->json(['message' => 'Not found'], 404); $ds->update($request->all()); return response()->json(['status' => 'success', 'data' => $ds]); }
    public function apiDestroy($id) { $ds = DaftarService::find($id); if(!$ds) return response()->json(['message' => 'Not found'], 404); $ds->delete(); return response()->json(['status' => 'success', 'message' => 'Deleted']); }
}
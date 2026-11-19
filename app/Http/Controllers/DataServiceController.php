<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController
{
    public function index() { $dataServices = DataService::with('daftarService')->get(); return view('data_service.index', compact('dataServices')); }
    public function create() { $daftarServices = DaftarService::all(); return view('data_service.create', compact('daftarServices')); }
    public function store(Request $request) {
        $request->validate(['id_servis' => 'required', 'keluhan_kendaraan' => 'required', 'estimasi_service' => 'required', 'nama_mekanik' => 'required', 'sparepart_pengganti' => 'required']);
        DataService::create($request->all());
        return redirect()->route('data-service.index')->with('success', 'Berhasil ditambahkan.');
    }
    public function getKeluhan($id) {
        $ds = DaftarService::find($id);
        return response()->json(['keluhan_kendaraan' => $ds ? $ds->keluhan_kendaraan : '']);
    }

    // API Methods
    public function apiIndex() { return response()->json(['status' => 'success', 'data' => DataService::with('daftarService')->get()]); }
    public function apiStore(Request $request) { $dt = DataService::create($request->all()); return response()->json(['status' => 'success', 'data' => $dt], 201); }
    public function apiShow($id) { $dt = DataService::with('daftarService')->find($id); return $dt ? response()->json(['status' => 'success', 'data' => $dt]) : response()->json(['message' => 'Not found'], 404); }
    public function apiUpdate(Request $request, $id) { $dt = DataService::find($id); if(!$dt) return response()->json(['message' => 'Not found'], 404); $dt->update($request->all()); return response()->json(['status' => 'success', 'data' => $dt]); }
    public function apiDestroy($id) { $dt = DataService::find($id); if(!$dt) return response()->json(['message' => 'Not found'], 404); $dt->delete(); return response()->json(['status' => 'success', 'message' => 'Deleted']); }
}
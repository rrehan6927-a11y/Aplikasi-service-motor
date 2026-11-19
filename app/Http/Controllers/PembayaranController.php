<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController
{
    public function index() { $pembayarans = Pembayaran::with('daftarService')->get(); return view('pembayaran.index', compact('pembayarans')); }
    public function create() { $daftarServices = DaftarService::all(); return view('pembayaran.create', compact('daftarServices')); }
    public function store(Request $request) {
        $request->validate(['id_servis' => 'required', 'jumlah_biaya' => 'required', 'jenis_pembayaran' => 'required']);
        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Berhasil disimpan.');
    }

    // API Methods
    public function apiIndex() { return response()->json(['status' => 'success', 'data' => Pembayaran::with('daftarService')->get()]); }
    public function apiStore(Request $request) { $pb = Pembayaran::create($request->all()); return response()->json(['status' => 'success', 'data' => $pb], 201); }
    public function apiShow($id) { $pb = Pembayaran::with('daftarService')->find($id); return $pb ? response()->json(['status' => 'success', 'data' => $pb]) : response()->json(['message' => 'Not found'], 404); }
    public function apiUpdate(Request $request, $id) { $pb = Pembayaran::find($id); if(!$pb) return response()->json(['message' => 'Not found'], 404); $pb->update($request->all()); return response()->json(['status' => 'success', 'data' => $pb]); }
    public function apiDestroy($id) { $pb = Pembayaran::find($id); if(!$pb) return response()->json(['message' => 'Not found'], 404); $pb->delete(); return response()->json(['status' => 'success', 'message' => 'Deleted']); }
}
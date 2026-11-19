@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Tambah Data Kendaraan</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">No Plat Kendaraan</label>
            <input type="text" name="no_plat" value="{{ old('no_plat') }}" placeholder="Contoh: B 1234 XYZ" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Jenis Kendaraan (Pilih salah satu)</label>
            <div class="flex items-center space-x-6 mt-2">
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="jenis_kendaraan" value="Matic" {{ old('jenis_kendaraan') == 'Matic' ? 'checked' : '' }} required class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                    <span class="ml-2 text-gray-700 font-medium">Matic</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="jenis_kendaraan" value="Manual Transmisi" {{ old('jenis_kendaraan') == 'Manual Transmisi' ? 'checked' : '' }} required class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                    <span class="ml-2 text-gray-700 font-medium">Manual Transmisi</span>
                </label>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">No STNK</label>
            <input type="text" name="no_stnk" value="{{ old('no_stnk') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Tahun Pembuatan Kendaraan</label>
            <input type="number" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" placeholder="Contoh: 2023" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Pemilik</label>
            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Warna Kendaraan</label>
            <input type="text" name="warna_kendaraan" value="{{ old('warna_kendaraan') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('kendaraan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
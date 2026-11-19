@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Tambah Pembayaran Service</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembayaran.store') }}" method="POST">
        @csrf
        
        <!-- Dropdown ID Servis -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">ID Servis Pelanggan</label>
            <select name="id_servis" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih ID Servis --</option>
                @foreach($daftarServices as $ds)
                    <option value="{{ $ds->id_servis }}" {{ old('id_servis') == $ds->id_servis ? 'selected' : '' }}>
                        ID Servis: {{ $ds->id_servis }} ({{ $ds->nama_pelanggan }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Jumlah Biaya Servis (Rp)</label>
            <input type="number" name="jumlah_biaya" value="{{ old('jumlah_biaya') }}" placeholder="Contoh: 150000" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <!-- Radio Button Jenis Pembayaran -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Jenis Pembayaran (Pilih salah satu)</label>
            <div class="flex items-center space-x-6 mt-2">
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="jenis_pembayaran" value="Cash/Tunai" {{ old('jenis_pembayaran') == 'Cash/Tunai' ? 'checked' : '' }} required class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                    <span class="ml-2 text-gray-700 font-medium">Cash/Tunai</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="jenis_pembayaran" value="Non Tunai" {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }} required class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300">
                    <span class="ml-2 text-gray-700 font-medium">Non Tunai (Transfer/QRIS)</span>
                </label>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Keterangan (Opsional)</label>
            <textarea name="keterangan" rows="3" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('keterangan') }}</textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pembayaran.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
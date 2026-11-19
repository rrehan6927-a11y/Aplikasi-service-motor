@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Tambah Daftar Service</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('daftar-service.store') }}" method="POST">
        @csrf
        
        <!-- Dropdown No Plat Kendaraan -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">No Plat Kendaraan</label>
            <select name="no_plat" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih No Plat Kendaraan --</option>
                @foreach($kendaraans as $k)
                    <option value="{{ $k->no_plat }}" {{ old('no_plat') == $k->no_plat ? 'selected' : '' }}>
                        {{ $k->no_plat }} ({{ $k->nama_pemilik }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown ID Pelanggan -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">ID Pelanggan</label>
            <select name="id_pelanggan" id="id_pelanggan" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih ID Pelanggan --</option>
                @foreach($pelanggans as $p)
                    <option value="{{ $p->id_pelanggan }}" {{ old('id_pelanggan') == $p->id_pelanggan ? 'selected' : '' }}>
                        ID: {{ $p->id_pelanggan }} - {{ $p->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Pelanggan (Auto-fill) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Pelanggan (Otomatis)</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" readonly required class="w-full bg-gray-100 border border-gray-300 rounded-md px-3 py-2 focus:outline-none">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Keluhan Kendaraan</label>
            <textarea name="keluhan_kendaraan" rows="3" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('keluhan_kendaraan') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Servis</label>
            <input type="date" name="tanggal_servis" value="{{ old('tanggal_servis', date('Y-m-d')) }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('daftar-service.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">Simpan</button>
        </div>
    </form>
</div>

<!-- Script untuk Auto-fill Nama Pelanggan -->
<script>
    document.getElementById('id_pelanggan').addEventListener('change', function() {
        let idPelanggan = this.value;
        let inputNama = document.getElementById('nama_pelanggan');
        
        if (idPelanggan) {
            fetch('/get-pelanggan/' + idPelanggan)
                .then(response => response.json())
                .then(data => {
                    if (data.nama_lengkap) {
                        inputNama.value = data.nama_lengkap;
                    } else {
                        inputNama.value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            inputNama.value = '';
        }
    });
</script>
@endsection
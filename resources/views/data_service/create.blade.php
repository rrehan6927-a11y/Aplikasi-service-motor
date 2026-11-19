@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Tambah Data Service</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('data-service.store') }}" method="POST">
        @csrf
        
        <!-- Dropdown ID Servis dari Daftar Service -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">ID Servis Pelanggan</label>
            <select name="id_servis" id="id_servis" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih ID Servis --</option>
                @foreach($daftarServices as $ds)
                    <option value="{{ $ds->id_servis }}" {{ old('id_servis') == $ds->id_servis ? 'selected' : '' }}>
                        ID Servis: {{ $ds->id_servis }} (Plat: {{ $ds->no_plat }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Keluhan Kendaraan (Auto-fill) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Keluhan Kendaraan (Otomatis)</label>
            <textarea name="keluhan_kendaraan" id="keluhan_kendaraan" rows="3" readonly required class="w-full bg-gray-100 border border-gray-300 rounded-md px-3 py-2 focus:outline-none">{{ old('keluhan_kendaraan') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Estimasi Service</label>
            <input type="text" name="estimasi_service" value="{{ old('estimasi_service') }}" placeholder="Contoh: 2 Jam / 1 Hari" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Mekanik</label>
            <input type="text" name="nama_mekanik" value="{{ old('nama_mekanik') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Sparepart Pengganti</label>
            <input type="text" name="sparepart_pengganti" value="{{ old('sparepart_pengganti') }}" placeholder="Contoh: Oli Mesin, Kampas Rem" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('data-service.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">Simpan</button>
        </div>
    </form>
</div>

<!-- Script Auto-fill Keluhan -->
<script>
    document.getElementById('id_servis').addEventListener('change', function() {
        let idServis = this.value;
        let inputKeluhan = document.getElementById('keluhan_kendaraan');
        
        if (idServis) {
            fetch('/get-keluhan/' + idServis)
                .then(response => response.json())
                .then(data => {
                    if (data.keluhan_kendaraan) {
                        inputKeluhan.value = data.keluhan_kendaraan;
                    } else {
                        inputKeluhan.value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            inputKeluhan.value = '';
        }
    });
</script>
@endsection
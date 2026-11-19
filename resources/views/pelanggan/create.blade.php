@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">➕ Tambah Data Pelanggan</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Alamat Pelanggan</label>
            <textarea name="alamat" rows="3" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pelanggan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md transition">Batal</a>
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
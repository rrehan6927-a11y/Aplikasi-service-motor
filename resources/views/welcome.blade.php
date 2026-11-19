@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg overflow-hidden p-8 text-center">
    <h1 class="text-3xl font-bold text-red-600 mb-4">🏍️ Selamat Datang di Aplikasi Service Motor</h1>
    <p class="text-gray-600 mb-6">Silakan pilih menu di atas untuk mengelola data pelanggan, kendaraan, daftar service, data service, hingga pembayaran.</p>
    <div class="flex justify-center space-x-4">
        <a href="{{ route('pelanggan.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-md shadow transition">
            Kelola Data Pelanggan
        </a>
        <a href="{{ route('kendaraan.index') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-semibold px-6 py-3 rounded-md shadow transition">
            Kelola Kendaraan
        </a>
    </div>
</div>
@endsection
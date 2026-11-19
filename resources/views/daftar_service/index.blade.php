@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📋 Daftar Service Kendaraan</h2>
        <a href="{{ route('daftar-service.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">
            + Tambah Daftar Service
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Servis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Plat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keluhan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Servis</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($daftarServices as $ds)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">{{ $ds->id_servis }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $ds->no_plat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $ds->id_pelanggan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $ds->nama_pelanggan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $ds->keluhan_kendaraan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $ds->tanggal_servis }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data daftar service.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
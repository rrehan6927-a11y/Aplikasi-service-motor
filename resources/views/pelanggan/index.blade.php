@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📋 Data Pelanggan</h2>
        <a href="{{ route('pelanggan.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow transition">
            + Tambah Pelanggan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pelanggans as $p)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $p->id_pelanggan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $p->nama_lengkap }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $p->no_hp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $p->alamat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $p->pekerjaan }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada data pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Service Motor</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js untukinteraksi dropdown/mobile -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <!-- Navbar Merah-Putih -->
    <nav class="bg-red-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl font-bold tracking-wider">🏍️ SERVICE MOTOR</span>
                </div>
                <div class="hidden md:flex items-center space-x-6 font-medium">
                    <a href="{{ route('pelanggan.index') }}" class="hover:bg-red-700 px-3 py-2 rounded-md transition">Pelanggan</a>
                    <a href="{{ route('kendaraan.index') }}" class="hover:bg-red-700 px-3 py-2 rounded-md transition">Kendaraan</a>
                    <a href="{{ route('daftar-service.index') }}" class="hover:bg-red-700 px-3 py-2 rounded-md transition">Daftar Service</a>
                    <a href="{{ route('data-service.index') }}" class="hover:bg-red-700 px-3 py-2 rounded-md transition">Data Service</a>
                    <a href="{{ route('pembayaran.index') }}" class="hover:bg-red-700 px-3 py-2 rounded-md transition">Pembayaran</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12 py-4 text-center text-sm text-gray-500">
        Proyek Akhir TRKJ 2D Sistem Terintegrasi &copy; 2026
    </footer>

</body>
</html>
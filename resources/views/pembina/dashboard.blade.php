<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembina Dashboard - SIME Tahfidz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">
    
    @include('layouts.sidebar')

    <!-- Perbaikan Layout: Menggunakan struktur pembungkus div p-4 sm:ml-64 seperti halaman ustadzah -->
    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto pt-6 px-2 sm:px-4 space-y-6">
            
            <!-- Tambahan: Header Selamat Datang Pembina (Gaya Mewah Khas Aplikasi Kamu) -->
            <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-amber-400 text-indigo-950 w-14 h-14 rounded-2xl shadow-lg shadow-amber-400/10 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-black text-slate-800 uppercase tracking-tight leading-none">
                            Selamat Datang, <span class="text-amber-500">Pembina</span>
                        </h1>
                        <p class="text-slate-500 text-xs mt-1.5 font-medium">Ringkasan aktivitas harian dan statistik perkembangan hafalan santriwati.</p>
                    </div>
                </div>
                
                <div class="bg-indigo-50 border border-indigo-100 text-indigo-700 px-4 py-2 rounded-2xl font-bold text-xs shadow-sm flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar-day text-amber-500"></i> {{ today()->translatedFormat('d F Y') }}
                </div>
            </div>

            <!-- Statistik Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Santriwati</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $totalSantri }}</h3>
                    </div>
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl"><i class="fa-solid fa-users text-xl"></i></div>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Ustadzah</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $totalUstadzah }}</h3>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-2xl"><i class="fa-solid fa-user-shield text-xl"></i></div>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Kelas</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $totalKelas }}</h3>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl"><i class="fa-solid fa-graduation-cap text-xl"></i></div>
                </div>
            </div>

            <!-- Tabel Setoran Hari Ini -->
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
                <h2 class="font-bold text-base text-slate-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-bolt text-amber-500"></i> Aktivitas Setoran Masuk Hari Ini
                </h2>
                <div class="overflow-x-auto rounded-2xl border border-slate-100">
                    <table class="min-w-full text-xs text-left">
                        <thead class="bg-slate-50 text-slate-600 font-bold border-b border-slate-100">
                            <tr>
                                <th class="p-4 uppercase tracking-wider">Nama Santri</th>
                                <th class="p-4 uppercase tracking-wider">kelas</th>
                                <th class="p-4 text-center uppercase tracking-wider">Juz</th>
                                <th class="p-4 text-center uppercase tracking-wider">Halaman</th>
                                <th class="p-4 uppercase tracking-wider">Surah</th>
                                <th class="p-4 uppercase tracking-wider">Waktu</th>
                            </tr>
                        </thead>
                    <tbody class="divide-y divide-slate-100">
    @forelse($setoranHariIni as $setoran)
    <tr class="hover:bg-slate-50/50 transition">
        <td class="px-6 py-4 font-bold text-slate-800">{{ $setoran->santri->nama ?? 'Santri Tidak Ditemukan' }}</td>
        <td class="px-6 py-4 text-slate-600">{{ $setoran->santri->kelas ?? '-' }}</td>
        <td class="px-6 py-4 text-center text-slate-600">{{ $setoran->juz }}</td>
        <td class="px-6 py-4 text-center text-slate-600">{{ $setoran->halaman }}</td>
        <td class="px-6 py-4 text-slate-600">{{ $setoran->surah }}</td>
        <td class="px-6 py-4 text-slate-400 font-mono text-[10px]">
            {{ $setoran->created_at->format('H:i') }}
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
            Belum ada setoran masuk hari ini.
        </td>
    </tr>
    @endforelse
</tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Santri</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes bounce-short {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-bounce-short { animation: bounce-short 2s ease-in-out infinite; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-900">
    @include('layouts.sidebar')

    @php
        
        $totalJuz = $totalJuz ?? ($riwayat->max('juz') ?? 0); 
        
        $targetMinimal = 7; 
        $bulanSekarang = (int)date('n');
        $isWarning = ($totalJuz < $targetMinimal);
        $isCritical = ($isWarning && in_array($bulanSekarang, [4, 5, 6]));
    @endphp

    <div class="sm:ml-64 min-h-screen py-8 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto space-y-6">
            
            <div id="welcome-wali-js" class="hidden flex items-center p-5 bg-emerald-600 text-white rounded-3xl shadow-xl shadow-emerald-100 border-b-4 border-emerald-800 transition-all duration-500 relative overflow-hidden">
                <div class="flex-shrink-0 bg-white/10 p-3 rounded-2xl mr-4 text-xl w-12 h-12 flex items-center justify-center animate-bounce-short text-emerald-200">
                    <i class="fa-solid fa-star-and-crescent"></i>
                </div>
                <div class="flex-1">
                    <h2 class="font-black text-lg leading-tight tracking-tight">Assalamu'alaikum, Ayah & Bunda!</h2>
                    <p class="text-xs text-emerald-50 mt-0.5 font-medium opacity-90">Mari pantau progres hafalan Ananda hari ini.</p>
                </div>
                <button onclick="closeWelcomeWali()" class="p-2 hover:bg-white/10 rounded-xl transition text-white/70 hover:text-white">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            @if($isWarning)
            <div id="warning-target-box" class="overflow-hidden rounded-3xl border-2 {{ $isCritical ? 'border-rose-500 bg-rose-50/60' : 'border-amber-400 bg-amber-50/60' }} shadow-lg shadow-slate-100 relative transition-all duration-300">
                <div class="flex flex-col md:flex-row">
                    <div class="{{ $isCritical ? 'bg-rose-500' : 'bg-amber-400' }} p-5 flex md:flex-col items-center justify-center text-white gap-2 md:w-24">
                        <i class="fa-solid fa-triangle-exclamation text-3xl"></i>
                    </div>
                    
                    <div class="p-6 flex-1 space-y-3 pr-12"> 
                        <div class="flex flex-wrap justify-between items-start gap-2">
                            <h3 class="font-black {{ $isCritical ? 'text-rose-800' : 'text-amber-900' }} uppercase tracking-tight text-base flex items-center gap-2">
                                {{ $isCritical ? 'Peringatan Kritis Akhir Tahun' : 'Evaluasi Capaian Hafalan' }}
                            </h3>
                            <span class="px-3 py-1 rounded-xl text-[10px] font-black uppercase tracking-wide {{ $isCritical ? 'bg-rose-200/80 text-rose-800' : 'bg-amber-200/80 text-amber-800' }}">
                                {{ $isCritical ? 'Sangat Mendesak' : 'Perhatian' }}
                            </span>
                        </div>
                        
                        <p class="text-slate-700 text-xs leading-relaxed">
                            Saat ini capaian hafalan Ananda baru mencapai <span class="font-bold text-slate-900 bg-white/80 border px-1.5 py-0.5 rounded-md">{{ $totalJuz }} Juz</span>, masih berada di bawah target minimal tahunan pondok pesantren yaitu <span class="font-bold text-indigo-600 underline decoration-2">{{ $targetMinimal }} Juz</span>.
                        </p>

                        <div class="bg-white/80 backdrop-blur rounded-2xl p-4 border {{ $isCritical ? 'border-rose-200' : 'border-amber-200' }}">
                            <p class="text-xs {{ $isCritical ? 'text-rose-800' : 'text-amber-900' }} font-medium leading-relaxed">
                                <span class="font-black text-rose-600 uppercase tracking-wide"><i class="fa-solid fa-circle-exclamation mr-1"></i> Konsekuensi:</span> Sesuai regulasi akademik madrasah, jika hingga batas akhir verifikasi target hafalan belum terpenuhi, Ananda berisiko <span class="text-rose-600 font-bold underline decoration-wavy">Dinyatakan Tidak Naik Kelas</span>.
                            </p>
                        </div>
                    </div>
                </div>

                <button onclick="closeWarningBox()" class="absolute top-4 right-4 p-2 rounded-xl transition {{ $isCritical ? 'text-rose-400 hover:bg-rose-100 hover:text-rose-700' : 'text-amber-500 hover:bg-amber-100 hover:text-amber-800' }}">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            @endif

            <div class="p-6 bg-white rounded-3xl shadow-sm border border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-50 border border-indigo-100 rounded-2xl flex items-center justify-center text-indigo-500 text-lg">
                        <i class="fa-solid fa-id-card-clip"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-black text-slate-800 tracking-tight uppercase">Capaian Hafalan Santri</h1>
                        <p class="text-slate-500 text-xs mt-0.5">Ananda: <span class="font-bold text-indigo-600 capitalize text-sm">{{ $santri->nama }}</span></p>
                    </div>
                </div>
                <span class="bg-emerald-50 text-emerald-600 border border-emerald-100 px-3 py-1.5 rounded-xl font-black text-[10px] uppercase tracking-widest self-end sm:self-auto">
                    <i class="fa-solid fa-circle-check text-[8px] mr-1"></i> Santri Aktif
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-6 rounded-3xl text-white shadow-lg shadow-indigo-900/10 flex items-center justify-between relative overflow-hidden" 
                     style="background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);">
                    <div class="space-y-1">
                        <p class="text-indigo-200 text-[10px] font-black uppercase tracking-wider opacity-90">Total Capaian</p>
                        <div class="flex items-end gap-1">
                            <h2 class="text-5xl font-black leading-none tracking-tight">{{ $totalJuz }}</h2>
                            <span class="text-sm font-bold text-indigo-200 pb-1">Juz</span>
                        </div>
                    </div>
                    <div class="bg-white/10 w-14 h-14 rounded-2xl flex items-center justify-center text-2xl text-indigo-200">
                        <i class="fa-solid fa-book-quran"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col justify-between gap-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-[10px] font-black uppercase tracking-wider">Kehadiran Bulan Ini</p>
                            <h2 class="text-3xl font-black text-slate-800 tracking-tight mt-1">{{ number_format($persentaseHadir, 0) }}%</h2>
                        </div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-base {{ $persentaseHadir >= 80 ? 'bg-emerald-50 text-emerald-500' : 'bg-amber-50 text-amber-500' }}">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500 {{ $persentaseHadir >= 80 ? 'bg-emerald-500' : ($persentaseHadir >= 60 ? 'bg-amber-400' : 'bg-rose-500') }}" 
                                 style="width: {{ $persentaseHadir }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center justify-between gap-4 overflow-hidden">
                    <div class="space-y-1 flex-1 min-w-0">
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-wider">Setoran Terakhir</p>
                        <h2 class="text-lg font-black text-slate-800 truncate tracking-tight mt-1">{{ $lastSetoran->surah ?? 'Belum ada' }}</h2>
                        <p class="text-xs text-indigo-600 font-bold flex items-center gap-1.5">
                            <span>Juz {{ $lastSetoran->juz ?? '-' }}</span>
                            <span class="text-slate-300">|</span>
                            <span>Hal {{ $lastSetoran->halaman ?? '-' }}</span>
                        </p>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 w-12 h-12 rounded-2xl flex items-center justify-center text-lg text-slate-400 flex-shrink-0">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/40 flex items-center gap-3">
                    <div class="w-8 h-8 bg-indigo-50 text-indigo-500 rounded-xl flex items-center justify-center text-sm">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <h3 class="font-black text-slate-800 uppercase tracking-tight text-sm">Riwayat Setoran Lengkap</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/70 text-slate-400 text-[10px] uppercase font-bold border-b border-slate-100 tracking-wider">
                            <tr>
                                <th class="px-6 py-4 w-32">Tanggal</th>
                                <th class="px-6 py-4">Surah & Capaian</th>
                                <th class="px-6 py-4 text-center w-24">Status</th>
                                <th class="px-6 py-4">Catatan Ustadzah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 text-xs font-medium text-slate-600">
                            @forelse($riwayat as $item)
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4 font-bold text-slate-700 whitespace-nowrap">
                                    <i class="fa-regular fa-calendar text-slate-300 mr-1.5"></i>{{ $item->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-black text-slate-800 tracking-tight">{{ $item->surah }}</div>
                                    <div class="text-[10px] text-indigo-500 font-bold uppercase tracking-wide mt-0.5">Juz {{ $item->juz }} &bull; Hal {{ $item->halaman }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wide {{ $item->status == 'Hadir' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-rose-50 text-rose-600 border border-rose-100' }}">
                                        {{ $item->status == 'Hadir' ? 'Setor' : $item->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500 font-normal italic max-w-xs truncate">
                                    <span class="not-italic text-slate-300 mr-1">“</span>{{ $item->catatan ?? 'Tidak ada catatan pembimbing' }}<span class="not-italic text-slate-300 ml-1">”</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center text-slate-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-folder-open text-3xl text-slate-200"></i>
                                        <p class="text-sm font-semibold text-slate-400">Belum ada riwayat rekaman setoran hafalan.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById('welcome-wali-js');
            const today = new Date().toDateString();
            const hasGreeted = localStorage.getItem('greeted_wali');
            if (hasGreeted !== today) {
                alertBox.classList.remove('hidden');
            }
        });

        function closeWelcomeWali() {
            const alertBox = document.getElementById('welcome-wali-js');
            alertBox.classList.add('hidden');
            localStorage.setItem('greeted_wali', new Date().toDateString());
        }

        function closeWarningBox() {
            const warningBox = document.getElementById('warning-target-box');
            if (warningBox) {
                warningBox.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
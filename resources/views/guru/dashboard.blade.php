<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ustadzah</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes bounce-short {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-bounce-short {
            animation: bounce-short 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')
    
    <div class="sm:ml-64 min-h-screen py-8 px-6">
        <div class="max-w-6xl mx-auto space-y-6">

            <div id="welcome-alert-js" class="hidden flex items-center p-5 bg-indigo-600 text-white rounded-3xl shadow-xl shadow-indigo-100 border-b-4 border-indigo-800 transition relative overflow-hidden">
                <div class="flex-shrink-0 bg-white/10 p-3 rounded-2xl mr-4 text-xl w-12 h-12 flex items-center justify-center animate-bounce-short">
                    <i class="fa-solid fa-hand-wave text-indigo-200"></i>
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">Selamat Datang, Ustadzah {{ auth()->user()->name }} 👋</h1>
                    <p class="text-sm text-indigo-100/90 mt-0.5">
                        Wali Kelas: <span class="font-bold text-white bg-white/20 px-2 py-0.5 rounded-md text-xs ml-1">{{ $kelasDiampu ?? 'Belum Diatur' }}</span>
                    </p>
                </div>
                <button onclick="closeWelcome()" class="p-2 hover:bg-white/10 rounded-xl transition text-white/70 hover:text-white">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <div class="bg-white rounded-3xl shadow-sm p-6 flex flex-col md:flex-row justify-between items-start md:items-center border-l-8 border-indigo-600 gap-4">
                <div>
                    <h1 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Halaman Dashboard</h1>
                    <p class="text-slate-500 text-xs mt-0.5 font-medium">Update data setoran santri secara real-time.</p>
                </div>

                <div class="flex gap-3 items-center self-end md:self-auto">
                    <span class="bg-indigo-50 text-indigo-600 border border-indigo-100 px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider">
                        Tahun Ajaran 2026/2027
                    </span>
                    <div class="p-2.5 bg-slate-50 border border-slate-100 rounded-xl text-slate-400 hover:text-indigo-600 cursor-help transition" title="Data diperbarui otomatis">
                        <i class="fa-solid fa-circle-info text-base"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-slate-900 rounded-3xl p-5 text-white shadow-lg shadow-slate-900/10 flex items-center justify-between relative overflow-hidden">
                    <div class="space-y-1">
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Seluruh Santri</p>
                        <h3 class="text-3xl font-black tracking-tight">{{ ($setor ?? 0) + ($izin ?? 0) + ($sakit ?? 0) + ($alpa ?? 0) + ($belumSetor ?? 0) }}</h3>
                    </div>
                    <div class="bg-white/10 w-12 h-12 rounded-2xl flex items-center justify-center text-xl text-slate-300">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Sudah Setor</p>
                        <h3 class="text-3xl font-black text-emerald-500 tracking-tight">{{ $setor ?? 0 }}</h3>
                    </div>
                    <div class="bg-emerald-50 w-11 h-11 rounded-2xl flex items-center justify-center text-lg text-emerald-500">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Belum Setor</p>
                        <h3 class="text-3xl font-black text-rose-500 tracking-tight">{{ $belumSetor ?? 0 }}</h3>
                    </div>
                    <div class="bg-rose-50 w-11 h-11 rounded-2xl flex items-center justify-center text-lg text-rose-500">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <p class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Izin / Sakit</p>
                        <h3 class="text-3xl font-black text-amber-500 tracking-tight">{{ ($izin ?? 0) + ($sakit ?? 0) }}</h3>
                    </div>
                    <div class="bg-amber-50 w-11 h-11 rounded-2xl flex items-center justify-center text-lg text-amber-500">
                        <i class="fa-solid fa-user-clock"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-1 bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div class="text-center mb-4">
                        <h3 class="font-black text-slate-800 uppercase tracking-tight text-sm">Statistik Kehadiran</h3>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Hari Ini</p>
                    </div>
                    
                    <div class="h-56 relative my-auto">
                        <canvas id="grafikDetail"></canvas>
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-3xl font-black text-slate-800 tracking-tight">{{ ($setor ?? 0) + ($izin ?? 0) + ($sakit ?? 0) + ($alpa ?? 0) }}</span>
                            <span class="text-[8px] text-slate-400 font-bold uppercase tracking-wider">Total Absen</span>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-2xl border border-slate-100/50">
                            <div class="flex items-center text-[11px] font-bold text-slate-600 uppercase tracking-wide">
                                <span class="w-2.5 h-2.5 bg-[#10b981] rounded-full mr-2 shadow-sm"></span> Setor Hafalan
                            </div>
                            <span class="text-xs font-black text-slate-700">{{ $setor ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-2xl border border-slate-100/50">
                            <div class="flex items-center text-[11px] font-bold text-slate-600 uppercase tracking-wide">
                                <span class="w-2.5 h-2.5 bg-[#fbbf24] rounded-full mr-2 shadow-sm"></span> Izin / Sakit
                            </div>
                            <span class="text-xs font-black text-slate-700">{{ ($izin ?? 0) + ($sakit ?? 0) }}</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-slate-50 rounded-2xl border border-slate-100/50">
                            <div class="flex items-center text-[11px] font-bold text-slate-600 uppercase tracking-wide">
                                <span class="w-2.5 h-2.5 bg-[#f43f5e] rounded-full mr-2 shadow-sm"></span> Alpa (Tanpa Ket)
                            </div>
                            <span class="text-xs font-black text-slate-700">{{ $alpa ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
                    <div class="p-6 border-b border-slate-100 bg-slate-50/40 flex justify-between items-center">
                        <h3 class="font-black text-slate-800 uppercase tracking-tight text-sm">Daftar Absensi & Setoran</h3>
                        <div class="flex items-center gap-1.5 bg-indigo-50 border border-indigo-100 px-2.5 py-1 rounded-xl">
                            <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                            <span class="text-[9px] font-black text-indigo-600 uppercase tracking-wider">Live Update</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="text-[10px] uppercase tracking-widest font-bold text-slate-400 bg-slate-50/50 border-b border-slate-100">
                                <tr>
                                    <th class="px-4 py-4 text-center w-12">#</th>
                                    <th class="px-6 py-4">Nama Santri</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Keterangan Progres</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 text-xs font-medium text-slate-600">
                                @forelse($riwayatHariIni as $data)
                                <tr class="hover:bg-slate-50/70 transition group">
                                    <td class="px-4 py-4 text-center font-bold text-slate-300 group-hover:text-indigo-500 transition">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-slate-800 text-sm capitalize">{{ $data->santri->nama ?? 'Santri Terhapus' }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($data->status == 'Hadir')
                                            <span class="bg-emerald-50 text-emerald-600 border border-emerald-100 px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wide">Setor</span>
                                        @elseif($data->status == 'Izin' || $data->status == 'Sakit')
                                            <span class="bg-amber-50 text-amber-600 border border-amber-100 px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wide">{{ $data->status }}</span>
                                        @else
                                            <span class="bg-rose-50 text-rose-600 border border-rose-100 px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wide">Alpa</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($data->status == 'Hadir')
                                            <div class="flex items-center gap-2 whitespace-nowrap">
                                                <span class="bg-indigo-50 text-indigo-600 px-2 py-0.5 rounded-md font-bold text-[10px]">Juz {{ $data->juz }}</span>
                                                <span class="text-slate-300">|</span>
                                                <span class="font-semibold text-slate-700">{{ $data->surah }}</span>
                                            </div>
                                        @else
                                            <span class="text-slate-400 italic font-normal">{{ $data->catatan ?? '-' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center text-slate-400">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <div class="text-3xl text-slate-300 mb-1">
                                                <i class="fa-solid fa-folder-open"></i>
                                            </div>
                                            <p class="text-sm font-semibold text-slate-400">Belum ada aktivitas setoran hari ini.</p>
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
    </div>

    <script>
        
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById('welcome-alert-js');
            const today = new Date().toDateString();
            const hasGreeted = localStorage.getItem('last_greeted');

            if (hasGreeted !== today) {
                alertBox.classList.remove('hidden');
            }
        });

        function closeWelcome() {
            const alertBox = document.getElementById('welcome-alert-js');
            const today = new Date().toDateString();
            alertBox.classList.add('hidden');
            localStorage.setItem('last_greeted', today);
        }

       
        document.addEventListener("DOMContentLoaded", function() {
            const canvasHafalan = document.getElementById('grafikDetail');
            
            let chartStatus = Chart.getChart("grafikDetail"); 
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }

            const ctx = canvasHafalan.getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Setor', 'Izin', 'Sakit', 'Alpa', 'Belum Input'],
                    datasets: [{
                        data: [
                            {{ (int)($setor ?? 0) }}, 
                            {{ (int)($izin ?? 0) }}, 
                            {{ (int)($sakit ?? 0) }}, 
                            {{ (int)($alpa ?? 0) }}, 
                            {{ (int)($belumSetor ?? 0) }}
                        ],
                        backgroundColor: ['#10b981', '#fbbf24', '#f97316', '#f43f5e', '#f1f5f9'],
                        borderWidth: 4,
                        borderColor: '#ffffff',
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: {
                        legend: { display: false }
                    },
                    animation: {
                        duration: 800,
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        });
    </script>
</body>
</html>
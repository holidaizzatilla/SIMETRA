<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Laporan - Imaratul Huffazh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="max-w-7xl mx-auto pt-6 px-2 sm:px-4 space-y-6">
            
            <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 right-0 w-28 h-28 bg-indigo-500/5 rounded-full -mr-16 -mt-16"></div>
                
                <div class="relative flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="bg-indigo-600 text-white w-14 h-14 rounded-2xl shadow-lg shadow-indigo-600/10 flex items-center justify-center text-xl">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-black text-slate-800 uppercase tracking-tight leading-none">
                                Rekapitulasi <span class="text-indigo-600">Laporan</span>
                            </h1>
                            <p class="text-slate-500 text-xs mt-1.5 font-medium">Pantau ringkasan statistik kehadiran dan progres hafalan seluruh halaqah asrama.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($kelas as $k)
                <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-slate-100 group hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="text-lg sm:text-xl font-black text-slate-800 group-hover:text-indigo-600 transition-colors leading-tight">{{ $k->nama }}</h3>
                                <p class="text-xs text-slate-400 font-medium mt-0.5">Ringkasan Statistik Kelas</p>
                            </div>
                            <div class="w-10 h-10 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center text-sm group-hover:bg-amber-400 group-hover:text-indigo-950 transition-all duration-300 shadow-inner">
                                <i class="fa-solid fa-hotel"></i>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Total Santri</span>
                                <span class="font-extrabold text-slate-700 bg-slate-50 px-2.5 py-1 rounded-lg text-xs"><i class="fa-solid fa-users text-slate-400 mr-1"></i> {{ $k->total }} Siswi</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Kehadiran Rata-rata</span>
                                <span class="font-extrabold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg text-xs"><i class="fa-solid fa-clipboard-user mr-1"></i> {{ $k->hadir }} / {{ $k->total }}</span>
                            </div>
                            
                            <div class="space-y-1.5 pt-1">
                                <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden p-0.5 border border-slate-50">
                                    <div class="bg-emerald-500 h-full rounded-full transition-all duration-700 shadow-[0_0_8px_rgba(16,185,129,0.4)]" 
                                         style="width: {{ $k->persen }}%"></div>
                                </div>
                                <p class="text-[10px] text-right text-slate-400 font-bold uppercase tracking-wider">
                                    <i class="fa-solid fa-bolt text-amber-500 mr-0.5"></i> {{ round($k->persen) }}% Efektivitas Kelas
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex">
                        <a href="{{ route('admin.rekap.detail', $k->id) }}" class="w-full h-12 bg-slate-900 text-white text-center rounded-xl font-bold text-[10px] uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-md flex items-center justify-center gap-2">
                            <i class="fa-solid fa-folder-tree text-[11px]"></i> Lihat Laporan
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</body>
</html>
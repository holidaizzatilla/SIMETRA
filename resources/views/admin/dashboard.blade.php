<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-7xl mx-auto pt-6 px-2 sm:px-4 space-y-8">
            
            <div class="bg-gradient-to-br from-indigo-950 via-indigo-900 to-slate-900 p-6 sm:p-8 rounded-[2rem] shadow-xl text-white relative overflow-hidden border border-indigo-900">
    <div class="absolute right-0 top-0 translate-x-10 -translate-y-10 opacity-5 text-[12rem] pointer-events-none">
        <i class="fa-solid fa-mosque"></i>
    </div>
    
    <div class="relative z-10 space-y-2">
        <span class="bg-amber-400 text-indigo-950 text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full shadow-sm">
            Administrator : {{ auth()->user()->name }}
        </span>
        <h1 class="text-2xl sm:text-3xl font-black tracking-tight mt-2">Selamat Datang di Dashboard Admin 👋</h1>
        <p class="text-indigo-200/80 text-sm max-w-xl font-medium">Laporan ringkasan statistik, manajemen data pengajar, serta monitoring harian unit Tahfidzul Qur'an Imaratul Huffazh.</p>
    </div>
</div>
            
           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Guru</p>
                <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats->total_guru }}</h2>
            </div>
            <div class="w-11 h-11 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-base group-hover:bg-amber-500 group-hover:text-white transition-all shadow-inner">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
        </div>
        <div class="text-xs text-slate-500 font-semibold border-t border-slate-50 pt-3">Ustadzah pengajar aktif</div>
    </div>

    <div class="bg-indigo-950 p-6 rounded-3xl shadow-lg text-white flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-indigo-900 group">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-indigo-300 text-[10px] font-bold uppercase tracking-widest">Total Pembina</p>
               <h2 class="text-3xl font-black text-white mt-1">{{ $stats->total_pembina ?? 0 }}</h2>
            </div>
            <div class="w-11 h-11 bg-white/5 text-amber-400 rounded-2xl flex items-center justify-center text-base group-hover:bg-amber-400 group-hover:text-indigo-950 transition-all border border-white/10">
                <i class="fa-solid fa-user-tie"></i>
            </div>
        </div>
        <div class="text-xs text-indigo-200/60 font-medium border-t border-white/5 pt-3">Pembina Tahfidz aktif</div>
    </div>

    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Santri</p>
                <h2 class="text-3xl font-black text-slate-800 mt-1">{{ $stats->total_santri }}</h2>
            </div>
            <div class="w-11 h-11 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center text-base group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-inner">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
        <div class="text-xs text-slate-500 font-semibold border-t border-slate-50 pt-3">Siswi terdaftar</div>
    </div>

    <div class="bg-emerald-600 p-6 rounded-3xl shadow-lg text-white flex flex-col justify-between hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-emerald-100 text-[10px] font-bold uppercase tracking-widest">Wali Santri</p>
                <h2 class="text-3xl font-black text-white mt-1">{{ $stats->total_wali }}</h2>
            </div>
            <div class="w-11 h-11 bg-white/10 text-white rounded-2xl flex items-center justify-center text-base group-hover:bg-white group-hover:text-emerald-600 transition-all">
                <i class="fa-solid fa-user-group"></i>
            </div>
        </div>
        <div class="text-xs text-emerald-100/70 font-medium border-t border-emerald-500/40 pt-3">Orang tua/wali aktif</div>
    </div>
</div>

            <div class="pt-2">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm space-y-4">
                    <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-bolt text-amber-500"></i> Menu Aksi Cepat Admin
                    </h3>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admin.pembina') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-lg hover:shadow-indigo-600/10 transition-all duration-200 flex items-center gap-2.5 group">
                            <i class="fa-solid fa-sliders text-slate-400 group-hover:text-white transition-colors"></i> 
                            Kelola Data Pembina
                        </a>
                        <a href="{{ route('admin.guru') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-lg hover:shadow-indigo-600/10 transition-all duration-200 flex items-center gap-2.5 group">
                            <i class="fa-solid fa-users-gear text-slate-400 group-hover:text-white transition-colors"></i> 
                            Kelola Data Guru
                        </a>
                        <a href="{{ route('admin.santri') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-lg hover:shadow-indigo-600/10 transition-all duration-200 flex items-center gap-2.5 group">
                            <i class="fa-solid fa-sliders text-slate-400 group-hover:text-white transition-colors"></i> 
                            Kelola Data Santri
                        </a>
                        <a href="{{ route('admin.walisantri') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-lg hover:shadow-indigo-600/10 transition-all duration-200 flex items-center gap-2.5 group">
    <i class="fa-solid fa-user-group text-slate-400 group-hover:text-white transition-colors"></i> 
    Kelola Data Wali
</a>
                       <a href="{{ route('admin.rekapitulasi') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-lg hover:shadow-indigo-600/10 transition-all duration-200 flex items-center gap-2.5 group">
                            <i class="fa-solid fa-sliders text-slate-400 group-hover:text-white transition-colors"></i> 
                            Rekapitulasi
                        </a>
    
                        <a href="{{ route('admin.profil') }}" class="px-6 py-3.5 bg-slate-50 border border-slate-200/80 rounded-2xl font-bold text-sm text-slate-700 hover:bg-amber-500 hover:text-white hover:border-amber-500 hover:shadow-lg hover:shadow-amber-500/10 transition-all duration-200 flex items-center gap-2.5 group">
                            <i class="fa-solid fa-user-gear text-slate-400 group-hover:text-white transition-colors"></i> 
                            Pengaturan Profil 
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
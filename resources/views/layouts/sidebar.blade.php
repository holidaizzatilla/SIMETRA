<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    @media (max-width: 639px) { body { padding-top: 0px !important; } }
</style>

<div class="sm:hidden fixed top-4 left-4 z-50">
    <button onclick="toggleGlobalSidebar()" class="p-3 bg-indigo-950 border border-indigo-900 text-white rounded-2xl shadow-xl hover:bg-indigo-900 active:scale-95 transition flex items-center justify-center w-11 h-11">
        <i id="global-burger-icon" class="fa-solid fa-bars text-lg"></i>
    </button>
</div>

<aside id="global-sidebar-component" class="fixed top-0 left-0 z-50 w-64 h-screen transition-transform duration-300 -translate-x-full sm:translate-x-0 bg-indigo-950 border-r border-indigo-900 shadow-2xl flex flex-col justify-between">
    <div class="h-full px-4 py-6 flex flex-col justify-between overflow-y-auto">
        <div>
            <div class="flex items-center gap-3 px-2 mb-10 border-b border-white/10 pb-6">
                <img src="{{ asset('images/TQ.png') }}" class="h-10 w-10 object-contain rounded-xl bg-white/10 p-1" alt="Logo">
                <div class="text-white overflow-hidden">
                    <p class="font-bold text-sm truncate">Menu Utama</p>
                    <p class="text-[10px] text-amber-400 font-semibold uppercase tracking-wider">Sistem Informasi</p>
                </div>
            </div>

            <p class="px-3 text-[10px] font-bold text-white/30 uppercase tracking-widest mb-2">Navigasi</p>
           <ul class="space-y-1.5 font-medium">
    @if(Request::is('admin*'))
        <li><a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-chart-simple w-6"></i><span class="ms-3 text-sm">Dashboard</span></a></li>
        
        <li><a href="{{ route('admin.pembina.index') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.pembina*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-user-tie w-6"></i><span class="ms-3 text-sm">Data Pembina</span></a></li>
        <li><a href="{{ route('admin.guru.index') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.guru*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-chalkboard-user w-6"></i><span class="ms-3 text-sm">Data Guru</span></a></li>
        <li><a href="{{ route('admin.santri.index') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.santri*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-users w-6"></i><span class="ms-3 text-sm">Data Santri</span></a></li>
        <li><a href="{{ route('admin.walisantri.index') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.walisantri*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-user-group w-6"></i><span class="ms-3 text-sm">Data Wali Santri</span></a></li>
        
        <li><a href="{{ route('admin.rekapitulasi') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.rekap*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-file-invoice w-6"></i><span class="ms-3 text-sm">Rekapitulasi</span></a></li>
        <li class="pt-4 mt-2 border-t border-white/10"><a href="{{ route('admin.profil') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.profil') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-user-gear w-6"></i><span class="ms-3 text-sm">Pengaturan Profil</span></a></li>
    @endif

                @if(Request::is('guru*'))
                    <li><a href="{{ route('guru.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('guru.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-chart-simple w-6"></i><span class="ms-3 text-sm">Dashboard</span></a></li>
                    <li><a href="{{ route('guru.input') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('guru.input') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-pen-to-square w-6"></i><span class="ms-3 text-sm">Input Hafalan</span></a></li>
                @endif

                @if(Request::is('wali*'))
                    <li><a href="{{ route('wali.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('wali.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-user-graduate w-6"></i><span class="ms-3 text-sm">Dashboard</span></a></li>
                    <li><a href="{{ route('wali.profil') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('wali.profil') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-id-card w-6"></i><span class="ms-3 text-sm">Profil Santri</span></a></li>
                @endif

                @if(Request::is('pembina*'))
                    <li><a href="{{ route('pembina.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-chart-pie w-6"></i><span class="ms-3 text-sm">Dashboard</span></a></li>
                    <li><a href="{{ route('pembina.halaqah') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.halaqah') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-graduation-cap w-6"></i><span class="ms-3 text-sm">Monitoring Hafalan</span></a></li>
                    <li><a href="{{ route('pembina.guru') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.guru') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-user-shield w-6"></i><span class="ms-3 text-sm">Monitoring Murojaah</span></a></li>
                    <li><a href="{{ route('pembina.evaluasi') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.evaluasi') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}"><i class="fa-solid fa-triangle-exclamation w-6"></i><span class="ms-3 text-sm">Evaluasi Target</span></a></li>
                @endif
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="flex items-center p-3 text-rose-300 rounded-xl hover:bg-rose-500/10 transition font-bold text-sm w-full">
        <i class="fa-solid fa-right-from-bracket w-6"></i>
        <span class="ms-3">Keluar Sistem</span>
    </button>
</form>
    </div>
</aside>

<div id="global-sidebar-backdrop" onclick="toggleGlobalSidebar()" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 sm:hidden transition-opacity duration-300"></div>

<script>
    function toggleGlobalSidebar() {
        const sidebar = document.getElementById('global-sidebar-component');
        const backdrop = document.getElementById('global-sidebar-backdrop');
        const burgerIcon = document.getElementById('global-burger-icon');
        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
        burgerIcon.classList.toggle('fa-bars');
        burgerIcon.classList.toggle('fa-xmark');
    }
</script>
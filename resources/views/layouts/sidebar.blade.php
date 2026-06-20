<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Mencegah halaman utama jebol ke atas saat tombol burger melayang aktif */
    @media (max-width: 639px) {
        body { padding-top: 0px !important; }
    }
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
                    <p class="font-bold text-sm truncate">
                        @if(Request::is('admin*')) Administrator
                        @elseif(Request::is('ustadzah*')) Ustadzah
                        @elseif(Request::is('pembina*')) Ustz. Musyifah, Al-Hafidzah
                        @else Wali Santri @endif
                    </p>
                    <p class="text-[10px] text-amber-400 font-semibold uppercase tracking-wider">
                        @if(Request::is('admin*')) Super Admin
                        @elseif(Request::is('ustadzah*')) Kelas 4 Reguler
                        @elseif(Request::is('pembina*')) Pembina Tahfidz
                        @else Monitoring Anak @endif
                    </p>
                </div>
            </div>

            <p class="px-3 text-[10px] font-bold text-white/30 uppercase tracking-widest mb-2">Menu Utama</p>
            <ul class="space-y-2 font-medium">
                @if(Request::is('admin*'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-chart-simple text-lg w-6"></i>
                            <span class="ms-3 text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ustadzah') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.ustadzah') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-chalkboard-user text-lg w-6"></i>
                            <span class="ms-3 text-sm">Data Pembina</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ustadzah') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.ustadzah') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-chalkboard-user text-lg w-6"></i>
                            <span class="ms-3 text-sm">Data Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kelas') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.kelas*') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-school text-lg w-6"></i>
                            <span class="ms-3 text-sm">Data Santri</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rekap') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.rekap') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-file-invoice text-lg w-6"></i>
                            <span class="ms-3 text-sm">Rekapitulasi</span>
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-white/10">
                        <a href="{{ route('admin.profil') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('admin.profil') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-user-gear text-lg w-6"></i>
                            <span class="ms-3 text-sm">Pengaturan Profil</span>
                        </a>
                    </li>
                @endif

                @if(Request::is('ustadzah*'))
                    <li>
                        <a href="{{ route('ustadzah.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('ustadzah.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-chart-simple text-lg w-6"></i>
                            <span class="ms-3 text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ustadzah.input') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('ustadzah.input') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-pen-to-square text-lg w-6"></i>
                            <span class="ms-3 text-sm">Input Hafalan</span>
                        </a>
                    </li>
                @endif

                @if(Request::is('wali*'))
                    <li>
                        <a href="{{ route('wali.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('wali.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-user-graduate text-lg w-6"></i>
                            <span class="ms-3 text-sm">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wali.profil') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('wali.profil') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                            <i class="fa-solid fa-id-card text-lg w-6"></i>
                            <span class="ms-3 text-sm">Profil Santri</span>
                        </a>
                    </li>
                @endif

               <!-- ==================== REVISI: MENU PEMBINA ==================== -->
@if(Request::is('pembina*'))
    <div class="space-y-1.5 px-2">
        <li>
            <a href="{{ route('pembina.dashboard') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.dashboard') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                <i class="fa-solid fa-chart-pie text-lg w-6"></i>
                <span class="ms-3 text-sm">Dashboard </span>
            </a>
        </li>

        

        <li>
            <a href="{{ route('pembina.halaqah') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.halaqah') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                <i class="fa-solid fa-graduation-cap text-lg w-6"></i>
                <span class="ms-3 text-sm">Monitoring Hafalan</span>
            </a>
        </li>

        <li>
            <a href="{{ route('pembina.ustadzah') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.ustadzah') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                <i class="fa-solid fa-user-shield text-lg w-6"></i>
                <span class="ms-3 text-sm">Monitoring Murojaah</span>
            </a>
        </li>
        <li>
            <a href="{{ route('pembina.evaluasi') }}" class="flex items-center p-3 rounded-xl transition {{ request()->routeIs('pembina.evaluasi') ? 'bg-amber-400 text-indigo-950 font-bold shadow-md' : 'text-white/50 hover:bg-white/10' }}">
                <i class="fa-solid fa-triangle-exclamation text-lg w-6"></i>
                <span class="ms-3 text-sm">Evaluasi Target</span>
            </a>
        </li>
    </div>
@endif
            </ul>
        </div>

        <div class="pt-4 border-t border-white/10 text-white">
            <a href="{{ route('welcome') }}" class="flex items-center p-3 text-rose-300 rounded-xl hover:bg-rose-500/10 transition font-bold text-sm">
                <i class="fa-solid fa-door-open text-lg w-6"></i>
                <span class="ms-3">Keluar Sistem</span>
            </a>
        </div>
    </div>
</aside>

<div id="global-sidebar-backdrop" onclick="toggleGlobalSidebar()" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 sm:hidden transition-opacity duration-300"></div>

<script>
    function toggleGlobalSidebar() {
        const sidebar = document.getElementById('global-sidebar-component');
        const backdrop = document.getElementById('global-sidebar-backdrop');
        const burgerIcon = document.getElementById('global-burger-icon');
        
        if (sidebar && backdrop && burgerIcon) {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
            
            if (!sidebar.classList.contains('-translate-x-full')) {
                burgerIcon.classList.remove('fa-bars');
                burgerIcon.classList.add('fa-xmark');
            } else {
                burgerIcon.classList.remove('fa-xmark');
                burgerIcon.classList.add('fa-bars');
            }
        }
    }
</script>
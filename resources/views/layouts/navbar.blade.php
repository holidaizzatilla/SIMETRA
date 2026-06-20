<nav id="navbar" class="fixed top-0 z-50 w-full bg-indigo-950/95 backdrop-blur-md border-b border-amber-400/20 transition-transform duration-500">
    <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/TQ.png') }}" alt="Logo" class="h-10">
            <span class="text-white font-bold text-xs uppercase tracking-widest hidden md:block">Tahfidzul Qur'an</span>
        </div>

        <div class="hidden lg:flex items-center gap-8">
            <a href="#" class="text-white/80 hover:text-amber-400 text-[10px] font-bold uppercase transition">Beranda</a>
            <a href="#jenjang" class="text-white/80 hover:text-amber-400 text-[10px] font-bold uppercase transition">Jenjang</a>
            <a href="#ketentuan" class="text-white/80 hover:text-amber-400 text-[10px] font-bold uppercase transition">Ketentuan</a>
            <a href="#kegiatan" class="text-white/80 hover:text-amber-400 text-[10px] font-bold uppercase transition">Kegiatan</a>
            <a href="#kontak" class="text-white/80 hover:text-amber-400 text-[10px] font-bold uppercase transition">Kontak</a>
        </div>

        <div class="flex items-center gap-4">
            <button onclick="openLoginModal()" class="bg-amber-400 text-indigo-950 text-[10px] font-black px-6 py-2 rounded-full uppercase transition-all duration-300 transform hover:scale-105">
                Login
            </button>
            
            <div class="relative group lg:hidden">
                <button class="text-amber-400 focus:outline-none p-1 block">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-amber-400/20 rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[60] overflow-hidden translate-y-2 group-hover:translate-y-0">
                    <div class="flex flex-col">
                        <a href="#" class="px-5 py-4 text-indigo-950 hover:bg-indigo-50 hover:text-amber-500 text-[10px] font-black uppercase border-b border-slate-100 transition">Beranda</a>
                        <a href="#jenjang" class="px-5 py-4 text-indigo-950 hover:bg-indigo-50 hover:text-amber-500 text-[10px] font-black uppercase border-b border-slate-100 transition">Jenjang</a>
                        <a href="#ketentuan" class="px-5 py-4 text-indigo-950 hover:bg-indigo-50 hover:text-amber-500 text-[10px] font-black uppercase border-b border-slate-100 transition">Ketentuan</a>
                        <a href="#kegiatan" class="px-5 py-4 text-indigo-950 hover:bg-indigo-50 hover:text-amber-500 text-[10px] font-black uppercase border-b border-slate-100 transition">Kegiatan</a>
                        <a href="#kontak" class="px-5 py-4 text-indigo-950 hover:bg-indigo-50 hover:text-amber-500 text-[10px] font-black uppercase transition">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
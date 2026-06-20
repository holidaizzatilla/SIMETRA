<div id="loginModal" class="fixed inset-0 w-screen h-screen z-[999] {{ $errors->has('loginError') ? 'flex' : 'hidden' }} items-center justify-center p-4 bg-indigo-950/60 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-100 flex flex-col md:flex-row max-w-4xl w-[90%] md:w-full relative">
        
        <button onclick="closeLoginModal()" class="absolute top-5 right-6 z-50 text-slate-400 hover:text-rose-500 transition-colors text-2xl">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="md:w-1/2 relative min-h-[450px] hidden md:block">
            <img src="{{ asset('images/TQ PI.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="Login Background">
            <div class="absolute inset-0 bg-indigo-900/80 backdrop-blur-[1px]"></div>
            <div class="relative z-10 p-10 h-full flex flex-col justify-between text-white">
                <div class="flex flex-col items-center text-center pt-8">
                    <img src="{{ asset('images/TQ.png') }}" class="h-14 mb-6 drop-shadow-xl" alt="Logo">
                    <h3 class="text-2xl font-black mb-3 leading-tight">Melahirkan Generasi <br><span class="text-amber-400">Pecinta Al-Qur'an</span></h3>
                </div>
                <p class="text-[11px] text-indigo-100 border-t border-white/10 pt-4">Sistem Monitoring & Evaluasi Perkembangan Hafalan Santri.</p>
            </div>
        </div>

        <div class="p-8 md:p-10 md:w-1/2 bg-white flex flex-col justify-center">
            <div class="mb-5">
                <h2 class="text-xl font-black text-slate-800 uppercase tracking-tighter">Login Sistem</h2>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-1">Silakan masukkan akun Anda</p>
            </div>

            <div id="error-box" class="{{ $errors->has('loginError') ? 'flex' : 'hidden' }} bg-rose-50 border border-rose-100 text-rose-600 p-3 rounded-xl text-xs font-semibold mb-4 items-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ $errors->first('loginError') }}</span>
            </div>

            <form id="login-form" action="{{ url('/login') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">Username </label>
                    <input type="text" name="username" value="{{ old('username') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Masukkan ID / NIS Anda" required>
                </div>

                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">Password</label>
                    <div class="relative">
                        <input id="password-field" type="password" name="password" class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="••••••••" required>
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-indigo-600 transition-colors">
                            <i id="toggle-password-icon" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 py-3.5 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-md hover:shadow-indigo-600/20">
                    Masuk Aplikasi <i class="fa-solid fa-arrow-right ml-1"></i>
                </button>
            </form>

            <div id="register-link" class="text-center mt-4">
                <p class="text-slate-400 text-xs">Wali Santri baru? 
                    <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline">Daftar Akun ke Sini</a>
                </p>
            </div>
        </div>

    </div>
</div>

<script>
// Fungsi Menampilkan/Sembunyikan Password
function togglePasswordVisibility() {
    const passwordField = document.getElementById('password-field');
    const icon = document.getElementById('toggle-password-icon');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Fungsi Menutup Modal
function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    const loginForm = document.getElementById('login-form');
    const errorContainer = document.getElementById('error-box'); 
    
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex'); 
    }
    
    if (loginForm) {
        loginForm.reset();
        // Reset input password kembali jadi tipe password saat modal ditutup
        const passwordField = document.getElementById('password-field');
        const icon = document.getElementById('toggle-password-icon');
        if (passwordField) passwordField.type = 'password';
        if (icon) {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    
    if (errorContainer) {
        errorContainer.classList.add('hidden');
        errorContainer.classList.remove('flex');
    }
}

// Fungsi Membuka Modal
function openLoginModal() {
    const modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex'); 
    }
}
</script>
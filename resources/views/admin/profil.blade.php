<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="max-w-2xl mx-auto pt-8 pb-12 space-y-6">
            
            @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-start gap-3 shadow-sm transition-all animate-fade-in">
                <div class="p-1 bg-emerald-500 rounded-lg text-white flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-circle-check text-sm"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-emerald-900">Pembaruan Berhasil</h4>
                    <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-100 flex items-start gap-3 shadow-sm">
                <div class="p-1 bg-rose-500 rounded-lg text-white flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                </div>
                <div class="w-full">
                    <h4 class="text-sm font-bold text-rose-900">Periksa Kembali Input Anda</h4>
                    <ul class="list-disc list-inside text-xs text-rose-700 mt-1 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm">
                
                <div class="flex items-center gap-4 mb-8 pb-6 border-b border-slate-100">
                    <a href="{{ route('admin.dashboard') }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 transition-all shadow-sm">
                        <i class="fa-solid fa-arrow-left text-sm"></i>
                    </a>
                    <div>
                        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Pengaturan Profil & Akun</h1>
                        <p class="text-xs text-slate-400 mt-0.5">Kelola identitas profil dan konfigurasi keamanan kata sandi Anda.</p>
                    </div>
                </div>

                <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Informasi Dasar</h3>
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-2 tracking-wide">Nama Lengkap</label>
                            <div class="relative rounded-xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-user text-sm"></i>
                                </div>
                                <input type="text" name="name" value="{{ old('name', $admin->name) }}" 
                                       class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-10 pr-4 py-2.5 text-sm transition-all focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none" placeholder="Masukkan nama lengkap">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-2 tracking-wide">Username / Email Akun</label>
                            <div class="relative rounded-xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-envelope text-sm"></i>
                                </div>
                                <input type="text" name="username" value="{{ old('username', $admin->username) }}" 
                                       class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-10 pr-4 py-2.5 text-sm transition-all focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none" placeholder="Masukkan username atau email">
                            </div>
                        </div>
                    </div>

                    <div class="py-2">
                        <div class="w-full h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
                    </div>

                    <div class="space-y-5">
                        <h3 class="text-xs font-bold text-rose-600 uppercase tracking-wider">Verifikasi & Kata Sandi Baru</h3>

                        <div>
                            <label class="block text-xs font-bold text-rose-600 mb-2 tracking-wide">Konfirmasi Password Saat Ini <span class="text-rose-500">*</span></label>
                            <div class="relative rounded-xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-shield-halved text-sm"></i>
                                </div>
                                <input type="password" id="current_password" name="current_password" required
                                       class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-10 pr-11 py-2.5 text-sm transition-all focus:bg-white focus:border-rose-400 focus:ring-2 focus:ring-rose-50 outline-none"
                                       placeholder="Masukkan sandi aktif untuk menyimpan perubahan">
                                <button type="button" onclick="togglePassword('current_password', 'eye_current')" 
                                        class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 transition-colors">
                                    <i id="eye_current" class="fa-solid fa-eye text-sm"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="text-rose-500 text-xs mt-1.5 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-2 tracking-wide">Password Baru <span class="text-slate-400 font-normal">(Opsional)</span></label>
                                <div class="relative rounded-xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-lock text-sm"></i>
                                    </div>
                                    <input type="password" id="password" name="password" 
                                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-10 pr-11 py-2.5 text-sm transition-all focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none"
                                           placeholder="Kosongkan jika tidak diganti">
                                    <button type="button" onclick="togglePassword('password', 'eye_new')" 
                                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 transition-colors">
                                        <i id="eye_new" class="fa-solid fa-eye text-sm"></i>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-2 tracking-wide">Konfirmasi Password Baru</label>
                                <div class="relative rounded-xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-lock-open text-sm"></i>
                                    </div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" 
                                           class="w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-10 pr-11 py-2.5 text-sm transition-all focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none"
                                           placeholder="Ulangi password baru">
                                    <button type="button" onclick="togglePassword('password_confirmation', 'eye_confirm')" 
                                            class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 transition-colors">
                                        <i id="eye_confirm" class="fa-solid fa-eye text-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-indigo-950 hover:bg-indigo-900 text-white font-bold text-sm py-3 px-4 rounded-xl transition-all shadow-md hover:shadow-lg active:scale-[0.99] flex items-center justify-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Simpan Seluruh Perubahan</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
    function togglePassword(inputId, eyeId) {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
    </script>
</body>
</html>
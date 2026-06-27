@csrf
<div class="space-y-5">
    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Nama Lengkap Guru</label>
        <input type="text" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru ?? '') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Masukkan nama lengkap guru" required>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Username Akses Login</label>
        <input type="text" name="username" value="{{ old('username', $guru->username ?? '') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Contoh: ustadzah.aisyah" required>
    </div>

    <div class="relative">
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">
            Password {{ isset($guru) ? '(Kosongkan jika tidak diubah)' : 'Login Sementara' }}
        </label>
        <div class="relative">
            <input type="password" name="password" id="password" {{ isset($guru) ? '' : 'required' }} 
                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all pr-12" placeholder="••••••••">
            <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600">
                <i class="fa-solid fa-eye" id="eye-icon"></i>
            </button>
        </div>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Jenis Kelamin</label>
        <select name="jk" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
            <option value="L" {{ old('jk', $guru->jk ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jk', $guru->jk ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">No. Telepon / WhatsApp</label>
        <input type="text" name="no_telp" value="{{ old('no_telp', $guru->no_telp ?? '') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Contoh: 081234567890" required>
    </div>

    <div class="pt-4 border-t border-slate-100">
        <button type="submit" class="w-full bg-indigo-600 py-3.5 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/10 flex items-center justify-center gap-2">
            {{ isset($guru) ? 'Simpan Perubahan' : 'Simpan Data Pengajar' }} <i class="fa-solid fa-paper-plane"></i>
        </button>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eye-icon");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>
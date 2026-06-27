@csrf 

<div class="space-y-4"> 
    <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
        <input type="text" name="nama_pembina" value="{{ old('nama_pembina', $pembina->nama_pembina ?? '') }}" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
    </div>

    <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Periode</label>
        <input type="text" name="periode" value="{{ old('periode', $pembina->periode ?? '') }}" placeholder="Contoh: 2026/2027" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
    </div>

    <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Username</label>
        <input type="text" name="username" value="{{ old('username', $pembina->username ?? '') }}" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition-all">
    </div>

    <div class="relative">
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
            Password {{ isset($pembina) ? '(Kosongkan jika tidak diubah)' : '' }}
        </label>
        <div class="relative">
            <input type="password" name="password" id="password" {{ isset($pembina) ? '' : 'required' }}
                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition-all pr-12">
            
            <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600">
                <i class="fa-solid fa-eye" id="eye-icon"></i>
            </button>
        </div>
    </div>

    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-xl">
        <input type="hidden" name="aktif" value="N"> 
        <input type="checkbox" name="aktif" value="Y" id="aktif" 
               {{ old('aktif', $pembina->aktif ?? 'Y') == 'Y' ? 'checked' : '' }} 
               class="w-5 h-5 accent-emerald-600 cursor-pointer">
        <label for="aktif" class="text-sm font-semibold text-slate-700 cursor-pointer">Aktifkan Akun Pembina</label>
    </div>

    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-emerald-600/20 transition-all">
        {{ isset($pembina) ? 'Simpan Perubahan' : 'Tambah Pembina' }}
    </button>
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
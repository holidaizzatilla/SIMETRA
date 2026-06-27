@csrf
<div class="space-y-4">
    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">NIS (Nomor Induk Santri)</label>
        <input type="text" name="nis" value="{{ old('nis', $santri->nis ?? '') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Nama Lengkap</label>
        <input type="text" name="nama_santri" value="{{ old('nama_santri', $santri->nama_santri ?? '') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Jenis Kelamin</label>
            <select name="jk" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all">
                <option value="L" {{ old('jk', $santri->jk ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jk', $santri->jk ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
       <div>
    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Jumlah Hafalan (Juz)</label>
    <select name="jumlah_hafalan_juz" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
        <option value="">-- Pilih Jumlah Juz --</option>
        @for ($i = 1; $i <= 30; $i++)
            <option value="{{ $i }}" {{ old('jumlah_hafalan_juz', $santri->jumlah_hafalan_juz ?? '') == $i ? 'selected' : '' }}>
                {{ $i }} Juz
            </option>
        @endfor
    </select>
</div>
    </div>

   <div>
    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Pilih Kamar (TQ)</label>
    <select name="kamar" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
        <option value="">-- Pilih Kamar TQ --</option>
        
        @for ($i = 1; $i <= 30; $i++)
            <option value="TQ {{ $i }}" {{ old('kamar', $santri->kamar ?? '') == 'TQ ' . $i ? 'selected' : '' }}>
                TQ {{ $i }}
            </option>
        @endfor
        
    </select>
<div class="flex gap-3 mt-6">
    <a href="{{ route('admin.santri.index') }}" 
       class="w-1/3 text-center bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-4 rounded-2xl transition-all">
        Batal
    </a>

    <button type="submit" 
            class="w-2/3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-600/20 transition-all">
        {{ isset($santri) ? 'Simpan Perubahan' : 'Tambah Santri' }}
    </button>
</div>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Santriwati - Imaratul Huffazh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">

    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="max-w-2xl mx-auto pt-6 space-y-6">
            
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-3 mb-6">
                    <a href="{{ url()->previous() }}" class="text-slate-400 hover:text-slate-700">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h1 class="text-xl font-black text-slate-800">Pendaftaran Santriwati Baru</h1>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-xs font-bold">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>⚠️ {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/admin/santri/store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nomor Induk Santri (NIS)</label>
                        <input type="text" name="nis" required placeholder="Contoh: 10021" value="{{ old('nis') }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input type="text" name="nama" required placeholder="Nama lengkap santriwati..." value="{{ old('nama') }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Halaqah / Kelas</label>
                        <select name="kelas" required class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-semibold text-sm bg-slate-50/50 text-slate-700 cursor-pointer">
                            @foreach($list_kelas as $k)
                                <option value="{{ $k }}" {{ (old('kelas', $kelas_terpilih) == $k) ? 'selected' : '' }}>{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Kamar Asrama (TQ)</label>
    <select name="asrama" required class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-semibold text-sm bg-slate-50/50 text-slate-700 cursor-pointer">
        <option value="">-- Pilih Kamar TQ --</option>
        @for ($i = 1; $i <= 27; $i++)
            @php 
                // Format angka agar menjadi 2 digit (01, 02, ... 27)
                $no_kamar = sprintf("%02d", $i); 
                $nama_asrama = "TQ " . $no_kamar;
            @endphp
            <option value="{{ $nama_asrama }}" {{ old('asrama') == $nama_asrama ? 'selected' : '' }}>
                {{ $nama_asrama }}
            </option>
        @endfor
    </select>
</div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" required value="{{ old('tgl_lahir') }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-700">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Ayah Kandung</label>
                        <input type="text" name="nama_ayah" required placeholder="Nama ayah..." value="{{ old('nama_ayah') }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Target Hafalan</label>
                        <input type="text" name="target_hafalan" required placeholder="Contoh: 30 Juz / 10 Juz" value="{{ old('target_hafalan', '30 Juz') }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Alamat Asal</label>
                        <textarea name="alamat" required placeholder="Alamat lengkap rumah asal santri..." rows="3"
                                  class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800 resize-none">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="sm:col-span-2 pt-2">
                        <button type="submit" class="w-full py-3.5 bg-slate-900 hover:bg-indigo-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest transition-all shadow-md">
                            Simpan & Daftarkan Santriwati
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
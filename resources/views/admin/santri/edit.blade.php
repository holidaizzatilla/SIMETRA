<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Santriwati </title>
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
                    <h1 class="text-xl font-black text-slate-800">Edit Data Santriwati</h1>
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

                <form action="{{ url('/admin/santri/'.$santri->id) }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nomor Induk Santri (NIS)</label>
                        <input type="text" name="nis" required value="{{ old('nis', $santri->nis) }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input type="text" name="nama" required value="{{ old('nama', $santri->nama) }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Halaqah / Kelas</label>
                        <select name="kelas" required class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-semibold text-sm bg-slate-50/50 text-slate-700 cursor-pointer">
                            @foreach($list_kelas as $k)
                                <option value="{{ $k }}" {{ (old('kelas', $santri->kelas) == $k) ? 'selected' : '' }}>{{ $k }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Kamar Asrama (TQ)</label>
    <select name="asrama" required class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-semibold text-sm bg-slate-50/50 text-slate-700 cursor-pointer">
        @for ($i = 1; $i <= 27; $i++)
            @php 
                $no_kamar = sprintf("%02d", $i); 
                $nama_asrama = "TQ " . $no_kamar;
            @endphp
            <option value="{{ $nama_asrama }}" {{ old('asrama', $santri->asrama) == $nama_asrama ? 'selected' : '' }}>
                {{ $nama_asrama }}
            </option>
        @endfor
    </select>
</div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" required value="{{ old('tgl_lahir', $santri->tgl_lahir) }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-700">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Ayah Kandung</label>
                        <input type="text" name="nama_ayah" required value="{{ old('nama_ayah', $santri->nama_ayah) }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Target Hafalan</label>
                        <input type="text" name="target_hafalan" required value="{{ old('target_hafalan', $santri->target_hafalan) }}"
                               class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Alamat Asal</label>
                        <textarea name="alamat" required rows="3"
                                  class="w-full px-4 py-3 rounded-xl border-none ring-1 ring-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none font-medium text-sm bg-slate-50/50 text-slate-800 resize-none">{{ old('alamat', $santri->alamat) }}</textarea>
                    </div>

                    <div class="sm:col-span-2 pt-2">
                        <button type="submit" class="w-full py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-xs uppercase tracking-widest transition-all shadow-md">
                            Simpan Perubahan Data
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
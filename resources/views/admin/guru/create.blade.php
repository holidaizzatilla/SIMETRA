<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link class="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-2xl mx-auto pt-6 px-2 sm:px-4">
            
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 sm:p-8 space-y-6">
                <div class="flex items-center gap-4 pb-4 border-b border-slate-100">
                    <a href="{{ route('admin.guru') }}" class="w-10 h-10 bg-slate-50 border border-slate-200 text-slate-400 hover:text-indigo-600 hover:border-indigo-600 rounded-xl flex items-center justify-center transition shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="text-lg font-black text-slate-800">Tambah Pengajar Baru</h2>
                        <p class="text-slate-400 text-xs">Daftarkan akun resmi Guru pembimbing</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-xl text-xs font-semibold space-y-1">
                        @foreach ($errors->all() as $error)
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <span>{{ $error }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('admin.guru.store') }}" method="POST" class="space-y-5">
    @csrf

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Nama Lengkap Guru</label>
        <input type="text" name="nama_guru" value="{{ old('nama_guru') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Masukkan nama lengkap guru" required>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Username Akses Login</label>
        <input type="text" name="username" value="{{ old('username') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Contoh: ustadzah.aisyah" required>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Password Login Sementara</label>
        <input type="password" name="password" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="••••••••" required>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">Jenis Kelamin</label>
        <select name="jk" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-2">No. Telepon / WhatsApp</label>
        <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Contoh: 081234567890" required>
    </div>

    <div class="pt-4 border-t border-slate-100">
        <button type="submit" class="w-full bg-indigo-600 py-3.5 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/10 flex items-center justify-center gap-2">
            Simpan Data Pengajar <i class="fa-solid fa-paper-plane"></i>
        </button>
    </div>
</form>
            </div>

        </div>
    </div>
</body>
</html>
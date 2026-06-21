<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Guru - Tahfidzul Qur'ani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-7xl mx-auto pt-6 px-2 sm:px-4 space-y-6">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                <div>
                    <h1 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Data Guru</h1>
                    <p class="text-sm text-slate-400 mt-1">Kelola data pengajar dengan sistem yang terintegrasi</p>
                </div>
                <a href="{{ route('admin.guru.create') }}" class="group bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-4 rounded-2xl shadow-lg shadow-indigo-600/20 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-plus group-hover:rotate-90 transition-transform"></i> Tambah Guru Baru
                </a>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-r-2xl text-xs font-semibold flex items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-circle-check text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-indigo-50/50 text-indigo-900 border-b border-indigo-100 text-[10px] font-bold uppercase tracking-wider">
                                <th class="p-6 pl-8">No.</th>
                                <th class="p-6">Nama Lengkap</th>
                                <th class="p-6">Jenis Kelamin</th>
                                <th class="p-6">No. Telp</th>
                                <th class="p-6">Username</th>
                                <th class="p-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                            @forelse($guruList as $index => $guru)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="p-6 pl-8 text-slate-400">{{ $index + 1 }}</td>
                                    <td class="p-6 font-bold text-slate-800">{{ $guru->nama_guru }}</td>
                                    <td class="p-6">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $guru->jk == 'L' ? 'bg-blue-50 text-blue-600' : 'bg-pink-50 text-pink-600' }}">
                                            {{ $guru->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    <td class="p-6 text-slate-600">{{ $guru->no_telp }}</td>
                                    <td class="p-6">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                                                <i class="fa-solid fa-user text-[10px]"></i>
                                            </div>
                                            <span class="font-mono font-bold text-slate-500">{{ $guru->username }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.guru.edit', $guru->id) }}" class="w-9 h-9 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-xl flex items-center justify-center transition-all shadow-sm">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="w-9 h-9 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-xl flex items-center justify-center transition-all shadow-sm">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-16 text-center text-slate-400 font-semibold">
                                        <i class="fa-solid fa-folder-open text-4xl block mb-3 opacity-20"></i>
                                        Belum ada data guru yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Santri - Tahfidzul Qur'ani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-7xl mx-auto pt-6 px-2 sm:px-4 space-y-6">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
    <div>
        <h1 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Data Santri</h1>
        <p class="text-sm text-slate-400 mt-1">Daftar santri aktif per kamar</p>
    </div>

    <a href="{{ route('admin.santri.create') }}" 
       class="group bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-4 rounded-2xl shadow-lg shadow-indigo-600/20 transition-all flex items-center gap-2">
        <i class="fa-solid fa-plus group-hover:rotate-90 transition-transform"></i> 
        Tambah Santri Baru
    </a>
</div>

           <form method="GET" action="{{ route('admin.santri.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3 mb-6 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
    
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama/NIS..." 
           class="sm:col-span-2 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500">

    <select name="kamar" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500">
        <option value="">Semua Kamar</option>
        @for ($i = 1; $i <= 30; $i++)
            <option value="TQ {{ $i }}" {{ request('kamar') == "TQ $i" ? 'selected' : '' }}>TQ {{ $i }}</option>
        @endfor
    </select>

    <select name="jk" class="px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500">
        <option value="">Semua JK</option>
        <option value="L" {{ request('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ request('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select>

    <button type="submit" class="sm:col-span-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl transition-all">
        <i class="fa-solid fa-magnifying-glass mr-2"></i> Cari Santri
    </button>
</form>

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-indigo-50/50 text-indigo-900 border-b border-indigo-100 text-[10px] font-bold uppercase tracking-wider">
                    <th class="p-6 pl-8">NIS</th>
                    <th class="p-6">Nama Santri</th>
                    <th class="p-6 text-center">JK</th>
                    <th class="p-6">Kamar</th>
                    <th class="p-6 text-center">Hafalan</th>
                    <th class="p-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                @forelse($santriList as $santri)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="p-6 pl-8 font-mono text-slate-500">{{ $santri->nis }}</td>
                        <td class="p-6 font-bold text-slate-800">{{ $santri->nama_santri }}</td>
                        <td class="p-6 text-center">
                            <span class="px-2 py-1 rounded-lg text-[10px] font-bold {{ $santri->jk == 'L' ? 'bg-blue-50 text-blue-600' : 'bg-pink-50 text-pink-600' }}">
                                {{ $santri->jk == 'L' ? 'L' : 'P' }}
                            </span>
                        </td>
                        <td class="p-6 text-slate-600">{{ $santri->kamar }}</td>
                        <td class="p-6 text-center">
                            <span class="font-bold text-indigo-600">{{ $santri->jumlah_hafalan_juz }} Juz</span>
                        </td>
                        <td class="p-6 flex items-center justify-center gap-2">
                            <a href="{{ route('admin.santri.edit', $santri->id) }}" class="w-9 h-9 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-xl flex items-center justify-center transition-all shadow-sm">
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                            </a>
                            <form action="{{ route('admin.santri.destroy', $santri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data santri ini?')">
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
                            <i class="fa-solid fa-user-graduate text-4xl block mb-3 opacity-20"></i>
                            Data santri tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

            <div class="mt-4">
                {{ $santriList->links() }}
            </div>
        </div>
    </div>
</body>
</html>
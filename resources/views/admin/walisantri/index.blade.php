<div class="p-4 sm:ml-64">
    <div class="max-w-7xl mx-auto pt-6">
        <h1 class="text-2xl font-black mb-6">Daftar Wali Santri</h1>
        
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 text-[10px] uppercase tracking-wider">
                    <tr>
                        <th class="p-6">Nama Wali</th>
                        <th class="p-6">No. Telp</th>
                        <th class="p-6">Nama Anak (Santri)</th>
                        <th class="p-6">NIS</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($waliList as $wali)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-6 font-bold">{{ $wali->nama_wali }}</td>
                        <td class="p-6 text-sm">{{ $wali->no_telp }}</td>
                        <td class="p-6">
                            {{ $wali->santri ? $wali->santri->nama_santri : 'Data tidak ditemukan' }}
                        </td>
                        <td class="p-6 text-sm font-mono text-slate-400">{{ $wali->nis }}</td>
                        <td class="p-6 text-center">
                            <form action="{{ route('admin.wali.destroy', $wali->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun wali ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-9 h-9 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-xl flex items-center justify-center transition-all shadow-sm mx-auto">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-16 text-center text-slate-400">
                            <i class="fa-solid fa-users-slash text-4xl block mb-3 opacity-30"></i>
                            <p class="font-semibold">Belum ada wali yang terdaftar.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
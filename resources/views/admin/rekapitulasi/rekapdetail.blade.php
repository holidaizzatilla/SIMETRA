<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Resmi {{ $nama_kelas }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap');

        @media print {
            @page { size: A4 portrait; margin: 10mm; }
            .no-print { display: none !important; }
            body { background: white; padding: 0; }
            .print-container { width: 100%; border: none !important; box-shadow: none !important; padding: 0 !important; min-h: auto !important; }
        }

        .serif-font { font-family: 'Times New Roman', Times, serif; }
        .instansi-font { font-family: 'Cinzel', serif; }
        
        .border-double-custom {
            border-bottom: 4px double black;
        }

        .bw-logo {
            filter: grayscale(100%) contrast(120%);
        }
    </style>
</head>
<body class="bg-slate-100 p-2 sm:p-4 serif-font text-black text-xs">

    <div class="max-w-3xl mx-auto">
        
        <div class="no-print flex justify-between items-center mb-4">
            <a href="{{ url()->previous() }}" class="group flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-300 rounded-full text-slate-600 hover:text-black hover:border-black transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 group-hover:-translate-x-1 transition-transform">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                <span class="text-xs font-bold text-black">Kembali</span>
            </a>
            
            <button onclick="window.print()" class="flex items-center gap-1.5 bg-black hover:bg-slate-800 text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-md transition-all">
                <span>🖨️</span>
                <span>Cetak Laporan</span>
            </button>
        </div>

        <div class="print-container bg-white p-8 shadow-xl border border-slate-200 mx-auto min-h-[1000px]">
            
            <div class="flex flex-col items-center border-double-custom pb-3 mb-4 text-center">
                <div class="w-14 h-14 mb-2">
                    <img 
                        src="{{ asset('images/TQ.png') }}" 
                        alt="Logo Instansi" 
                        class="max-w-full max-h-full object-contain bw-logo"
                        onerror="this.src='https://via.placeholder.com/80?text=LOGO'"
                    >
                </div>
                
                <div class="w-full">
                    <h2 class="text-sm font-bold uppercase tracking-tight leading-tight">Pondok Pesantren</h2>
                    <h2 class="text-base font-extrabold uppercase leading-tight mb-0.5">Salafiyah Syafi'iyah Sukorejo</h2>
                    
                    <div class="my-0.5">
                        <h1 class="instansi-font text-sm font-black uppercase tracking-widest border-y border-black inline-block px-3 py-0.5">
                            Asrama Tahfidzul Qur'an
                        </h1>
                    </div>

                    <p class="text-[9px] mt-1 italic leading-tight">
                        Jl. KHR. As'ad Syamsul Arifin No. 123, Banyuputih, Situbondo, Jawa Timur 68374<br>
                        <span class="not-italic font-bold">Telp: (0332) 123456 | Website: www.tahfidzsukorejo.id</span>
                    </p>
                </div>
            </div>

            <div class="text-center mb-4">
                <h3 class="text-sm font-bold uppercase underline underline-offset-2">Laporan Rekapitulasi Bulanan Santriwati</h3>
                <p class="text-xs mt-0.5 uppercase tracking-wide">Halaqah: <b>{{ $nama_kelas }}</b> | Periode: <b>{{ date('F Y') }}</b></p>
            </div>

            <div class="relative overflow-x-auto border border-black">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-black text-white text-[9px] uppercase tracking-wider">
                            <th class="border-r border-white/20 p-1.5 text-center w-8">No</th>
                            <th class="border-r border-white/20 p-1.5 min-w-[180px]">Nama Lengkap Santriwati</th>
                            <th colspan="3" class="border-r border-white/20 p-1.5 text-center">Absensi</th>
                            <th class="border-r border-white/20 p-1.5 text-center">Capaian Hafalan</th>
                            <th class="p-1.5 text-center w-16">Status</th>
                        </tr>
                        <tr class="bg-slate-100 text-black text-[8px] font-bold text-center border-b border-black">
                            <th class="border-r border-black p-1"></th>
                            <th class="border-r border-black p-1"></th>
                            <th class="border-r border-black w-7 p-1">H</th>
                            <th class="border-r border-black w-7 p-1">I/S</th>
                            <th class="border-r border-black w-7 p-1">A</th>
                            <th class="border-r border-black italic px-2 p-1">Surah / Juz Terakhir</th>
                            <th class="px-2 p-1">Progres</th>
                        </tr>
                    </thead>
                    <tbody class="text-[10px]">
                        @forelse($santri_list as $index => $s)
                        <tr class="border-b border-black hover:bg-slate-50 transition-colors">
                            <td class="border-r border-black p-1.5 text-center">{{ $index + 1 }}</td>
                            <td class="border-r border-black p-1.5 font-bold">{{ $s->nama }}</td>
                            <td class="border-r border-black p-1.5 text-center">{{ $s->hadir }}</td>
                            <td class="border-r border-black p-1.5 text-center">{{ $s->sakit_izin }}</td>
                            <td class="border-r border-black p-1.5 text-center font-bold">{{ $s->alpa }}</td>
                            <td class="border-r border-black p-1.5 italic px-3">{{ $s->hafalan_terakhir }}</td>
                            <td class="p-1.5 text-center font-bold">{{ $s->progres }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center italic text-slate-400">Belum ada data santri di kelas ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-2 flex justify-between items-start text-[8px] text-slate-600 italic">
                <p>*H: Hadir, I/S: Izin/Sakit, A: Alpa (Tanpa Keterangan)</p>
                <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-12 text-center text-xs">
                <div class="space-y-14">
                    <div class="space-y-0.5">
                        <p>Mengetahui,</p>
                        <p class="font-bold uppercase tracking-wide">Pembina Tahfidz</p>
                    </div>
                    <div>
                        <p class="font-bold underline underline-offset-2 uppercase">guru Musyifah, S.Sos</p>
                    </div>
                </div>
                <div class="space-y-14">
                    <div class="space-y-0.5">
                        <p>Situbondo, {{ date('d F Y') }}</p>
                        <p class="font-bold uppercase tracking-wide">Wali Kelas {{ $nama_kelas }}</p>
                    </div>
                    <div>
                        <p class="font-bold underline underline-offset-2 uppercase">{{ $guru ?? '............................................' }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-2 border-t border-slate-200 text-center">
                <p class="text-[8px] text-slate-400 uppercase tracking-[0.2em]">Dokumen Rekapitulasi - Asrama Tahfidz</p>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Asrama Tahfidz</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Lateef&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .font-imaratul { font-family: 'Amiri', serif; }
        html { scroll-behavior: smooth; }
        [id] { scroll-margin-top: 100px; }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900">

@include('layouts.navbar')

<header class="relative h-screen flex items-center justify-center bg-indigo-950 px-4 overflow-hidden border-b-8 border-amber-400">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/MQ.png') }}" class="w-full h-full object-cover opacity-40 scale-105" alt="Background Sukorejo">
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-950 via-indigo-950/70 to-indigo-950/90"></div>
    </div>

    <div class="relative z-10 max-w-6xl mx-auto text-center space-y-6">
        <div class="flex justify-center mb-4">
            <div class="animate-bounce-slow">
                <img src="{{ asset('images/TQ.png') }}" alt="Logo Sukorejo" class="h-20 md:h-24 drop-shadow-[0_8px_20px_rgba(251,191,36,0.3)]">
            </div>
        </div>
        <div class="space-y-4">
            <p dir="rtl" class="font-imaratul text-2xl md:text-4xl text-white drop-shadow-lg leading-loose tracking-widest opacity-95">
                اَلْمَعْهَدُ الْإِسْلَامِىُّ عِمَارَةُ حُفَّاظِ الْقُرْآنِ
            </p>
            <div class="flex justify-center items-center gap-4">
                <div class="h-[1px] w-12 bg-amber-400/50"></div>
                <div class="w-2 h-2 bg-amber-400 rotate-45 shadow-[0_0_10px_#fbbf24]"></div>
                <div class="h-[1px] w-12 bg-amber-400/50"></div>
            </div>
        </div>
        <div class="space-y-2">
            <h1 class="text-5xl md:text-6xl font-black text-amber-400 drop-shadow-[0_5px_15px_rgba(0,0,0,0.5)] tracking-tighter uppercase italic leading-none">
                Asrama Tahfidzul <br class="md:hidden"> <span class="text-white">Qur'an</span>
            </h1>
            <p class="text-lg md:text-xl text-indigo-100 font-medium max-w-3xl mx-auto italic tracking-wide px-4 opacity-80">
                "Pondok Pesantren Salafiyah Syafi'iyah Sukorejo Situbondo"
            </p>
        </div>
        <div class="inline-flex items-center gap-2 bg-indigo-900/50 backdrop-blur-md border border-white/10 px-5 py-2.5 rounded-full mt-6 shadow-xl">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
            </span>
            <span class="text-white text-[9px] md:text-[10px] font-black uppercase tracking-[0.2em]">
                Tidak Hanya Menghafal, Tapi Juga Paham Maknanya
            </span>
        </div>
    </div>
</header>

<div id="jenjang" class="max-w-6xl mx-auto px-4 mt-12 mb-10 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mt-4">
        Jenjang Tingkatan <span class="text-indigo-600">Santri</span>
    </h2>
    <div class="flex justify-center mt-3">
        <div class="w-24 h-1.5 bg-amber-400 rounded-full"></div>
        <div class="w-4 h-1.5 bg-indigo-600 rounded-full ml-1"></div>
    </div>
    <p class="text-slate-500 mt-4 font-medium italic">Tahapan pembinaan hafalan Al-Qur'an </p>
</div>

<div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        <div class="bg-white p-8 rounded-3xl shadow-sm border-t-4 border-rose-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center flex flex-col items-center">
            <div class="bg-rose-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-inner">
                <i class="fa-solid fa-book-open text-2xl text-rose-600"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Santri Tahsin</h3>
            <p class="text-sm text-slate-500 italic leading-relaxed">Fokus memperbaiki bacaan Al-Qur'an</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border-t-4 border-blue-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center flex flex-col items-center">
            <div class="bg-blue-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-inner">
                <i class="fa-solid fa-pen-to-square text-2xl text-blue-600"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Santri Pra Tahfidz</h3>
            <p class="text-sm text-slate-500 italic leading-relaxed">Jenjang persiapan sebelum benar-benar menambah hafalan Al-Qur'an</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border-t-4 border-amber-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center flex flex-col items-center">
            <div class="bg-amber-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-inner">
                <i class="fa-solid fa-gem text-2xl text-amber-600"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Santri Tahfidz</h3>
            <p class="text-sm text-slate-500 italic leading-relaxed">Terdapat 4 kelas sesuai dengan perolehan hafalan dan kelancaran</p>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border-t-4 border-emerald-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center flex flex-col items-center">
            <div class="bg-emerald-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-5 shadow-inner">
                <i class="fa-solid fa-graduation-cap text-2xl text-emerald-600"></i>
            </div>
            <h3 class="font-bold text-xl text-slate-800 mb-2">Pasca Tahfidz</h3>
            <p class="text-sm text-slate-500 italic leading-relaxed">Jenjang bagi santri tahfidz yang telah khatam dan lulus madrasah</p>
        </div>
    </div> 
</div>

<div id="ketentuan" class="max-w-6xl mx-auto px-4 mt-20 mb-10">
    <div class="flex flex-col md:flex-row items-center gap-4 border-l-8 border-amber-400 pl-6">
        <div class="text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Ketentuan Umum <span class="text-indigo-600">Asrama</span></h2>
            <p class="text-slate-500 font-medium italic mt-1">Peraturan dan tata tertib santri Tahfidzul Qur'an Putri</p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 mb-20">
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-100">
            <div class="p-8 md:p-10">
                <ul class="space-y-8">
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Memenuhi Target Hafalan</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Target minimal hafalan adalah 7 juz setiap tahunnya, dan termasuk salah satu persyaratan untuk bisa naik ke jenjang kelas berikutnya.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Wajib Mengikuti Jam Wajib</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Murajaah setiap malam minimal 5 halaman, dan hafalan tambahan minimal 1 halaman setiap hari.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-solid fa-exclamation"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Bersungguh-Sungguh</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Bagi siswi yang tidak naik kelas 2 tahun berturut-turut, maka akan dipindah kamar ke asrama non tahfidz, dengan catatan bisa kembali di tahun berikutnya jika hafalan lancar.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="p-8 md:p-10 bg-slate-50/50">
                <ul class="space-y-8">
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Berakhlakul Karimah</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Perilaku sehari-hari (Akhlaqul Karimah, taat peraturan, dll) menjadi pertimbangan dalam penentuan kenaikan kelas.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-solid fa-mosque"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Kegiatan Ramadlan</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Santri tahfidz dan pra tahfidz wajib mengikuti kegiatan Ramadhan (21 Sya'ban - 15 Ramadhan) di Pondok Pesantren.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800">Aturan Berpakaian</h4>
                            <p class="text-sm text-slate-500 mt-1 leading-relaxed">Berpakaian Syar'i, jilbab putih ukuran L, tidak menggunakan make up berlebihan, serta menggunakan ciput dan kaos kaki ketika keluar asrama.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="kegiatan" class="max-w-6xl mx-auto px-4 mb-10 text-center">
    <h2 class="text-3xl font-bold text-slate-800">Kegiatan Asrama <span class="text-indigo-600">Tahfidzul Qur'an</span></h2>
    <div class="flex justify-center mt-3">
        <div class="w-24 h-1.5 bg-amber-400 rounded-full"></div>
        <div class="w-4 h-1.5 bg-indigo-600 rounded-full ml-1"></div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 mb-20">
    <div class="bg-white rounded-3xl shadow-sm p-8 border border-slate-100">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-2 gap-x-6">
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">02.30 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Tahajjud Berjama'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">03.15 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Piket Halaman Asrama</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">04.00 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Shubuh Berjama'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">05.00 - 06.30</span>
                <p class="text-sm text-slate-700 font-medium">Sekolah Madrasah / Diniyah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">07.30 - 08.00</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Dhuha Berjama'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">08.00 - 08.15</span>
                <p class="text-sm text-slate-700 font-medium">Tahsinul Qur'an</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">08.15 - 10.00</span>
                <p class="text-sm text-slate-700 font-medium">Jam Wajib Setoran Hafalan</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">11.30 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Dhuhur Berjama'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">12.45 - 16.30</span>
                <p class="text-sm text-slate-700 font-medium leading-tight">Sekolah Formal (SMP, SMA, SMK, Kuliah)</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">16.30 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Piket Halaman Asrama</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">17.30 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Maghrib & Ngaji Bin Nadzri</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">19.00 - Selesai</span>
                <p class="text-sm text-slate-700 font-medium">Sholat Isya' Berjama'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-indigo-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">19.30 - 21.00</span>
                <p class="text-sm text-slate-700 font-medium">Jam Wajib Muroja'ah</p>
            </div>
            <div class="flex items-center gap-4 p-3 border-b border-slate-50">
                <span class="bg-rose-600 text-white text-[10px] font-bold px-2 py-1 rounded-full w-28 text-center shrink-0">22.00</span>
                <p class="text-sm text-rose-700 font-bold italic">Jam Wajib Istirahat</p>
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 mb-20 grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
    <div class="relative rounded-[2.5rem] p-10 overflow-hidden shadow-2xl flex flex-col items-center text-center justify-center min-h-[450px] group border border-white/10">
        <img src="{{ asset('images/putra.png') }}" class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110" alt="Background Pengajian">
        <div class="absolute inset-0 bg-indigo-950/80 backdrop-blur-[2px]"></div>
        <div class="relative z-10 transform transition duration-500 group-hover:-translate-y-2 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 bg-amber-400 text-indigo-950 px-4 py-1.5 rounded-full text-[10px] font-black uppercase mb-6 shadow-lg">
                <i class="fa-solid fa-book"></i> 
                <span>Kitab Kuning</span>
            </div>
            <h3 class="text-3xl md:text-4xl font-black text-white mb-8 tracking-tighter whitespace-nowrap">
                Pengajian Umum <span class="text-amber-400">Kitab</span>
            </h3>
            <ul class="space-y-3 w-full max-w-md">
                <li class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 text-sm text-indigo-50 italic hover:bg-white/20 transition flex items-center justify-center gap-3">
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                    Tafsir Jalalain (Pasca Tahfidz)
                </li>
                <li class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 text-sm text-indigo-50 italic hover:bg-white/20 transition flex items-center justify-center gap-3">
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                    Nashoihul 'Ibad
                </li>
                <li class="bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 text-sm text-indigo-50 italic hover:bg-white/20 transition flex items-center justify-center gap-3">
                    <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                    Ta'limul Muta'alim
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-10 border border-slate-200 shadow-sm flex flex-col items-center text-center justify-center min-h-[400px]">
        <div class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mb-6 shadow-inner">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                <path d="M8 6h10"></path>
                <path d="M8 10h10"></path>
                <path d="M8 14h10"></path>
            </svg>
        </div>
        <span class="text-indigo-600 font-bold uppercase tracking-[0.2em] text-xs mb-3">Program Unggulan</span>
        <h3 class="text-3xl font-black text-slate-800 mb-4">PMHQ</h3>
        <div class="w-12 h-1 bg-amber-400 mb-6 rounded-full"></div>
        <p class="text-slate-600 leading-relaxed italic max-w-2xl text-lg">
            "(Persiapan Musabaqoh Huffadzul Qur'an) Program untuk mewadahi dan membimbing santri agar bisa bersaing dalam berbagai perlombaan MTQ."
        </p>
    </div>
</div>

<div class="bg-indigo-950 py-24 px-4 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-amber-400/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-500/10 rounded-full -ml-32 -mb-32 blur-3xl"></div>
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative group">
                <div class="absolute -inset-4 bg-gradient-to-tr from-amber-400 to-indigo-500 rounded-full opacity-20 blur-lg"></div>
                <div class="relative bg-white p-3 rounded-full shadow-2xl mx-auto max-w-sm overflow-hidden">
                    <img src="{{ asset('images/KHR Asad.webp') }}" alt="KHR. As'ad Syamsul Arifin" class="w-full h-auto rounded-full grayscale hover:grayscale-0 transition duration-700 object-cover aspect-square">
                </div>
                <div class="text-center mt-6">
                    <h4 class="text-amber-400 font-bold text-xl tracking-widest uppercase">KHR. AS'AD SYAMSUL ARIFIN</h4>
                    <p class="text-indigo-200 text-sm mt-1">Pendiri & Pengasuh kedua Pondok Pesantren Sukorejo</p>
                </div>
            </div>
            <div class="text-center lg:text-left text-white space-y-8">
                <div class="relative">
                    <span class="text-6xl font-serif text-amber-400/30 absolute -top-8 -left-4">"</span>
                    <p class="text-xl md:text-2xl leading-relaxed italic font-medium relative z-10">"Saya berharap kalian bisa membaca Al-Qur'an dengan baik, Mengapa? agar didada kalian terdapat Al-Qur'an. Sebab salah satu tanda orang yang benar-benar beriman adalah didadanya terdapat Al-Qur'an."</p>
                </div>
                <div class="w-24 h-1 bg-amber-400 mx-auto lg:mx-0"></div>
                <p dir="rtl" class="font-imaratul text-2xl text-white mb-2 tracking-wide">مَنْ تَعَلَّمَ الْقُرْآنَ وَهُوَ فَتِيُw السِّنِّ خَلَطَهُ اللهُ بِلَحْمِهِ وَدَمِهِ</p>
                <p class="text-xs text-indigo-300 italic">"Barang siapa yang mempelajari Al-Qur'an di waktu usia dini, maka Allah akan mencampurkannya kedalam daging dan darahnya." (HR. Bukhari)</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@include('auth.login')

<script>
    
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; 
    }, false);

    
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('loginModal');
        
        if (event.target === modal) {
            closeLoginModal(); 
        }
    });
</script>

</body>
</html>
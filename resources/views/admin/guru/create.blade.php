<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru - Tahfidzul Qur'ani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-2xl mx-auto pt-6 px-2 sm:px-4">
            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6 sm:p-8 space-y-6">
                <div class="flex items-center gap-4 pb-4 border-b border-slate-100">
                    <a href="{{ route('admin.guru.index') }}" class="w-10 h-10 bg-slate-50 border border-slate-200 text-slate-400 hover:text-indigo-600 rounded-xl flex items-center justify-center transition shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="text-lg font-black text-slate-800">Tambah Pengajar Baru</h2>
                        <p class="text-slate-400 text-xs">Daftarkan akun resmi Guru pembimbing</p>
                    </div>
                </div>

                <form action="{{ route('admin.guru.store') }}" method="POST">
                    @include('admin.guru.partials.form')
                </form>
            </div>
        </div>
    </div>
</body>
</html>
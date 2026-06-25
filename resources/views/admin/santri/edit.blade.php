<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased">
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64 min-h-screen">
        <div class="max-w-2xl mx-auto pt-6 px-2 sm:px-4">
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm space-y-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.santri.index') }}" class="w-10 h-10 bg-slate-50 border border-slate-200 text-slate-400 hover:text-indigo-600 rounded-xl flex items-center justify-center transition">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 class="text-xl font-black text-slate-800">Edit Data Santri</h2>
                </div>

                <form action="{{ route('admin.santri.update', $santri->id) }}" method="POST">
                    @method('PUT')
                    @include('admin.santri.partials.form')
                </form>
            </div>
        </div>
    </div>
</body>
</html>
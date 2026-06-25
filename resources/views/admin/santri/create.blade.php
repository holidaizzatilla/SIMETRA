<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50">
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="max-w-2xl mx-auto pt-6">
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                <h2 class="text-xl font-black mb-6">Tambah Santri Baru</h2>
                
                <form action="{{ route('admin.santri.store') }}" method="POST">
                    @include('admin.santri.partials.form')
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Wali Santri - TQ PI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl border border-slate-100 flex flex-col md:flex-row max-w-4xl w-full relative">
        
        <div class="md:w-1/2 relative min-h-[450px] hidden md:block">
            <img src="{{ asset('images/TQ PI.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="Register Background">
            <div class="absolute inset-0 bg-indigo-900/80 backdrop-blur-[1px]"></div>
            <div class="relative z-10 p-10 h-full flex flex-col justify-between text-white">
                <div class="flex flex-col items-center text-center pt-8">
                    <img src="{{ asset('images/TQ.png') }}" class="h-14 mb-6 drop-shadow-xl" alt="Logo">
                    <h3 class="text-2xl font-black mb-3 leading-tight">Registrasi Akun <br><span class="text-amber-400">Wali Santri</span></h3>
                </div>
                <p class="text-[11px] text-indigo-100 border-t border-white/10 pt-4">Silakan daftarkan akun Anda untuk memantau perkembangan hafalan putra-putri Anda.</p>
            </div>
        </div>

        <div class="p-8 md:p-10 md:w-1/2 bg-white flex flex-col justify-center">
            <div class="mb-5">
                <h2 class="text-xl font-black text-slate-800 uppercase tracking-tighter">Daftar Akun Baru</h2>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-1">Khusus Wali Santri Tahfidz Qur'an</p>
            </div>

            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-100 text-rose-600 p-3 rounded-xl text-xs font-semibold mb-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">Nama Lengkap Santri (Anak)</label>
                    <input type="text" id="santri-input" name="name" value="{{ old('name') }}" list="list-santri" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="Ketik nama anak Anda..." autocomplete="off" required>
                    
                    <datalist id="list-santri">
                        @foreach($daftarSantri as $santri)
                            <option value="{{ $santri->nama }}" data-nis="{{ $santri->nis }}">
                        @endforeach
                    </datalist>
                </div>

                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">NIS (Nomor Induk Santri)</label>
                    <input type="text" id="nis-input" name="username" value="{{ old('username') }}" class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-sm font-semibold text-slate-500 focus:outline-none transition-all cursor-not-allowed" placeholder="Otomatis terisi setelah memilih nama" readonly required>
                    <p class="text-[9px] text-slate-400 mt-1">*NIS terkunci otomatis demi keamanan data agar tidak tertukar.</p>
                </div>

                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">Password</label>
                    <div class="relative">
                        <input id="password-field" type="password" name="password" class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="••••••••" required>
                        <button type="button" onclick="toggleRegisterPassword('password-field', 'icon-pass')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-indigo-600 transition-colors">
                            <i id="icon-pass" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-slate-500 text-[10px] font-bold uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                    <div class="relative">
                        <input id="confirm-password-field" type="password" name="password_confirmation" class="w-full pl-4 pr-12 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold focus:outline-none focus:border-indigo-500 transition-all" placeholder="••••••••" required>
                        <button type="button" onclick="toggleRegisterPassword('confirm-password-field', 'icon-confirm')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-indigo-600 transition-colors">
                            <i id="icon-confirm" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 py-3 rounded-xl font-black text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-md">
                    Daftar Akun <i class="fa-solid fa-user-plus ml-1"></i>
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="text-slate-400 text-xs">Sudah punya akun Wali? <a href="{{ url('/') }}" class="text-indigo-600 font-bold hover:underline">Login di sini</a></p>
            </div>
        </div>

    </div>

    <script>
        // Fungsi Otomatis NIS dari Datalist
        document.getElementById('santri-input').addEventListener('input', function() {
            const inputValue = this.value;
            const options = document.querySelectorAll('#list-santri option');
            const nisInput = document.getElementById('nis-input');
            
            let nisFound = "";

            options.forEach(option => {
                if (option.value === inputValue) {
                    nisFound = option.getAttribute('data-nis');
                }
            });

            nisInput.value = nisFound;
        });

        // Fungsi Menampilkan/Sembunyikan Password di Register
        function toggleRegisterPassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
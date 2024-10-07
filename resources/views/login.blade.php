@extends('login-layout.index')

@section('title', 'Login Absensi')

@section('content')
    <div class="min-h-screen flex items-center justify-center shadow-2xl relative">
        <!-- Background Video -->
        <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-[-1]">
            <source src="{{ asset('assets/video/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-60 z-[-1]"></div>

        <!-- Container for Form and Content -->
        <div
            class="flex flex-col justify-center items-center backdrop-blur-lg bg-white/30 border border-white/10 rounded-lg overflow-hidden relative z-10 max-w-md mx-auto p-8">
            <!-- Form Section -->
            <div class="w-full text-center">
                <div class="mb-4">
                    <img src="{{ asset('/assets/logo_unila/unila.png') }}" alt="Logo" class="w-24 mx-auto">
                </div>
                <h2 class="text-2xl font-semibold mb-4 text-black-2">Log In</h2>
                <p class="mb-6 text-lg text-black-2">Selamat datang di web absensi</p>
                <div class="flex items-center justify-center mb-6">
                    <hr class="w-full border-gray-300">
                </div>
                <form action="" method="post">
                    <div class="mb-4 flex items-center justify-center">
                        <a href="{{ route('login.post') }}" class="btn btn-warning text-lg w-[300px]">
                            <i class="fa-solid fa-user"></i> Login Dengan SSO Unila
                        </a>
                    </div>
                </form>
                <div class="flex items-center justify-center">
                    <a href="https://apps.unila.ac.id/#lupa" class="btn btn-error text-center w-[300px]">
                        <i class="fa-solid fa-circle-info"></i> Lupa password
                    </a>
                </div>
                <P class="mt-5 text-black-2">Mac Adress : {{ request()->ip() }}</P>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        // Mendapatkan elemen checkbox
        const themeToggle = document.getElementById('theme-toggle');

        // Cek localStorage untuk tema yang tersimpan
        const savedTheme = localStorage.getItem('theme');

        // Jika ada tema tersimpan, aktifkan tema tersebut
        if (savedTheme) {
            document.documentElement.setAttribute('data-theme', savedTheme);
            if (savedTheme === 'black') {
                themeToggle.checked = true; // Jika mode black, checkbox harus tercentang
            }
        }
    </script>
@endsection

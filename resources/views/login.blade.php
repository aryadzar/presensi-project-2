@extends('login-layout.index')

@section('title', "Login Absensi")

@section('content')
<div class="min-h-screen flex items-center justify-center shadow-2xl animated-background bg-gradient-to-r from-blue-500 to-blue-900    md:px-8 ">
  <div class="flex flex-col md:flex-row bg-gray-300 shadow-lg rounded-lg overflow-hidden w-full max-w-screen-lg">
    <!-- Form Section -->
    <div class="w-full md:w-1/2 p-8 md:p-12">
      <div class="mb-4">
        <img src="{{ asset('/assets/logo_unila/unila.png') }}" alt="Logo" class="w-24 mx-auto md:mx-0">
      </div>
      <h2 class="text-2xl font-semibold mb-4 text-center md:text-left">Log In</h2>
      <p class=" mb-6 text-center md:text-left text-lg">Selamat datang di web absensi</p>
      <div class="flex items-center justify-between mb-6">
        <hr class="w-full border-gray-300">
        <hr class="w-full border-gray-300">
      </div>
      <form action="" method="post">
        <div class="mb-4 flex items-center justify-center">
          <a href="{{ route("dashboard") }}" class=" btn btn-warning text-lg w-[300px]"><i class="fa-solid fa-user"></i>Login Dengan SSO Unila</a>
        </div>
      </form>

      <div class="flex items-center justify-center">
          <a href="https://apps.unila.ac.id/#lupa" class="btn btn-error text-center w-[300px]"><i class="fa-solid fa-circle-info"></i>Lupa password </a>
      </div>
    </div>

    <!-- Image Section -->
    <div class="w-full md:w-1/2 hidden md:flex items-center justify-center">
      <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://mamikos.com/info/wp-content/uploads/2018/10/18.-universitas-lampung-810x608.jpg');">
      </div>
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

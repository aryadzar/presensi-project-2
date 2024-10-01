@extends('login-layout.index')

@section('title', "Dashboard Pegawai")

@section('content')

<header class="bg-blue-500 text-white py-4 px-6 flex items-center justify-between">
    <!-- Left section (Logo and greeting) -->
    <div class="flex items-center space-x-4">
      <!-- Logo -->
      <a href="#">
          <div class="flex items-center">
            <img src="{{ asset('/assets/logo_absensi/image.png') }}" alt="AttenDicus Logo" class=" w-[300px] ">
          </div>
        </a>

      <!-- Greeting text -->
      <div class="ml-6">
        <h2 class="text-xl font-bold">Selamat Pagi, Ahmad Mauluddin</h2>
        <p class="text-sm">Selamat datang di sistem absensi pegawai :)</p>
      </div>
    </div>

    <!-- Right section (Notification and profile) -->
    <div class="flex items-center space-x-4">
      <!-- Notification Icon -->
      <button class="relative">
        <div class="w-10 h-10 bg-white text-blue-500 rounded-full flex items-center justify-center">
          <i class="fas fa-bell"></i>
        </div>
      </button>

      <!-- Vertical Divider -->
      <div class="h-8 border-l border-white"></div>

      <!-- User Profile -->
      <div class="flex items-center space-x-2">
        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
          <i class="fas fa-user"></i>
        </div>
        <div>
          <h3 class="font-bold">Ahmad Mauluddin</h3>
          <p class="text-sm">Pegawai</p>
        </div>
        <!-- Dropdown Icon -->
        <i class="fas fa-chevron-down"></i>
      </div>
    </div>
  </header>

  <div class="flex h-screen space-x-4">
    @include('dashboard.dashboard-route.index')
    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <h1 class="text-2xl font-semibold"> <span class=" text-blue-500"><i class="fas fa-history"></i> History</span></h1>

    </main>
  </div>


@endsection

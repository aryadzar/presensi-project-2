<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/assets/logo_unila/unila.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
</head>
<body>

    <header class="bg-blue-500 text-white py-4 px-6 flex items-center justify-between overflow-x-auto">
        <!-- Left section (Logo and greeting) -->
        <div class="flex items-center space-x-5">
            <!-- Logo -->
            <a href="#">
                <div class="flex items-center ">
                    <img src="{{ asset('/assets/logo_absensi/image.png') }}" alt="AttenDicus Logo" class=" w-[200px]">
                </div>
            </a>

          <!-- Greeting text -->
          <div class="ml-6">
            <h2 class="text-xl font-bold">Selamat Pagi, @yield('nama_pegawai')</h2>
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
          <div class="flex items-center space-x-2 cursor-pointer">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <h3 class="font-bold">@yield('nama_pegawai')</h3>
              <p class="text-sm">@yield('role')</p>
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
            @yield('content')
        </main>
      </div>

      @yield('script')

</body>
</html>

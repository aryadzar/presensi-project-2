<!-- Sidebar -->
<aside class="bg-gradient-to-b from-blue-500 to-blue-950 text-white w-64 flex flex-col justify-between p-4  rounded-sm">
        <!-- Top Section -->
        <div class=" flex-grow ">
          <!-- Navigation Menu -->
          <nav class="space-y-4">
            <!-- Dashboard -->
            <a href="{{ route("dashboard") }}" class="flex items-center space-x-2 p-5  {{ Route::currentRouteName() == 'dashboard' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100 shadow-2xl" }} ">
              <i class="fas fa-home"></i>
              <span>Dashboard</span>
            </a>
            <!-- Presensi -->
            <a href="{{ route("presensi") }}" class="flex  items-center space-x-2 p-5 {{ Route::currentRouteName() == 'presensi' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100" }}  ">
              <i class="fas fa-fingerprint"></i>
              <span>Presensi</span>
            </a>
            <!-- History -->
            <a href="{{ route("riwayat") }}" class="flex items-center space-x-2 p-5 {{ Route::currentRouteName() == 'riwayat' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100" }}">
              <i class="fas fa-history"></i>
              <span>History</span>
            </a>

          </nav>
        </div>

        <div class="space-y-3">
          <!-- Dark Mode Toggle -->
          <div class="flex items-center justify-between p-3 rounded-lg">
            <input type="checkbox" class="theme-controller" value="dark" id="theme-toggle" />
            <span>Dark Mode</span>
            <span class="bg-gray-600 px-2 py-1 text-xs rounded-full">Beta</span>
          </div>

          <!-- Help -->
          <a href="#" class="flex items-center space-x-2 p-3 rounded-lg">
            <i class="fas fa-question-circle"></i>
            <span>Help</span>
          </a>

          <!-- Logout -->
          <a href="{{ route("login") }}" class="flex items-center space-x-2 p-3 rounded-lg">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>

          <!-- Version -->
          <div class="text-center text-sm text-gray-300">
            v1.08Stable
          </div>
        </div>
        <!-- Bottom Section -->
</aside>

@section('script')
<script>
    // Mendapatkan elemen checkbox
    const themeToggle = document.getElementById('theme-toggle');

    // Cek localStorage untuk tema yang tersimpan
    const savedTheme = localStorage.getItem('theme');

    // Jika ada tema tersimpan, aktifkan tema tersebut
    if (savedTheme) {
      document.documentElement.setAttribute('data-theme', savedTheme);
      if (savedTheme === 'dark') {
        themeToggle.checked = true; // Jika mode dark, checkbox harus tercentang
      }
    }

    // Event listener untuk perubahan tema
    themeToggle.addEventListener('change', function() {
      if (this.checked) {
        document.documentElement.setAttribute('data-theme', 'dark'); // Set tema ke 'dark'
        localStorage.setItem('theme', 'dark'); // Simpan pilihan tema di localStorage
      } else {
        document.documentElement.setAttribute('data-theme', 'light'); // Set tema ke 'light'
        localStorage.setItem('theme', 'light'); // Simpan pilihan tema di localStorage
      }
    });
  </script>
@endsection

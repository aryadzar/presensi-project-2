<!-- Sidebar -->
<aside class="bg-gradient-to-b from-blue-500 to-blue-950 text-white w-64 flex flex-col justify-between p-4 overflow-y rounded-sm">
        <!-- Top Section -->
        <div>
          <!-- Navigation Menu -->
          <nav class="space-y-4">
            <!-- Dashboard -->
            <a href="{{ route("dashboard") }}" class="flex items-center space-x-2 p-3  {{ Route::currentRouteName() == 'dashboard' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100" }} ">
              <i class="fas fa-home"></i>
              <span>Dashboard</span>
            </a>
            <!-- Presensi -->
            <a href="{{ route("set_absen") }}" class="flex items-center space-x-2 p-3 {{ Route::currentRouteName() == 'set_absen' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100" }}  ">
              <i class="fas fa-fingerprint"></i>
              <span>Presensi</span>
            </a>
            <!-- History -->
            <a href="{{ route("riwayat") }}" class="flex items-center space-x-2 p-3 {{ Route::currentRouteName() == 'riwayat' ? "bg-white rounded-lg text-blue-600 w-96" : "bg-white text-blue-500 rounded-lg hover:bg-gray-100" }}">
              <i class="fas fa-history"></i>
              <span>History</span>
            </a>

          </nav>
        </div>

        <div class="space-y-4">
          <!-- Dark Mode Toggle -->
          <a href="#" class="flex items-center justify-between p-3 rounded-lg">
            <span>Dark Mode</span>
            <span class="bg-gray-600 px-2 py-1 text-xs rounded-full">Beta</span>
          </a>

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

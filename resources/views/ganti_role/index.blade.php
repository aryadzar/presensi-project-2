<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ganti Role</title>
    <link rel="shortcut icon" href="{{ asset('/assets/logo_unila/unila.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-blue-500 to-blue-900 overflow-hidden">
    <!-- Header -->
    <div class="w-full max-w mx-auto rounded-lg shadow-lg p-2">
        <div class="flex items-center p-3">
            <img src="{{ asset('assets/logo_absensi/image.png') }}" alt="Logo Unila" class="h-12 mr-4">
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <!-- Container for Form and Content -->
        <div class="flex flex-col justify-center items-center backdrop-blur-lg rounded-lg overflow-hidden relative z-10 max-w-md mx-auto p-8"
            x-data="{ selectedRole: 'Karyawan' }">
            <!-- Form Section -->
            <div class="w-full bg-blue-400 rounded-lg shadow-md p-10">
                <div class="flex items-center mb-7 text-black">
                    <i class="fa-solid fa-arrow-right-arrow-left fa-rotate-by"
                        style="--fa-rotate-angle: 135deg;"></i>
                    <h2 class="text-2xl font-semibold ml-2">Ganti Role</h2>
                </div>

                <div class="text-center space-y-5 ">
                    <template x-for="role in ['Karyawan', 'Operator', 'Admin']" :key="role">
                        <button @click="selectedRole = role"
                            :class="selectedRole === role ? 'bg-green-200 text-[#198B34] font-semibold' : 'bg-white text-gray-800'"
                            class="py-4 px-6 w-full rounded-lg shadow-sm border border-gray-300 focus:outline-none">
                            <span x-text="role"></span>
                            <span x-show="selectedRole === role">
                                 <i class="fa-regular fa-circle-check" style="color: #198B34;"></i>
                            </span>
                        </button>
                    </template>
                </div>

                <div class="mt-6 flex justify-center">
                    <a href="{{ route('dashboard') }}"
                        class="bg-blue-600 text-white py-3 px-5 rounded-lg hover:bg-blue-700 flex items-center">
                        <i class="fa-solid fa-house mr-2"></i> Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="h-16"></div>
</body>

</html>

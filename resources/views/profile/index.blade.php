<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Karyawan</title>
    <link rel="shortcut icon" href="{{ asset('/assets/logo_unila/unila.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer>
        // Script untuk pengaturan tab
        function showTab(tab) {
            const overviewContent = document.getElementById('overview-content');
            const passwordContent = document.getElementById('password-content');
            const overviewTab = document.getElementById('overview-tab');
            const passwordTab = document.getElementById('password-tab');

            if (tab === 'overview') {
                overviewContent.classList.remove('hidden');
                passwordContent.classList.add('hidden');
                overviewTab.classList.add('active');
                passwordTab.classList.remove('active');
            } else {
                overviewContent.classList.add('hidden');
                passwordContent.classList.remove('hidden');
                overviewTab.classList.remove('active');
                passwordTab.classList.add('active');
            }
        }
    </script>
</head>

<body class="bg-gradient-to-b from-blue-500 to-blue-950 overflow-hidden">
    <div class="w-full max-w mx-auto rounded-lg shadow-lg p-2">
        <div class="flex items-center p-3">
            <img src="{{ asset('assets/logo_absensi/image.png') }}" alt="Logo Unila" class="h-12 mr-4">
        </div>
    </div>

    <div class="flex justify-center items-center h-screen">
        <div class="bg-blue-400 shadow-lg rounded-lg w-1/3">
            <div class="flex justify-center mt-4">
                <img src="https://via.placeholder.com/100" alt="profile" class="rounded-full w-24 h-24">
            </div>
            <div class="text-center mt-4">
                <h2 class="text-lg font-semibold">Ahmad Mauluddin - Admin</h2>
            </div>
            <!-- Tab Navigation -->
            <div class="flex justify-start border-b mt-4 pl-6">
                <button id="overview-tab" class="tab-button active" onclick="showTab('overview')">Overview</button>
                <button id="password-tab" class="tab-button" onclick="showTab('password')">Ganti Kata Sandi</button>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Overview Content -->
                <div id="overview-content">
                    <table class="table-auto w-full text-left">
                        <tbody>
                            <tr>
                                <td class="font-bold">Username</td>
                                <td>: Pegawai</td>
                            </tr>
                            <tr>
                                <td class="font-bold">NPM</td>
                                <td>: 221506124124</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Dibuat</td>
                                <td>: 1 Minggu yang lalu</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Update Terakhir</td>
                                <td>: 5 jam yang lalu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Ganti Kata Sandi Content (disembunyikan dulu) -->
                <div id="password-content" class="hidden">
                    <form>
                        <div class="mb-4">
                            <label for="current-password" class="block text-gray-700">Kata Sandi Saat Ini</label>
                            <input id="current-password" type="password"
                                class="w-full px-4 py-2 border rounded-md bg-gray-200"
                                placeholder="Masukkan kata sandi saat ini">
                        </div>
                        <div class="mb-4">
                            <label for="new-password" class="block text-gray-700">Kata Sandi Baru</label>
                            <input id="new-password" type="password"
                                class="w-full px-4 py-2 border rounded-md bg-gray-200"
                                placeholder="Masukkan kata sandi baru">
                        </div>
                        <div class="mb-4">
                            <label for="confirm-password" class="block text-gray-700">Masukan Ulang Kata Sandi</label>
                            <input id="confirm-password" type="password"
                                class="w-full px-4 py-2 border rounded-md bg-gray-200"
                                placeholder="Masukkan kembali kata sandi baru">
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                                Simpan Kata Sandi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .tab-button {
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 0;
            font-weight: bold;
            color: #3B82F6 cursor: pointer;
        }

        .tab-button.active {
            background-color: transparent;
            color: #3B82F6;
            border-bottom: 2px solid #3B82F6;
        }

        .tab-button:hover {
            background-color: #93C5FD;
        }
    </style>
</body>

</html>

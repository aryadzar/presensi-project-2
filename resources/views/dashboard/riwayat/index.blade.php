@extends('dashboard.dashboard-layout.index')

@section('title', "History Pegawai")
@section('nama_pegawai', 'Ahmad Januari')
@section('role', "Pegawai")

@section('content')
<div class=" flex justify-between">
    <h1 class="text-2xl font-semibold"> <span class=" text-blue-500"><i class="fas fa-history"></i> History</span></h1>
    <!-- Container Form -->
    <div class="flex justify-end p-0">
        <form class="max-w-md w-full">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <!-- Input -->
                <input
                    type="search"
                    id="default-search"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-[#ADD8E6] focus:ring-blue-500 focus:border-blue-500 placeholder-gray-700"
                    placeholder="Cari..."
                    required
                    style="border-radius: 25px;"
                />
                </div>
            </form>
        </div>
</div>
<div class="bg-blue-100 p-6 mx-auto mt-5 rounded-lg shadow-lg inline-block">
    <!-- Buttons-->
        <div>
            <div class="flex space-x-4 mb-4">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded">Harian</button>
                <button class="bg-blue-300 text-white font-semibold py-2 px-4 rounded">Mingguan</button>
                <button class="bg-blue-300 text-white font-semibold py-2 px-4 rounded">Bulanan</button>
                <!-- Export PDF Button -->
                <form action="" method="POST" class="pl-[768px]">
                    @csrf
                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded flex items-center"
                    >

                        Export PDF
                        <i class="fa-solid fa-file-export pl-2"></i>
                    </button>
                </form>
            </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Dept.</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Check-in</th>
                    <th class="px-4 py-2">Check-out</th>
                    <th class="px-4 py-2">Jam Kerja</th>
                    <th class="px-4 py-2">Overtime</th>
                </tr>
            </thead>
            <tbody class="text-center text-gray-700">
                <!-- Sample Row -->
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-green-500 text-white">Hadir</td>
                    <td class="border px-4 py-2">07.30 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">30/09/2024</td>
                    <td class="border px-4 py-2">Ahmad Mauluddin</td>
                    <td class="border px-4 py-2">Magang</td>
                    <td class="border px-4 py-2">UPT TIK</td>
                    <td class="border px-4 py-2 bg-yellow-500 text-white">Telat</td>
                    <td class="border px-4 py-2">07.31 WIB</td>
                    <td class="border px-4 py-2">16.10 WIB</td>
                    <td class="border px-4 py-2">8jam 40menit</td>
                    <td class="border px-4 py-2">0jam</td>
                </tr>
            </tbody>
        </table>

</div>


@endsection


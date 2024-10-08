@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', Auth::user()->name )
@section('role', 'Pegawai')
@section('content')
    {{-- <div class=" flex justify-between">
    <h1  class="text-2xl font-semibold mb-7"> <span class=" text-blue-500"><i class="fa-solid fa-house"></i>  Dashboard</span></h1>

    <h1 class="text-2xl text-blue-500 font-semibold">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h1>

</div> --}}
    <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        @include('dashboard_pegawai.breadcrumbs.index')

        <!-- Absence Warning Box -->
        <div class="col-span-3 bg-yellow-100 p-4 rounded-lg shadow-md flex items-center">
            <svg class="w-8 h-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12c0 5.52 4.48 10 10 10s10-4.48 10-10C22 6.48 17.52 2 12 2zm0 15h-1v-1h1v1zm1-4h-2v-4h2v4z" />
            </svg>
            <p class="ml-4 text-yellow-800 font-semibold">Anda Belum Melakukan Absensi!! Mohon untuk segera melakukan absensi
                sebelum batas waktu.</p>
        </div>

        <div role="alert" class="alert alert-warning flex col-span-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="ml-2">Warning: Anda Belum Melakukan Absensi!! Mohon untuk segera melakukan absensi sebelum batas
                waktu.</span>
        </div>

        <!-- Status Cards -->
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 col-span-3">
            <div class="bg-blue-500 text-white rounded-lg shadow-md p-1 h-35 flex justify-center">
                <div class="flex items-center justify-between">
                    <!-- Container untuk teks -->
                    <div class="">
                    <p class="text-2xl lg:text-3xl font-bold mb-2 sm:mb-4">45</p>
                        <p class="text-lg lg:text-xl font-bold">Hadir</p>
                        <p class="text-[10px] lg:text-sm">*Jumlah dalam hari</p>
                        </div>
                        
                    <div class="relative ml-4 sm:ml-6 lg:ml-10">
                        <svg class="w-8 h-auto lg:w-12" viewBox="0 0 48 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.083252 16.5C0.083252 10.7833 0.0832513 7.92499 1.01258 5.74041C1.83165 3.8186 3.13896 2.2562 4.747 1.27732C6.57492 0.166657 8.96659 0.166656 13.7499 0.166656H34.2499C39.0333 0.166656 41.4249 0.166657 43.2528 1.27732C44.8596 2.25689 46.1657 3.81922 46.9838 5.74041C47.9166 7.92499 47.9166 10.7833 47.9166 16.5V70.4327C47.9166 74.7447 47.9166 76.8966 47.1752 78.0113C46.857 78.49 46.453 78.8772 45.9929 79.1443C45.5329 79.4115 45.0285 79.5517 44.517 79.5548C43.3246 79.563 41.9067 78.2318 39.0743 75.5695L23.9999 61.4167L8.929 75.5695C6.09317 78.2318 4.67525 79.563 3.48284 79.5548C2.97135 79.5517 2.46696 79.4115 2.00689 79.1443C1.54682 78.8772 1.14281 78.49 0.824669 78.0113C0.083252 76.8966 0.083252 74.7447 0.083252 70.4327V16.5Z"
                                fill="url(#paint0_linear_333_1047)" />
                            <defs>
                                <linearGradient id="paint0_linear_333_1047" x1="23.9999" y1="0.166656" x2="23.9999"
                                    y2="79.5549" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" />
                                    <stop offset="0.458" stop-color="#C3DEFF" stop-opacity="0.92" />
                                    <stop offset="1" stop-color="#489AFE" stop-opacity="0.76" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <i class="fa-duotone fa-solid fa-check absolute inset-0 flex items-center justify-center fa-2x lg:fa-3x text-blue-500"></i>
                    </div>
                </div>
            </div>

            <div class="bg-blue-500 text-white rounded-lg shadow-md p-1 h-35 flex justify-center">
                <div class="flex items-center justify-between">
                    <!-- Container untuk teks -->
                    <div>
                    <p class="text-2xl lg:text-3xl font-bold mb-2 sm:mb-4">45</p>
                        <p class="text-lg lg:text-xl font-bold">Telat</p>
                        <p class="text-[10px] lg:text-sm">*Jumlah dalam hari</p>
                    </div>
                    <!-- Container untuk ikon dengan posisi relatif -->
                    <div class="relative ml-4 sm:ml-6 lg:ml-10">
                        <svg class="w-8 h-auto lg:w-12" viewBox="0 0 48 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.083252 16.5C0.083252 10.7833 0.0832513 7.92499 1.01258 5.74041C1.83165 3.8186 3.13896 2.2562 4.747 1.27732C6.57492 0.166657 8.96659 0.166656 13.7499 0.166656H34.2499C39.0333 0.166656 41.4249 0.166657 43.2528 1.27732C44.8596 2.25689 46.1657 3.81922 46.9838 5.74041C47.9166 7.92499 47.9166 10.7833 47.9166 16.5V70.4327C47.9166 74.7447 47.9166 76.8966 47.1752 78.0113C46.857 78.49 46.453 78.8772 45.9929 79.1443C45.5329 79.4115 45.0285 79.5517 44.517 79.5548C43.3246 79.563 41.9067 78.2318 39.0743 75.5695L23.9999 61.4167L8.929 75.5695C6.09317 78.2318 4.67525 79.563 3.48284 79.5548C2.97135 79.5517 2.46696 79.4115 2.00689 79.1443C1.54682 78.8772 1.14281 78.49 0.824669 78.0113C0.083252 76.8966 0.083252 74.7447 0.083252 70.4327V16.5Z"
                                fill="url(#paint0_linear_333_1047)" />
                            <defs>
                                <linearGradient id="paint0_linear_333_1047" x1="23.9999" y1="0.166656" x2="23.9999"
                                    y2="79.5549" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" />
                                    <stop offset="0.458" stop-color="#C3DEFF" stop-opacity="0.92" />
                                    <stop offset="1" stop-color="#489AFE" stop-opacity="0.76" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <!-- Ikon kedua (centang) di tengah-tengah SVG -->
                        <i class="fa-duotone fa-solid fa-minus absolute inset-0 flex items-center justify-center fa-2x lg:fa-3x text-blue-500"></i>
                    </div>
                </div>
            </div>
            <div class="bg-blue-500 text-white rounded-lg shadow-md p-1 h-35 flex justify-center">
                <div class="flex items-center justify-between">
                    <!-- Container untuk teks -->
                    <div>
                    <p class="text-2xl lg:text-3xl font-bold mb-2 sm:mb-4">45</p>
                        <p class="text-lg lg:text-xl font-bold">Tidak Hadir</p>
                        <p class="text-[10px] lg:text-sm">*Jumlah dalam hari</p>
                    </div>
                    <!-- Container untuk ikon dengan posisi relatif -->
                    <div class="relative ml-4 sm:ml-6 lg:ml-10">
                        <svg class="w-8 h-auto lg:w-12" viewBox="0 0 48 80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.083252 16.5C0.083252 10.7833 0.0832513 7.92499 1.01258 5.74041C1.83165 3.8186 3.13896 2.2562 4.747 1.27732C6.57492 0.166657 8.96659 0.166656 13.7499 0.166656H34.2499C39.0333 0.166656 41.4249 0.166657 43.2528 1.27732C44.8596 2.25689 46.1657 3.81922 46.9838 5.74041C47.9166 7.92499 47.9166 10.7833 47.9166 16.5V70.4327C47.9166 74.7447 47.9166 76.8966 47.1752 78.0113C46.857 78.49 46.453 78.8772 45.9929 79.1443C45.5329 79.4115 45.0285 79.5517 44.517 79.5548C43.3246 79.563 41.9067 78.2318 39.0743 75.5695L23.9999 61.4167L8.929 75.5695C6.09317 78.2318 4.67525 79.563 3.48284 79.5548C2.97135 79.5517 2.46696 79.4115 2.00689 79.1443C1.54682 78.8772 1.14281 78.49 0.824669 78.0113C0.083252 76.8966 0.083252 74.7447 0.083252 70.4327V16.5Z"
                                fill="url(#paint0_linear_333_1047)" />
                            <defs>
                                <linearGradient id="paint0_linear_333_1047" x1="23.9999" y1="0.166656" x2="23.9999"
                                    y2="79.5549" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" />
                                    <stop offset="0.458" stop-color="#C3DEFF" stop-opacity="0.92" />
                                    <stop offset="1" stop-color="#489AFE" stop-opacity="0.76" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <!-- Ikon kedua (centang) di tengah-tengah SVG -->
                        <i class="fa-duotone fa-solid fa-xmark absolute inset-0 flex items-center justify-center fa-2x lg:fa-3x text-blue-500"></i>
                    </div>
                </div>
            </div>
            <div class="bg-blue-500 text-white rounded-lg shadow-md p-1 h-35 flex justify-center">
                <div class="flex items-center justify-between">
                    <!-- Container untuk teks -->
                    <div>
                        <p class="text-2xl lg:text-3xl font-bold mb-2 sm:mb-4">45</p>
                        <p class="text-lg lg:text-xl font-bold">Hari Kerja</p>
                        <p class="text-[10px] lg:text-sm">*Jumlah dalam hari</p>
                    </div>
                    <!-- Container untuk ikon dengan posisi relatif -->
                    <div class="relative ml-4 sm:ml-6 lg:ml-10">
                        <svg class="w-8 h-auto lg:w-12" viewBox="0 0 48 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.083252 16.5C0.083252 10.7833 0.0832513 7.92499 1.01258 5.74041C1.83165 3.8186 3.13896 2.2562 4.747 1.27732C6.57492 0.166657 8.96659 0.166656 13.7499 0.166656H34.2499C39.0333 0.166656 41.4249 0.166657 43.2528 1.27732C44.8596 2.25689 46.1657 3.81922 46.9838 5.74041C47.9166 7.92499 47.9166 10.7833 47.9166 16.5V70.4327C47.9166 74.7447 47.9166 76.8966 47.1752 78.0113C46.857 78.49 46.453 78.8772 45.9929 79.1443C45.5329 79.4115 45.0285 79.5517 44.517 79.5548C43.3246 79.563 41.9067 78.2318 39.0743 75.5695L23.9999 61.4167L8.929 75.5695C6.09317 78.2318 4.67525 79.563 3.48284 79.5548C2.97135 79.5517 2.46696 79.4115 2.00689 79.1443C1.54682 78.8772 1.14281 78.49 0.824669 78.0113C0.083252 76.8966 0.083252 74.7447 0.083252 70.4327V16.5Z"
                                fill="url(#paint0_linear_333_1047)" />
                            <defs>
                                <linearGradient id="paint0_linear_333_1047" x1="23.9999" y1="0.166656" x2="23.9999"
                                    y2="79.5549" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" />
                                    <stop offset="0.458" stop-color="#C3DEFF" stop-opacity="0.92" />
                                    <stop offset="1" stop-color="#489AFE" stop-opacity="0.76" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <!-- Ikon kedua (centang) di tengah-tengah SVG -->
                        <i class="fa-duotone fa-solid fa-clipboard-list absolute inset-0 flex items-center justify-center fa-2x lg:fa-3x text-blue-500"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- Chart Section -->
        <div class="col-span-3 bg-blue-500 dark:bg-blue-800 p-4 rounded-lg shadow-md">
            <p class="font-bold text-orange-400 mb-4">Status Absensi <span class="text-white">- 2024</span></p>
            <div class="h-64">
                <!-- Chart placeholder (you can use a charting library like Chart.js here) -->
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="col-span-3 bg-blue-300 dark:bg-blue-800 p-4 rounded-lg shadow-md">
            <p class="font-bold text-black dark:text-orange-400 mb-4">Monitoring Absensi <span class="text-white"> - 2024</span></p>
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-white ">
                    <thead class="border-b bg-blue-500">
                        <tr>
                            <th class="p-2">Date</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Role</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Check-in</th>
                            <th class="p-2">Check-out</th>
                            <th class="p-2">Jam Kerja</th>
                            <th class="p-2">Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-2">30/09</td>
                            <td class="p-2">Ahmad Mauluddin</td>
                            <td class="p-2">Magang</td>
                            <td class="p-2"><span class="text-yellow-500">Telat</span></td>
                            <td class="p-2">07:31 WIB</td>
                            <td class="p-2">16:10 WIB</td>
                            <td class="p-2">8jam 40menit</td>
                            <td class="p-2">0jam</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">30/09</td>
                            <td class="p-2">Ahmad Mauluddin</td>
                            <td class="p-2">Magang</td>
                            <td class="p-2"><span class="text-yellow-500">Telat</span></td>
                            <td class="p-2">07:31 WIB</td>
                            <td class="p-2">16:10 WIB</td>
                            <td class="p-2">8jam 40menit</td>
                            <td class="p-2">0jam</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-2">30/09</td>
                            <td class="p-2">Ahmad Mauluddin</td>
                            <td class="p-2">Magang</td>
                            <td class="p-2"><span class="text-yellow-500">Telat</span></td>
                            <td class="p-2">07:31 WIB</td>
                            <td class="p-2">16:10 WIB</td>
                            <td class="p-2">8jam 40menit</td>
                            <td class="p-2">0jam</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

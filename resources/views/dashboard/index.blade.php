@extends('dashboard.dashboard-layout.index')

@section('title', "Dashboard Pegawai")
@section('nama_pegawai', 'Ahmad Januari')
@section('role', "Pegawai")
@section('content')
<div class=" flex justify-between">
    <h1  class="text-2xl font-semibold mb-7"> <span class=" text-blue-500"><i class="fa-solid fa-house"></i>  Dashboard</span></h1>

    <h1 class="text-2xl text-blue-500 font-semibold">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h1>

</div>
<div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Absence Warning Box -->
    <div class="col-span-3 bg-yellow-100 p-4 rounded-lg shadow-md flex items-center">
      <svg class="w-8 h-8 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12c0 5.52 4.48 10 10 10s10-4.48 10-10C22 6.48 17.52 2 12 2zm0 15h-1v-1h1v1zm1-4h-2v-4h2v4z"/></svg>
      <p class="ml-4 text-yellow-800 font-semibold">Anda Belum Melakukan Absensi!! Mohon untuk segera melakukan absensi sebelum batas waktu.</p>
    </div>

    <div role="alert" class="alert alert-warning flex col-span-3 ">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6 shrink-0 stroke-current"
          fill="none"
          viewBox="0 0 24 24">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <span class="ml-2">Warning: Anda Belum Melakukan Absensi!! Mohon untuk segera melakukan absensi sebelum batas waktu.</span>
      </div>

    <!-- Status Cards -->
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 col-span-3">
      <div class="bg-blue-500 text-white h-[250px] p-4 rounded-lg shadow-md text-center">

        <p class="text-xl font-bold">45</p>
        <p class="text-sm">Hadir</p>
      </div>
      <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center">
        <p class="text-xl font-bold">10</p>
        <p class="text-sm">Telat</p>
      </div>
      <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center">
        <p class="text-xl font-bold">3</p>
        <p class="text-sm">Tidak Hadir</p>
      </div>
      <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center">
        <p class="text-xl font-bold">58</p>
        <p class="text-sm">Hari Kerja</p>
      </div>
    </div>

    <!-- Chart Section -->
    <div class="col-span-3 bg-white p-4 rounded-lg shadow-md">
      <p class="font-bold text-gray-700 mb-4">Status Absensi - 2024</p>
      <div class="h-64">
        <!-- Chart placeholder (you can use a charting library like Chart.js here) -->
        <canvas id="attendanceChart"></canvas>
      </div>
    </div>

    <!-- Attendance Table -->
    <div class="col-span-3 bg-white p-4 rounded-lg shadow-md">
      <p class="font-bold text-gray-700 mb-4">Monitoring Absensi</p>
      <div class="overflow-x-auto">
        <table class="min-w-full text-left text-sm text-gray-500">
          <thead class="border-b">
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


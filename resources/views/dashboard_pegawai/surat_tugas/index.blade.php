@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')
@section('content')
    {{-- <div class=" flex justify-between">
    <h1  class="text-2xl font-semibold mb-7"> <span class=" text-blue-500"><i class="fa-solid fa-house"></i>  Dashboard</span></h1>

    <h1 class="text-2xl text-blue-500 font-semibold">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h1>

</div> --}}
    <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

        \

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

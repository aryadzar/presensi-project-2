@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'History Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')

@section('content')
    <div class="mb-3">
        <h1 class="text-2xl font-semibold mb-7"> <span class=" text-blue-500">
            <i class="fas fa-history lg:pr-[10px]"></i>History</span>
        </h1>
    </div>

    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <!-- Table -->
        <div class="col-span-3">
            <table class="w-full bg-white rounded-md shadow-lg overflow-hidden" id="my-table">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-2 text-left">Tanggal</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Check In</th>
                        <th class="p-2 text-left">Check Out</th>
                        <th class="p-2 text-left">Keterangan</th>
                        <th class="p-2 text-left">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2">
                            <span class="bg-green-500 text-white rounded-full px-3 py-1 text-xs">Hadir</span>
                        </td>
                        <td class="p-2 text-gray-700">07.40 WIB</td>
                        <td class="p-2 text-gray-700">16.10 WIB</td>
                        <td class="p-2 text-gray-700">Absensi Barcode</td>
                        <td class="p-2 text-left">
                            <button
                                onclick="viewDetails('01-10-2024', '07.40 WIB', '16.10 WIB', 'Absensi Barcode', 'Hadir')"
                                class="bg-blue-500 rounded p-1 px-5">
                                <i class="fa-solid fa-eye text-white"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("my-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#my-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>
@endsection

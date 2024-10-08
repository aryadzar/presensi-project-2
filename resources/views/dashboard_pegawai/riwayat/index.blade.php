@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'History Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')

@section('content')
    <div class="mb-3">
        <h1 class="text-2xl font-semibold mb-7"> <span class="dark:text-white text-blue-500">
                <i class="fas fa-history lg:pr-[10px] dark:text-white"></i>History</span>
        </h1>
    </div>

    <!-- Attendance Table -->
    <div class="bg-blue-100 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
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
                            <button class="btn bg-blue-500 rounded p-1 px-5" onclick="my_modal_8.showModal()">
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
    <dialog id="my_modal_8"
        class="modal-box w-11/12 max-w-xl bg-blue-100 p-6 rounded-lg shadow-lg dark:bg-blue-950 dark:text-white">
        <h1 class="text-2xl font-semibold mb-7 ">
            <span class="text-blue-500 dark:text-blue-300">
                <i class="fa-solid fa-list-check lg:pr-[10px]"></i>Detail Absensi
            </span>
        </h1>
        <div class="grid-rows-2">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Tanggal</label>
                    <input type="text" value="01-10-2024"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                        readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Status</label>
                    <input type="text" value="Telat"
                        class="w-full px-4 py-2 border rounded-lg bg-yellow-300 dark:bg-yellow-300 text-gray-800 dark:text-white font-semibold"
                        readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Check-In</label>
                    <input type="text" value="07.40"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                        readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Check-Out</label>
                    <input type="text" value="16.10"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                        readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Jam Kerja</label>
                    <input type="text" value="8 jam 40 menit"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                        readonly>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold">Overtime</label>
                    <input type="text" value="0 jam"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                        readonly>
                </div>
            </div>
            <div class="py-5">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold">Keterangan</label>
                <input type="text" value="Absensi Barcode"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black"
                    readonly>
            </div>
            <div class="modal-action flex justify-center items-center">
                <button onclick="document.getElementById('my_modal_8').close()" class="btn px-10 text-white"
                    style="background-color: #19213F;">OK</button>
            </div>
        </div>
    </dialog>

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

@extends('dashboard_admin.dashboard-layout.index')

@section('title', 'Dashboard Admin')
@section('nama_pegawai', 'Coba')
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold "><i class="fa-solid fa-rectangle-list mr-2 dark:text-white text-blue-500"></i>
            <span class="dark:text-white text-blue-500">Daftar Karyawan Magang / PKL</span>
        </h1>

    </div>

    @include('dashboard_admin.breadcrumbs.index')
    
    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class=" col-span-3  mb-5">
            <!-- The button to open modal -->
            <h1 class="text-2xl font-semibold ">
                <i class="fa-solid fa-users mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Table Users</span>
            </h1>

        </div>
        <div class=" col-span-3 flex justify-end mb-5">
            <!-- The button to open modal -->
            <label for="my_modal_7"
                class="btn bg-blue-300 hover:bg-blue-400 border-white hover:border-white dark:bg-blue-800 text-black-2 dark:text-white">Tambah
                User</label>

        </div>
        <div class="col-span-3">
            <table class="w-full bg-white rounded-md shadow-lg overflow-hidden" id="my-table-2">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-2 text-left">No</th>
                        <th class="p-2 text-left">NPM/NIS/NIK</th>
                        <th class="p-2 text-left">Nama</th>
                        <th class="p-2 text-left">Alamat</th>
                        <th class="p-2 text-left">No Telepon</th>
                        <th class="p-2 text-left">Asal Instansi</th>
                        <th class="p-2 text-left">Unit Kerja</th>
                        <th class="p-2 text-left">Status Karyawan</th>
                        <th class="p-2 text-left">Role</th>
                        <th class="p-2 text-left">Action</th>
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
                        <td class="p-2 text-gray-700">Absensi Barcode</td>
                        <td class="p-2 text-gray-700">Absensi Barcode</td>
                        <td class="p-2 text-gray-700">Absensi Barcode</td>
                        <td class="p-2 text-gray-700">Absensi Barcode</td>
                        <td class="p-2 text-left">
                            <button class=" bg-yellow-500 rounded p-1 px-3" onclick="my_modal_8.showModal()">
                                <i class="fa-solid fa-pen-to-square text-white"></i>
                            </button>
                            <button class=" bg-red-800 rounded p-1 px-3" onclick="my_modal_8.showModal()">
                                <i class="fa-solid fa-trash text-white"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("my-table-1") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#my-table-1", {
                searchable: true,
                sortable: false
            });
        }
        if (document.getElementById("my-table-2") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#my-table-2", {
                searchable: true,
                sortable: false
            });
        }
    </script>

@endsection

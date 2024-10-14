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
            <h1 class="text-2xl font-semibold "><i class="fa-solid fa-rectangle-list mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Table Unit Kerja</span>
            </h1>

        </div>
        <div class=" col-span-3 flex justify-end mb-5">
            <!-- The button to open modal -->
            <label for="tambah_unit_kerja"
                class="btn bg-blue-300 hover:bg-blue-400 border-white hover:border-white dark:bg-blue-800 text-black-2 dark:text-white">Tambah
                Unit Kerja</label>

        </div>
        <div class="col-span-3">
            @if (session()->has('success'))
            <div role="alert" class="alert alert-success mb-5">
                <span>{{ session("success") }}</span>
            </div>
            @endif
            @if ($errors->any())
            <div role="alert" class="alert alert-error mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="w-full bg-white rounded-md shadow-lg overflow-hidden" id="my-table-1">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-2 text-left">No</th>
                        <th class="p-2 text-left">Nama Unit Kerja</th>
                        <th class="p-2 text-left">Terakhir Dibuat</th>
                        <th class="p-2 text-left">Terakhir Diperbarui</th>
                        <th class="p-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($unit_kerja as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2 text-gray-700">{{ $no++ }}</td>
                            <td class="p-2 text-gray-700">{{ $item->nama_unit }}</td>
                            <td class="p-2 text-gray-700">{{ $item->created_at->diffForHumans() }}</td>
                            <td class="p-2 text-gray-700">{{ $item->updated_at->diffForHumans() }}</td>
                            <td class="p-2">
                                <!-- The button to open modal -->
                                <label for="edit_unit_kerja_{{ $item->id }}"
                                    class=" bg-yellow-400 rounded p-2 mr-2 px-3 py-3">
                                    <i class="fa-solid fa-pen-to-square text-white"></i>
                                </label>
                                <input type="checkbox" id="edit_unit_kerja_{{ $item->id }}" class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div class="modal-box dark:bg-gradient-to-b bg-blue-300  dark:from-blue-900 dark:to-blue-950">
                                        <form action="" method="POST">
                                            <h3 class="text-lg text-black-2 dark:text-white font-bold">Form Edit Unit Kerja</h3>
                                            <div class="grid lg:grid-cols-1 grid-cols-2  gap-1 md:grid-cols-2">
                                                <!-- Tanggal Mulai -->
                                                <div class="form-control">
                                                    <label for="nama_unit" class="text-black-2 mt-5 mb-2 text-sm lg:text-lg dark:text-white">Unit
                                                        Kerja</label>
                                                    <input type="text" class="input input-bordered bg-white dark:text-black-2 w-full"
                                                        name="nama_unit" id="nama_unit" value="{{ $item->nama_unit }}">
                                                </div>
                                                <!-- Tombol Submit -->
                                                <div class="form-control col-span-2 flex items-center justify-center mt-5">
                                                    <button type="submit"
                                                        class="btn w-full lg:w-auto bg-blue-400 hover:bg-blue-300 dark:bg-black text-white">Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <label class="modal-backdrop" for="edit_unit_kerja_{{ $item->id }}">Close</label>
                                </div>
                                <label for="my_modal_6" class=" bg-red-500 rounded p-2 px-3 py-3">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>
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

    <input type="checkbox" id="tambah_unit_kerja" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box dark:bg-gradient-to-b bg-blue-300  dark:from-blue-900 dark:to-blue-950">
            <h3 class="text-lg text-black-2 dark:text-white font-bold">Form Tambah Unit Kerja</h3>
            <form action="{{ route('admin.add_unit_kerja') }}" method="POST">
                <div class="grid lg:grid-cols-1 grid-cols-2  gap-1 md:grid-cols-2">
                    <!-- Tanggal Mulai -->
                    @csrf
                    <div class="form-control">
                        <label for="nama_unit" class="text-black-2 mt-5 mb-2 text-sm lg:text-lg dark:text-white">Unit
                            Kerja</label>
                        <input type="text" class="input input-bordered bg-white dark:text-black-2 w-full"
                            name="nama_unit" id="nama_unit" value="{{ old("nama_unit") }}" required>
                    </div>
                    <!-- Tombol Submit -->
                    <div class="form-control col-span-2 flex items-center justify-center mt-5">
                        <button type="submit"
                            class="btn w-full lg:w-auto bg-blue-400 hover:bg-blue-300 dark:bg-black text-white">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <label class="modal-backdrop" for="tambah_unit_kerja">Close</label>
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

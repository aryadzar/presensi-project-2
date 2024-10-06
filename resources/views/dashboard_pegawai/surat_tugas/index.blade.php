@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold"><i class="fa fa-envelope text-blue-500 mr-2"></i> <span class=" text-blue-500">Surat
                Tugas</span></h1>

    </div>

    @include('dashboard_pegawai.breadcrumbs.index')

    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class=" col-span-3 flex justify-end mb-5">
            <button class="btn bg-blue-400 hover:bg-blue-300 dark:bg-black text-white" onclick="tambah_izin_modal.showModal()">Tambah</button>
        </div>
        <!-- Table -->
        <div class="col-span-3">
            <table class="w-full bg-white rounded-md shadow-lg overflow-hidden" id="my-table">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-2 text-left">Tgl Mulai</th>
                        <th class="p-2 text-left">Tgl Selesai</th>
                        <th class="p-2 text-left">No. Surat</th>
                        <th class="p-2 text-left">Validasi</th>
                        <th class="p-2 text-left">Mulai Izin</th>
                        <th class="p-2 text-left">Selesai Izin</th>
                        <th class="p-2 text-left">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">000/NST00/TU/2024</td>
                        <td class="p-2">
                            <span class=" badge badge-success font-bold">Divalidasi</span>
                        </td>
                        <td class="p-2 text-gray-700">07.40 WIB</td>
                        <td class="p-2 text-gray-700">16.10 WIB</td>
                        <td class="p-2 text-gray-700">Tugas Upacara</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">000/NST00/TU/2024</td>
                        <td class="p-2">
                            <span class=" badge badge-success font-bold">Divalidasi</span>
                        </td>
                        <td class="p-2 text-gray-700">07.40 WIB</td>
                        <td class="p-2 text-gray-700">16.10 WIB</td>
                        <td class="p-2 text-gray-700">Tugas Ngonser SVT</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">01-10-2024</td>
                        <td class="p-2 text-gray-700">000/NST00/TU/2024</td>
                        <td class="p-2">
                            <span class=" badge badge-success font-bold">Divalidasi</span>
                        </td>
                        <td class="p-2 text-gray-700">07.40 WIB</td>
                        <td class="p-2 text-gray-700">16.10 WIB</td>
                        <td class="p-2 text-gray-700">Tugas Makan</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </div>

    <dialog id="tambah_izin_modal" class="modal ">
        <div class="modal-box  bg-blue-200 dark:bg-black">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Hello!</h3>
            <p class="py-4">Press ESC key or click on ✕ button to close</p>
        </div>
        <label class="modal-backdrop" for="tambah_izin_modal"></label>
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

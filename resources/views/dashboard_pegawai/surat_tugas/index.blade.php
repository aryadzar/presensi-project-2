@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')
@section('content')
    <div class=" flex justify-between">
    <h1  class="text-2xl font-semibold mb-7"> <span class=" text-blue-500"><i class="fa fa-envelope lg:pr-[10px]"></i>Surat Tugas</span></h1>

</div>


        @include('dashboard_pegawai.breadcrumbs.index')

        <!-- Attendance Table -->
        <div class="bg-blue-100 p-6 mx-auto mt-5 rounded-lg shadow-lg inline-block">
            <!-- Date Filters -->
                <div class="flex space-x-6 lg:py-[10px]">
                    <div>
                    <label class="text-gray-700">Dari Tanggal:</label>
                    <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                    <label class="text-gray-700">Sampai Tanggal:</label>
                    <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                <!-- Search Bar -->
                    <div class="lg:pl-[500px]">
                        <input type="text" id="searchInput" placeholder="Search..." class="w-full md:w-48 lg:w-64 rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

                    <!-- Add Button -->
                    <button onclick="tambahData()" class="bg-blue-500 text-white rounded-md px-4 py-2 shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Tambah +
                    </button>
                </div>
                </div>


                        <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-md shadow-lg overflow-hidden">
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
                        <span class="bg-green-500 text-white rounded-full px-3 py-1 text-xs">Divalidasi</span>
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
                            <span class="bg-green-500 text-white rounded-full px-3 py-1 text-xs">Divalidasi</span>
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
                                <span class="bg-green-500 text-white rounded-full px-3 py-1 text-xs">Divalidasi</span>
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
    <script>
    //function tambahData() {

    // Search Function
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const table = document.querySelector('table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) { 
                const cells = rows[i].getElementsByTagName('td');
                let rowVisible = false;

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    if (cell) {
                        const txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toLowerCase().indexOf(searchValue) > -1) {
                            rowVisible = true; // jika salah satu sel cocok
                            break;
                        }
                    }
                }

                rows[i].style.display = rowVisible ? "" : "none"; // tampilkan atau sembunyikan baris
            }
        });


    </script>


@endsection

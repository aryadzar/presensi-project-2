@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Isi Logbook')
@section('nama_pegawai', 'Jauhari')
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold"><i class="fa-solid fa-book text-blue-500 mr-2 dark:text-white"></i> <span
                class="dark:text-white text-blue-500">Log Book</span></h1>
    </div>
    @if (session()->has('success'))
    <div role="alert" class="alert alert-success bg-green-300 mt-5 mb-5">
        <span>{{ session('success') }}</span>
    </div>
    @endif
    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <!-- Table -->
        <div class="col-span-3">
            <table class="w-full bg-white rounded-md shadow-lg overflow-hidden" id="my-table">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-2 text-left">Tanggal dan Waktu</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Terakhir Isi Logbook</th>
                        <th class="p-2 text-left">Catatan Harian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2 text-gray-700">{{ $item->created_at }}</td>
                            <td class="p-2">
                                @if (is_null($item->isi_logbook))
                                <span
                                    class="badge badge-error">Belum
                                    Mengisi</span>
                                @else
                                <span
                                    class="badge badge-success">Sudah
                                    Mengisi</span>
                                @endif
                            </td>
                            <td class="p-2 text-gray-700">
                                <div class="">
                                    @if (is_null($item->isi_logbook))
                                    <span
                                    class="badge badge-error">Belum
                                    Mengisi</span>
                                    @else
                                    {{ $item->updated_at }}
                                    @endif

                                </div>
                            </td>
                            <td class="p-2 text-gray-700">
                                <div class="">
                                    @if (is_null($item->isi_logbook))
                                    <a class="btn bg-blue-500 rounded p-1 px-5" href="{{ route('presensi.isi_logbook', $item->id) }}">
                                        <i class="fa-solid fa-plus text-white"></i>
                                    </a>
                                    @else
                                    <a class="btn bg-blue-500 rounded p-1 px-5" href="{{ route('presensi.isi_logbook', $item->id) }}">
                                        <i class="fa-solid fa-eye text-white"></i>
                                    </a>
                                    @endif

                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Detail Catatan Harian -->
    <dialog id="my_modal_8"
        class="modal-box w-11/12 max-w-xl bg-blue-100 p-6 rounded-lg shadow-lg dark:bg-blue-950 dark:text-white">
        <h1 class="text-2xl font-semibold mb-7 ">
            <span class="text-blue-500 dark:text-blue-300">
                <i class="fa-solid fa-list-check lg:pr-[10px]"></i>Detail Catatan Harian
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
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold">Foto Hari Ini</label>

            </div>
            <div class="py-5">
                <label class="block text-gray-700 dark:text-gray-200 font-semibold">Keterangan</label>
                <textarea readonly
                    class="w-full h-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-white dark:text-black ">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam porttitor mauris, quis sollicitudin sapien justo in libero.

                Fusce sed volutpat turpis, eget dapibus mauris. Cras vel orci quis tellus dapibus ullamcorper. Vivamus a massa vel nulla consequat suscipit. Integer in turpis risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            </textarea>
            </div>
            <div class="modal-action flex justify-center items-center">
                <button onclick="document.getElementById('my_modal_8').close()" class="btn px-10 text-white"
                    style="background-color: #19213F;">OK</button>
            </div>
        </div>
    </dialog>

    <!--Tambah Detail Harian-->
    <input type="checkbox" id="my_modal_tambah" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box dark:bg-gradient-to-b bg-blue-300  dark:from-blue-900 dark:to-blue-950">
            <h3 class="text-lg text-black-2 dark:text-white font-bold">Form Surat izin</h3>
            <form action="" method="POST">
                <div class="grid lg:grid-cols-1 grid-cols-2  gap-1 md:grid-cols-2">
                    <!-- Tanggal Mulai -->
                    <div class="form-control">
                        <label for="tanggal-mulai" class="text-black-2 mt-5 mb-2 text-sm lg:text-lg dark:text-white">Tanggal
                            Mulai</label>
                        <input type="datetime-local" class="input input-bordered bg-white dark:text-black-2 w-full"
                            name="tanggal-mulai" id="tanggal-mulai">
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="form-control">
                        <label for="tanggal-selesai"
                            class="text-black-2 mt-5 mb-2 text-sm lg:text-lg dark:text-white">Tanggal Selesai</label>
                        <input type="datetime-local" class="input input-bordered bg-white dark:text-black-2 w-full"
                            name="tanggal-selesai" id="tanggal-selesai">
                    </div>

                    <!-- Nomor Surat -->
                    <div class="form-control col-span-2">
                        <label for="nomor-surat" class="text-black-2 mt-5 mb-2 text-lg dark:text-white">Nomor Surat</label>
                        <input type="text" class="input input-bordered bg-white dark:text-black-2 w-full"
                            name="nomor-surat" id="nomor-surat">
                    </div>

                    <!-- Upload File -->
                    <div class="form-control col-span-2">
                        <label class="block mb-2 mt-5 text-lg font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gr dark:border-white dark:placeholder-white"
                            id="file_input" type="file">
                    </div>

                    <!-- Keterangan -->
                    <div class="form-control col-span-2">
                        <label for="keterangan" class="text-black-2 mt-5 mb-2 text-lg dark:text-white">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="textarea bg-white textarea-bordered w-full"></textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="form-control col-span-2 flex items-center justify-center mt-5">
                        <button type="submit"
                            class="btn w-full lg:w-auto bg-blue-400 hover:bg-blue-300 dark:bg-black text-white">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
        <label class="modal-backdrop" for="my_modal_tambah">Close</label>
    </div>

    <!-- Script -->
    <script>
        function toggleModal(modalId) {
            document.getElementById(modalId).checked = !document.getElementById(modalId).checked;
        }
    </script>

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

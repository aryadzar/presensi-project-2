@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', Auth::user()->name)
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold "><i class="fa fa-envelope text-blue-500 mr-2 dark:text-white"></i> <span
                class="dark:text-white text-blue-500">Surat
                izin</span></h1>

    </div>

    @include('dashboard_pegawai.breadcrumbs.index')

    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class=" col-span-3 flex justify-end mb-5">
            <!-- The button to open modal -->
            <label for="my_modal_7"
                class="btn bg-blue-300 hover:bg-blue-400 border-white hover:border-white dark:bg-blue-800 text-black-2 dark:text-white">Tambah</label>

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
                        <td class="p-2 text-gray-700">izin Upacara</td>
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
                        <td class="p-2 text-gray-700">izin Ngonser SVT</td>
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
                        <td class="p-2 text-gray-700">izin Makan</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </div>
    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
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
        <label class="modal-backdrop" for="my_modal_7">Close</label>
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

    {{-- <script src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    height : 600,
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
    toolbar: 'undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl',
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
  });
     </script> --}}

@endsection

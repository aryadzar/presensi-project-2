@extends('dashboard_admin.dashboard-layout.index')

@section('title', 'Admin Data Master')
@section('nama_pegawai', 'Coba')
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold">
            <i class="fa-solid fa-rectangle-list mr-2 dark:text-white text-blue-500"></i>
            <span class="dark:text-white text-blue-500">Daftar Karyawan Magang / PKL</span>
        </h1>
    </div>

    @include('dashboard_admin.breadcrumbs.index')

    @if (session()->has('success'))
        <div role="alert" class="alert alert-success bg-green-300 mt-5 mb-5">
            <span>{{ session('success') }}</span>
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
    <!-- Table Unit Kerja -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class="col-span-3 mb-5">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-rectangle-list mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Table Unit Kerja</span>
            </h1>
        </div>
        <div class="col-span-3 flex justify-end mb-5">
            <label for="tambah_unit_kerja"
                class="btn bg-blue-300 hover:bg-blue-400 border-white hover:border-white dark:bg-blue-800 text-black-2 dark:text-white">
                Tambah Unit Kerja
            </label>
        </div>

        <div class="col-span-3">

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
                    @foreach ($unit_kerja as $index => $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2 text-gray-700">{{ $index + 1 }}</td>
                            <td class="p-2 text-gray-700">{{ $item->nama_unit }}</td>
                            <td class="p-2 text-gray-700">{{ $item->created_at->diffForHumans() }}</td>
                            <td class="p-2 text-gray-700">{{ $item->updated_at->diffForHumans() }}</td>
                            <td class="p-2">
                                <label for="edit_unit_kerja_{{ $item->id }}"
                                    class="bg-yellow-400 rounded p-2 mr-2 cursor-pointer">
                                    <i class="fa-solid fa-pen-to-square text-white"></i>
                                </label>
                                <input type="checkbox" id="edit_unit_kerja_{{ $item->id }}" class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div
                                        class="modal-box dark:bg-gradient-to-b bg-blue-300 dark:from-blue-900 dark:to-blue-950">
                                        <form action="{{ route('admin.update_unit_kerja', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h3 class="text-lg text-black-2 dark:text-white font-bold">Form Edit Unit Kerja
                                            </h3>
                                            <div class="grid grid-cols-1 gap-1">
                                                <div class="form-control">
                                                    <label for="nama_unit"
                                                        class="text-black-2 mt-5 mb-2 text-sm lg:text-lg dark:text-white">Unit
                                                        Kerja</label>
                                                    <input type="text"
                                                        class="input input-bordered bg-white dark:text-black-2 w-full"
                                                        name="nama_unit" id="nama_unit" value="{{ $item->nama_unit }}"
                                                        required>
                                                </div>
                                                <div class="form-control col-span-2 flex items-center justify-center mt-5">
                                                    <button type="submit"
                                                        class="btn w-full lg:w-auto bg-blue-400 hover:bg-blue-300 dark:bg-black text-white">Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <label class="modal-backdrop" for="edit_unit_kerja_{{ $item->id }}">Close</label>
                                </div>

                                <label for="delete_unit_kerja_{{ $item->id }}"
                                    class="bg-red-500 rounded p-2 cursor-pointer">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </label>
                                <input type="checkbox" id="delete_unit_kerja_{{ $item->id }}" class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div
                                        class="modal-box dark:bg-gradient-to-b bg-blue-300 dark:from-blue-900 dark:to-blue-950">
                                        <form action="{{ route('admin.delete_unit_kerja', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <h3 class="text-lg text-black-2 dark:text-white font-bold">Peringatan!</h3>
                                            <p class="text-sm mt-5 text-black-2 dark:text-white">Anda Yakin Mau Menghapus
                                                unit kerja {{ $item->nama_unit }}?</p>
                                            <p class="text-sm mt-5 text-black-2 dark:text-white">Tindakan bersifat
                                                Irreversible</p>
                                            <div class="form-control col-span-2 flex items-center justify-center mt-5">
                                                <button type="submit"
                                                    class="btn w-full lg:w-auto bg-red text-white">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                    <label class="modal-backdrop" for="delete_unit_kerja_{{ $item->id }}">Close</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table Users -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class="col-span-3 mb-5">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-users mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Table Users</span>
            </h1>
        </div>
        <div class="col-span-3 flex justify-end mb-5">
            <a href="{{ route('add_user') }}"
                class="btn bg-blue-300 hover:bg-blue-400 border-white hover:border-white dark:bg-blue-800 text-black-2 dark:text-white">Tambah
                User</a>
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
                        <th class="p-2 text-left">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $item)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2 text-gray-700">{{ $index + 1 }}</td>
                            <td class="p-2">{{ $item->NPM }}</td>
                            <td class="p-2 text-gray-700">{{ $item->nama }}</td>
                            <td class="p-2 text-gray-700">{{ $item->alamat }}</td>
                            <td class="p-2 text-gray-700">{{ $item->no_telepon }}</td>
                            <td class="p-2 text-gray-700">{{ $item->asal_instansi }}</td>
                            <td class="p-2 text-left">
                                <a href="{{ route('show_user_info', $item->id) }}"
                                    class="bg-yellow-400 rounded p-1 px-2 py-2">
                                    <i class="fa-solid fa-eye text-white"></i>
                                </a>
                                <label for="delete_unit_kerja_{{ $item->id }}"
                                    class="bg-red-500 rounded p-2 cursor-pointer">
                                    <i class="fa-solid fa-trash text-white"></i>
                                </label>
                                <input type="checkbox" id="delete_unit_kerja_{{ $item->id }}"
                                    class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div
                                        class="modal-box dark:bg-gradient-to-b bg-blue-300 dark:from-blue-900 dark:to-blue-950">
                                        <form action="{{ route('delete_user', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <h3 class="text-lg text-black-2 dark:text-white font-bold">Peringatan!</h3>
                                            <p class="text-sm mt-5 text-black-2 dark:text-white">Anda Yakin Mau Menghapus
                                                user {{ $item->nama }}?</p>
                                            <p class="text-sm mt-5 text-black-2 dark:text-white">Tindakan bersifat
                                                Irreversible</p>
                                            <div class="form-control col-span-2 flex items-center justify-center mt-5">
                                                <button type="submit"
                                                    class="btn w-full lg:w-auto bg-red text-white">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                    <label class="modal-backdrop"
                                        for="delete_unit_kerja_{{ $item->id }}">Close</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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

@extends('dashboard_admin.dashboard-layout.index')

@section('title', 'Tambah User')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold "><i class="fa-solid fa-user mr-2 dark:text-white text-blue-500"></i>
            <span class="dark:text-white text-blue-500">Tambah User</span>
        </h1>
    </div>

    @include('dashboard_admin.breadcrumbs.index')
    <!-- Attendance Table -->
    <div class="bg-blue-100 dark:bg-slate-500 p-6 grid grid-cols-1 lg:grid-cols-2 mt-5 rounded-sm">
        <div class=" col-span-3  mb-5">
            <!-- The button to open modal -->
            <h1 class="text-2xl font-semibold "><i class="fa-solid fa-rectangle-list mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Form Tambah User</span>
            </h1>

        </div>
        <div class=" col-span-3 mb-5 text-black-2">
            <form action="" method="post">
                <div class="form-control">
                    <label for="nip">NIP/NPM/NIS</label>
                    <input type="number" class="input input-bordered bg-white mt-3" name="NPM" id="nip">
                </div>
                <div class="form-control mt-5">
                    <label for="nip">Nama Pengguna</label>
                    <input type="text" class="input  border-black-1 bg-white mt-3" name="nama" id="nip">
                </div>
                <div class="form-control mt-5">
                    <label for="nip">Alamat</label>
                    <input type="text" class="input  border-black-1 bg-white mt-3" name="alamat" id="nip">
                </div>
                <div class="form-control mt-5">
                    <label for="nip">Nomor Telepon</label>
                    <input type="text" class="input  border-black-1 bg-white mt-3" name="no_telepon" id="nip">
                </div>
                <div class="form-control mt-5">
                    <label for="nip">Asal Instansi</label>
                    <input type="text" class="input  border-black-1 bg-white mt-3" name="no_telepon" id="nip">
                </div>
            </form>

        </div>
        <div class="col-span-3 flex justify-end">
            <button class="btn bg-blue-400 dark:bg-blue-600 text-white">Simpan</button>
        </div>
    </div>


@endsection

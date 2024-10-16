@extends('dashboard_admin.dashboard-layout.index')

@section('title', 'Tambah User')
@section('nama_pegawai', 'Coba')
@section('role', 'Pegawai')
@section('content')

<div class="mb-3">
    <h1 class="text-2xl font-semibold">
        <i class="fa-solid fa-user-plus mr-2 dark:text-white text-blue-500"></i>
        <span class="dark:text-white text-blue-500">Tambah User</span>
    </h1>
</div>

@include('dashboard_admin.breadcrumbs.index')

<div class="bg-blue-100 dark:bg-slate-500 p-6 rounded-md mt-5">
    @if (session()->has('success'))
        <div role="alert" class="alert alert-success bg-green-300 mb-5">
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

    <form action="{{ route('admin.store_user') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div class="form-control">
                <label for="NPM" class="text-black-2 dark:text-white mb-2">NPM/NIS/NIK</label>
                <input type="text" name="NPM" id="NPM" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="nama" class="text-black-2 dark:text-white mb-2">Nama</label>
                <input type="text" name="nama" id="nama" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="alamat" class="text-black-2 dark:text-white mb-2">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="no_telepon" class="text-black-2 dark:text-white mb-2">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="input input-bordered w-full" required>
            </div>
            <div class="form-control">
                <label for="asal_instansi" class="text-black-2 dark:text-white mb-2">Asal Instansi</label>
                <input type="text" name="asal_instansi" id="asal_instansi" class="input input-bordered w-full" required>
            </div>
            <div class="form-control col-span-2 flex items-center justify-center mt-5">
                <button type="submit" class="btn w-full lg:w-auto bg-blue-400 hover:bg-blue-300 dark:bg-black text-white">Simpan</button>
            </div>
        </div>
    </form>
</div>

@endsection

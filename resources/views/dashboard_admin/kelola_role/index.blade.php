@extends('dashboard_admin.dashboard-layout.index')

@section('title', 'Edit Role User ')

@section('content')
    <div class="container mx-auto py-8">
        <div class="mb-3">
            <h1 class="text-2xl font-semibold">
                <i class="fa-solid fa-user-plus mr-2 dark:text-white text-blue-500"></i>
                <span class="dark:text-white text-blue-500">Kelola Role User</span>
            </h1>
        </div>
        <!-- Informasi User -->
        <div class="bg-blue-100 dark:bg-slate-400 p-6 rounded-md mt-5 mb-5 text-black grid grid-cols-1 gap-5">
            <h3 class="text-lg font-semibold mb-4">Informasi User</h3>
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>NPM/NIS/NIK:</strong> {{ $user->NPM }}</p>
            <p><strong>Asal Instansi:</strong> {{ $user->asal_instansi }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $user->no_telepon }}</p>
            <p><strong>Alamat :</strong> {{ $user->alamat }}</p>
        </div>

        <!-- Daftar Role User -->
        <div class="bg-blue-100 dark:bg-slate-400 p-6 rounded-md mt-5 mb-5 text-black">
            <h3 class="text-lg font-semibold mb-4">Daftar Role</h3>

            <table class="w-full text-left border-collapse table">
                <thead>
                    <tr>
                        <th class="p-3 border-b">Role</th>
                        <th class="p-3 border-b">Unit Kerja</th>
                        <th class="p-3 border-b">Admin Yang Menambahkan</th>
                        <th class="p-3 border-b">Terakhir Dibuat</th>
                        <th class="p-3 border-b">Terakhir Diperbarui</th>
                        <th class="p-3 border-b ">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->setRoles as $setRole)
                        <tr class="border-b bg-gray-100 text-black-2 hover:bg-gray-100">
                            <td class="p-3 border-b">{{ $setRole->role->nama_role }}</td>
                            <td class="p-3 border-b">{{ $setRole->unitKerja->nama_unit ?? '-' }}</td>
                            <td class="p-3 border-b">{{ $setRole->actor->nama }}</td>
                            <td class="p-3 border-b">{{ $setRole->created_at->diffForHumans() }}</td>
                            <td class="p-3 border-b">{{ $setRole->updated_at->diffForHumans() }}</td>
                            <td class="p-3 border-b ">

                                <!-- Tombol Hapus Role -->
                                <form
                                    action="{{ route('delete.user.role', ['user' => $user->id, 'set_role' => $setRole->id]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Anda Yakin Mau Menghapus Role Dari User {{ $user->nama }} Dari Role {{ $setRole->role->nama_role }} ? ')"
                                        class="btn bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition ml-2">
                                        <i class="fa-solid fa-trash text-white"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Form Tambah Role -->
        <div class="bg-blue-100 dark:bg-slate-400 p-6 rounded-md mt-5 mb-5 text-black">
            <h3 class="text-lg font-semibold mb-4">Tambah Role</h3>
            <form action="{{ route('add.user.role', $user->id) }}" method="POST">
                @csrf

                <!-- Pilih Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Pilih Role</label>
                    <select name="id_role" id="role"
                        class="block w-full mt-1 p-2 border-gray-300 bg-white rounded-md select select-bordered">
                        <option disabled selected>Silahkan Pilih Role Disini</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilih Unit Kerja -->
                <div class="mb-4">
                    <label for="unit_kerja" class="block text-sm font-medium text-gray-700">Pilih Unit Kerja</label>
                    <select name="id_unit_kerja" id="unit_kerja"
                        class="block w-full mt-1 p-2 border-gray-300 rounded-md select select-bordered bg-white">
                        <option disabled selected>Silahkan Pilih Unit Kerja Disini</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Tambah Role -->
                <div class="flex justify-end">
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">Tambah
                        Role</button>
                </div>
            </form>
        </div>
    </div>
@endsection

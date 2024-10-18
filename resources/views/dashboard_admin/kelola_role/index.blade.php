@extends('dashboard_admin.dashboard-layout.index')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Kelola Role User</h2>

    <!-- Informasi User -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">Informasi User</h3>
        <p><strong>Nama:</strong> {{ $user->nama }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <!-- Daftar Role User -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">Daftar Role</h3>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-3 border-b">Role</th>
                    <th class="p-3 border-b">Unit Kerja</th>
                    <th class="p-3 border-b text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->setRoles as $setRole)
                    <tr>
                        <td class="p-3 border-b">{{ $setRole->role->nama_role }}</td>
                        <td class="p-3 border-b">{{ $setRole->unitKerja->nama_unit ?? '-' }}</td>
                        <td class="p-3 border-b text-right">
                            <!-- Tombol Edit Role -->
                            <a href="{{ route('edit.user.role', ['user' => $user->id, 'set_role' => $setRole->id]) }}"
                               class="bg-yellow-500 text-white py-1 px-4 rounded-lg hover:bg-yellow-600 transition">Edit</a>

                            <!-- Tombol Hapus Role -->
                            <form action="{{ route('delete.user.role', ['user' => $user->id, 'set_role' => $setRole->id]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form Tambah Role -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <h3 class="text-lg font-semibold mb-4">Tambah Role</h3>
        <form action="{{ route('add.user.role', $user->id) }}" method="POST">
            @csrf

            <!-- Pilih Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Pilih Role</label>
                <select name="role_id" id="role" class="block w-full mt-1 p-2 border-gray-300 rounded-md">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Unit Kerja -->
            <div class="mb-4">
                <label for="unit_kerja" class="block text-sm font-medium text-gray-700">Pilih Unit Kerja</label>
                <select name="unit_kerja_id" id="unit_kerja" class="block w-full mt-1 p-2 border-gray-300 rounded-md">
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Tambah Role -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg">Tambah Role</button>
            </div>
        </form>
    </div>
</div>
@endsection

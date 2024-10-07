@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')
@section('content')

    <div class="mb-3">
        <h1 class="text-2xl font-semibold"><i class="fa-solid fa-qrcode text-blue-500 lg:pr-[10px]"></i><span class=" text-blue-500">
            Scan Barcode
        </span></h1>

    </div>

    <div>
        <h3> Presensi Scan Barcode hanya dapat dilakukan dengan menggunakan Website pada Smartphone Anda</h3>
    </div>



@endsection


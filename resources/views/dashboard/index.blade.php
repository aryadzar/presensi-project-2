@extends('dashboard.dashboard-layout.index')

@section('title', "Dashboard Pegawai")
@section('nama_pegawai', 'Ahmad Januari')
@section('role', "Pegawai")
@section('content')
<div class=" flex justify-between">
    <h1  class="text-2xl font-semibold mb-7"> <span class=" text-blue-500"><i class="fa-solid fa-house"></i>  Dashboard</span></h1>

    <h1 class="text-2xl text-blue-500 font-semibold">{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h1>
</div>
@endsection


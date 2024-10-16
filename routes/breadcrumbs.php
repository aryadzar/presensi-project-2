<?php



use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail){
    $trail->push('Dashboard');
});

Breadcrumbs::for('Home', function (BreadcrumbTrail $trail){
    $trail->parent("Dashboard");
    $trail->push('Home', route('dashboard'));
});

Breadcrumbs::for('Presensi', function (BreadcrumbTrail $trail){
    $trail->parent("Dashboard");
    $trail->push('Presensi');
});

Breadcrumbs::for('Surat Izin', function (BreadcrumbTrail $trail) {
    $trail->parent('Presensi');
    $trail->push('Surat Izin', route('presensi.surat_izin'));
});

Breadcrumbs::for('Scan Barcode', function (BreadcrumbTrail $trail){
    $trail->parent("Presensi");
    $trail->push("Scan Barcode", route('presensi.barcode'));
});

Breadcrumbs::for('Administratif', function (BreadcrumbTrail $trail){
    $trail->parent("Dashboard");
    $trail->push('Administratif');
});


Breadcrumbs::for('Daftar Pegawai', function (BreadcrumbTrail $trail) {
    $trail->parent('Administratif');
    $trail->push('Daftar Pegawai', route('administratif.daftarpegawai'));
});

Breadcrumbs::for('Validasi Surat', function (BreadcrumbTrail $trail) {
    $trail->parent('Administratif');
    $trail->push('Validasi Surat', route('administratif.validasisurat'));
});

Breadcrumbs::for('Riwayat', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Riwayat', route('riwayatadmin'));
});

// Administrasi Breadcrumb (parent link for submenus)
Breadcrumbs::for('Administrasi', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Administrasi');
});

// Kelola Karyawan Magang/PKL Breadcrumb
Breadcrumbs::for('Kelola Karyawan', function (BreadcrumbTrail $trail) {
    $trail->parent('Administrasi');
    $trail->push('Kelola User' );
});
Breadcrumbs::for('Tambah User', function (BreadcrumbTrail $trail) {
    $trail->parent('Kelola Karyawan');
    $trail->push('Tambah User');
});


// Validasi Surat Izin Breadcrumb
Breadcrumbs::for('Validasi Surat Izin', function (BreadcrumbTrail $trail) {
    $trail->parent('Administrasi');
    $trail->push('Validasi Surat Izin', route('operator.validasisurat'));
});

// Perangkat Karyawan Breadcrumb
Breadcrumbs::for('Perangkat Karyawan', function (BreadcrumbTrail $trail) {
    $trail->parent('Administrasi');
    $trail->push('Perangkat Karyawan', route('operator.devicekaryawan'));
});

// Riwayat Hadir Karyawan Breadcrumb
Breadcrumbs::for('Riwayat Hadir Karyawan', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Riwayat Hadir Karyawan', route('riwayatoperator'));
});




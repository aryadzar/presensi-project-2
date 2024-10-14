<?php



use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail){
    $trail->push('Dashboard', route('dashboard'));
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

// Breadcrumb for Riwayat Hadir Karyawan
Breadcrumbs::for('Riwayat', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Riwayat', route('admin.riwayatadmin'));
});





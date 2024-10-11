@extends('dashboard_pegawai.dashboard-layout.index')

@section('title', 'Dashboard Pegawai')
@section('nama_pegawai', 'Ahmad Januari')
@section('role', 'Pegawai')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"
        integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="mb-3">
        <h1 class="text-2xl font-semibold">
            <i class="fa-solid fa-qrcode text-blue-500 lg:pr-[10px] dark:text-white"></i>
            <span class="text-blue-500 dark:text-white">Scan Barcode</span>
        </h1>
    </div>

    @include('dashboard_pegawai.breadcrumbs.index')

    <!-- Barcode Scan Notice Container -->
    <div class="flex flex-col items-center justify-center h-[80vh] rounded-lg shadow-lg dark:text-white text-black-2 p-6">

        <!-- Icon Placeholder for Desktop -->
        <div class="bg-gray-300 w-20 h-20 rounded-md items-center justify-center mb-6 hidden md:flex">
            <div class="bg-yellow-500 w-2/3 h-1 rounded-full mb-2"></div>
            <div class="bg-yellow-500 w-4 h-4 rounded-full"></div>
        </div>

        <!-- Camera View for Mobile -->
        <div class="w-full h-full md:hidden">
            <div id="reader" class="w-full h-full rounded-md"></div>
        </div>

        <!-- Message Text for Desktop Only -->
        <h3 class="text-center text-lg mb-8 hidden md:block">Presensi Scan Barcode hanya dapat dilakukan dengan menggunakan
            Website pada Smartphone Anda</h3>

        <!-- OK Button for Desktop Only -->
        <button
            class="bg-yellow-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-yellow-600 transition hidden md:block">
            OK
        </button>
    </div>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            alert(`Code matched = ${decodedText}`, decodedResult);
        }

        let config = {
            fps: 10,
            qrbox: {
                width: 200,
                height: 200
            },
            rememberLastUsedCamera: true,
            // Only support camera scan type.
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
        };

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", config, /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess);
    </script>

@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barcode Presensi</title>
    <link rel="shortcut icon" href="{{ asset('/assets/logo_unila/unila.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-blue-500 p-6">
    <div class="w-full max-w-5xl bg-blue-500 p-6 rounded-lg shadow-lg">
        <div class="flex items-center mb-4">
            <img src="{{ asset('assets/logo_absensi/image.png') }}" alt="Logo Unila" class="h-12 mr-4">
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center text-white">Barcode Presensi</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bagian kanan: Gambar barcode yang lebih besar -->
            <div class="bg-blue-300 p-4 rounded-lg shadow-inner flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold mb-4">Scan Barcode:</h2>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=absen123&size=400x400" alt="Barcode"
                    class="w-96 h-96 object-contain" id="barcode" />
            </div>

            <!-- Bagian kiri: Daftar nama orang yang telah absen -->
            <div class="bg-blue-100 p-4 rounded-lg shadow-inner overflow-y-auto max-h-[70vh]">
                <h2 class="text-lg font-semibold mb-4">Daftar Kehadiran:</h2>
                <ul class="space-y-2">
                    <!-- Contoh item nama, ulangi blok ini untuk setiap orang -->
                    <li class="p-2 bg-white rounded-lg shadow-sm flex justify-between">
                        <span>John Doe</span>
                        <span class="text-sm text-gray-500">10:00 AM</span>
                    </li>
                    <li class="p-2 bg-white rounded-lg shadow-sm flex justify-between">
                        <span>Jane Doe</span>
                        <span class="text-sm text-gray-500">10:05 AM</span>
                    </li>
                    <!-- Tambahkan lebih banyak item di sini -->
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Contoh script untuk mengganti barcode (bisa diintegrasikan dengan backend jika menggunakan Laravel)
        function updateBarcode(newData) {
            const barcodeImg = document.getElementById('barcode');
            barcodeImg.src = `https://api.qrserver.com/v1/create-qr-code/?data=${newData}&size=400x400`;
            barcodeImg.alt = `Barcode ${newData}`;
        }

        // Simulasi pergantian barcode setiap 5 detik
        let barcodeCounter = 1;
        setInterval(() => {
            updateBarcode(`absen${barcodeCounter}`);
            barcodeCounter++;
        }, 5000);
    </script>
</body>

</html>

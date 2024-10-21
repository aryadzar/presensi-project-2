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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
                <canvas id="barcode" class="w-96 h-96 object-contain"></canvas>

            </div>

            <!-- Bagian kiri: Daftar nama orang yang telah absen -->
            <div class="bg-blue-100 p-4 rounded-lg shadow-inner overflow-y-auto max-h-[70vh]">
                <div class="col-span-3">
                    <h1>Daftar Pegawai</h1>
                    <table id="daftarPegawaiTable" class="w-full bg-white rounded-md shadow-lg overflow-hidden">
                        <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody id="pegawai-data">
                            <!-- Data will be dynamically injected here -->
                        </tbody>
                    </table>

                    <script>
                        // Function to fetch and update the table data
                        function fetchPegawaiData() {
                            axios.get('/list_user') // Your route here
                                .then(response => {
                                    const data = response.data;
                                    const tableBody = document.getElementById('pegawai-data');
                                    tableBody.innerHTML = ''; // Clear previous table rows

                                    // Loop through the data and create new rows
                                    data.forEach(item => {
                                        const row = `
                            <tr>
                                <td>${item.NPM}</td>
                                <td>${item.nama}</td>
                                <td>${item.tanggal}</td>
                            </tr>
                        `;
                                        tableBody.innerHTML += row;
                                    });
                                })
                                .catch(error => {
                                    console.error('Error fetching pegawai data:', error);
                                });
                        }

                        // Call the function on page load
                        fetchPegawaiData();

                        // Optionally, refresh the data every 5 seconds
                        setInterval(fetchPegawaiData, 5000); // Fetch new data every 5 seconds
                    </script>

                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        // Contoh script untuk mengganti barcode (bisa diintegrasikan dengan backend jika menggunakan Laravel)
        async function updateBarcode() {
            try {
                const response = await fetch('/barcode_generate');
                const data = await response.json();
                console.log(data); // Tambahkan ini untuk melihat apa yang diterima
                const barcodeImg = document.getElementById('barcode');
                barcodeImg.src = `https://api.qrserver.com/v1/create-qr-code/?data=${data.barcode}&size=400x400`;
                barcodeImg.alt = `Barcode ${data.barcode}`;
            } catch (e) {
                console.error("Error updating barcode", e);
            }
        }

        // Simulasi pergantian barcode setiap 5 detik
        let barcodeCounter = 1;
        setInterval(() => {
            updateBarcode();
        }, 5000);
    </script> --}}
</body>

</html>

import './bootstrap';
import 'flowbite';
import { DataTable } from "simple-datatables";
import Alpine from 'alpinejs';
import QRCode from 'qrcode';
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';


NProgress.configure({ showSpinner: false });


window.addEventListener('beforeunload', function () {
    NProgress.start(0.5);  // Mulai NProgress saat pengguna berpindah halaman
    NProgress.set(0.5);  // Mulai NProgress saat pengguna berpindah halaman
});

window.onload = function () {
    NProgress.set(0.8);  // Mulai NProgress saat pengguna berpindah halaman
    NProgress.done();  // Selesaikan NProgress setelah halaman baru sepenuhnya dimuat
};

async function updateBarcode() {
    try {
        const response = await fetch('/barcode_generate');
        const data = await response.json();
        const barcodeCanvas = document.getElementById('barcode');

        // Generate QR code menggunakan qrcode dan canvas
        QRCode.toCanvas(barcodeCanvas, data.barcode, {
            width: 400, // Sesuaikan ukuran sesuai kebutuhan
            margin: 1,
        }, (error) => {
            if (error) console.error(error);
            console.log('QR Code generated successfully!');
        });

    } catch (e) {
        console.error("Error updating barcode", e);
    }
}

// Simulasi pergantian barcode setiap 5 detik
setInterval(() => {
    updateBarcode();
}, 5000);

window.Alphine = Alpine

Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
    const tables = document.querySelectorAll('.table')
    tables.forEach((i) => {
        new DataTable(i)
    })
})



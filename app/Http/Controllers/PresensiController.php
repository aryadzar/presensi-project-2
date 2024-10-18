<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PresensiController extends Controller
{
    public function barcode_generator(){
        $barcode  = Str::uuid()->toString();
        $lama_token = now()->addMinutes(10);

        Cache::put("barcode_token_{$barcode}",true,  $lama_token);
        return response()->json(['barcode' => $barcode]);
    }

    public function set_presensi(Request $request){
        $barcode = $request->input('barcode'); // Ambil barcode yang di-scan
        $userId = Auth::user()->id; // Gunakan ID user yang sedang login

        if(Cache::has("barcode_token_{$barcode}")){
            // Cari presensi berdasarkan ID user dan barcode
            $alreadyPresent = Presensi::where('id_user', $userId)
                ->whereDate('tanggal', now()->toDateString())
                ->exists();

            if ($alreadyPresent) {
                Cache::forget("barcode_token_{$barcode}"); // Hapus token setelah digunakan
                return response()->json([
                    'success' => false,
                    'message' => 'Anda sudah melakukan presensi hari ini.'
                ]);
            }

            // Buat data presensi baru
            $presensi = new Presensi();
            $presensi->id_user = $userId;
            $presensi->data_qr_code = $barcode; // Simpan kode random di barcode
            $presensi->tanggal = now();
            $presensi->save();
            Cache::forget("barcode_token_{$barcode}"); // Hapus token setelah digunakan

            return response()->json([
                'success' => true,
                'user_name' => Auth::user()->nama
            ]);

        }

        return response()->json([
            'success' => false,
            'message' => 'Barcode tidak valid atau kadaluwarsa.'
        ]);
    }
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logika untuk mengecek apakah user sudah absen
        $hasAbsen = $this->checkUserAbsen();

        // Kirimkan status absensi ke view
        return view('dashboard', ['hasAbsen' => $hasAbsen]);
    }

    private function checkUserAbsen()
    {
        // Contoh logika pengecekan absensi
        // Kamu bisa ganti logika ini dengan yang sesuai dengan sistem absensimu
        $user = auth()->user();
        
        // Misalnya, cek di tabel absensi apakah user sudah absen hari ini
        // Ini hanya contoh, sesuaikan dengan struktur database kamu
        $today = now()->format('Y-m-d');
        $absenHariIni = $user->absensi()->where('tanggal', $today)->exists();

        return $absenHariIni; // Mengembalikan true jika sudah absen, false jika belum
    }
}

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dapatkan tanggal sekarang
        $currentDate = now()->locale('id')->isoFormat('dddd, D MMMM YYYY');

        // Kirimkan tanggal ke view
        return view('dashboard', ['currentDate' => $currentDate]);
    }
}
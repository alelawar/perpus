
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        dd($request);
        // // Validasi inputan
        // $request->validate([
        //     'fullname' => 'required|string|max:255',
        //     'username' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'telepon' => 'required|string|min:13|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        //     'alamat' => 'required|string',
        // ]);

        // // Simpan ke database
        // $user = User::create([
        //     'fullname' => $request->fullname,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'telepon' => $request->telepon,
        //     'password' => Hash::make($request->password),
        //     'alamat' => $request->alamat,
        // ]);

        // return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('beranda')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Logout berhasil!');
    }
}


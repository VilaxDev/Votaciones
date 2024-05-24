<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // Puedes agregar lógica aquí si es necesario
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function votaciones()
    {

        return view('admin.votaciones');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerVerify(Request $request)
    {
        $request->validate([
            'rol' => 'required',
            'dni' => 'required|digits:8|unique:users,dni',
            'code' => 'required'
        ], [
            'dni.required' => 'El DNI es requerido',
            'dni.digits' => 'El DNI debe tener exactamente 8 dígitos',
            'dni.unique' => 'El DNI ya ha sido utilizado',
            'code.required' => 'El código es requerido'
        ]);

        User::create([
            'rol' => $request->rol,
            'dni' => $request->dni,
            'code' => bcrypt($request->code)
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginVerify(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8',
            'code' => 'required'
        ], [
            'dni.required' => 'Este campo es requerido',
            'code.required' => 'Este campo es requerido'
        ]);

        $user = User::where('dni', $request->dni)->first();
        if ($user && Hash::check($request->code, $user->code)) {
            Auth::login($user);

            // Verificar el rol del usuario y redirigir adecuadamente
            if ($user->rol === 'Administrador') {
                return redirect('dashboard');
            } else {
                return redirect('votaciones');
            }
        }

        return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña incorrectas'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

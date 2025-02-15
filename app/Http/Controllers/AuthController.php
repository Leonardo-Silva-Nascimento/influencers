<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = JWTAuth::fromUser($user);

        return redirect('/login')->with('success', 'Registro realizado com sucesso!');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'As credenciais estão incorretas.'], 401);
        }

        $token = JWTAuth::attempt($credentials);

        if (! $token) {
            return response()->json(['error' => 'Não autorizado.'], 401);
        }

        $cookie = cookie('auth_token', $token, 120); 
        return response()->json([
            'message' => 'Registro realizado com sucesso!',
            'token'   => $token,
        ])->cookie($cookie);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return redirect('/login')->with('success', 'Deslogado com sucesso!');
    }
}

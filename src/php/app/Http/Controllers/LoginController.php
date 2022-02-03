<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('login', 'password');
        if (Auth::attempt($credenciales)) {
            // Autenticación exitosa
            return redirect()->intended(route('posts.index'));
        } else {
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }

    public function logout()
    {
        Auth::logout();
        $posts = Post::orderBy('titulo', 'ASC')->paginate(5);
        return redirect()->route('posts.index', compact('posts'));
    }
}

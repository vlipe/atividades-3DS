<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('projects.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('projects');
        }

        return back()->withErrors(['email' => 'As credenciais não coincidem.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function edit()
{
    return view('profile.edit', ['user' => auth()->user()]);
}

public function update(Request $request)
{
  
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $user = auth()->user();
    $user->name = $request->name;

    if ($request->filled('avatar_base64')) {

        $base64Image = $request->avatar_base64;

        $replace = substr($base64Image, 0, strpos($base64Image, ',')+1);
        $image = str_replace($replace, '', $base64Image);
        $image = str_replace(' ', '+', $image);

        $imageData = base64_decode($image);

        $imageName = 'avatar-' . $user->id . '-' . time() . '.png';
        $path = 'avatars/' . $imageName;

        \Illuminate\Support\Facades\Storage::disk('public')->put($path, $imageData);

        $user->profile_image = $path;
    }

    $user->save();

    return back()->with('success', 'Perfil atualizado e ícone aplicado!');
}
}

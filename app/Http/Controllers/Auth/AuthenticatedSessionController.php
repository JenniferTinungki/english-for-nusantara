<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'password.required' => 'Password wajib diisi.',
            ]
        );

        $user = User::where('email', $credentials['email'])->first();

        if (! $user) {
            return back()
                ->withErrors(['email' => 'Email tidak ditemukan.'])
                ->withInput($request->only('email'));
        }

        if (! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withErrors(['email' => 'Password tidak cocok.'])
                ->withInput($request->only('email'));
        }

        $remember = $request->boolean('remember');

        Auth::login($user, $remember);
        $request->session()->regenerate();

        $role = $user->role ?? null;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'guru'  => redirect()->route('guru.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),
            default => redirect()->route('landing'),
        };
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
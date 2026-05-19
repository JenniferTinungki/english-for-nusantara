<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'guru');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('username', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'aktif');
        }

        $guru      = $query->latest()->paginate(15);
        $totalGuru = User::where('role', 'guru')->count();
        $guruAktif = User::where('role', 'guru')->where('is_active', true)->count();

        return view('admin.guru.index', compact('guru', 'totalGuru', 'guruAktif'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'nullable|string|max:50|unique:users,username',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
            'jenis_kelamin' => 'nullable|in:L,P',
            'is_active'     => 'nullable|boolean',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah digunakan.',
            'username.unique'    => 'Username sudah digunakan.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'is_active'     => $request->has('is_active'),
            'role'          => 'guru',
        ]);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Akun guru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $user = User::where('role', 'guru')->findOrFail($id);
        return view('admin.guru.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::where('role', 'guru')->findOrFail($id);
        return view('admin.guru.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::where('role', 'guru')->findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'nullable|string|max:50|unique:users,username,' . $user->id,
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'password'      => 'nullable|min:6|confirmed',
            'jenis_kelamin' => 'nullable|in:L,P',
            'is_active'     => 'nullable|boolean',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah digunakan.',
            'username.unique'    => 'Username sudah digunakan.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $data = [
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'is_active'     => $request->has('is_active'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = User::where('role', 'guru')->findOrFail($id);
        $user->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Akun guru berhasil dihapus.');
    }

    public function toggleStatus(string $id)
    {
        $user = User::where('role', 'guru')->findOrFail($id);
        $user->update(['is_active' => !$user->is_active]);

        return redirect()->back()
            ->with('success', 'Status guru berhasil diubah.');
    }
}
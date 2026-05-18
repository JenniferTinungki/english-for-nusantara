<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::where('role', 'siswa');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('username', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('gender')) {
            $query->where('jenis_kelamin', $request->gender);
        }

        $siswa = $query->with([
            'assessmentResults',
            'quizAttempts',
            'tugasSubmits',
            'materiProgress',
        ])->latest()->paginate(15);

        $totalSiswa = User::where('role', 'siswa')->count();
        $siswaAktif = User::where('role', 'siswa')->where('is_active', true)->count();
        $kelasList  = User::where('role', 'siswa')->whereNotNull('kelas')->distinct()->pluck('kelas')->sort()->values();

        return view('guru.siswa.index', compact('siswa', 'totalSiswa', 'siswaAktif', 'kelasList'));
    }

    public function create(): View
    {
        return view('guru.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'nis'           => 'nullable|string|max:20|unique:users,nis',
            'username'      => 'nullable|string|max:50|unique:users,username',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
            'kelas'         => 'nullable|string|max:50',
            'jenis_kelamin' => 'nullable|in:L,P',
            'is_active'     => 'nullable|boolean',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah digunakan.',
            'nis.unique'         => 'NIS sudah digunakan.',
            'username.unique'    => 'Username sudah digunakan.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'          => $request->name,
            'nis'           => $request->nis,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'kelas'         => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'is_active'     => $request->has('is_active'),
            'role'          => 'siswa',
        ]);

        return redirect()->route('guru.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(int $id): View
    {
        $user = User::with([
            'assessmentResults.assessment',
            'quizAttempts.quiz',
            'tugasSubmits',
            'materiProgress',
        ])->where('role', 'siswa')->findOrFail($id);

        return view('guru.siswa.show', compact('user'));
    }

    public function edit(int $id): View
    {
        $user = User::where('role', 'siswa')->findOrFail($id);
        return view('guru.siswa.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::where('role', 'siswa')->findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'nis'           => 'nullable|string|max:20|unique:users,nis,' . $user->id,
            'username'      => 'nullable|string|max:50|unique:users,username,' . $user->id,
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'password'      => 'nullable|min:6|confirmed',
            'kelas'         => 'nullable|string|max:50',
            'jenis_kelamin' => 'nullable|in:L,P',
            'is_active'     => 'nullable|boolean',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah digunakan.',
            'nis.unique'         => 'NIS sudah digunakan.',
            'username.unique'    => 'Username sudah digunakan.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $data = [
            'name'          => $request->name,
            'nis'           => $request->nis,
            'username'      => $request->username,
            'email'         => $request->email,
            'kelas'         => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'is_active'     => $request->has('is_active'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('guru.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $user = User::where('role', 'siswa')->findOrFail($id);
        $user->delete();

        return redirect()->route('guru.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}

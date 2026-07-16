<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }
    
    public function create()
{
    return view('mahasiswas.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nama'     => 'required|string|max:100',
        'nim'      => 'required|string|unique:mahasiswas,nim',
        'prodi'    => 'required|string|max:100',
        'angkatan' => 'required|integer|min:2000|max:2030',
        'ipk'      => 'required|numeric|min:0|max:4',
        'email'    => 'nullable|email|max:100',
        'bio'      => 'nullable|string|max:500',
    ]);

    // Tambahkan user_id dari user yang sedang login
    $validated['user_id'] = auth()->id();

    Mahasiswa::create($validated);

    return redirect()->route('mahasiswas.index')
                     ->with('success', 'Mahasiswa berhasil ditambahkan!');
}

public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    // Hanya pemilik atau admin yang boleh edit
    if ($mahasiswa->user_id !== auth()->id()) {
        abort(403, 'Anda tidak memiliki izin untuk mengedit data ini.');
    }

    return view('mahasiswas.edit', compact('mahasiswa'));
}


public function update(Request $request, $id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    if ($mahasiswa->user_id !== auth()->id()) {
        abort(403);
    }

    $mahasiswa->update($request->validate([
        'nama'     => 'required|string|max:100',
        'nim'      => 'required|string|unique:mahasiswas,nim,' . $id,
        'prodi'    => 'required|string|max:100',
        'angkatan' => 'required|integer|min:2000|max:2030',
        'ipk'      => 'required|numeric|min:0|max:4',
        'email'    => 'nullable|email|max:100',
        'bio'      => 'nullable|string|max:500',
    ]));

    return redirect()->route('mahasiswas.index')
                     ->with('success', "Data {$mahasiswa->nama} berhasil diperbarui!");
}


public function destroy($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    if ($mahasiswa->user_id !== auth()->id()) {
        abort(403);
    }

    $nama = $mahasiswa->nama;
    $mahasiswa->delete();

    return redirect()->route('mahasiswas.index')
                     ->with('success', "Data $nama berhasil dihapus.");
}
}

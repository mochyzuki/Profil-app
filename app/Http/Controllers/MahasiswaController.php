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
    $request->validate([
        'nama'     => 'required|string|max:100',
        'nim'      => 'required|string|unique:mahasiswas,nim',
        'prodi'    => 'required|string|max:100',
        'angkatan' => 'required|integer|min:2000|max:2030',
        'ipk'      => 'required|numeric|min:0|max:4',
        'email'    => 'nullable|email|max:100',
        'bio'      => 'nullable|string|max:500',
    ]);

    Mahasiswa::create($request->validated());

    return redirect()->route('mahasiswas.index')
    ->with('success', 'Mahasiswa berhasil ditambahkan!');
    
}
   public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);
    return view('mahasiswas.edit', compact('mahasiswa'));
}

public function update(Request $request, $id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    $request->validate([
        'nama'     => 'required|string|max:100',
        // unique: abaikan NIM milik mahasiswa ini sendiri
        'nim'      => 'required|string|unique:mahasiswas,nim,' . $id,
        'prodi'    => 'required|string|max:100',
        'angkatan' => 'required|integer|min:2000|max:2030',
        'ipk'      => 'required|numeric|min:0|max:4',
        'email'    => 'nullable|email|max:100',
        'bio'      => 'nullable|string|max:500',
    ]);

    $mahasiswa->update($request->validated());

    return redirect()->route('mahasiswas.index')
                     ->with('success', "Data {$mahasiswa->nama} berhasil diperbarui!");
}
public function destroy($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);
    $nama = $mahasiswa->nama;  // Simpan nama sebelum dihapus
    $mahasiswa->delete();

    return redirect()->route('mahasiswas.index')
                     ->with('success', "Data $nama berhasil dihapus.");
}
}

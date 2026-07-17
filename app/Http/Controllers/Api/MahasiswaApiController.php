<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaApiController extends Controller
{
    // GET /api/mahasiswas
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();
        return MahasiswaResource::collection($mahasiswas);
    }

    // GET /api/mahasiswas/{id}
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return new MahasiswaResource($mahasiswa);
    }

    // POST /api/mahasiswas
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

        $validated['user_id'] = $request->user()->id;
        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mahasiswa berhasil ditambahkan',
            'data'    => new MahasiswaResource($mahasiswa),
        ], 201);
    }

    // PUT /api/mahasiswas/{id}
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($mahasiswa->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Tidak diizinkan'], 403);
        }

        $mahasiswa->update($request->validate([
            'nama'     => 'sometimes|string|max:100',
            'nim'      => 'sometimes|string|unique:mahasiswas,nim,' . $id,
            'ipk'      => 'sometimes|numeric|min:0|max:4',
            'email'    => 'nullable|email|max:100',
            'bio'      => 'nullable|string|max:500',
        ]));

        return new MahasiswaResource($mahasiswa);
    }

    // DELETE /api/mahasiswas/{id}
    public function destroy(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($mahasiswa->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Tidak diizinkan'], 403);
        }

        $mahasiswa->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}

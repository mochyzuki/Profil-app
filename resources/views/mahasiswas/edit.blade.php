@extends('layouts.app')
@section('title', 'Edit ' . $mahasiswa->nama)
@section('content')

<h1 style='color:#0B1F3A;margin-bottom:20px;'>Edit Mahasiswa: {{ $mahasiswa->nama }}</h1>

@if($errors->any())
    <div style='background:#fee2e2;border:1px solid #fca5a5;padding:14px;
                border-radius:8px;margin-bottom:18px;'>
        <strong>Perbaiki kesalahan:</strong>
        <ul style='margin:8px 0 0 20px;'>
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method='POST'
      style='background:white;padding:24px;border-radius:10px;border:1px solid #ddd;'>
    @csrf
    @method('PUT')

    <div style='margin-bottom:14px;'>
        <label style='display:block;font-weight:bold;margin-bottom:5px;'>Nama Lengkap *</label>
        <input type='text' name='nama'
               value="{{ old('nama', $mahasiswa->nama) }}"
               style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
        @error('nama')<span style='color:#ef4444;font-size:12px;'>{{ $message }}</span>@enderror
    </div>

    <div style='margin-bottom:14px;'>
        <label style='display:block;font-weight:bold;margin-bottom:5px;'>NIM *</label>
        <input type='text' name='nim'
               value="{{ old('nim', $mahasiswa->nim) }}"
               style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
        @error('nim')<span style='color:#ef4444;font-size:12px;'>{{ $message }}</span>@enderror
    </div>

    <div style='display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px;'>
        <div>
            <label style='display:block;font-weight:bold;margin-bottom:5px;'>Program Studi *</label>
            <input type='text' name='prodi'
                   value="{{ old('prodi', $mahasiswa->prodi) }}"
                   style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
        </div>
        <div>
            <label style='display:block;font-weight:bold;margin-bottom:5px;'>Angkatan *</label>
            <input type='number' name='angkatan'
                   value="{{ old('angkatan', $mahasiswa->angkatan) }}"
                   style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
        </div>
    </div>

    <div style='margin-bottom:14px;'>
        <label style='display:block;font-weight:bold;margin-bottom:5px;'>IPK *</label>
        <input type='number' step='0.01' name='ipk'
               value="{{ old('ipk', $mahasiswa->ipk) }}"
               style='width:200px;padding:10px;border:1px solid #ddd;border-radius:6px;'>
        @error('ipk')<span style='color:#ef4444;font-size:12px;'> {{ $message }}</span>@enderror
    </div>

    <div style='margin-bottom:14px;'>
        <label style='display:block;font-weight:bold;margin-bottom:5px;'>Email</label>
        <input type='email' name='email'
               value="{{ old('email', $mahasiswa->email) }}"
               style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
    </div>

    <div style='margin-bottom:20px;'>
        <label style='display:block;font-weight:bold;margin-bottom:5px;'>Bio</label>
        <textarea name='bio' rows='3'
                  style='width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;box-sizing:border-box;'>
{{ old('bio', $mahasiswa->bio) }}</textarea>
    </div>

    <div style='display:flex;gap:10px;'>
        <button type='submit'
                style='background:#6D28D9;color:white;padding:10px 24px;border:none;
                       border-radius:6px;cursor:pointer;font-size:15px;'>
            Simpan Perubahan</button>
        <a href="{{ route('mahasiswas.index') }}"
           style='padding:10px 20px;border:1px solid #ddd;border-radius:6px;
                  text-decoration:none;color:#666;'>Batal</a>
    </div>
</form>

@endsection

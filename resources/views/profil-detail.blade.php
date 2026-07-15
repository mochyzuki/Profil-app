@extends('layouts.app')
@section('title', 'Profil ' . $mahasiswa->nama)
@section('content')

<a href="{{ route('profil') }}"
   style='color:#065A82;text-decoration:none;'>
    ← Kembali ke Daftar</a>

<div style='background:#065A82;color:white;padding:30px;
            border-radius:10px;text-align:center;margin:16px 0;'>
    <h1>{{ $mahasiswa->nama }}</h1>
    <p>{{ $mahasiswa->prodi }} • Angkatan {{ $mahasiswa->angkatan }}</p>
    @if($mahasiswa->ipk >= 3.75)
        <span style='background:#21B0A7;padding:4px 16px;
                     border-radius:20px;'>Cumlaude ⭐</span>
    @endif
</div>

<div style='background:white;padding:24px;border-radius:10px;
            border:1px solid #ddd;'>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>IPK:</strong> {{ $mahasiswa->ipk }}</p>
    @if($mahasiswa->email)
        <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
    @endif
    @if($mahasiswa->github)
        <p><strong>GitHub:</strong>
            <a href='https://{{ $mahasiswa->github }}'>{{ $mahasiswa->github }}</a>
        </p>
    @endif
    @if($mahasiswa->bio)
        <p style='margin-top:12px;'>{{ $mahasiswa->bio }}</p>
    @endif
</div>

@endsection

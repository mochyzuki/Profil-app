@extends('layouts.app')

@section('title', 'Profil ' . $mahasiswa['nama'])

@section('content')

{{-- Header Profil --}}
<div style='background:#065A82;color:white;padding:28px;border-radius:10px;
            text-align:center;margin-bottom:20px;'>
    <h1>{{ $mahasiswa['nama'] }}</h1>
    <p>{{ $mahasiswa['prodi'] }} &bull; Angkatan {{ $mahasiswa['angkatan'] }}</p>
    @if($mahasiswa['ipk'] >= 3.75)
        <span style='background:#21B0A7;padding:4px 14px;border-radius:20px;
                     font-size:13px;font-weight:bold;'>Cumlaude ⭐</span>
    @else
        <span style='background:#1C7293;padding:4px 14px;border-radius:20px;
                     font-size:13px;'>Sangat Memuaskan</span>
    @endif
</div>

{{-- Info Detail --}}
<div style='background:white;padding:20px;border-radius:8px;
            border:1px solid #ddd;margin-bottom:16px;'>
    <h2 style='color:#065A82;margin-bottom:12px;'>Informasi</h2>
    <p><strong>NIM:</strong> {{ $mahasiswa['nim'] }}</p>
    <p><strong>IPK:</strong> {{ $mahasiswa['ipk'] }}</p>
    <p><strong>Email:</strong> {{ $mahasiswa['email'] }}</p>
    <p><strong>GitHub:</strong> {{ $mahasiswa['github'] }}</p>
    <p style='margin-top:10px;'>{{ $mahasiswa['bio'] }}</p>
</div>

{{-- Skill --}}
<div style='background:white;padding:20px;border-radius:8px;border:1px solid #ddd;'>
    <h2 style='color:#065A82;margin-bottom:12px;'>Skill</h2>
    @foreach($mahasiswa['skill'] as $skill)
        <span style='background:#065A82;color:white;padding:5px 14px;
                     border-radius:16px;margin:3px;display:inline-block;
                     font-size:13px;'>{{ $skill }}</span>
    @endforeach
</div>

@endsection

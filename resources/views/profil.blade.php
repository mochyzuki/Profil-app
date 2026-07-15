@extends('layouts.app')
@section('title', 'Daftar Mahasiswa')
@section('content')

<h1 style='color:#0B1F3A;margin-bottom:20px;'>
    Daftar Mahasiswa Informatika
    <span style='font-size:14px;color:#666;font-weight:normal;'>
        ({{ $mahasiswas->count() }} mahasiswa)</span>
</h1>

@foreach($mahasiswas as $mhs)
    <div style='background:white;border-radius:10px;padding:20px;
                margin-bottom:16px;border-left:4px solid #065A82;
                box-shadow:0 2px 6px rgba(0,0,0,.08);'>
        <div style='display:flex;justify-content:space-between;align-items:center;'>
            <div>
                <h3 style='color:#0B1F3A;margin:0;'>{{ $mhs->nama }}</h3>
                <p style='color:#666;margin:4px 0;font-size:14px;'>
                    {{ $mhs->nim }} • {{ $mhs->prodi }} {{ $mhs->angkatan }}</p>
            </div>
            <div style='text-align:right;'>
                <div style='font-size:22px;font-weight:bold;color:#065A82;'>
                    {{ $mhs->ipk }}</div>
                @if($mhs->ipk >= 3.75)
                    <span style='background:#21B0A7;color:white;padding:2px 10px;
                                 border-radius:12px;font-size:12px;'>Cumlaude</span>
                @endif
            </div>
        </div>
        @if($mhs->bio)
            <p style='color:#555;margin-top:10px;font-size:14px;'>{{ $mhs->bio }}</p>
        @endif
        <a href="{{ route('mahasiswa.show', $mhs->id) }}"
           style='color:#065A82;font-size:13px;text-decoration:none;'>
            Lihat Detail →</a>
    </div>
@endforeach

@endsection

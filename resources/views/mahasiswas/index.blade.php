@extends('layouts.app')
@section('title', 'Daftar Mahasiswa')
@section('content')

<div style='display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;'>
    <h1 style='color:#0B1F3A;'>Daftar Mahasiswa</h1>
    <a href="{{ route('mahasiswas.create') }}"
       style='background:#065A82;color:white;padding:10px 20px;
              border-radius:6px;text-decoration:none;'>
        + Tambah Mahasiswa</a>
</div>

@foreach($mahasiswas as $mhs)
    <div style='background:white;border-radius:8px;padding:18px;
                margin-bottom:12px;border-left:4px solid #065A82;
                display:flex;justify-content:space-between;align-items:center;'>
        <div>
            <strong>{{ $mhs->nama }}</strong>
            <span style='color:#666;margin-left:8px;'>{{ $mhs->nim }}</span>
            <span style='color:#065A82;margin-left:8px;font-weight:bold;'>IPK: {{ $mhs->ipk }}</span>
        </div>
        <div style='display:flex;gap:8px;'>
            <a href="{{ route('mahasiswas.edit', $mhs->id) }}"
               style='background:#6D28D9;color:white;padding:6px 14px;
                      border-radius:5px;text-decoration:none;font-size:13px;'>Edit</a>

            <form method='POST'
                  action="{{ route('mahasiswas.destroy', $mhs->id) }}">
                @csrf
                @method('DELETE')
                <button type='submit'
                        onclick="return confirm('Hapus {{ $mhs->nama }}?')"
                        style='background:#DC2626;color:white;padding:6px 14px;
                               border:none;border-radius:5px;cursor:pointer;font-size:13px;'>
                    Hapus</button>
            </form>
        </div>
    </div>
@endforeach

@if($mahasiswas->isEmpty())
    <p style='color:#888;text-align:center;padding:40px;'>
        Belum ada data. <a href="{{ route('mahasiswas.create') }}">Tambah sekarang</a></p>
@endif

@endsection

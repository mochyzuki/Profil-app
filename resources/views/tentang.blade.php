@extends('layouts.app')
@section('title', 'Tentang Mata Kuliah')
@section('content')
    <h1>{{ $info['matakuliah'] }}</h1>
    <p>Semester: {{ $info['semester'] }}</p>
    <p>Dosen: {{ $info['dosen'] }}</p>
@endsection

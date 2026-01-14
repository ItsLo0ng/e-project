@extends('layouts.main')

@section('content')
    <div class="container mt-5 pt-5">
        <h1>Dashboard Admin</h1>
        <a href="{{ route('contributions.index') }}" class="btn btn-primary">Quản lý ảnh chờ duyệt</a>
    </div>
@endsection
@extends('layouts.main')

@section('content')
    <div class="container mt-5 pt-5">
        <h1>Quản lý ảnh chờ duyệt</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Phân loại</th>
                    <th>Ảnh</th>
                    <th>Mô tả</th>
                    <th>Lịch sử</th>
                    <th>Trạng thái</th>
                    <th>Người gửi</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contributions as $contribution)
                    <tr>
                        <td>{{ $contribution->name }}</td>
                        <td>{{ $contribution->category }}</td>
                        <td><img src="{{ asset('storage/' . $contribution->image_path) }}" width="100"></td>
                        <td>{{ $contribution->description }}</td>
                        <td>{{ $contribution->history }}</td>
                        <td>{{ $contribution->status }}</td>
                        <td>{{ $contribution->user->name }}</td>
                        <td>
                            @if($contribution->status == 'pending')
                                <form action="{{ route('contributions.approve', $contribution->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                                </form>
                                <form action="{{ route('contributions.reject', $contribution->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Từ chối</button>
                                </form>
                            @endif
                            <form action="{{ route('contributions.destroy', $contribution->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
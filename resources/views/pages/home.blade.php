@extends('layouts.main')

@section('content')
    <section id="home" class="vh-100 d-flex align-items-center text-center" style="background: url('{{ asset('images/hero.jpg') }}') center/cover no-repeat;">
        <div class="container text-white">
            <h1 style="font-family: 'Great Vibes', cursive; font-size: 6rem;">Scratchy Nib</h1>
            <p class="lead">Thư pháp là nghệ thuật viết chữ đẹp, kết hợp giữa kỹ thuật và cảm xúc. Nguồn gốc từ Trung Quốc cổ đại (khoảng 2000 TCN), lan tỏa sang Ai Cập, Hy Lạp và nhiều nền văn minh khác...</p>
        </div>
    </section>

    <section id="traditional" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="font-family: 'Great Vibes', cursive;">Thư pháp Truyền thống</h2>
            <p>Thư pháp truyền thống tuân thủ nghiêm ngặt quy tắc, nét chữ cân đối, thường dùng bút lông hoặc bút sắt...</p>
        </div>
    </section>

    <!-- Thêm section tương tự cho contemporary, hand-lettering, modern, forms-styles -->

    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Thư viện ảnh</h2>
            <div class="btn-group mb-4 d-flex justify-content-center flex-wrap">
                <button class="btn btn-outline-primary filter-btn m-1" data-filter="all">Tất cả</button>
                <button class="btn btn-outline-primary filter-btn m-1" data-filter="arabic">Ả Rập</button>
                <button class="btn btn-outline-primary filter-btn m-1" data-filter="indic">Ấn Độ</button>
                <button class="btn btn-outline-primary filter-btn m-1" data-filter="greek">Hy Lạp</button>
            </div>
            <div class="row gallery-grid">
                @foreach($galleryData as $item)
                    <div class="col-md-4 col-sm-6 mb-4 gallery-item" data-category="{{ $item->category }}" data-bs-toggle="modal" data-bs-target="#detailModal" data-title="{{ $item->name }}" data-image="{{ asset('storage/' . $item->image_path) }}" data-description="{{ $item->description }}" data-history="{{ $item->history }}">
                        <div class="card shadow">
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @auth
    <section id="contribute" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Góp ảnh thư pháp của bạn</h2>
            <form action="{{ route('contribute.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Tên ảnh</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Phân loại</label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Lịch sử / Nguồn gốc</label>
                    <textarea name="history" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi duyệt</button>
            </form>
        </div>
    </section>
    @else
    <section class="py-5 text-center">
        <p>Vui lòng <a href="{{ route('login') }}">đăng nhập</a> để góp ảnh thư pháp.</p>
    </section>
    @endauth

    <section id="feedback" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Phản hồi</h2>
            <form action="{{ route('feedback.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tin nhắn</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </section>
@endsection
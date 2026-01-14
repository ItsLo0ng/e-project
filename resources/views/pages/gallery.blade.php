@extends('layouts.main')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="font-family: 'Great Vibes', cursive;">Thư viện ảnh</h2>
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

    <!-- Modal detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid mb-3" alt="">
                    <p id="modalDescription"></p>
                    <p id="modalHistory" class="text-muted"></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.main')

@section('title', 'Liên hệ / Contact Scratchy Nib')

@section('content')
    <div class="container my-5 pt-5">
        <h1 class="text-center mb-4" style="font-family: 'Great Vibes', cursive; color: #c9a96e;">
            Liên hệ với chúng tôi
        </h1>
        <p class="lead text-center mb-5">
            Có câu hỏi, góp ý, muốn chia sẻ tác phẩm, hay hợp tác? Hãy gửi tin nhắn cho Scratchy Nib nhé!<br>
            Chúng tôi sẽ phản hồi trong vòng 24-48 giờ.
        </p>

        <!-- Simple form example (use Laravel's old input + validation later) -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên của bạn</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Tin nhắn</label>
                        <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                    </div>
                    <!-- Optional: file upload for photos -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Gửi ảnh (nếu có)</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-lg" style="background: #c9a96e; color: white;">Gửi →</button>
                </form>
            </div>
        </div>

        <!-- Extra info -->
        <div class="text-center mt-5">
            <p>Hoặc liên hệ qua:</p>
            <a href="mailto:your@email.com" class="me-3">Email</a>
            <a href="https://facebook.com/scratchynib" target="_blank">Facebook</a>
        </div>
    </div>
@endsection
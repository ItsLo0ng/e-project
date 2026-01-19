@extends('layouts.main')

@section('title', 'About Scratchy Nib')

@section('content')
    <!-- Hero -->
    <section class="py-5 text-center" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('images/calligraphy-hero.jpg') }}'); background-size: cover; color: white;">
        <div class="container py-5">
            <h1 class="display-3" style="font-family: 'Great Vibes', cursive; color: #c9a96e;">Scratchy Nib</h1>
            <p class="lead fs-4">Where every stroke tells a story • A community for calligraphy lovers</p>
        </div>
    </section>

    <!-- Story -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center mb-4">Our Story</h2>
                    <p class="lead">
                        Scratchy Nib started as a personal passion project in Hanoi. After years of practicing pointed pen scripts and brush lettering, I wanted a warm space where beginners and experienced calligraphers could share work without judgment, learn from each other, and celebrate the beauty of imperfect letters.
                    </p>
                    <p>
                        Today, it's growing into a cozy community of letter enthusiasts from Vietnam and around the world — all united by the joy of putting ink to paper.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">What We Believe</h2>
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <h4>Creativity Without Rules</h4>
                    <p>Every style is welcome — traditional, modern, messy, or perfect.</p>
                </div>
                <div class="col-md-4">
                    <h4>Community First</h4>
                    <p>Kind feedback, encouragement, and shared inspiration.</p>
                </div>
                <div class="col-md-4">
                    <h4>Daily Practice</h4>
                    <p>Small consistent strokes lead to beautiful progress.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 text-center">
        <div class="container">
            <h3 class="mb-4">Join the Scratchy Family</h3>
            <p class="lead mb-4">Share your work, learn new techniques, and connect with fellow scribers.</p>
            <a href="{{ route('register') }}" class="btn btn-lg" style="background: #c9a96e; color: white;">Get Started →</a>
        </div>
    </section>
@endsection
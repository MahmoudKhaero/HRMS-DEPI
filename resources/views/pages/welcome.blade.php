@extends('layouts.home')

@section('nav')
    @include('components.nav')
@endsection

@section('content')
{{-- Hero Section with Gradient Background and Animation --}}
<div class="px-4 pt-5 text-center border-bottom bg-light">
    <h1 class="display-4 fw-bold text-body-emphasis">EasyHire HRMS</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">We are a game development company that brings ideas to life with passion and creativity.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="#recruitments" class="btn btn-primary btn-lg px-4 me-sm-3">Join Our Team</a>
      <a href="#announcements" class="btn btn-outline-secondary btn-lg px-4">Explore Announcements</a>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">
        <img src="{{ asset('images/mainImage.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
      </div>
    </div>
  </div>

{{-- Announcements Section with Animated Cards --}}
<section id="announcements" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">Latest Announcements</h2>
        <div class="row justify-content-center">
            @if(count($announcements) > 0)
                @foreach ($announcements as $announcement)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card announcement-card shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                        @if ($announcement->attachment !== null)
                            <img src="{{ $announcement->attachment }}" class="card-img-top" alt="Announcement Image" style="height: 250px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ Str::limit($announcement->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="{{ route('welcome.announcements.show', ['announcement' => $announcement->id]) }}" class="btn btn-primary w-100">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>No announcements to display.</p>
            @endif
        </div>
        <a href="{{ route('welcome.announcements') }}" class="btn btn-outline-primary mt-4">See all announcements</a>
    </div>
</section>

{{-- Recruitments Section with Hover Effects --}}
<section id="recruitments" class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Join Our Team</h2>
        <div class="row justify-content-center">
            @if(count($recruitments) > 0)
                @foreach ($recruitments as $recruitment)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card recruitment-card shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                        @if ($recruitment->attachment !== null)
                            <img src="{{ asset('images/Picture1.jpg') }}" class="card-img-top" alt="Recruitment Image" style="height: 250px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $recruitment->title }}</h5>
                            <p class="card-text">{{ Str::limit($recruitment->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="{{ route('welcome.recruitments.show', ['recruitment' => $recruitment->id]) }}" class="btn btn-outline-primary w-100">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>No job openings at the moment.</p>
            @endif
        </div>
        <a href="{{ route('welcome.recruitments') }}" class="btn btn-outline-primary mt-4">See all job openings</a>
    </div>
</section>

{{-- Success Stories Section --}}
<section id="success-stories" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">Our Success Stories</h2>
        <div class="row justify-content-center">
            <!-- Static Success Stories -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card success-story-card shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                <img src="{{ asset('images/SuccessStory1.png') }}" class="card-img-top" alt="Success Story Image 1" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">Mahmoud Maged</h5>
                        <p class="card-text">I joined PT. Asta Satria Investama as an intern and within a year, I was promoted to a full-time position. The culture and support are amazing!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card success-story-card shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                <img src="{{ asset('images/SuccessStory3.png') }}" class="card-img-top" alt="Success Story Image 1" style="height: 250px; object-fit: contain;">


                    <div class="card-body">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text">Working here has been life-changing. I’ve grown professionally and met amazing people along the way.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card success-story-card shadow-sm h-100" style="border-radius: 20px; overflow: hidden;">
                <img src="{{ asset('images/SuccessStory2.png') }}" class="card-img-top" alt="Success Story Image 1" style="height: 250px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">Michael Lee</h5>
                        <p class="card-text">This company truly invests in its people. I’ve had endless opportunities to learn and grow in my career.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

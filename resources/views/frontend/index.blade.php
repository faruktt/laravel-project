@extends('frontend.master')
@section('content')
<!-- Banner Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <p class="text-uppercase mb-2" style="letter-spacing: 4px;">Experience Luxury & Comfort</p>
                <h1>Welcome to Your Home <br> Away From Home</h1>
                <p class="mb-4">Top rated guest house with premium facilities at an affordable price.</p>
                <a href="#rooms" class="btn btn-premium btn-lg">Explore Rooms</a>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section id="rooms" class="section-padding container">
        <div class="text-center mb-5">
            <h2 class="display-5">Our Room Categories</h2>
            <div style="width: 60px; height: 3px; background: var(--primary-color); margin: 20px auto;"></div>
        </div>
        <div class="row g-4">
            <!-- Category 1 -->
            @foreach ($allRoomData as $item)
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body p-4">
                        <h4 class="card-title">{{ $item->room_no }}</h4>
                        <p class="card-text text-muted">{{ $item->type->type }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">৳ {{ $item->price }} / Night</span>
                            <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </section>

    <!-- Main Content / Features Section -->
    <section id="services" class="features-section section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5">Why Choose Faruk Guest House?</h2>
                <p class="text-muted">We provide the best hospitality services in the city.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fa-solid fa-wifi"></i>
                        <h5>Fast WiFi</h5>
                        <p class="small text-muted">24/7 high-speed internet connection.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fa-solid fa-utensils"></i>
                        <h5>Fine Dining</h5>
                        <p class="small text-muted">Delicious breakfast and local food.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h5>Top Security</h5>
                        <p class="small text-muted">CCTV coverage and 24h security staff.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fa-solid fa-car"></i>
                        <h5>Parking</h5>
                        <p class="small text-muted">Spacious and secure car parking area.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

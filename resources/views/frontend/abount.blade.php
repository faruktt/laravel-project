@extends('frontend.master')

@section('content')


<section class="py-5" style="background: var(--light-bg);">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" style="color: var(--primary-color);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <h1 class="display-4 fw-bold">About Our Guest House</h1>
    </div>
</section>

<!-- Main About Content -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Side: Image Experience -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow-lg" alt="About Faruk Guest House">
                    <!-- Experience Tag -->
                    <div class="position-absolute bottom-0 end-0 bg-white p-4 shadow-lg m-4 border-start border-5 border-warning" style="border-color: var(--primary-color) !important;">
                        <h2 class="fw-bold mb-0" style="color: var(--primary-color);">10+</h2>
                        <p class="small text-uppercase mb-0 fw-bold">Years of Experience</p>
                    </div>
                </div>
            </div>

            <!-- Right Side: Text Content -->
            <div class="col-lg-6">
                <h6 class="text-uppercase fw-bold mb-3" style="color: var(--primary-color); letter-spacing: 2px;">Since 2014</h6>
                <h2 class="display-5 mb-4">Where Luxury Meets Comfort and Hospitality</h2>
                <p class="lead text-muted mb-4">Faruk Guest House is more than just a place to stay; it's a destination where we prioritize your comfort and peace of mind.</p>
                <p class="mb-4 text-secondary">
                    আমাদের গেস্ট হাউসে আপনি পাবেন ঘরোয়া পরিবেশ এবং আধুনিক সব সুযোগ-সুবিধা। আমরা বিশ্বাস করি প্রতিটি গেস্ট আমাদের পরিবারের অংশ। তাই আমাদের সেবা এবং আতিথেয়তা আপনাকে দেবে এক অনন্য অভিজ্ঞতা।
                </p>

                <!-- Small Features List -->
                <div class="row g-3 mb-5">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check me-2" style="color: var(--primary-color);"></i>
                            <span class="fw-bold">Premium Room Service</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check me-2" style="color: var(--primary-color);"></i>
                            <span class="fw-bold">Fully Air Conditioned</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check me-2" style="color: var(--primary-color);"></i>
                            <span class="fw-bold">High Security Zone</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-circle-check me-2" style="color: var(--primary-color);"></i>
                            <span class="fw-bold">Prime Location</span>
                        </div>
                    </div>
                </div>

                <a href="{{route('frontend.contact')}}" class="btn btn-premium btn-lg">Contact Us Today</a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section-padding pt-0">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6">
                <div class="p-4 rounded shadow-sm bg-white border-bottom border-3" style="border-color: var(--primary-color) !important;">
                    <h3 class="fw-bold mb-1">50+</h3>
                    <p class="text-muted mb-0">Luxury Rooms</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 rounded shadow-sm bg-white border-bottom border-3" style="border-color: var(--primary-color) !important;">
                    <h3 class="fw-bold mb-1">1200+</h3>
                    <p class="text-muted mb-0">Happy Guests</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 rounded shadow-sm bg-white border-bottom border-3" style="border-color: var(--primary-color) !important;">
                    <h3 class="fw-bold mb-1">15+</h3>
                    <p class="text-muted mb-0">Staff Members</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="p-4 rounded shadow-sm bg-white border-bottom border-3" style="border-color: var(--primary-color) !important;">
                    <h3 class="fw-bold mb-1">4.9/5</h3>
                    <p class="text-muted mb-0">Customer Rating</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('frontend.master')
@section('content')


<section class="hero-section position-relative">
    <div class="container">
        <div class="hero-content text-center">
            <p class="text-uppercase mb-2 animate-up" style="letter-spacing: 5px; font-weight: 300;">Luxury Living in the Heart of the City</p>
            <h1 class="display-2 mb-4 animate-up" style="font-weight: 700;">Welcome to Your Home <br> Away From Home</h1>
            <p class="mb-5 animate-up lead">Faruk Guest House – top rated guest house with premium facilities at an affordable price.</p>
            <div class="animate-up">
                <a href="{{route('frontend.room')}}" class="btn btn-premium btn-lg me-3">Explore Rooms</a>
                <a href="{{route('frontend.contact')}}" class="btn btn-outline-light btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Booking Search Bar (Overlay) -->
<div class="container" style="margin-top: -60px; position: relative; z-index: 99;">
    <div class="bg-white shadow-lg p-4 rounded-0 border-top border-5" style="border-color: var(--primary-color) !important;">
        <form action="#" class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-6">
                <label class="form-label small fw-bold text-uppercase">Check In</label>
                <input type="date" class="form-control form-control-lg border-0 bg-light rounded-0">
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="form-label small fw-bold text-uppercase">Check Out</label>
                <input type="date" class="form-control form-control-lg border-0 bg-light rounded-0">
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="form-label small fw-bold text-uppercase">Guests</label>
                <select class="form-select form-control-lg border-0 bg-light rounded-0">
                    <option>1 Adult, 0 Child</option>
                    <option>2 Adults, 1 Child</option>
                    <option>Family Pack</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <button type="submit" class="btn btn-premium w-100 py-3 rounded-0">Check Availability</button>
            </div>
        </form>
    </div>
</div>

<!-- 3. Stats Section (Trust Builder) -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6 border-end border-md-end">
                <h2 class="fw-bold" style="color: var(--primary-color);">50+</h2>
                <p class="text-muted text-uppercase small">Luxury Rooms</p>
            </div>
            <div class="col-md-3 col-6 border-end-md">
                <h2 class="fw-bold" style="color: var(--primary-color);">10+</h2>
                <p class="text-muted text-uppercase small">Years Experience</p>
            </div>
            <div class="col-md-3 col-6 border-end border-md-end">
                <h2 class="fw-bold" style="color: var(--primary-color);">1200+</h2>
                <p class="text-muted text-uppercase small">Happy Guests</p>
            </div>
            <div class="col-md-3 col-6">
                <h2 class="fw-bold" style="color: var(--primary-color);">100%</h2>
                <p class="text-muted text-uppercase small">Satisfaction</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. Room Category Section (The Product) -->
<section id="rooms" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary-color); letter-spacing: 2px;">Accommodation</h6>
            <h2 class="display-5 fw-bold">Our Premium Rooms</h2>
            <div style="width: 80px; height: 3px; background: var(--primary-color); margin: 20px auto;"></div>
        </div>

        <div class="row g-4">

            @foreach ($allRoomData->take(6) as $item)
            <div class="col-md-4">
                <div class="card category-card h-100 border-0 shadow-sm room-card">
                    <div class="position-relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&q=60" class="card-img-top img-zoom" alt="Room">
                        <span class="position-absolute top-0 end-0 bg-dark text-white px-3 py-2 m-3 small shadow">Featured</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-2">Room No: {{ $item->room_no }}</h4>
                        <p class="text-muted mb-3"><i class="fa fa-bed me-2"></i>{{ $item->type->type }}</p>
                        <div class="d-flex justify-content-center gap-3 mb-4 text-muted small">
                            <span><i class="fa fa-wifi text-gold"></i> WiFi</span>
                            <span><i class="fa fa-snowflake text-gold"></i> AC</span>
                            <span><i class="fa fa-tv text-gold"></i> TV</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h5 class="mb-0 fw-bold">৳ {{ number_format($item->price) }} <small class="text-muted small">/Night</small></h5>
                            <a href="#" class="btn btn-outline-dark btn-sm px-4 rounded-0">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <div class="text-center mt-5">
            <a href="{{route('frontend.room')}}" class="btn btn-premium px-5 py-2 rounded-0 text-uppercase fw-bold" style="letter-spacing: 2px;">
                See All Rooms
            </a>
        </div>
    </div>
</section>

<!-- 5. Amenities / Why Choose Us -->
<section id="services" class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary-color);">Amenities</h6>
            <h2 class="display-5 fw-bold">Why Choose Faruk Guest House?</h2>
            <p class="text-muted">We provide the best hospitality services in the city.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="feature-box p-4 border text-center hover-box h-100">
                    <i class="fa-solid fa-wifi mb-3 fs-1 text-gold"></i>
                    <h5>Fast WiFi</h5>
                    <p class="small text-muted mb-0">High-speed connection in all rooms.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-box p-4 border text-center hover-box h-100">
                    <i class="fa-solid fa-utensils mb-3 fs-1 text-gold"></i>
                    <h5>Fine Dining</h5>
                    <p class="small text-muted mb-0">Delicious local & continental food.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-box p-4 border text-center hover-box h-100">
                    <i class="fa-solid fa-shield-halved mb-3 fs-1 text-gold"></i>
                    <h5>Top Security</h5>
                    <p class="small text-muted mb-0">CCTV & 24/7 security personnel.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-box p-4 border text-center hover-box h-100">
                    <i class="fa-solid fa-car mb-3 fs-1 text-gold"></i>
                    <h5>Secure Parking</h5>
                    <p class="small text-muted mb-0">Spacious parking for our guests.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Video Tour Section -->
<section class="video-banner">
    <div class="text-center text-white">
        <h6 class="text-uppercase mb-3" style="letter-spacing: 4px;">Experience the luxury</h6>
        <h2 class="display-5 fw-bold mb-4">Take A Virtual Tour</h2>
        <a href="#" class="play-btn mx-auto" data-bs-toggle="modal" data-bs-target="#videoModal">
            <i class="fa fa-play"></i>
        </a>
    </div>
</section>

<!-- 7. Special Offers Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary-color);">Promotions</h6>
            <h2 class="section-title display-5 fw-bold">Exclusive Offers</h2>
            <p class="text-muted">Special discounts for your memorable stay</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-5 border-start border-5 border-warning bg-light shadow-sm h-100">
                    <span class="badge bg-danger mb-3">Limited Offer</span>
                    <h3>Honeymoon Special Package</h3>
                    <p class="text-muted">Get 25% discount and free candle-light dinner on a 3-night stay.</p>
                    <a href="#" class="text-gold fw-bold text-decoration-none">Learn More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-5 border-start border-5 border-warning bg-light shadow-sm h-100">
                    <span class="badge bg-dark mb-3">Weekend Only</span>
                    <h3>Family Gateway Deal</h3>
                    <p class="text-muted">Book 2 rooms and get a free breakfast buffet for the whole family.</p>
                    <a href="#" class="text-gold fw-bold text-decoration-none">Learn More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Nearby Attractions -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary-color);">Explore</h6>
            <h2 class="section-title display-5 fw-bold">Nearby Attractions</h2>
            <p class="text-muted">Explore the beauty around Faruk Guest House</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="attraction-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600&q=60" class="w-100" style="height: 300px; object-fit: cover;">
                    <div class="attraction-overlay">
                        <h5>City Heritage Museum</h5>
                        <p class="small mb-0"><i class="fa fa-map-marker-alt me-2"></i> 2.5 KM Away</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="attraction-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1590603740183-980e7f6920eb?auto=format&fit=crop&w=600&q=60" class="w-100" style="height: 300px; object-fit: cover;">
                    <div class="attraction-overlay">
                        <h5>Grand Central Park</h5>
                        <p class="small mb-0"><i class="fa fa-map-marker-alt me-2"></i> 1.2 KM Away</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="attraction-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600&q=60" class="w-100" style="height: 300px; object-fit: cover;">
                    <div class="attraction-overlay">
                        <h5>The Golden Beach</h5>
                        <p class="small mb-0"><i class="fa fa-map-marker-alt me-2"></i> 5.0 KM Away</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding bg-light">
    <div class="container text-center mb-5">
        <h6 class="text-uppercase fw-bold text-gold">Gallery</h6>
        <h2 class="display-5 fw-bold">Moments at Faruk Guest House</h2>
        <div class="gold-divider"></div>
    </div>

    <div class="container">
        <div class="row g-3">
            <!-- Image 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item overflow-hidden shadow-sm">
                    <a class="my-gallery" data-gall="hotel-gallery" href="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=600&q=80" class="img-fluid w-100" alt="Gallery">
                        <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                    </a>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item overflow-hidden shadow-sm">
                    <a class="my-gallery" data-gall="hotel-gallery" href="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1200&q=80">
                        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=600&q=80" class="img-fluid w-100" alt="Gallery">
                        <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                    </a>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item overflow-hidden shadow-sm">
                    <a class="my-gallery" data-gall="hotel-gallery" href="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=1200&q=80">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=600&q=80" class="img-fluid w-100" alt="Gallery">
                        <div class="gallery-overlay"><i class="fas fa-search-plus"></i></div>
                    </a>
                </div>
            </div>


        </div>
       
    </div>
</section>
<!-- 9. Newsletter Section -->
<section class="newsletter-box py-5" style="background: var(--dark-color); color: white;">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="mb-3 display-6 fw-bold">Newsletter Subscription</h2>
                <p class="text-muted mb-4">Subscribe to get latest news and special offers from us.</p>
                <form class="d-flex gap-2">
                    <input type="email" class="form-control rounded-0 py-3 bg-transparent text-white border-secondary" placeholder="Your Email Address">
                    <button class="btn btn-premium px-4 rounded-0 text-nowrap">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark border-0">
            <div class="modal-body p-0 text-end">
                <button type="button" class="btn-close btn-close-white p-3" data-bs-dismiss="modal"></button>
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/FJ0r2DWqKMA" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- CSS Section - এই স্টাইলগুলো মাস্টার ফাইলে রাখা ভালো -->
<style>
    .gallery-item {
        position: relative;
        height: 250px;
    }
    .gallery-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: 0.5s ease;
    }
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(197, 160, 89, 0.7); /* Gold Overlay */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        opacity: 0;
        transition: 0.5s;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .text-gold { color: var(--primary-color) !important; }
    .img-zoom { transition: transform 0.5s ease; }
    .room-card:hover .img-zoom { transform: scale(1.1); }
    .hover-box { transition: 0.3s; }
    .hover-box:hover { background: var(--dark-color); color: white; }

    .video-banner {
        height: 400px;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1445019980597-93fa8acb246c?auto=format&fit=crop&w=1500&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .play-btn {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 25px;
        text-decoration: none;
        transition: 0.4s;
    }
    .play-btn:hover { background: white; color: var(--primary-color); transform: scale(1.1); }

    .attraction-card { position: relative; overflow: hidden; }
    .attraction-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        padding: 20px;
        color: white;
    }

    .animate-up { animation: fadeInUp 1s ease both; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    $(document).ready(function(){
        // Venobox initialization
        $('.my-gallery').venobox({
            framewidth : '800px',        // ডিফল্ট উইডথ
            border     : '5px',          // বর্ডার সাইজ
            bgcolor    : '#c5a059',      // গোল্ডেন থিম ব্যাকগ্রাউন্ড
            numeratio  : true,           // ছবি কত নম্বর তা দেখাবে (1/10)
            infinigall : true,           // শেষ ছবিতে গেলে আবার শুরুতে আসবে
            share      : ['facebook', 'twitter', 'linkedin'] // শেয়ার বাটন
        });
    });
</script>

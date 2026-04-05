@extends('frontend.master')
@section('content')
<!-- Category Section -->
    <section id="rooms" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--primary-color); letter-spacing: 2px;">Accommodation</h6>
            <h2 class="display-5 fw-bold">Our Premium Rooms</h2>
            <div style="width: 80px; height: 3px; background: var(--primary-color); margin: 20px auto;"></div>
        </div>
        <div class="row g-4">
            @foreach ($allRoomData as $item)
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
    </div>
</section>
@endsection

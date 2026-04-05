<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faruk Guest House | Premium Stay</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Playfair Display for headings & Montserrat for body) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #c5a059; /* Gold/Premium Color */
            --dark-color: #1a1a1a;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        h1, h2, h3, .navbar-brand {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar Customization */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color) !important;
            letter-spacing: 1px;
        }
        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            margin: 0 10px;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Hero Banner */
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                        url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero-content h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }
        .btn-premium {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 35px;
            border-radius: 0;
            border: none;
            transition: 0.4s;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .btn-premium:hover {
            background-color: #b38f48;
            color: white;
            box-shadow: 0 5px 15px rgba(197, 160, 89, 0.4);
        }

        /* Category Section */
        .section-padding {
            padding: 80px 0;
        }
        .category-card {
            border: none;
            border-radius: 0;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.4s;
        }
        .category-card:hover {
            transform: translateY(-10px);
        }
        .category-card img {
            height: 250px;
            object-fit: cover;
        }
        .price-tag {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Main Content / Features */
        .features-section {
            background-color: var(--light-bg);
        }
        .feature-box {
            text-align: center;
            padding: 30px;
        }
        .feature-box i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: #ccc;
            padding: 60px 0 20px;
        }
        footer h5 {
            color: white;
            margin-bottom: 25px;
        }
        .footer-link {
            color: #ccc;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: 0.3s;
        }
        .footer-link:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .hero-content h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">FARUK GUEST HOUSE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rooms">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <a href="#rooms" class="btn btn-premium ms-lg-4">Book Now</a>
            </div>
        </div>
    </nav>

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
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body p-4">
                        <h4 class="card-title">Deluxe Couple Room</h4>
                        <p class="card-text text-muted">Perfect for couples with AC and high-speed WiFi.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">৳ 2,500 / Night</span>
                            <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category 2 -->
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Executive Suite">
                    <div class="card-body p-4">
                        <h4 class="card-title">Executive Suite</h4>
                        <p class="card-text text-muted">A luxury stay with premium balcony view and mini bar.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">৳ 4,500 / Night</span>
                            <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category 3 -->
            <div class="col-md-4">
                <div class="card category-card">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60" class="card-img-top" alt="Family Room">
                    <div class="card-body p-4">
                        <h4 class="card-title">Family Luxury Pack</h4>
                        <p class="card-text text-muted">Spacious 2-bed room for family vacations.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price-tag">৳ 6,000 / Night</span>
                            <a href="#" class="btn btn-outline-dark btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="text-uppercase fw-bold">Faruk Guest House</h5>
                    <p class="small">Dedicated to providing you with a comfortable and luxurious stay. Your satisfaction is our priority.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5>Quick Links</h5>
                    <a href="#" class="footer-link">Home</a>
                    <a href="#" class="footer-link">Rooms</a>
                    <a href="#" class="footer-link">Special Offers</a>
                    <a href="#" class="footer-link">Reviews</a>
                </div>
                <div class="col-lg-3">
                    <h5>Categories</h5>
                    <a href="#" class="footer-link">Deluxe Room</a>
                    <a href="#" class="footer-link">Executive Suite</a>
                    <a href="#" class="footer-link">Family Room</a>
                    <a href="#" class="footer-link">Standard Room</a>
                </div>
                <div class="col-lg-3" id="contact">
                    <h5>Contact Us</h5>
                    <p class="small mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Street, Your City, Bangladesh</p>
                    <p class="small mb-2"><i class="fas fa-phone me-2"></i> +880 1234 567890</p>
                    <p class="small mb-2"><i class="fas fa-envelope me-2"></i> info@farukguesthouse.com</p>
                </div>
            </div>
            <hr class="mt-5" style="border-color: #444;">
            <div class="text-center mt-4">
                <p class="small mb-0">&copy; 2023 Faruk Guest House. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

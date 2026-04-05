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
<!-- Venobox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css" />

<!-- jQuery (যদি আগে থেকে না থাকে) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Venobox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.js"></script>
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
            <a class="navbar-brand" href="{{route('fronted.view')}}">FARUK GUEST HOUSE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('fronted.view')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('frontend.room')}}">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('frontend.about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('frontend.contact')}}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('frontend.contact')}}">Gallery</a></li>
                </ul>
                <a href="#rooms" class="btn btn-premium ms-lg-4">Book Now</a>
            </div>
        </div>
    </nav>

    @yield('content');

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

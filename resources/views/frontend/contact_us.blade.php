@extends('frontend.master') <!-- আপনার মেইন লেআউট ফাইলের নাম -->

@section('content')

<!-- Contact Hero Section -->
<section class="py-5 text-center" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1444201983204-c43cbd584d93?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; color: white;">
    <div class="container py-5">
        <h1 class="display-3 fw-bold mb-3">Get In Touch</h1>
        <p class="lead mb-0">We are here to assist you 24/7. Feel free to reach out for any inquiries.</p>
    </div>
</section>

<!-- Main Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">

            <!-- Left Side: Contact Information -->
            <div class="col-lg-5">
                <div class="pe-lg-5">
                    <h2 class="mb-4">Contact Information</h2>
                    <p class="text-muted mb-5">আপনার যেকোনো প্রশ্ন বা বুকিং সংক্রান্ত তথ্যের জন্য নিচের মাধ্যমগুলোতে আমাদের সাথে যোগাযোগ করতে পারেন।</p>

                    <!-- Info Box 1 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-light p-3 rounded-circle text-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-location-dot fs-4" style="color: var(--primary-color);"></i>
                            </div>
                        </div>
                        <div class="ms-4">
                            <h5 class="fw-bold">Our Location</h5>
                            <p class="text-muted mb-0">House #123, Road #45, Sector #07, Uttara, Dhaka-1230, Bangladesh</p>
                        </div>
                    </div>

                    <!-- Info Box 2 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-light p-3 rounded-circle text-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-phone fs-4" style="color: var(--primary-color);"></i>
                            </div>
                        </div>
                        <div class="ms-4">
                            <h5 class="fw-bold">Phone Number</h5>
                            <p class="text-muted mb-0">+880 1234 567890<br>+880 1987 654321</p>
                        </div>
                    </div>

                    <!-- Info Box 3 -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="bg-light p-3 rounded-circle text-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-envelope fs-4" style="color: var(--primary-color);"></i>
                            </div>
                        </div>
                        <div class="ms-4">
                            <h5 class="fw-bold">Email Address</h5>
                            <p class="text-muted mb-0">info@farukguesthouse.com<br>support@farukguesthouse.com</p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-5">
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-outline-dark rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-dark rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-dark rounded-circle" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg p-4 p-md-5">
                    <h3 class="mb-4 fw-bold">Send Us a Message</h3>
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form action="{{route('contact.send')}}" method="POST"> 
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Full Name</label>
                                <input type="text" name="name" class="form-control form-control-lg bg-light border-0 shadow-none" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg bg-light border-0 shadow-none" placeholder="Enter your email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase">Subject</label>
                                <input type="text" name="subject" class="form-control form-control-lg bg-light border-0 shadow-none" placeholder="How can we help?" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase">Your Message</label>
                                <textarea name="message" class="form-control bg-light border-0 shadow-none" rows="5" placeholder="Write your message here..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-premium btn-lg w-100 py-3 shadow">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Google Map Section -->
<section class="container-fluid p-0">
    <div style="width: 100%; height: 450px; filter: grayscale(100%) invert(92%) contrast(83%);">
        <!-- আপনার লোকেশনের গুগল ম্যাপ আইফ্রেম এখানে বসান -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.412497818318!2d90.3980315!3d23.8749712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c4233763f03b%3A0x6b460d37e28328c3!2sUttara!5e0!3m2!1sen!2sbd!4v1690000000000!5m2!1sen!2sbd"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

@endsection

<!-- Optional CSS: কন্টাক্ট পেজের জন্য আলাদা কিছু স্টাইল চাইলে এখানে দিতে পারেন -->
<style>
    .form-control:focus {
        background-color: #fff !important;
        border: 1px solid var(--primary-color) !important;
    }
    .section-padding {
        padding: 100px 0;
    }
</style>

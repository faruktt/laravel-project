<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #fb5a2d;
            color: rgb(253, 250, 250);
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header .logo {
            display: flex;
            align-items: center;
        }
        .header .logo img {
            height: 40px;
            margin-right: 10px;
        }
        .header .profile {
            display: flex;
            align-items: center;
        }
        .header .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .sidebar {
            height: calc(100vh - 60px); /* Full height minus header */
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .sidebar .card {
            margin-bottom: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .sidebar .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 10px;
        }
        .card-body a {
            text-decoration: none;
            color: #007bff;
        }
        .card-body a:hover {
            color: #0056b3;
        }
        .card-body i {
            font-size: 24px;
            color: #007bff;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/a.jpg') }}" alt="">
            <h5 class="mb-0">Ayat</h5>
        </div>
        <div class="profile">
            <img src="{{ asset('images/a.jpg') }}" alt="">

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-1 sidebar">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="dashboard.html" title="Dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('type.index') }}" title="Bookings">
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('roomstatus.index') }}" title="Bookings">
                            <i class="fa-solid fa-thermometer"></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('room.index') }}" title="Rooms">
                            <i class="fas fa-bed"></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <a href="{{ route('customer.index') }}" title="Customers">
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <a href="reports.html" title="Reports">
                            <i class="fas fa-chart-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-10 content">
               @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

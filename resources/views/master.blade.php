<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
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
        .notification-icon {
            font-size: 24px;
            color: #fff;
            margin-right: 10px;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
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
        .delete-btn {
            background: none;
            border: none;
            color: red;
            font-size: 16px;
            cursor: pointer;
        }
        .delete-btn:hover {
            color: darkred;
        }
        .active-link {
            border: 1px solid red !important; /* লাল বর্ডার */
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/a.jpg') }}" alt="Logo">
            <h5 class="mb-0">Ayat</h5>
        </div>
        <div class="profile">


            <!-- Notification Icon -->
            <div class="notification-icon position-relative" onclick="showNotifications()">
                <i class="fas fa-bell"></i>

                @php
                    $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
                @endphp

                @if($unreadCount > 0)
                    <span class="badge position-absolute top-3 start-80 translate-middle">
                        {{ $unreadCount }}
                    </span>
                @endif
            </div>
            <img src="{{ asset('images/a.jpg') }}" alt="Profile Image">
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="card {{ request()->is('customer-chart') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('customer.chart')}}" title="Dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card {{ request()->is('type') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('type.index')}}" title="Bookings">
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
                <div class="card {{ request()->is('roomstatus') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('roomstatus.index')}}" title="Bookings">
                            <i class="fa-solid fa-thermometer"></i>
                        </a>
                    </div>
                </div>
                <div class="card {{ request()->is('room') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('room.index')}}" title="Rooms">
                            <i class="fas fa-bed"></i>
                        </a>
                    </div>
                </div>
                <div class="card {{ request()->is('customer') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('customer.index')}}"  title="Customers">
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
                <div class="card {{ request()->is('viewcustomer') ? 'active-link' : '' }}">
                    <div class="card-body text-center">
                        <a href="{{ route('viewcustomer.index')}}" title="Reports">
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
    <!-- Notification Modal -->

<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">আপনার নোটিফিকেশন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="notificationBody" style="max-height: 400px; overflow-y: auto;">


                <!-- notification loading -->
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

    <!-- Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

    <script>
    function showNotifications() {
        fetch("{{ route('notifications') }}")
            .then(response => response.json())
            .then(data => {
                let notificationList = '<ul class="list-group">';
                data.notifications.forEach(notification => {
                    notificationList += ` <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="${notification.link}" target="_blank">${notification.message}</a>
                                <a href="" class="delete-btn">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </li>`;
                });
                notificationList += '</ul>';

                // Modal-এর body-তে নোটিফিকেশন সেট করুন
                document.getElementById("notificationBody").innerHTML = notificationList;

                // Modal ওপেন করুন
                let notificationModal = new bootstrap.Modal(document.getElementById("notificationModal"));
                notificationModal.show();

                
                markNotificationsAsRead();
            });
    }

    function markNotificationsAsRead() {
        fetch("{{ route('notifications.markAsRead') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            }
        }).then(response => response.json())
          .then(() => {
              let badge = document.querySelector(".notification-icon .badge");
              if (badge) badge.style.display = "none";
          });
    }

    </script>

</body>
</html>

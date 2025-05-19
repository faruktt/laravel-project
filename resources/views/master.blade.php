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

        .position-fixed {
    z-index: 100; /* To ensure it stays on top */
}

body {
    transition: background-color 0.3s, color 0.3s;
}
.main {
    transition: background-color 0.3s, color 0.3s;
}
.semi-dark-sidebar {
    background-color: #333;
    color: white;
}



.side {
    position: fixed;
    top: 0;
    right: -100%;
    width: 350px;
    height: 100%;
    background: #fff;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
    transition: right 0.3s ease-in-out;
    overflow-y: auto;
    z-index: 1000;
}

.side.show {
    right: 0;
}

.side-header {
    padding: 15px 20px;
    border-bottom: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
}





.side-content {
    padding: 20px;
}

.section {
    margin-bottom: 20px;
}

.section h5 {
    font-size: 16px;
    margin-bottom: 10px;
    color: #333;
}

.option-group {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
    justify-content: space-around;
}

.option {
    width: 100px;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 10px;
    background: #f9f9f9;
    cursor: pointer;
    transition: all 0.3s ease;
}

.option i {
    font-size: 24px;
    margin-bottom: 5px;
    color: #666;
}

.option p {
    margin: 0;
    font-size: 14px;
    color: #333;
}

.option.active {
    border-color: #007bff;
    background: #e7f1ff;
    color: #007bff;
}

.option.active i {
    color: #007bff;
}

.option:hover {
    background: #f0f0f0;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(88, 87, 87, 0.5);
    display: none;
    z-index: 999;
}

.overlay.show {
    display: block;
}




    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/a.jpg') }}" alt="Logo">
            <h5 class="mb-0">Hotel

            </h5>
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


<div class="position-fixed" style="bottom: 50%; right: -2px;">
    <button id="settingsBtn" class="btn btn-primary shadow" style="width: 50px; height: 50px;">
        <i class="fas fa-cog"></i>
    </button>
</div>




<!-- Sidebar -->
<div id="side" class="side">
    <div class="side-header">
    <div>
        <h3>Template Customizer</h3>
        <h6>Customize and preview in real time</h6>
    </div>
        <button id="closeBtn" class="btn btn-danger btn-sm close-btn" >X</button>
    </div>
    <div class="side-content">
        <!-- Theming Section -->
        <div class="section">
            <h5>Theming</h5>
            <label>Style (Mode):</label>
            <div class="option-group">
                <div class="option active">
                    <i class="fas fa-sun"></i>
                    <p>Light</p>
                </div>
                <div class="option">
                    <i class="fas fa-moon"></i>
                    <p>Dark</p>
                </div>
                <div class="option">
                    <i class="fas fa-desktop"></i>
                    <p>System</p>
                </div>
            </div>
            <label>Themes:</label>
            <div class="option-group">
                <div class="option active">
                    <i class="fas fa-border-all"></i>
                    <p>Default</p>
                </div>
                <div class="option">
                    <i class="fas fa-border-style"></i>
                    <p>Bordered</p>
                </div>
                <div class="option">
                    <i class="fas fa-adjust"></i>
                    <p>Semi Dark</p>
                </div>
            </div>
        </div>

        <!-- Layout Section -->
        <div class="section">
            <h5>Layout</h5>
            <label>Menu (Navigation):</label>
            <div class="option-group">
                <div class="option active">
                    <i class="fas fa-bars"></i>
                    <p>Expanded</p>
                </div>
                <div class="option">
                    <i class="fas fa-bars-staggered"></i>
                    <p>Collapsed</p>
                </div>
            </div>
            <label>Navbar Type:</label>
            <div class="option-group">
                <div class="option active">
                    <i class="fas fa-thumbtack"></i>
                    <p>Sticky</p>
                </div>
                <div class="option">
                    <i class="fas fa-arrows-alt-h"></i>
                    <p>Static</p>
                </div>
                <div class="option">
                    <i class="fas fa-eye-slash"></i>
                    <p>Hidden</p>
                </div>
            </div>
            <label>Content:</label>
            <div class="option-group">
                <div class="option active">
                    <i class="fas fa-compress"></i>
                    <p>Compact</p>
                </div>
                <div class="option">
                    <i class="fas fa-expand"></i>
                    <p>Wide</p>
                </div>
            </div>
        </div>
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
                <!-- নোটিফিকেশন লোড হবে এখানে -->
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

                // নোটিফিকেশন পড়ার পর ব্যাজ আপডেট করতে সার্ভারে পাঠাও
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
<script>

    // Floating button click event
    document.getElementById('settingsBtn').addEventListener('click', function () {
        document.getElementById('side').classList.add('show'); // Show sidebar
        createOverlay(); // Show overlay
    });

    // Close button click event
    document.getElementById('closeBtn').addEventListener('click', function () {
        document.getElementById('side').classList.remove('show'); // Hide sidebar
        removeOverlay(); // Hide overlay
    });

    // Overlay click event
    function createOverlay() {
        let overlay = document.createElement('div');
        overlay.id = 'overlay';
        overlay.classList.add('overlay', 'show');
        overlay.addEventListener('click', function () {
            document.getElementById('side').classList.remove('show'); // Hide sidebar
            removeOverlay(); // Remove overlay
        });
        document.body.appendChild(overlay);
    }

    // Remove overlay
    function removeOverlay() {
        let overlay = document.getElementById('overlay');
        if (overlay) {
            overlay.parentNode.removeChild(overlay);
        }
    }

    // Theme switching logic


    document.querySelectorAll('.option-group .option').forEach(option => {
        option.addEventListener('click', function () {
            // Remove active class from all options
            document.querySelectorAll('.option-group .option').forEach(opt => opt.classList.remove('active'));

            // Add active class to the clicked option
            this.classList.add('active');

            // Apply dark or light mode based on clicked option
            if (this.querySelector('p').textContent === 'Dark') {
                document.body.style.backgroundColor = '#333'; // Dark mode
                document.body.style.color = '#fff'; // Text color for dark mode
                document.querySelector('.main').style.backgroundColor = '#333'; // Dark mode for .main
                document.querySelector('.main').style.color = '#fff'; // Text color for dark mode in .main
            } else if (this.querySelector('p').textContent === 'Light') {
                document.body.style.backgroundColor = '#fff'; // Light mode
                document.body.style.color = '#000'; // Text color for light mode
                document.querySelector('.main').style.backgroundColor = '#fff'; // Light mode for .main
                document.querySelector('.main').style.color = '#000'; // Text color for light mode in .main
            }
        });
    });



</script>
</body>
</html>

@extends('master')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .containers {
            margin-top: -20px;
            height: 100px; /* Reduced height */
            overflow: hidden;
        }

        .progress-indicator {
            display: flex;
            justify-content: space-between;
            padding: 0;
            list-style: none;
            position: relative;
        }
        .progress-indicator::before {
            content: "";
            position: absolute;
            top: 28%;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #ddd;
            transform: translateY(-50%);
            z-index: 0;
        }
        .progress-indicator li {
            position: relative;
            text-align: center;
            flex: 1;
            font-size: 14px;
            color: #999;
            font-weight: 600;
        }
        .progress-indicator .bubble {
            width: 25px;
            height: 25px;
            background: #ddd;
            border-radius: 50%;
            display: block;
            margin: 0 auto 5px;
            position: relative;
            z-index: 1;
        }
        .progress-indicator li.completed {
            color: #28a745;
        }
        .progress-indicator li.completed .bubble {
            background: #28a745;
        }
        .progress-indicator li.completed + li::before {
            background: #28a745;
        }
        .profile-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-card img {
            border-radius: 0;
            display: block;
            margin: 0 auto;
            width: 200px;
            height: 200px;
        }
        .profile-card p {
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .profile-card h5 {
            text-align: center;
        }
        .hidden {
            display: none;
        }

    </style>

<div class="container mt-4">
    <!-- Step Progress -->
    <div class="containers">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="progress-indicator m-0">
                        <li class="completed">
                            <span class="bubble"></span> Identity Card
                        </li>
                        <li>
                            <span class="bubble"></span> How many person?
                        </li>
                        <li>
                            <span class="bubble"></span> Pick a room
                        </li>
                        <li>
                            <span class="bubble"></span> Confirmation
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Form Section -->
        <div class="col-md-8">
            <div class="card p-3">
                <form action="{{ route('customer.store') }}" method="POST" id="bookingForm">
                    @csrf
                    <!-- Step 1: Customer Information -->
                    <div id="step-1">
                        <div class="mb-1">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-1">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-1">
                            <label>Phone:</label>
                            <input type="number" name="phone" class="form-control" id="number" required>
                        </div>
                        <div class="mb-1">
                            <label>Job:</label>
                            <input type="text" name="job" class="form-control" id="job" required>
                        </div>
                        <div class="mb-1">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>

                    <!-- Step 2: Number of Persons -->
                    <div id="step-2" class="d-none">
                        <div class="mb-2">
                            <label>Number of Persons:</label>
                            <input type="number" name="persons" class="form-control" id="persons" required>
                        </div>
                        <div class="mb-2">
                            <label>From:</label>
                            <input type="date" name="from_date" class="form-control" id="from_date" required>
                        </div>
                        <div class="mb-2">
                            <label>Until:</label>
                            <input type="date" name="until_date" class="form-control" id="until_date" required>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>

                  <!-- Step 3: Room Selection -->
<div id="step-3" class="d-none">
    <div class="row" id="room-list">
        @foreach ($rooms as $singleCData)
            <div class="col-md-4">
                <div class="card" onclick="selectRoom({{ $singleCData->id }}, {{ $singleCData->price }})">
                    <div class="card-body">
                        <h5 class="card-title">Room: {{ $singleCData->room_no }}</h5>
                        <p class="card-text">Price: {{ $singleCData->price }} BDT</p>
                        <p class="card-text">Capacity: {{ $singleCData->capacity }} Persons</p>
                        <p class="card-text">View: {{ $singleCData->view }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
    <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
</div>

<!-- Hidden Input for Selected Room -->
<input type="hidden" id="selected-room-id" name="room_id">

                    <!-- Step 4: Confirmation & Payment -->
                    <div id="step-4" class="d-none">
                        <h5>Payment Information</h5>
                        <div class="mb-2">
                            <label>From:</label>
                            <input type="text" class="form-control" id="from_date_display" readonly>
                        </div>
                        <div class="mb-2">
                            <label>Until:</label>
                            <input type="text" class="form-control" id="until_date_display" readonly>
                        </div>
                        <div class="mb-2">
                            <label>Days</label>
                            <input type="text" class="form-control" id="day" readonly>
                        </div>
                        <div class="mb-2">
                            <label>Price/Day</label>
                            <input type="text" class="form-control" id="price" readonly>
                        </div>
                        <div class="mb-2">
                            <label>Total Price</label>
                            <input type="text" name="total_price" class="form-control" id="total" readonly>
                        </div>
                        <div class="mb-2">
                            <label>Payment</label>
                            <input type="number" name="payment" class="form-control" id="payment" required oninput="calculateBalance()">
                        </div>
                        <div class="mb-2">
                            <label>Insufficient Balance</label>
                            <input type="text" name="insufficient_balance" class="form-control" id="balance" readonly>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>

        <!-- Profile Section (Hidden Initially) -->
        <div class="col-md-4">
            <div id="profile-card" class="profile-card hidden">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Avatar">
                <h5 id="profile-name"></h5>
                <p id="profile-email"></p>
                <p id="profile-phone"></p>
                <p id="profile-job"></p>
                <p id="profile-address"></p>
            </div>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    const steps = document.querySelectorAll('.progress-indicator li');

    function updateProgress() {
        steps.forEach((step, index) => {
            if (index < currentStep) {
                step.classList.add('completed');
            } else {
                step.classList.remove('completed');
            }
        });
    }

    function nextStep() {
        if (currentStep < 4) {
            document.getElementById('step-' + currentStep).classList.add('d-none');
            currentStep++;
            document.getElementById('step-' + currentStep).classList.remove('d-none');
            updateProgress();

            // Show profile after filling customer information
            if (currentStep === 2) {
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('number').value;
                let job = document.getElementById('job').value;
                let address = document.getElementById('address').value;

                if (name && email && phone && job && address) {
                    document.getElementById('profile-card').classList.remove('hidden');
                    document.getElementById('profile-name').innerText = name;
                    document.getElementById('profile-email').innerText = "📧 " + email;
                    document.getElementById('profile-phone').innerText = "📞 " + phone;
                    document.getElementById('profile-job').innerText = "💼 " + job;
                    document.getElementById('profile-address').innerText = "📍 " + address;
                }
            }
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            document.getElementById('step-' + currentStep).classList.add('d-none');
            currentStep--;
            document.getElementById('step-' + currentStep).classList.remove('d-none');
            updateProgress();
        }
    }

    // Step-4 calculation
    let selectedRoomPrice = 0; // Store selected room price

    function selectRoom(roomId, price) {
    // Store selected room price
    selectedRoomPrice = parseFloat(price);

    // Ensure that dates are selected before proceeding
    let fromDate = document.getElementById('from_date').value;
    let untilDate = document.getElementById('until_date').value;

    if (!fromDate || !untilDate) {
        alert("Please select dates first.");
        return;
    }

    // Calculate days difference
    let from = new Date(fromDate);
    let until = new Date(untilDate);
    let timeDiff = until.getTime() - from.getTime();
    let days = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convert milliseconds to days

    if (days <= 0) {
        alert("Check-out date must be after check-in date.");
        return;
    }

    // Calculate total price
    let totalPrice = days * selectedRoomPrice;

    // Set the selected room's ID in the hidden input field
    document.getElementById('selected-room-id').value = roomId;

    // Display values in Step 4
    document.getElementById('from_date_display').value = fromDate;
    document.getElementById('until_date_display').value = untilDate;
    document.getElementById('day').value = days;
    document.getElementById('price').value = selectedRoomPrice + " BDT";
    document.getElementById('total').value = totalPrice + " BDT";

    // Show Step 4 and hide Step 3
    document.getElementById('step-3').classList.add('d-none');
    document.getElementById('step-4').classList.remove('d-none');

    currentStep = 4;
    updateProgress();

    // Automatically move to Step 4 after room selection and calculation
    nextStep();
}


    // Function to calculate remaining balance
    function calculateBalance() {
        let total = parseFloat(document.getElementById('total').value);
        let payment = parseFloat(document.getElementById('payment').value);

        if (isNaN(payment)) {
            payment = 0;
        }

        let balance = total - payment;

        document.getElementById('balance').value = balance + " BDT";
    }
</script>




@endsection

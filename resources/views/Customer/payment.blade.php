@extends('master')

@section('content')
<div class="container mt-4">
    <h5>Payment Information</h5>
    <div class="row">
        <!-- Left side form -->
        <div class="col-md-8">
            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label>From:</label>
                    <input type="text" class="form-control" id="from_date_display" value="{{ $customer->from_date }}" readonly>
                </div>

                <div class="mb-2">
                    <label>Until:</label>
                    <input type="text" class="form-control" id="until_date_display" value="{{ $customer->until_date }}" readonly>
                </div>

                <div class="mb-2">
                    <label>Days</label>
                    <input type="text" class="form-control" id="day" value="{{ \Carbon\Carbon::parse($customer->from_date)->diffInDays(\Carbon\Carbon::parse($customer->until_date)) }}" readonly>

                </div>

                <div class="mb-2">
                    <label>Price/Day</label>
                    <input type="text" class="form-control" id="price" value="{{ $customer->Roomname->price }}" readonly>
                </div>

                <div class="mb-2">
                    <label>Total Price</label>
                    <input type="text" name="total_price" class="form-control" id="total" value="{{ $customer->total_price }}" readonly>
                </div>
                <div class="mb-2">
                    <label>Insufficient Balance</label>
                    <input type="text" name="insufficient_balance" class="form-control" id="balance" value="{{ $customer->insufficient_balance }}" readonly>
                </div>

                <div class="mb-2">
                    <label>Payment</label>
                    <input type="number" name="payment" class="form-control" id="payment" required oninput="calculateBalance()">
                </div>



                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>

        <!-- Right side customer info -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Customer Image" class="img-fluid rounded-circle" style="max-width: 100px;">
                    <h5 class="mt-3">{{ $customer->name }}</h5>
                    <p class="mb-1"><strong>Email:</strong> {{ $customer->email }}</p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $customer->phone }}</p>
                    <p class="mb-1"><strong>Job:</strong> {{ $customer->job }}</p>
                    <p><strong>Address:</strong> {{ $customer->address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateBalance() {
    
        let initialBalance = parseFloat("{{ $customer->insufficient_balance }}") || 0;
        let payment = parseFloat(document.getElementById('payment').value) || 0;

        let newBalance = initialBalance - payment;
        document.getElementById('balance').value = newBalance < 0 ? 0 : newBalance;
    }
</script>


@endsection

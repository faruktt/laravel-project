@extends('master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- বাম পাশে কাস্টমার লিস্ট -->
        <div class="col-md-6">
            <h4>Customer List</h4>
            <form id="filterForm" class="mb-3">
                <label for="date">Filter by Date:</label>
                <input type="date" id="date" name="date" class="form-control">
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="customerTableBody">
                    <!-- Data will be loaded dynamically -->
                </tbody>
            </table>
        </div>

        <!-- ডান পাশে চার্ট -->
        <div class="col-md-6">
            <h4>Customer Growth Chart</h4>
            <canvas id="customerChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        loadCustomers();
        loadChart();

        // তারিখ পরিবর্তন হলে নতুন ডেটা লোড হবে
        document.getElementById('date').addEventListener('change', function () {
            loadCustomers(this.value);
        });
    });

    function loadCustomers(date = '') {
        fetch("{{ route('customer.list') }}?date=" + date)
            .then(response => response.json())
            .then(data => {
                let customerTableBody = document.getElementById('customerTableBody');
                customerTableBody.innerHTML = '';

                data.customers.forEach(customer => {
                    customerTableBody.innerHTML += `
                        <tr>
                            <td>${customer.name}</td>
                            <td>${customer.email}</td>
                            <td>${customer.date}</td>
                        </tr>
                    `;
                });
            });
    }

    function loadChart() {
        fetch("{{ route('customer.chart') }}")
            .then(response => response.json())
            .then(data => {
                let ctx = document.getElementById('customerChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.dates,
                        datasets: [{
                            label: 'New Customers',
                            data: data.counts,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    }
</script>
@endsection

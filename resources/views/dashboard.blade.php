@extends('master')

@section('content')
<div class="container mt-4">
    <div class="row">

        <div class="col-md-6">
            <h4>Customer List</h4>
            <form id="filterForm" class="mb-3">
                <label for="date">Filter by Date:</label>
                <input type="date" id="date" name="date" class="form-control">
            </form>




            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="customerTableBody">
                    <!-- Data will be loaded dynamically -->
                </tbody>
            </table>

            <!-- Pagination controls -->
            <div id="paginationControls">

            </div>
        </div>


        <div class="col-md-6">
            <h4>Customer Growth Chart</h4>
            <canvas id="customerChart"></canvas>
            <script>
                fetch('/customer-data')
                    .then(response => response.json())
                    .then(data => {

                        let labels = data.map(item => item.date);
                        let totalCustomers = data.map(item => item.total_customers);
                        let totalPrice = data.map(item => item.total_price);
                        let totalPayment = data.map(item => item.total_payment);
                        let insufficientBalance = data.map(item => item.insufficient_balance);

                        let ctx = document.getElementById('customerChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',  // Line chart type
                            data: {
                                labels: labels,  // X-axis: Dates
                                datasets: [
                                    {
                                        label: 'Total Customers',  
                                        data: totalCustomers,
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderWidth: 2,
                                        tension: 0.3
                                    },
                                    {
                                        label: 'Total Price',
                                        data: totalPrice,
                                        borderColor: 'rgba(255, 206, 86, 1)',
                                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                        borderWidth: 2,
                                        tension: 0.3
                                    },
                                    {
                                        label: 'Total Payment',
                                        data: totalPayment,
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2,
                                        tension: 0.3
                                    },
                                    {
                                        label: 'Insufficient Balance',
                                        data: insufficientBalance,
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderWidth: 2,
                                        tension: 0.3
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true // Y-axis শুরু হবে শূন্য থেকে
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error loading chart data:', error));  // Error handling
            </script>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let currentPage = 1;

    document.addEventListener("DOMContentLoaded", function () {
        // Initially load customers
        loadCustomers();

        // When date is changed, load customers based on the selected date
        document.getElementById('date').addEventListener('change', function () {
            loadCustomers(1, this.value); // Reset to page 1 when date is changed
        });
    });

    // Function to load customers and handle pagination
    function loadCustomers(page = 1, date = '') {
        fetch("{{ route('customer.list') }}?date=" + date + "&page=" + page)
            .then(response => response.json())
            .then(data => {
                let customerTableBody = document.getElementById('customerTableBody');
                customerTableBody.innerHTML = '';  // Clear the table

                if (data.customers && data.customers.length > 0) {
                    data.customers.forEach((customer, index) => {
                        // Format the date
                        let formattedDate = new Date(customer.date).toLocaleDateString();

                        customerTableBody.innerHTML += `
                            <tr>
                                <td>${(data.current_page - 1) * 5 + index + 1}</td>
                                <td>${customer.name}</td>
                                <td>${customer.email}</td>
                                <td>${formattedDate}</td>
                            </tr>
                        `;
                    });
                } else {
                    customerTableBody.innerHTML = `<tr><td colspan="4" class="text-center">No customers found.</td></tr>`;
                }

                // Update pagination controls
                updatePagination(data.current_page, data.last_page);
            });
    }

    // Function to update the pagination controls
    function updatePagination(currentPage, lastPage) {
        let paginationControls = document.getElementById('paginationControls');
        paginationControls.innerHTML = '';

        if (currentPage > 1) {
            paginationControls.innerHTML += `<button class="btn btn-primary" onclick="loadCustomers(${currentPage - 1})">Previous</button>`;
        }

        if (currentPage < lastPage) {
            paginationControls.innerHTML += `<button class="btn btn-primary" onclick="loadCustomers(${currentPage + 1})">Next</button>`;
        }
    }
</script>
@endsection

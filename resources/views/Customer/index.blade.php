@extends('master')

@section('content')
    <!-- Add in the <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css" integrity="sha512-58P9Hy7II0YeXLv+iFiLCv1rtLW47xmiRpC1oFafeKNShp8V5bKV/ciVtYqbk2YfxXQMt58DjNfkXFOn62xE+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Customer({{ $allCustomer }})</h3>
                     <div class="mb-0">
                        <!-- Search Box -->
                     <form method="GET" action="{{ route('customer.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="phone" class="form-control" placeholder="Search By Phone Number" value="{{ request('phone') }}">
                            <button class="btn btn-" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                     </div>
                    <a class="btn btn-success btn-sm" href="{{ route('customer.create') }}">
                        <i class="bi bi-plus"></i> Add
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card-body">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Job</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->job }}</td>
                                    <td>{{ $customer->address }}</td>

                                    <td>
                                        @if ($customer->insufficient_balance > 0)
                                            <a href="{{ route('customer.edit', $customer->id) }}" class="text-success fs-5">
                                                <i class="fa-solid fa-money-bill-wave"></i>
                                            </a>
                                        @else
                                            <i class="fa-solid fa-money-bill-wave text-secondary fs-5" style="opacity: 0.5; cursor: not-allowed;"></i>
                                        @endif

                                        <!-- Delete Icon with Form -->
                                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger" style="background:none; border:none;">
                                                <i class="fa-solid fa-trash-can" style="color: red; margin-left: 10px;"></i> <!-- added margin-left -->
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $allCustomers->links() }}
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add before the closing </body> tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

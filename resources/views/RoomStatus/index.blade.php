@extends('master')

@section('content')
<!-- Add in the <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Room Status</h3>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus"></i> Add
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>RoomStatus</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statusData as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->roomstatus }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge bg-success"></i> Active</span>
                                @else
                                    <span class="badge bg-danger"></i> Inactive</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <a href="" class=" text-white btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Delete Button -->
                                <a href="" class="btn btn-sm">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </a>

                                <!-- Active/Inactive Button -->
                                @if($item->status == 'active')
                                    <a href="" class="btn btn-sm">
                                        <i class="fa-solid fa-eye"></i> Active
                                    </a>
                                @else
                                    <a href="" class="btn btn-sm">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        <!-- Add dynamic rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Roomstatus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('roomstatus.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="typeName" class="form-label">Status </label>
                        <input type="text" name="roomstatus" id="typeName" class="form-control" placeholder="Enter Status" required>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
 <!-- Add before the closing </body> tag -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

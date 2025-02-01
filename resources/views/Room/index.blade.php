@extends('master')

@section('content')
<!-- Add in the <head> section -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Room</h3>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus"></i> Add
                </button>
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
                            <th>SL</th>
                            <th>ROOM NO</th>
                            <th>TYPE</th>
                            <th>CAPACITY</th>
                            <th>PRICE/DAY</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allRoomData as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->room_no }}</td>
                            <td>{{ $item->type->type }}</td>
                            <td>{{ $item->capacity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-primary text-white btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger text-white btn-sm">Delete</a>
                                <a href="#" class="btn btn-info text-white btn-sm">Active</a>
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
                <h5 class="modal-title" id="addModalLabel">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('room.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-6 custom-select2-form">
                        <label for="type_id">Type<span class="text-danger"></span>
                        </label>
                        <select name="type_id" id="type_id" class="form-select select2" required>
                            <option value="" selected disabled>Select Type</option>
                            @foreach ($typeData as $category)
                            @if(isset($category) && $category != null)
                            <option value="{{  $category->id }}">{{  $category->type}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6 custom-select2-form">
                        <label for="status_id">Status<span class="text-danger"></span>
                        </label>
                        <select name="status_id" id="status_id" class="form-select select2" required>
                            <option value="" selected disabled>Select Status</option>
                            @foreach ($satusData as $category)
                            @if(isset($category) && $category != null)
                            <option value="{{  $category->id }}">{{  $category->roomstatus}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="room_no" class="form-label">Room No </label>
                        <input type="text" name="room_no" id="room_no" class="form-control" placeholder="Enter Status" required>
                    </div>
                    <div class="mb-6">
                        <label for="capacity" class="form-label">Capacity </label>
                        <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Enter Status" required>
                    </div>
                    <div class="mb-6">
                        <label for="price" class="form-label">Price/Day </label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Enter Status" required>
                    </div>
                    <div class="mb-6">
                        <label for="view" class="form-label">View </label>
                        <textarea name="view" id="" class="form-control"></textarea>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#type_id").select2({
        dropdownParent: $('#addModal')
    });
</script>

 <!-- Add before the closing </body> tag -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

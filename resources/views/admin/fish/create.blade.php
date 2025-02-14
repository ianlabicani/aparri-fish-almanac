@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <h2>Add New Fish Species</h2>
        <form action="{{ route('admin.fish.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image">Fish Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Scientific Name</label>
                <input type="text" name="scientific_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">English Name</label>
                <input type="text" name="english_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Local Name</label>
                <input type="text" name="local_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fishing Ground</label>
                <input type="text" name="fishing_ground" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Species</button>
        </form>
    </div>
@endsection

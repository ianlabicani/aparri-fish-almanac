@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <h2>Edit Fish Species</h2>
        <form action="{{ route('admin.fish.update', $fish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Current Image:</label><br>
                <img src="{{ $fish->image ? asset('storage/' . $fish->image) : asset('images/img-placeholder.png') }}"
                    alt="Fish Image" class="img-thumbnail" width="150">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload New Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Scientific Name</label>
                <input type="text" name="scientific_name" class="form-control" value="{{ $fish->scientific_name }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">English Name</label>
                <input type="text" name="english_name" class="form-control" value="{{ $fish->english_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Local Name</label>
                <input type="text" name="local_name" class="form-control" value="{{ $fish->local_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Fishing Ground</label>
                <input type="text" name="fishing_ground" class="form-control" value="{{ $fish->fishing_ground }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $fish->description ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Species</button>
            <a href="{{ route('admin.fish.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

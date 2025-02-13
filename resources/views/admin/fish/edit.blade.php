@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <h2>Edit Fish Species</h2>
        <form action="{{ route('admin.fish.update', $fish->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Scientific Name</label>
                <input type="text" name="scientific_name" class="form-control" value="{{ $fish->scientific_name }}" required>
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

            <button type="submit" class="btn btn-success">Update Species</button>
        </form>
    </div>
@endsection

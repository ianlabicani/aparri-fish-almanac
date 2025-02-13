@extends('admin.shell')

@section('content')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h2 class="mb-3">Add Fish Family</h2>

        <div class="card shadow-sm p-4" style="width: 400px;">
            <form action="{{ route('admin.fish-family.store') }}" method="POST">
                @csrf

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Fish Family Name</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container d-flex flex-column align-items-center mt-4">
        <h2 class="mb-3">Fish Families</h2>
        <a href="{{ route('admin.fish-family.create') }}" class="btn btn-primary mb-3">Add New Family</a>

        <div class="table-responsive" style="max-width: 600px;">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fishFamilies as $fishFamily)
                        <tr>
                            <td>{{ $fishFamily->name }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin.fish-family.edit', $fishFamily->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>
                                <form action="{{ route('admin.fish-family.destroy', $fishFamily->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

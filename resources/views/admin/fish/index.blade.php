@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <h2>Fish Species</h2>
        <a href="{{ route('admin.fish.create') }}" class="btn btn-primary mb-3">Add New Species</a>
        <form method="GET" action="{{ route('admin.fish.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search fish..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Scientific Name</th>
                    <th>English Name</th>
                    <th>Local Name</th>
                    <th>Fishing Ground</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fish as $f)
                    <tr>
                        <td>{{ $f->scientific_name }}</td>
                        <td>{{ $f->english_name }}</td>
                        <td>{{ $f->local_name }}</td>
                        <td>{{ $f->fishing_ground }}</td>
                        <td>
                            <a href="{{ route('admin.fish.edit', $f->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('admin.fish.show', $f->id) }}" class="btn btn-info btn-sm">View</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteFishModal" data-id="{{ $f->id }}"
                                data-name="{{ $f->scientific_name }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $fish->links() }}
        </div>

    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteFishModal" tabindex="-1" aria-labelledby="deleteFishModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteFishModalLabel">Confirm Deletion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Type the name of the fish <strong><span id="fishNamePlaceholder"></span></strong> to confirm
                        deletion:</p>
                    <input type="text" id="confirmFishInput" class="form-control" placeholder="Enter fish name" required
                        autocomplete="off">
                    <div class="invalid-feedback">Name does not match!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form id="deleteFishForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="confirmDeleteButton" disabled>Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deleteModal = document.getElementById("deleteFishModal");
            let confirmFishInput = document.getElementById("confirmFishInput");
            let confirmDeleteButton = document.getElementById("confirmDeleteButton");
            let deleteFishForm = document.getElementById("deleteFishForm");
            let fishNamePlaceholder = document.getElementById("fishNamePlaceholder");

            deleteModal.addEventListener("show.bs.modal", function(event) {
                let button = event.relatedTarget;
                let fishName = button.getAttribute("data-name");
                let fishId = button.getAttribute("data-id");

                fishNamePlaceholder.textContent = fishName;
                deleteFishForm.setAttribute("action", `/admin/fish/${fishId}`);

                confirmFishInput.value = "";
                confirmFishInput.classList.remove("is-invalid");
                confirmDeleteButton.disabled = true;

                confirmFishInput.addEventListener("input", function() {
                    if (confirmFishInput.value === fishName) {
                        confirmFishInput.classList.remove("is-invalid");
                        confirmDeleteButton.disabled = false;
                    } else {
                        confirmFishInput.classList.add("is-invalid");
                        confirmDeleteButton.disabled = true;
                    }
                });
            });
        });
    </script>
@endsection

<!-- TODO: make actions available when decided to implement -->

@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Users Management</h4>
                    </div>
                    <div class="card-body">
                        @if ($users->isEmpty())
                            <p class="text-muted">No users found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Joined</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ ucfirst($user->role) }}</td>
                                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUserModal" data-id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}">
                                                        Delete
                                                    </button>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirm User Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Type the user's name to confirm deletion:</p>
                    <input type="text" id="confirmUserInput" class="form-control" autocomplete="off"
                        placeholder="Enter user name">
                    <div class="invalid-feedback">Name does not match!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteUserForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="confirmDeleteUser" disabled>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deleteUserModal = document.getElementById("deleteUserModal");
            let confirmUserInput = document.getElementById("confirmUserInput");
            let confirmDeleteUser = document.getElementById("confirmDeleteUser");
            let deleteUserForm = document.getElementById("deleteUserForm");

            deleteUserModal.addEventListener("show.bs.modal", function(event) {
                let button = event.relatedTarget;
                let userId = button.getAttribute("data-id");
                let userName = button.getAttribute("data-name");

                confirmUserInput.value = "";
                confirmUserInput.classList.remove("is-invalid");
                confirmDeleteUser.disabled = true;
                deleteUserForm.action = `/admin/users/${userId}`;

                confirmUserInput.addEventListener("input", function() {
                    if (confirmUserInput.value === userName) {
                        confirmUserInput.classList.remove("is-invalid");
                        confirmDeleteUser.disabled = false;
                    } else {
                        confirmUserInput.classList.add("is-invalid");
                        confirmDeleteUser.disabled = true;
                    }
                });
            });
        });
    </script> --}}
@endsection

@extends('admin.shell')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Admin Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-3">Welcome, Admin!</h5>
                        <p class="text-muted">Manage your fish almanac efficiently from here.</p>

                        <div class="row">
                            <!-- Total Species -->
                            <div class="col-md-4">
                                <div class="card text-white bg-info mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Fish Species</h5>
                                        <p class="card-text fs-4">{{ $totalFish ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- User Management -->
                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Registered Users</h5>
                                        <p class="card-text fs-4">{{ $totalUsers ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Updates -->
                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Recent Updates</h5>
                                        <p class="card-text fs-5">Check the latest entries.</p>
                                        <a href="{{ route('admin.fish.index') }}" class="btn btn-light btn-sm">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.fish.create') }}" class="btn btn-primary mt-3">
                            Add New Fish Species
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

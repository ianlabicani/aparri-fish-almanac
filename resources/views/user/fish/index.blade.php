@extends('user.shell')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Fish Species</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('user.fish.index') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search fish..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Fish Cards -->
        <div class="row">
            @forelse ($fish as $f)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $f->english_name }}</h5>
                            <h6 class="card-subtitle text-muted">{{ $f->scientific_name }}</h6>
                            <p class="card-text mt-2">
                                <strong>Local Name:</strong> {{ $f->local_name }} <br>
                                <strong>Fishing Ground:</strong> {{ $f->fishing_ground }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 text-end">
                            <a href="{{ route('user.fish.show', $f->id) }}" class="btn btn-info btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center">No fish found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $fish->links() }}
        </div>
    </div>
@endsection

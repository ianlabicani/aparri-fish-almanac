@extends('user.shell')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Fish Species</h2>

        <div class="row">
            @foreach ($fish as $f)
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
            @endforeach
        </div>
    </div>
@endsection

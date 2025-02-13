@extends('guest.shell')

@section('content')
    <div class="container mt-4">
        <h2>Fish Details</h2>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $fish->english_name }} ({{ $fish->scientific_name }})</h4>
                <p><strong>Local Name:</strong> {{ $fish->local_name }}</p>
                <p><strong>Fishing Ground:</strong> {{ $fish->fishing_ground }}</p>
            </div>
        </div>
        <a href="{{ route('guest.fish.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection

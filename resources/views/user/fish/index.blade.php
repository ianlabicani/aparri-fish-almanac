@extends('user.shell')

@section('content')
    <div class="container mt-4">
        <h2>Fish Species</h2>
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
                            <a href="{{ route('user.fish.show', $f->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

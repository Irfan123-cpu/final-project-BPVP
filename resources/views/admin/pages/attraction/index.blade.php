@extends('admin.master')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Attraction</h1>
            <a href="{{ route('admin.attraction.create') }}" class="btn btn-primary">
                Create Zone
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover w-100 mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th width="50">ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle text-center">
                            @forelse ($attractions as $attraction)
                                <tr>
                                    <td>{{ $attraction->id }}</td>
                                    <td class="text-start font-weight-bold">{{ $attraction->name }}</td>
                                    <td class="text-start">
                                        <small class="text-muted">{{ Str::limit($attraction->description, 60) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success text-white">
                                            @php
                                                $cleanPrice = preg_replace('/[^0-9]/', '', $attraction->price_range);
                                            @endphp

                                            @if ($cleanPrice > 0)
                                                Rp {{ number_format((float) $cleanPrice, 0, ',', '.') }}
                                            @else
                                                Free / Gratis
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @if ($attraction->image)
                                            <img src="{{ asset('storage/' . $attraction->image) }}"
                                                alt="{{ $attraction->name }}" class="img-thumbnail"
                                                style="max-width: 80px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted small italic">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.attraction.show', $attraction) }}"
                                                class="btn btn-sm btn-info text-white">View</a>
                                            <a href="{{ route('admin.attraction.edit', $attraction) }}"
                                                class="btn btn-sm btn-warning text-white mx-1">Edit</a>

                                            <form action="{{ route('admin.attraction.destroy', $attraction) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No attraction found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

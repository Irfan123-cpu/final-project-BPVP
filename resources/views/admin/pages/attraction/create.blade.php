@extends('admin.master')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Create Attraction</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.attraction.index') }}">Attraction</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <hr>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.attraction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="mb-3">
                    <label for="zone_id" class="form-label">zone</label>
                    <select id="zone_id" 
                            name="zone_id" 
                            class="form-control @error('zone_id') is-invalid @enderror" 
                            required>
                        <option value="">Select zone</option>
                        @foreach($zones as $zone)
                            <option value="{{ $zone->id }}" 
                                {{ old('zone_id') == $zone->id ? 'selected' : '' }}>
                                {{ $zone->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('zone_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price_range" class="form-label">Price Range</label>
                    <input type="text" class="form-control @error('price_range') is-invalid @enderror" 
                           id="price_range" name="price_range" value="{{ old('price_range') }}" required>
                    @error('price_range')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.attraction.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save attraction</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
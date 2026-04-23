@extends('admin.master')

@section('content')
<div class="container-fluid p-4">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-4">
                <h3 class="mb-0 fw-bold">Edit Attraction</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.attraction.index') }}">Attraction</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h4 class="mb-0 h5">Edit Attraction Details: <span class="text-primary">{{ $attraction->name }}</span></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.attraction.update', $attraction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="zone_id" class="form-label fw-bold">Pilih Zone</label>
                            <select id="zone_id" 
                                    name="zone_id" 
                                    class="form-select @error('zone_id') is-invalid @enderror" 
                                    required>
                                    
                                <option value="" disabled>-- Pilih Zone --</option>

                                @foreach($zones as $zone)
                                    <option value="{{ $zone->id }}" 
                                        {{ old('zone_id', $attraction->zone_id) == $zone->id ? 'selected' : '' }}>
                                        {{ $zone->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('zone_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                       
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label fw-bold">Attraction Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $attraction->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="price_range" class="form-label fw-bold">Price Rating/Range</label>
                                <input type="text" class="form-control @error('price_range') is-invalid @enderror" 
                                       id="price_range" name="price_range" value="{{ old('price_range', $attraction->price_range) }}" 
                                       placeholder="Contoh: Rp 10.000 - Rp 50.000">
                                @error('price_range')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

     
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $attraction->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

            
                        <div class="mb-4">
                            <label class="form-label d-block fw-bold">Attraction Image</label>
                            @if($attraction->image)
                                <div class="mb-3 p-2 border rounded d-inline-block bg-light">
                                    <img src="{{ asset('storage/' . $attraction->image) }}" alt="Current Image" class="rounded" style="height: 120px; width: auto; object-fit: contain;">
                                    <p class="text-muted small mb-0 mt-1 text-center" style="font-style: italic;">Gambar saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
                            <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.attraction.index') }}" class="btn btn-outline-secondary me-2">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Update Attraction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
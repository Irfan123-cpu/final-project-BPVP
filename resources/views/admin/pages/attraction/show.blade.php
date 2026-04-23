@extends('admin.master')

@section('content')
<div class="container-fluid p-4">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 h2 fw-bold text-dark">Attraction Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.attraction.index') }}">Attraction</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Details</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('admin.attraction.edit', $attraction) }}" class="btn btn-warning text-white shadow-sm">
                        <i class="fas fa-edit me-1"></i> Edit Attraction
                    </a>
                    <a href="{{ route('admin.attraction.index') }}" class="btn btn-outline-secondary ms-2 shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7 col-md-12 col-12">
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-body p-5">
                    <div class="mb-5">
                        <label class="text-uppercase small fw-bold text-muted d-block mb-2">Attraction Name</label>
                        <h2 class="fw-bold text-dark mb-0">{{ $attraction->name }}</h2>
                    </div>

                    <div class="mb-5">
                        <label class="text-uppercase small fw-bold text-muted d-block mb-2">Description</label>
                        <p class="fs-4 text-dark lh-base">
                            {{ $attraction->description ?? 'No description provided for this attraction.' }}
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <label class="text-uppercase small fw-bold text-muted d-block mb-2">Price Rating</label>
                            <div class="d-inline-block px-3 py-1 rounded bg-light-success text-success border border-success fw-bold">
                                {{ $attraction->price_range ?? '-' }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="text-uppercase small fw-bold text-muted d-block mb-2">Data Created At</label>
                            <p class="text-dark fw-medium">{{ $attraction->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 col-md-12 col-12">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom-0 py-3 text-center">
                    <h4 class="mb-0 fw-bold">Attraction Preview</h4>
                </div>
                <div class="card-body text-center">
                    @if($attraction->image)
                        <img src="{{ asset('storage/' . $attraction->image) }}" 
                             alt="{{ $attraction->name }}" 
                             class="img-fluid rounded-3 shadow-sm"
                             style="max-height: 350px; width: 100%; object-fit: cover;">
                    @else
                        <div class="bg-light rounded-3 py-5 border-2 border-dashed d-flex flex-column align-items-center">
                            <i class="fas fa-image fs-1 text-muted mb-2"></i>
                            <p class="text-muted small mb-0">No image available</p>
                        </div>
                    @endif
                </div>
            </div>

           
                    <form action="{{ route('admin.attraction.destroy', $attraction) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Hapus zona ini selamanya?')">
                            <i class="fas fa-trash-alt me-1"></i> Delete Permanently
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
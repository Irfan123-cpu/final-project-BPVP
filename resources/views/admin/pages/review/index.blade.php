@extends('admin.master')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-dark fw-bold">Review Management</h1>
                <p class="text-muted small mb-0">Lihat dan kelola ulasan dari para pengunjung.</p>
            </div>
        </div>

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th width="70" class="py-3 text-dark fw-bold">ID</th>
                                <th class="py-3 text-start text-dark fw-bold">User</th>
                                <th class="py-3 text-start text-dark fw-bold">Destinasi</th>
                                <th class="py-3 text-dark fw-bold">Rating</th>
                                <th width="100" class="py-3 text-dark fw-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                                <tr class="text-center">
                                    <td class="fw-bold">#{{ $review->id }}</td>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center text-white fw-bold"
                                                style="width: 30px; height: 30px; font-size: 12px;">
                                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                            </div>
                                            <span class="text-dark">{{ $review->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-start text-primary fw-semibold">
                                        {{ $review->attraction->name }}
                                    </td>
                                    <td>
                                        <div class="text-warning small">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"></i>
                                            @endfor
                                        </div>
                                        <span class="text-muted" style="font-size: 11px;">({{ $review->rating }}/5)</span>
                                    </td>
                                    <td class="text-start">
                                        <small class="text-muted italic">
                                            "{{ Str::limit($review->description, 80) }}"
                                        </small>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-comments fa-3x mb-3 opacity-25"></i>
                                            <p class="mb-0 fw-semibold">Belum ada review yang tersedia.</p>
                                            <small>Ulasan dari pengunjung akan muncul di sini.</small>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table thead th {
            border-top: none;
        }

        .italic {
            font-style: italic;
        }
    </style>
@endsection

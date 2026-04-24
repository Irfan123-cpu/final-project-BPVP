@extends('admin.master')

@section('content')
<div class="container py-4">
    <h1>Reviews List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Destinasi (ID)</th> {{-- Menampilkan Nama & ID Destinasi --}}
                <th>Nama Pengunjung</th> {{-- Menampilkan reviewer_name --}}
                <th>Rating</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- Menggunakan @forelse untuk menghindari ParseError dan menangani data kosong --}}
            @forelse($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    {{-- PERBAIKAN: Menampilkan nama destinasi melalui relasi polymorphic --}}
                    <td>
                        {{ $review->reviewable->name ?? 'N/A' }} 
                        <small class="text-muted">({{ $review->reviewable_id }})</small>
                    </td>
                    {{-- PERBAIKAN: Pastikan kolom ini sesuai dengan database (reviewer_name atau name) --}}
                    <td>{{ $review->reviewer_name ?? $review->name }}</td>
                    <td>{{ $review->rating }}/5</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        @if($review->is_published)
                            <form action="{{ route('admin.review.disapprove', $review->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning">Disapprove</button>
                            </form>
                        @else
                            <form action="{{ route('admin.review.approve', $review->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                        @endif
                        
                        <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">Belum ada review tersedia.</td>
                </tr>
            @endforelse {{-- Menghilangkan ParseError "unexpected end of file" --}}
        </tbody>
    </table>
</div>
@endsection
@extends('landing.master')

@section('content')

<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">

        
            <div class="col-md-9 col-sm-8 col-xs-12">

                <div class="property_single_details_slide">
                    <img src="{{ asset('storage/' . $attraction->image) }}" class="img-fluid" alt="Attraction Image">
                </div>
                
                <div class="property_single_details_price">
                    <h1>{{ $attraction->name ?? 'Nama Destinasi' }}</h1>
                    <h4>Harga Tiket: {{ $attraction->price_range ?? 'Gratis' }}</h4>
                    <p><i class="fa fa-map-marker"></i> {{ $attraction->location ?? 'Lokasi tidak tersedia' }}</p>
                </div>

                <div class="property_single_details_description">
                    <h4>Deskripsi Destinasi</h4>
                    <p>{{ $attraction->description ?? 'Belum ada deskripsi untuk destinasi ini.' }}</p>
                </div>

           
                <div class="property_map">
                    <h4>Lokasi di Peta</h4>
                    <iframe 
                        src="https://maps.google.com/maps?q={{ urlencode($attraction->location ?? $attraction->name) }}&output=embed" 
                        style="border:0; width:100%; height:350px;">
                    </iframe>
                </div>

         
                <div class="property_info mt-4">
                    <h5 class="card-title">Reviews</h5>
                    <div class="card">
                        <div class="card-body">

                            @forelse($attraction->reviews as $review)
                                <div class="review mb-3">
                                    <h5>{{ $review->name }}</h5>

                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </div>

                                    <p>{{ $review->comment }}</p>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse

                        </div>
                    </div>
                </div>

            </div>

    
            <div class="col-md-3 col-sm-4 col-xs-12">
                
                <div class="single_property_form">
                    <h4>Berikan Ulasan</h4>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('landing.attraction.review.store') }}">
                        @csrf

                        <input type="hidden" name="reviewable_id" value="{{ $attraction->id }}">
                        <input type="hidden" name="reviewable_type" value="{{ get_class($attraction) }}">
                        
                        <input type="text" name="name" class="form-control mb-2" placeholder="Nama Anda" required>
                        
                        <select name="rating" class="form-control mb-2" required>
                            <option value="">Pilih Rating</option>
                            <option value="5">5 - Sangat Bagus</option>
                            <option value="4">4 - Bagus</option>
                            <option value="3">3 - Cukup</option>
                            <option value="2">2 - Kurang</option>
                            <option value="1">1 - Buruk</option>
                        </select>

                        <textarea name="comment" class="form-control mb-2" rows="4" placeholder="Komentar..." required></textarea>

                        <button type="submit" class="btn btn-lg btn-contact-bg btn-block">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
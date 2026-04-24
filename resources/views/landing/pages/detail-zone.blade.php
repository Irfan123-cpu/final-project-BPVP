@extends('landing.master')

@section('content')

<section class="property_single_details section-padding">
    <div class="container">
        <div class="row">

            {{-- LEFT CONTENT --}}
            <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="property_single_details_slide">
                    <img src="{{ asset('storage/' . $zone->image) }}" class="img-fluid" alt="Zone Image">
                </div>

                <div class="property_single_details_price">
                    <h1>{{ $zone->name ?? 'Nama Zona' }}</h1>
                    <h4>{{ $zone->price_range ?? '-' }}</h4>
                    <p>{{ $zone->description ?? '-' }}</p>
                </div>

                {{-- MAP --}}
                <div class="property_map">
                    <h4>On Map</h4>
                    <iframe 
                        src="https://maps.google.com/maps?q={{ urlencode($zone->name ?? '') }}&output=embed"
                        style="border:0; width:100%; height:350px;">
                    </iframe>
                </div>

                {{-- REVIEWS --}}
                <div class="property_info mt-4">
                    <h5 class="card-title">Reviews</h5>

                    <div class="card">
                        <div class="card-body">

                            @forelse($zone->reviews ?? [] as $review)
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

            {{-- RIGHT SIDEBAR --}}
            <div class="col-md-3 col-sm-4 col-xs-12">

                <div class="single_property_form">
                    <h4>Enquire / Review</h4>

                    <form method="POST" action="{{ route('landing.zone.review.store') }}">
                        @csrf

                        <input type="hidden" name="reviewable_id" value="{{ $zone->id }}">
                        
                        {{-- FIX LEBIH AMAN (hardcoded class, bukan get_class) --}}
                        <input type="hidden" name="reviewable_type" value="App\Models\Zone">

                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Rating</label>
                            <select name="rating" class="form-control" required>
                                <option value="">Select rating</option>
                                <option value="1">1 - Poor</option>
                                <option value="2">2 - Fair</option>
                                <option value="3">3 - Good</option>
                                <option value="4">4 - Very Good</option>
                                <option value="5">5 - Excellent</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-lg btn-contact-bg btn-block">
                            Send Message
                        </button>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
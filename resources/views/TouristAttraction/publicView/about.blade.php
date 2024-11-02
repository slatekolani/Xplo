<div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
    <div class="container-fluid attraction-details">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">{{ $touristicAttraction->attraction_name }}</h2>
                <p style="color:#ffd700;font-size:15px"><i>"{{ $touristicAttraction->attraction_description }}"</i></p>
            </div>
            
            <!-- Featured Image Section -->
            <div class="card-body">
                <div class="row mb-4 justify-content-center">
                    <div class="col-md-12">
                        @php
                            $images = explode(',', $touristicAttraction->attraction_image);
                            $featuredImage = $images[0] ?? null; // Use the first image as featured
                        @endphp
                        @if($featuredImage)
                            <div class="featured-image-wrapper text-center">
                                <img src="{{ asset('public/'.$featuredImage) }}" 
                                     class="img-fluid rounded shadow-lg" 
                                     alt="{{ $touristicAttraction->attraction_name }} Featured Image" 
                                     style="max-height: 400px; object-fit: cover; width: 100%;">
                            </div>
                        @else
                            <p class="alert alert-info">No featured image available for this attraction</p>
                        @endif
                    </div>
                </div>
    
    
                {{-- Key Information Grid --}}
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="card h-100 border-light">
                            <div class="card-body">
                                <h5 class="card-title" style="color: dodgerblue">Basic Information</h5>
                                <p> ~ {{ $touristicAttraction->basic_information }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card h-100 border-light">
                            <div class="card-body">
                                <h5 class="card-title" style="color: dodgerblue">Seasonal Variation</h5>
                                <p> ~ {{ $touristicAttraction->seasonal_variation }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card h-100 border-light">
                            <div class="card-body">
                                <h5 class="card-title" style="color: dodgerblue">Flora & Fauna</h5>
                                <p> ~ {{ $touristicAttraction->flora_fauna }}</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                {{-- Image Gallery --}}
                <div class="row mt-4 image-gallery">
                    @forelse($images as $image)
                        <div class="col-md-6 col-sm-6 mb-6">
                            <a href="{{ asset('public/'.$image) }}" data-fancybox="gallery" data-caption="{{ $touristicAttraction->attraction_name }}">
                                <img src="{{ asset('public/'.$image) }}" 
                                     class="img-fluid rounded shadow-sm" 
                                     loading="lazy" 
                                     alt="{{ $touristicAttraction->attraction_name }} Gallery Image">
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="alert alert-info">No images available for this attraction</p>
                        </div>
                    @endforelse
                </div>
    
                {{-- Additional Details Table --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="mb-0">Attraction Details</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Attraction Category</th>
                                            <td>{{ $touristicAttraction->touristicAttractionCategory->attraction_category }}</td>
                                        </tr>
                                        <tr>
                                            <th>Region</th>
                                            <td>
                                                <a href="{{ route('tanzaniaRegion.publicView', $touristicAttraction->tanzaniaRegion->uuid) }}" 
                                                   class="text-primary" 
                                                   title="{{ $touristicAttraction->tanzaniaRegion->region_description }}">
                                                    {{ $touristicAttraction->tanzaniaRegion->region_name }} &#8594;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Governing Body</th>
                                            <td>
                                                <a href="{{ $touristicAttraction->website_link }}" 
                                                   target="_blank" 
                                                   class="text-primary">
                                                    {{ $touristicAttraction->governing_body }} &#8594;
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td>{{ $year }}</td>
                                        </tr>
                                        <tr>
                                            <th>Best Visit Month</th>
                                            <td>{{ $touristicAttraction->attraction_visit_month }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entry Fee (Foreign Adult)</th>
                                            <td>Tshs {{ number_format($touristicAttraction->entry_fee_adult_foreigner) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entry Fee (Foreign Child)</th>
                                            <td>Tshs {{ number_format($touristicAttraction->entry_fee_child_foreigner) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entry Fee (Local Adult)</th>
                                            <td>Tshs {{ number_format($touristicAttraction->entry_fee_adult_local) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entry Fee (Local Child)</th>
                                            <td>Tshs {{ number_format($touristicAttraction->entry_fee_child_local) }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card h-100 border-light">
                        <div class="card-body">
                            <h5 class="card-title" style="color: dodgerblue">Personal Experience</h5>
                            <p> ~ {{ $touristicAttraction->personal_experience }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>

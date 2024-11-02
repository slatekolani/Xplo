<div class="tab-pane fade" id="nav-Culture" role="tabpanel" aria-labelledby="nav-Culture-tab">
    <div class="container-fluid culture-details">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    @if($tanzaniaRegionCultures->isNotEmpty())
                        @php
                            $firstCultureImage = explode(',', $tanzaniaRegionCultures[0]->culture_image)[0] ?? '';
                        @endphp
                        @if($firstCultureImage)
                            <img src="{{ asset('public/'.$firstCultureImage) }}" 
                                 class="img-fluid rounded shadow-lg mb-3" 
                                 alt="Landing Image" 
                                 style="max-height: 400px; object-fit: cover; width: 100%;">
                        @endif
                    @endif
                    <h2 class="text-primary">Cultures in {{$tanzaniaRegion->region_name}}</h2>
                </div>
    
                {{-- Culture Cards --}}
                <div class="row">
                    @forelse($tanzaniaRegionCultures as $tanzaniaRegionCulture)
                        <div class="col-md-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="mb-0">{{ $tanzaniaRegionCulture->culture_name }}</h3>
                                    <p style="color:#ffd700;font-size:15px"><i>"{{$tanzaniaRegionCulture->basic_information }}"</i></p>
                                </div>
                                <div class="card-body">
                                    {{-- Image Gallery --}}
                                    <div class="row mt-3">
                                        @forelse(explode(',', $tanzaniaRegionCulture->culture_image) as $image)
                                            <div class="col-md-3 col-sm-6 mb-2">
                                                <a data-fancybox="gallery" href="{{ asset('public/'.$image) }}">
                                                    <img src="{{ asset('public/'.$image) }}" 
                                                         class="img-fluid rounded shadow-sm" 
                                                         loading="lazy" 
                                                         alt="Gallery Image">
                                                </a>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="alert alert-info">No images found!</p>
                                            </div>
                                        @endforelse
                                    </div>
        
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h4 class="text-primary">History of {{ $tanzaniaRegionCulture->culture_name }}</h4>
                                            <p>{{ $tanzaniaRegionCulture->culture_history }}</p>
                                        </div>
                                    </div>
        
                                    {{-- Cultural Video --}}
                                    {{-- <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h4 class="text-primary">Traditional Video</h4>
                                            {!! $tanzaniaRegionCulture->cultural_video !!}
                                        </div>
                                    </div> --}}

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h3 style="color: dodgerblue">Characteristics</h3>
                                            @forelse($regionCultureCharacteristics as $regionCultureCharacteristic)
                                                <h4>&bullet; {{ $regionCultureCharacteristic->characteristic_title }}</h4>
                                                <p><i class="fas fa-chevron-right text-secondary me-1"></i>{{ $regionCultureCharacteristic->characteristic_description }}</p>
                                            @empty
                                                <p class="alert alert-info">Whoops! No culture characteristics have been published yet. Our personnel are working on it.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h4 class="mb-0">Culture Details</h4>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th>Traditional Language</th>
                                                                <td>{{ $tanzaniaRegionCulture->traditional_language }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Traditional Dance</th>
                                                                <td>{{ $tanzaniaRegionCulture->traditional_dance }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Traditional Dance Description</th>
                                                                <td>{{ $tanzaniaRegionCulture->traditional_dance_description }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Traditional Food</th>
                                                                <td>{{ $tanzaniaRegionCulture->traditional_food_description }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Traditional Food Description</th>
                                                                <td>{{ $tanzaniaRegionCulture->traditional_food_description }}</td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="alert alert-info">Whoops! No culture has been published yet. Our personnel are working on it.</p>
                        </div>
                    @endforelse
                </div>
    
                
            </div>
        </div>
    </div>
    
    
</div>

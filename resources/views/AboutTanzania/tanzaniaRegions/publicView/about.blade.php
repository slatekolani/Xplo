<div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
    <div class="container-fluid region-details">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0"> {{ $tanzaniaRegion->region_name }}</h2>
                <p style="color:#ffd700;font-size:15px"><i>"{{$tanzaniaRegion->region_description }}"</i></p>
            </div>
            
            <div class="card-body">
    
                <div class="row mb-4 justify-content-center">
                    <div class="col-md-12">
                        @php
                            $images = explode(',', $tanzaniaRegion->region_icon_image);
                            $featuredImage = $images[0] ?? null; // Use the first image as featured
                        @endphp
                        @if($featuredImage)
                            <div class="featured-image-wrapper text-center">
                                <img src="{{ asset('public/'.$featuredImage) }}" 
                                     class="img-fluid rounded shadow-lg" 
                                     alt="{{ $tanzaniaRegion->region_icon_image }} Featured Image" 
                                     style="max-height: 400px; object-fit: cover; width: 100%;">
                            </div>
                        @else
                            <p class="alert alert-info">No featured image available for this attraction</p>
                        @endif
                    </div>
                </div>

                {{-- Image Gallery --}}
                
    
                {{-- History Section --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <h3 class="text-primary">History of {{ $tanzaniaRegion->region_name }}</h3>
                        <p>{{ $tanzaniaRegion->region_history }}</p>
                    </div>
                </div>

                <div class="row mt-4 image-gallery">
                    @forelse(explode(',', $tanzaniaRegion->region_icon_image) as $image)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ asset('public/'.$image) }}" data-fancybox="gallery" data-caption="{{ $tanzaniaRegion->region_name }}">
                                <img src="{{ asset('public/'.$image) }}" 
                                     class="img-fluid rounded shadow-sm" 
                                     loading="lazy" 
                                     alt="{{ $tanzaniaRegion->region_name }} Gallery Image">
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="alert alert-info">No images found!</p>
                        </div>
                    @endforelse
                </div>
    
                {{-- Key Information Table --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h4 class="mb-0">Region Details</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nation</th>
                                            <td><a href="{{route('Tanzania.show',$tanzaniaRegion->Nation->uuid)}}">{{ $tanzaniaRegion->Nation->nation_name }} &rightarrowtail;</a></td>
                                        </tr>
                                        <tr>
                                            <th>Main Economic Activity</th>
                                            <td>{{ $tanzaniaRegion->regionEconomicActivity->economic_activity_title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Region Size</th>
                                            <td>{{ number_format($tanzaniaRegion->region_size) }} Km <sup>2</sup> </td>
                                        </tr>
                                        <tr>
                                            <th>Population</th>
                                            <td>{{ number_format($tanzaniaRegion->population) }} people - according to 2022 census</td>
                                        </tr>
                                        <tr>
                                            <th>Climatic Condition (&#176; C)</th>
                                            <td>{{ $tanzaniaRegion->climatic_condition }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transport Nature</th>
                                            <td>{{ $tanzaniaRegion->transport_nature }}</td>
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
    
</div>

<div class="tab-pane fade" id="nav-Culture" role="tabpanel" aria-labelledby="nav-Culture-tab">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @forelse($tanzaniaRegionCultures as $tanzaniaRegionCulture)
                    <div class="col-md-12" style="margin-top: 15px">
                        <a href="#" style="text-decoration: none; position: relative; display: block;">
                                <h3 style="font-weight: bold;margin-left: 20px;margin-top: 5px" class="card-title">&star;{{$tanzaniaRegionCulture->culture_name}}</h3>
                                <p class="card-body">{{$tanzaniaRegionCulture->basic_information}}</p>

                                <div class="row">
                                        @forelse(explode(',', $tanzaniaRegionCulture->culture_image) as $index => $image)
                                            <div class="gallery-item">
                                                <a data-fancybox="gallery" href="{{ asset('public/'.$image) }}">
                                                    <img src="{{ asset('public/'.$image) }}" loading="lazy" alt="Gallery Image">
                                                </a>
                                            </div>
                                        @empty
                                            <p>No image found!</p>
                                        @endforelse
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-left: 10px;margin-top: 10px">
                                        <h3 style="font-weight: bold;font-size: 18px;" class="card-title">&star;History of the {{$tanzaniaRegionCulture->culture_name}}</h3>
                                        <p>{{$tanzaniaRegionCulture->culture_history}}</p>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="font-weight: bold;font-size: 18px;" class="card-title">Traditional video</h3>
                                    {!! $tanzaniaRegionCulture->cultural_video !!}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" style="color: black;min-width:900px">
                                    <thead>
                                    <tr>
                                        <th>Traditional language</th>
                                        <th>Traditional dance</th>
                                        <th>Traditional dance description</th>
                                        <th>Traditional food</th>
                                        <th>Traditional food description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$tanzaniaRegionCulture->traditional_language}}</td>
                                        <td>{{$tanzaniaRegionCulture->traditional_dance}}</td>
                                        <td>{{$tanzaniaRegionCulture->traditional_dance_description}}</td>
                                        <td>{{$tanzaniaRegionCulture->traditional_food}}</td>
                                        <td>{{$tanzaniaRegionCulture->traditional_food_description}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>Whoops! No culture has been published yet. Our personnel are working on it</P>
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 style="font-size: 16px;font-weight: bold">Characteristics</h3>
                @forelse($regionCultureCharacteristics as $regionCultureCharacteristic)
                        <h3 style="font-size: 14px;font-weight: bold">&star;{{$regionCultureCharacteristic->characteristic_title}}</h3>
                        <p>{{$regionCultureCharacteristic->characteristic_description}}</p>
                    @empty
                        <p>Whoops! No culture characteristic has been published yet. Our personnel are working on it </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

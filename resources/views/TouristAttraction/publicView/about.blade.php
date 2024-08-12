<div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
    <div class="col-md-12" style="margin-top: 15px">
        <a href="#" style="text-decoration: none; position: relative; display: block;">
                        <div class="panel-title">
                            <h3>{{$touristicAttraction->attraction_name}}</h3>
                        </div>
                    <div class="panel-body" style="padding: 15px;">
                        <span>{{$touristicAttraction->attraction_description}}</span>
                    </div>
                    <div class="row">
                        @forelse(explode(',', $touristicAttraction->attraction_image) as $image)
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
                            <h3>History of {{$touristicAttraction->attraction_name}}</h3>
                            <span>{{$touristicAttraction->basic_information}}</span>
                        </div>
                    </div>

            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table" style="color: black; min-width: 600px;">
                    <thead>
                    <tr>
                        <th>Best visit time</th>
                        <th>Attraction category</th>
                        <th>Region found</th>
                        <th>Governing body</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$touristicAttraction->best_time_of_visit}}</td>
                        <td>{{$touristicAttraction->touristicAttractionCategory->attraction_category}}</td>
                        <td>
                            <a href="{{route('tanzaniaRegion.publicView',$touristicAttraction->tanzaniaRegion->uuid)}}" class="attraction-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{ $touristicAttraction->attraction_region }}" style="color: dodgerblue" title="{{ $touristicAttraction->tanzaniaRegion->region_description }}">
                                {{$touristicAttraction->tanzaniaRegion->region_name }} &rightsquigarrow;
                            </a>
                        </td>
                        <td>
                            <a href="{{$touristicAttraction->website_link}}" target="_blank">
                                {{$touristicAttraction->governing_body}} &rightsquigarrow;
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </a>
    </div>
</div>

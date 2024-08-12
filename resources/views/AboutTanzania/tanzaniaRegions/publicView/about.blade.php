<div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
    <div class="panel panel-default"
         style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="panel-heading"
             style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
            <div class="panel-title">
                <h5 style="font-size:20px;font-weight: bold; color: #007bff;">
                    &star;{{$tanzaniaRegion->region_name}}</h5>
            </div>
        </div>
        <div class="panel-body" style="padding: 15px;">
            <p style="font-size: 15px; color: #555;">{{$tanzaniaRegion->region_description}}</p>
        </div>
        <div class="row">
            @forelse(explode(',', $tanzaniaRegion->region_icon_image) as $image)
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
                <h3 style="font-weight: bold;font-size: 18px;" class="card-title">&star;History of
                    the {{$tanzaniaRegion->region_name}}</h3>
                <p>{{$tanzaniaRegion->region_history}}</p>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="overflow-x: auto;">
        <table class="table" style="color: black; min-width: 800px;">
            <thead>
            <tr>
                <th>Main economic activity</th>
                <th>Region size</th>
                <th>Population</th>
                <th>Climatic condition (&#176; C)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$tanzaniaRegion->regionEconomicActivity->economic_activity_title}}</td>
                <td>{{$tanzaniaRegion->region_size}}</td>
                <td>{{number_format($tanzaniaRegion->population)}} people - according to 2022 census</td>
                <td>{{$tanzaniaRegion->climatic_condition}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

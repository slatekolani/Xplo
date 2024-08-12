<div class="tab-pane fade " id="nav-precautions" role="tabpanel" aria-labelledby="nav-precautions-tab">

    <div class="row">
        <div class="col-md-12">
            @forelse($tanzaniaRegionPrecautions as $tanzaniaRegionPrecaution)
                    <div class="panel panel-default" style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="panel-heading" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
                            <div class="panel-title">
                                <h5 style="font-size:20px;font-weight: bold; color: #007bff;">&star;{{$tanzaniaRegionPrecaution->precaution_title}}</h5>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 15px;">
                            <p style="font-size: 15px; color: #555;">{{$tanzaniaRegionPrecaution->precaution_description}}</p>
                        </div>
                    </div>
            @empty
                <p>Whoops! We have yet to publish the precautions, or we might be experiencing an error. Please wait while our personnel is working on it</p>
            @endforelse
        </div>
    </div>
</div>

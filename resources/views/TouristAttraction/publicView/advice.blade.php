<div class="tab-pane fade" id="nav-advice" role="tabpanel" aria-labelledby="nav-advice-tab">
    <div class="row" style="margin-top: 30px">
        <div class="col-md-12">
            <div class="col-md-12" style="margin-top: 10px">
                @forelse($touristicAttractionVisitAdvices as $touristicAttractionVisitAdvice)
                    <div class="panel panel-default" style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="panel-heading" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
                            <div class="panel-title">
                                <h5 style="font-size:20px;font-weight: bold; color: #007bff;">&star;{{$touristicAttractionVisitAdvice->advice_title}}</h5>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 15px;">
                            <p style="font-size: 15px; color: #555;">{{$touristicAttractionVisitAdvice->advice_description}}</p>
                        </div>
                    </div>
                @empty
                    <p style="padding-left: 20px">No Advice have been Listed Yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

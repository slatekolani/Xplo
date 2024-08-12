<div class="tab-pane fade" id="nav-attractionRules" role="tabpanel" aria-labelledby="nav-attractionRules-tab">
    <div class="row" style="margin-top: 30px">
        <div class="col-md-12">
            <div class="col-md-10" style="margin-top: 10px">

                @forelse($touristicAttractionRules as $touristicAttractionRule)
                    <div class="panel panel-default" style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="panel-heading" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
                            <div class="panel-title">
                                <h5 style="font-weight: bold; color: #007bff;">&star;{{$touristicAttractionRule->rule_title}}</h5>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 15px;">
                            <p style="font-size: 16px; line-height: 1.5; color: #555;">{{$touristicAttractionRule->rule_description}}</p>
                        </div>
                    </div>
                @empty
                    <p style="padding-left: 20px">No Rule have been Listed Yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

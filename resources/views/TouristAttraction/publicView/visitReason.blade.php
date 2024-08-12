<div class="tab-pane fade" id="nav-visitReason" role="tabpanel" aria-labelledby="nav-visitReason-tab">
    @forelse($touristicAttractionVisitReasons as $touristicAttractionVisitReason)
        <div class="panel panel-default" style="border: 2px solid #ddd; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="panel-heading" style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; border-radius: 8px 8px 0 0;">
                <div class="panel-title">
                    <h3>{{$touristicAttractionVisitReason->reason_title}}</h3>
                </div>
            </div>
            <div class="panel-body" style="padding: 15px;">
                <span>{{$touristicAttractionVisitReason->reason_description}}</span>
            </div>
        </div>
    @empty
        <span>No Reasons have been Listed Yet.</span>
    @endforelse
</div>

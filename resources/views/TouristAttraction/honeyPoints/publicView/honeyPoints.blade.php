<div class="tab-pane fade show" id="nav-honeyPoints" role="tabpanel" aria-labelledby="nav-honeyPoints-tab">
        <div class="row" style="margin-top: 30px">
                    <div class="honey-points-container">
                        @forelse($touristicAttractionHoneyPoints as $touristicAttractionHoneyPoint)
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="gallery-row">
                                        <div class="honey-point">
                                            <div class="honey-point-header">
                                                <a href="{{ asset('public/honeyPointImage/'. $touristicAttractionHoneyPoint->honey_point_image) }}" data-fancybox="gallery" data-caption="{{ $touristicAttractionHoneyPoint->honey_point_name }} - {{ $touristicAttractionHoneyPoint->honey_point_description }}">
                                                    <img src="{{ asset('public/honeyPointImage/'. $touristicAttractionHoneyPoint->honey_point_image) }}" alt="{{ $touristicAttractionHoneyPoint->honey_point_name }}" class="honey-point-image">
                                                </a>
                                                <div class="honey-point-title">{{ $touristicAttractionHoneyPoint->honey_point_name }}</div>
                                            </div>
                                            <div class="honey-point-description">{{ $touristicAttractionHoneyPoint->honey_point_description }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="padding-left: 20px">No Honey point has been Listed Yet.</p>
                        @endforelse
                    </div>
        </div>
</div>

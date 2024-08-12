@extends('layouts.main', ['title' => __("All Reviews"), 'header' => __('All Reviews')])
@include('includes.validate_assets')
@section('content')

    <div class="col-md-12">
        <div class="row" style="padding-top: 5px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <p class="card-title" style="font-size: 14px;font-weight: bold">Reviews - <span class="badge badge-primary">{{$totalLocalTouristReviews}}</span></p>
                                <div class="col-md-12" style="margin-top: 20px">
                                    @forelse($localTouristReviews as $localTouristReview)
                                        <img width="24" height="24" src="https://img.icons8.com/material/24/user--v1.png" alt="user--v1"/>
                                        <span style="font-weight: bold">{{\App\Models\TourOperator\TourPackages\LocalTourPackages\LocalTourPackageBookings\localTourPackageBookings::find($localTouristReview->local_tour_booking_id)->tourist_name}}</span>
                                        <div style="border: 2px solid gainsboro;padding: 10px 10px 10px 10px;text-align: center">
                                            <span style="font-weight: bold">"Travelled to {{\App\Models\TouristicAttractions\touristicAttractions::find(\App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages::find($localTouristReview->local_tour_package_id)->safari_name)->attraction_name}}"</span><br>
                                            <span>{{$localTouristReview->review_message}}</span>
                                        </div>
                                    @empty
                                        <img width="24" height="24" src="https://img.icons8.com/material/24/user--v1.png" alt="user--v1"/>
                                        <span style="font-weight: bold">Xafari Explore Admin</span>
                                        <div style="border: 1px solid gainsboro;padding: 10px 10px 10px 10px;text-align: center">
                                            <span>This tour operator has not yet received any reviews. However, we are confident in the quality of their services, and you can always choose their company for your trip. Once you are finished, a link will be sent to you automatically or manually at some points. Please support this tour operator by being the first to leave a review. We appreciate both positive and negative feedback; just share your honest opinion</span>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="#"
                                               class="btn btn-primary btn-sm text-center" style="margin-top: 20px;">Contact Support Team
                                                &blacktriangleright;</a>
                                        </div>
                                    @endforelse
                                        <div class="d-flex justify-content-center">
                                            <a href="#"
                                               class="btn btn-primary btn-sm text-center" style="margin-top: 20px;">more
                                                &blacktriangledown;</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



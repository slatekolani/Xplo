@extends('layouts.main', ['title' => 'Review form special for ' . $localTourBooking->tourist_name, 'header' => __('Review form special for ' . $localTourBooking->tourist_name)])

@include('includes.validate_assets')
@section('content')

    {{ Form::open(['route'=>'localTouristReview.store', 'autocomplete' => 'off','method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
    @csrf
    <section>
        <div class="row" style="margin: auto">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            @auth
                                <p class="text-info" style="border: 2px solid red">&blacktriangleright; You are viewing
                                    as <u>{{$localTourBooking->tourOperator->company_name}}</u>. Kindly be informed
                                    that you are not authorized to fill out this form; only validation of its
                                    destination is permitted</p>
                            @endauth
                            <p>&blacktriangleright; You are now reviewing <span
                                    style="color: dodgerblue">{{$localTourBooking->tourOperator->company_name}}</span>
                                on the main safari to <span
                                    style="color: dodgerblue">{{\App\Models\TouristicAttractions\touristicAttractions::find((\App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages::find($localTourBooking->local_tour_package_id)->safari_name))->attraction_name}}</span>
                                you booked and travelled on <span
                                    style="color: dodgerblue">{{date(' D jS M Y', strtotime(\App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages::find($localTourBooking->local_tour_package_id)->safari_start_date))}}</span>
                                to <span
                                    style="color: dodgerblue">{{date(' D jS M Y', strtotime(\App\Models\TourOperator\TourPackages\LocalTourPackages\localTourPackages::find($localTourBooking->local_tour_package_id)->safari_end_date))}}</span>
                                as <span style="color: dodgerblue">{{$localTourBooking->tourist_name}}</span>. If it wasnt you, we are sorry for the inconvenience.</p>
                            <p>&blacktriangleright;You are the representative of others who traveled with you. Please share on a collective experience basis
                            </p>
                            <p>&blacktriangleright; Please read our community guideline on reviewing <a
                                    href="#">here</a> before you make a review</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: rgba(255,255,255,0.85);margin-top: 3px">
                        <div class="col-md-12">
                            <p>{{ getLanguageBlock('lang.auth.mandatory-field') }}</p>
                            <div class="row">
                                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('review_message', __("Review Message (max 500 characters"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('review_message',null, ['class' => 'form-control','maxLength'=>'500', 'style'=>'height:150px','autocomplete' => 'off', 'id' => 'review_message', 'required']) }}
                                        {!! $errors->first('review_message', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    @guest
                                        <p>By clicking the 'Submit Review' button you agree to our <a href="#">Terms of
                                                Use</a> and <a href="#">Privacy Policy</a></p>
                                    @endguest
                                    <input name="local_tour_booking_id" value="{{$localTourBooking->id}}" hidden>
                                    <input name="tour_operator_id" value="{{$localTourBooking->tourOperator->id}}" hidden>
                                    <input name="local_tour_package_id" value="{{$localTourBooking->local_tour_package_id}}" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="element-form">
                                        <div class="form-group pull-left">
                                            @guest
                                                @if($localTourBooking->CheckedNumberOfLocalReviewsPerBookingLabel===0)
                                                    {{ Form::button(trans('Submit Review'), ['class' => 'btn btn-primary', 'type'=>'submit','style' => 'border-radius: 5px;']) }}
                                                @else
                                                    <btn onclick="alert('This action is no longer available; a review has already been submitted.')" class="btn btn-primary btn-sm">Submit Review</btn>
                                                @endif
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br/>

    {{ Form::close() }}
@endsection
@push('after-scripts')

    <script>
        $(function () {
            $(".select2").select2();


        });

    </script>
@endpush


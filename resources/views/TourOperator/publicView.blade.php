@extends('layouts.main', ['title' => __("Tour Operator Information"), 'header' => __('Tour operator Information')])
@include('includes.validate_assets')
@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: rgba(255,255,255,0.85)">
                        <div class="row" style="border: 1px solid gainsboro;margin-top: 10px">
                            <div class="col-md-6">
                                <img src="{{ asset('public/CompaniesTeamImage/' . $tourOperator->company_team_image) }}" alt="Team Image" style="width: 100%; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); margin-top: 50px;" loading="lazy">
                            </div>

                            <div class="col-md-6" style="margin-top: 20px">
                                <div style="display: flex">
                                    <img src="{{ asset('public/TourOperatorsLogos/' . $tourOperator->company_logo) }}" alt="Company Logo" style="height: 70px; width: 70px; border-radius:50%;object-fit: cover;" loading="lazy">
                                    <h3 style="font-family: 'Lobster', cursive; font-size: 25px;">{{$tourOperator->company_name}}</h3>
                                </div>
                                <p>"{{$tourOperator->about_company}}"</p>
                                <p><b>Year established</b>: {{date('jS M Y',strtotime($tourOperator->established_date))}}</p>
                                <p><b>Years of experience</b>: {{$tourOperator->TourCompanyYearsOfExperienceLabel}} years</p>
                                <p><b>Total employees</b>: {{$tourOperator->total_employees}} employees</p>
                                <div style="display: flex">

                                    <p><b>Country</b>:
                                        <a href="{{route('Tanzania.show',$nation->uuid)}}">
                                            <img
                                                src="{{ asset('public/nationFlags/' . $tourOperator->nation->nation_flag)}}"
                                                alt="Tanzania flag"
                                                style="height: 20px; width: 20px; border-radius:50%;object-fit: cover;" loading="lazy">
                                            {{$tourOperator->nation->nation_name}} &rightsquigarrow;
                                        </a>
                                    </p>
                                </div>
                                <p><b>Regions of Operation</b>:
                                    @forelse($tourOperator->TourOperatorRegionsOfOperationLabel as $region)
                                        <a href="{{route('tanzaniaRegion.publicView',$region['uuid'])}}" class="region-link" data-toggle="tooltip" data-placement="top"
                                           data-attraction-id="{{ $region['name'] }}" style="color: dodgerblue"
                                           title="{{ $region['description'] }}">{{ $region['name'] }}</a>,
                                    @empty
                                    @endforelse
                                </p>

                                <p><b>Insurances</b>:
                                    @forelse($tourOperator->TourOperatorTourInsuranceTypesLabel as $insurance)
                                        <a class="region_link" data-toggle="tooltip" data-placement="top"
                                           data-attraction-id="{{$insurance['name']}}" style="color: dodgerblue"
                                           title="{{ $insurance['description'] }}">{{ $insurance['name'] }}</a>,
                                    @empty
                                    @endforelse
                                </p>

                                <p>
                                    <b>Safari preferences</b>:
                                    @forelse($tourOperator->TourOperatorSafariPreferencesLabel as $safari)

                                        <a href="{{route('touristicAttraction.show',$safari['uuid'])}}" class="safari_link" data-toggle="tooltip" data-placement="top"
                                           data-attraction-id="{{$safari['name']}}" style="color: dodgerblue"
                                           title="{{$safari['description']}}">{{$safari['name']}}</a>,
                                    @empty

                                    @endforelse
                                </p>
                                <p>
                                    <b>Time range for support</b>:
                                    {{$tourOperator->support_time_range}}
                                </p>

                                <div class="d-flex justify-content-center">
                                    <a href="{{$tourOperator->instagram_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/instagram-new--v1.png" alt="instagram-new--v1"/></a>
                                    <a href="{{$tourOperator->whatsapp_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/whatsapp--v1.png" alt="whatsapp--v1"/></a>
                                    <a href=mailto:"{{$tourOperator->email_address}}" target="_black"> <img width="30" height="30" src="https://img.icons8.com/fluency/48/email-open.png" alt="email-open"/></a>
                                    <a href="{{$tourOperator->gps_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/color/48/google-maps-new.png" alt="google-maps-new"/></a>
                                    <a href="{{$tourOperator->website_url}}" target="_blank"><img width="30" height="30" src="https://img.icons8.com/fluency/48/domain.png" alt="domain"/></a>
                                    <a href=tel:"{{$tourOperator->phone_number}}"><img width="30" height="30" src="https://img.icons8.com/color/48/phone.png" alt="phone"/></a>
                                </div>

                                @if($tourOperator->status == 1)
                                    <span class="badge badge-success badge-pill pull-right">Approved</span>
                                @else
                                    <span class="badge badge-danger badge-pill pull-right">Unapproved</span>
                                @endif

                                <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                                    <div class="text-center">
                                        <a href="{{ route('customTourBookings.create', $tourOperator->uuid) }}" class="btn btn-primary btn-sm" style="margin-left: 10px">Request custom tour &blacktriangleright;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @forelse($localTourPackages as $localTourPackage)
                                        <div class="col-md-4" style="margin-top: 15px">
                                            <div class="card h-100 border-primary card-with-gradient">
                                                <a href="{{route('localTourPackage.view',$localTourPackage->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                                    <img class="card-img-top"
                                                         src="{{ asset('public/localSafariBlogImages/'.$localTourPackage->safari_poster) }}"
                                                         style="height: auto; width: 100%; filter: contrast(120%)" loading="lazy">
                                                    <div class="card-img-overlay">
                                                        <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                                            {{$localTourPackage->touristicAttraction->attraction_name }}<br>
                                                            <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$localTourPackage->safari_description}}</span>
                                                        </p>
                                                    </div>
                                                </a>
                                                <div class="card-body" style="position: relative; z-index: 2;">
                                                    @if ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)
                                                        <p><span class="badge badge-success badge-pill">{{ number_format(abs($localTourPackage->CountDownDaysForLocalTourPackageTripLabel)) }} days left</span></p>
                                                    @else
                                                        <span class="badge badge-danger badge-pill">The tour has expired.</span>
                                                    @endif
                                                    <h5 class="card-title" style="font-size: 14px;font-weight: bold">A {{$localTourPackage->tourPackageType->tour_package_type_name}} special for {{$localTourPackage->tanzaniaAndWorldEvent->event_name}}</h5>
                                                    <div style="display: flex">
                                                        <h5 class="card-title" style="font-size: 14px;font-weight: bold;">&starf; {{$localTourPackage->tourType->tour_type_name}}</h5>
                                                        <h5 class="card-title" style="font-size: 14px;font-weight: bold;margin-left: 50px">&starf; Seats left: <span class="badge badge-danger badge-pill">{{number_format($localTourPackage->TotalSpacesRemainedLabel)}} / {{ number_format($localTourPackage->maximum_travellers) }} seats</span></h5>
                                                    </div>

                                                    <p class="card-text" style="font-size: 14px;margin-bottom: 8px">
                                                        <b>Local</b>:
                                                        T shs{{ number_format($localTourPackage->trip_price_adult_tanzanian) }}
                                                        /Adult -
                                                        T shs{{ number_format($localTourPackage->trip_price_child_tanzanian) }}
                                                        /child
                                                    </p>
                                                    <p class="card-text" style="font-size: 14px;">
                                                        <b>Foreigner</b>:
                                                        T shs {{ number_format($localTourPackage->trip_price_adult_foreigner) }}
                                                        /Adult -
                                                        T shs {{ number_format($localTourPackage->trip_price_child_foreigner) }}
                                                        /child
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <a href="{{route('localTourPackage.view',$localTourPackage->uuid)}}" class="btn btn-primary">View Details</a>
                                                        <p style="margin: 0;">Safari offered by: <a href="{{route('tourOperator.publicView',$localTourPackage->tourOperator->uuid)}}">{{$localTourPackage->tourOperator->company_name}} &rightsquigarrow;</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <p style="padding-left: 20px">No local packages available</p>
                                        </div>
                                    @endforelse


                                </div>
                                <div class="row pull-right" style="margin-top: 20px;margin-bottom: 20px">
                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm" style="margin-left: 10px">More? &blacktriangledown;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row" style="padding-top: 5px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                                <p class="card-title" style="font-size: 14px;font-weight: bold">Reservations Included in Posted Safaris</p>
                                <div class="row">
                                    @forelse($localTourPackageReservations as $localTourPackageReservation)
                                        <div class="col-md-4" style="margin-top: 15px">
                                            <a href="{{route('localTourPackage.view',$localTourPackageReservation->localTourPackage->first()->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                                <div class="card h-100 border-primary card-with-gradient">
                                                    <div id="ReservationIndicators" class="carousel slide" data-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            @forelse(explode(',', $localTourPackageReservation->reservation_images) as $index => $image)
                                                                <li data-target="#ReservationIndicators" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                                            @empty
                                                                <p>No image found!</p>
                                                            @endforelse
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            @forelse(explode(',', $localTourPackageReservation->reservation_images) as $index => $image)
                                                                <div class="carousel-item @if($index === 0) active @endif">
                                                                    <img src="{{ asset('public/'.$image) }}" style="width: 100%; height: 200px; object-fit: cover; filter: contrast(120%);" loading="lazy">
                                                                </div>
                                                            @empty
                                                                <p>No image found!</p>
                                                            @endforelse
                                                        </div>
                                                    </div>

                                                    <div class="card-img-overlay">
                                                        <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                                            {{$localTourPackageReservation->reservation_name}}<br>
                                                            <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">
                                                            Travel with {{ $localTourPackageReservation->tourOperator->company_name }}
                                                            to {{$localTourPackageReservation->localTourPackage->first()->touristicAttraction->attraction_name }}
                                                    </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <p>Whoops! No Reservation included yet from the tour packages.</P>
                                    @endforelse

                                </div>
                            <div class="row pull-right" style="margin-top: 20px;margin-bottom: 20px">
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm" style="margin-left: 10px">More? &blacktriangledown;</a>
                                </div>
                            </div>
                                <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="margin-top: 20px">
                                    <p class="card-title" style="font-size: 14px;font-weight: bold">Reviews - <span class="badge badge-primary">{{$totalLocalTouristReviews}}</span></p>
                                @forelse($localTouristReviews as $localTouristReview)
                                        <img width="24" height="24" src="https://img.icons8.com/material/24/user--v1.png" alt="user--v1"/>
                                        <span style="font-weight: bold">{{$localTouristReview->localTourPackageBooking->tourist_name}}</span>
                                        <div style="border: 2px solid gainsboro;padding: 10px 10px 10px 10px;text-align: center">
                                            <span style="font-weight: bold">"Travelled to {{$localTouristReview->localTourPackage->touristicAttraction->attraction_name}}"</span><br>
                                            <span>{{$localTouristReview->review_message}}</span>
                                        </div>
                                        <a href="{{route('localTouristReview.allLocalTouristReviews',$localTouristReview->tourOperator->uuid)}}"
                                           class="btn btn-primary btn-sm text-center" style="margin-top: 20px;">See all
                                            &blacktriangleright;</a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



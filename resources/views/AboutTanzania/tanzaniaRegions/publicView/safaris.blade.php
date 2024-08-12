<div class="tab-pane fade" id="nav-safari" role="tabpanel" aria-labelledby="nav-safari-tab">
    @php
    $noRegionLocalSafariMessage=false;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @forelse($localTourPackages as $localTourPackage)
                    @if($localTourPackage->tourOperator->status==1)
                    <div class="col-md-4" style="margin-top: 15px">
                        <div class="card h-100 border-primary card-with-gradient">
                            <a href="{{route('localTourPackage.view',$localTourPackage->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                <img class="card-img-top"
                                     src="{{ asset('public/localSafariBlogImages/'.$localTourPackage->safari_poster) }}"
                                     style="height: 200px; width: 100%; filter: contrast(120%)" loading="lazy">
                                <div class="card-img-overlay">
                                    <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                        {{ \App\Models\TouristicAttractions\touristicAttractions::find($localTourPackage->safari_name)->attraction_name }}<br>
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
                                <h5 class="card-title" style="font-size: 14px;font-weight: bold">A {{\App\Models\tourPackageType\tourPackageType::find($localTourPackage->tour_package_type_name)->tour_package_type_name}} special for {{\App\Models\tanzaniaAndWorldEvents\tanzaniaAndWorldEvents::find($localTourPackage->targeted_event)->event_name}}</h5>
                                <div style="display: flex">
                                    <h5 class="card-title" style="font-size: 14px;font-weight: bold;">&starf; {{\App\Models\TourTypes\tourTypes::find($localTourPackage->local_tour_type)->tour_type_name}}</h5>
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
                                    <p style="margin: 0;">Safari offered by: <a href="{{route('tourOperator.publicView',\App\Models\TourOperator\tourOperator::find($localTourPackage->tour_operator_id)->uuid)}}">{{\App\Models\TourOperator\tourOperator::find($localTourPackage->tour_operator_id)->company_name}} &rightsquigarrow;</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        @if(!$noRegionLocalSafariMessage)
                            <div class="col-md-12">
                                <p style="padding-left: 20px">No local safaris are currently posted in this region  . However, once you explore the tour operator section, you will discover all the tour operators operating around the available attraction</p>
                            </div>
                            @php
                            $noRegionLocalSafariMessage=true;
                            @endphp
                        @endif
                    @endif
                @empty
                    <div class="col-md-12">
                        <p style="padding-left: 20px">No local safaris are currently posted in this region  . However, once you explore the tour operator section, you will discover all the tour operators operating around the available attraction</p>
                    </div>
                @endforelse
            </div>
            @if(!empty($localTourPackages) && $localTourPackages->count())
                <div class="d-flex justify-content-center" style="margin-top: 20px">
                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-sm" style="margin-left: 10px">View more &blacktriangledown;</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

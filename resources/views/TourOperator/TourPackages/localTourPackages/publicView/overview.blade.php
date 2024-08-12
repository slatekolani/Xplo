    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <a href="{{route('touristicAttraction.show', $localTourPackage->touristicAttraction->uuid)}}" class="attraction-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{$localTourPackage->touristicAttraction->id}}" style="color: dodgerblue;font-weight: bold;font-size: 15px" title="{{$localTourPackage->touristicAttraction->attraction_description}}">{{$localTourPackage->touristicAttraction->attraction_name}} &rightsquigarrow;</a>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold"></h5>
        <p>{{$localTourPackage->safari_description}}</p>

        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Safari targeted audience & event</h5>
        <p>An <a href="{{route('tourPackageType.spotLocalSafaris',$localTourPackage->tourPackageType->uuid)}}" class="event-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{$localTourPackage->tourPackageType->id}}" style="color: dodgerblue" title="{{$localTourPackage->tourPackageType->tour_package_type_description}}">{{$localTourPackage->tourPackageType->tour_package_type_name}}</a> special for <a href="{{route('event.spotLocalSafaris',$localTourPackage->tanzaniaAndWorldEvent->uuid)}}" class="event-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{$localTourPackage->tanzaniaAndWorldEvent->id}}" style="color: dodgerblue" title="{{$localTourPackage->tanzaniaAndWorldEvent->event_description}}">{{$localTourPackage->tanzaniaAndWorldEvent->event_name}} </a> ... (<a href="{{route('tourType.spotLocalSafaris',$localTourPackage->tourType->uuid)}}">{{$localTourPackage->tourType->tour_type_name}}</a>)</p>
        <p>Children below the age of <b style="color: dodgerblue">{{$localTourPackage->free_of_charge_age}}</b>  are not charged for this safari.</p>

        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Safari capability</h5>
        <p>This safari can accommodate only <span class="badge badge-success badge-pill">{{ number_format($localTourPackage->maximum_travellers) }} travellers</span></p>
        <div class="d-inline">
            <p class="d-inline mr-2">Seats Booked: <span class="badge badge-info badge-pill">{{number_format($localTourPackage->NumberOfBookedSpacesLabel)}} seats booked </span></p>
            <p class="d-inline">Seats Left: <span class="badge badge-danger badge-pill">{{number_format($localTourPackage->TotalSpacesRemainedLabel)}} seats left</span></p>
        </div>


        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Safari Dates</h5>
        <p>Starts from <b>{{date('jS M Y',strtotime($localTourPackage->safari_start_date))}}</b> to <b>{{date('jS M Y',strtotime($localTourPackage->safari_end_date))}}</b></p>
        @if ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)
            <p>Count down days to the tour: <span class="badge badge-success badge-pill">{{ number_format(abs($localTourPackage->CountDownDaysForLocalTourPackageTripLabel)) }} days left</span></p>
        @else
            <span class="badge badge-danger badge-pill">The tour has expired </span>
        @endif
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Activities</h5>
        <p>These are the activities that will be included in this tour</p>
        <div class="table-responsive">
            <table class="table" style="min-width: 600px;overflow-x: scroll">
                <tr>
                    <th>Activity name</th>
                    <th>Activity description</th>
                </tr>
                @forelse($localTourActivities as $localTourActivity)
                    <tr>
                        <td>&starf;{{$localTourActivity->activity_name}}</td>
                        <td>{{$localTourActivity->activity_description}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">It appears that tour activities are yet to be added. Please wait!</td>
                    </tr>
                @endforelse
            </table>
        </div>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Tour prices</h5>
        <p>These are the tour prices for <a href="{{route('touristicAttraction.show', $localTourPackage->touristicAttraction->uuid)}}" class="attraction-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{$localTourPackage->touristicAttraction->id}}" style="color: dodgerblue" title="{{$localTourPackage->touristicAttraction->attraction_description}}">{{$localTourPackage->touristicAttraction->attraction_name}}</a></p>
        <div class="table-responsive">
            <table class="table" style="min-width: 600px">
                <tr>
                    <th>Resident child</th>
                    <th>Resident adult</th>
                    <th>Non resident child</th>
                    <th>Non resident adult</th>
                </tr>
                <tr>
                    <td>T shs {{number_format($localTourPackage->trip_price_child_tanzanian)}}</td>
                    <td>T shs {{number_format($localTourPackage->trip_price_adult_tanzanian)}}</td>
                    <td>T shs {{number_format($localTourPackage->trip_price_child_foreigner)}}</td>
                    <td>T shs {{number_format($localTourPackage->trip_price_adult_foreigner)}}</td>
                </tr>
            </table>
        </div>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Collection Stations and Their Additional Prices</h5>
        <p>These amounts will be added to your tour price</p>
        <div class="table-responsive">
            <table class="table" style="min-width: 600px">
                <tr>
                    <th>Collection stop</th>
                    <th>Pick up time</th>
                    <th>Added amount</th>
                </tr>
                @forelse($localTourCollectionStations as $localTourCollectionStation)
                    <tr>
                        <td>&starf;{{$localTourCollectionStation->collection_stop_name}}</td>
                        <td>{{ date('H:i a', strtotime($localTourCollectionStation->pick_up_time)) }}</td>
                        <td>T shs {{number_format($localTourCollectionStation->collection_stop_price)}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">It seems that collection stops are yet to be added. Please wait!</td>
                    </tr>
                @endforelse
            </table>
        </div>
        <br>
        <div style="display: flex;">
            <!-- First Table - Transports used -->
            <div class="table-responsive">
                <table style="margin-right: 20px;min-width: 600px" class="table">
                    <thead>
                    <tr>
                        <th>Transports used</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(explode(',', $localTourPackage->LocalTourPackageTransportsLabel) as $transports)
                        <tr>
                            <td style="list-style: none;margin-left: 0;">&starf; {{ $transports }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Second Table - Special attention capability -->

            <div class="table-responsive">
                <table style="margin-right: 20px;min-width: 600px" class="table">
                    <thead>
                <tr>
                    <th>Safari Special Attention</th>
                </tr>
                </thead>
                <tbody>
                @forelse(explode(',', $localTourPackage->LocalTourPackageSpecialNeedsLabel) as $specialNeeds)
                    <tr>
                        <td style="list-style: none;margin-left: 0;">&starf; {{ $specialNeeds }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No special needs added</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        </div>
        <div style="display: flex;">
            <!-- First Table - Price Inclusive -->
            <div class="table-responsive">
                <table style="margin-right: 20px;min-width: 600px" class="table">                    <thead>
                <tr>
                    <th>Tour Price Inclusive Items</th>
                </tr>
                </thead>
                <tbody>
                @forelse($localTourPackagePriceInclusiveItems as $localTourPackagePriceInclusiveItem)
                    <tr>
                        <td>&starf;{{$localTourPackagePriceInclusiveItem->item}}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No price inclusive item added</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>

            <!-- Second Table - Price Exclusive items-->
            <div class="table-responsive">
                <table style="margin-right: 20px;min-width: 600px" class="table">                    <thead>
                <tr>
                    <th>Tour Price Exclusive Items</th>
                </tr>
                </thead>
                <tbody>
                @forelse($localTourPackagePriceExclusiveItems as $localTourPackagePriceExclusiveItem)
                    <tr>
                        <td>&starf;{{$localTourPackagePriceExclusiveItem->item}}</td>
                    </tr>
                @empty
                    <tr>
                        <td>No price exclusive items added</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>
        </div>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">What to bring on this tour?</h5>
        <div class="table-responsive">
            <table style="margin-right: 20px;min-width: 600px" class="table">
                <thead>
            <tr>
                <th>Requirement</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            @forelse($localTourPackageRequirements as $localTourPackageRequirement)
                <tr>
                    <td>&starf;{{$localTourPackageRequirement->requirement_name}}</td>
                    <td>{{$localTourPackageRequirement->requirement_description}}</td>
                </tr>
            @empty
                <tr>
                    <td>No Requirement added</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Discount offer</h5>
        <p>{{$localTourPackage->discount_offered}}</p>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">How we do handle emergencies</h5>
        <p>{{$localTourPackage->emergency_handling}}</p>
        <br>
        <h5 class="card-title" style="font-size: 14px;font-weight: bold;border-bottom:2px solid gainsboro;border-bottom-style: dotted">Customer satisfaction offered</h5>
        @forelse($localTourPackageCustomerSatisfactions as $localTourPackageCustomerSatisfaction)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h5 style="font-weight: bold;">&star;{{$localTourPackageCustomerSatisfaction->customer_satisfaction_name}}</h5>
                    </div>
                </div>
                <div class="panel-body">
                    <p>{{$localTourPackageCustomerSatisfaction->customer_satisfaction_description}}</p>
                    <a href="{{route('customerSatisfactionCategory.spotLocalSafaris',$localTourPackageCustomerSatisfaction->uuid)}}" class="btn btn-primary btn-sm">See local safari's offering {{$localTourPackageCustomerSatisfaction->customer_satisfaction_name}}</a>
                </div>

            </div>
        @empty
            <p>Whoops! No customer experience has been published yet. Please wait while our personnel work on it</p>
        @endforelse
    </div>


@extends('layouts.main', ['title' => 'Spotted local safaris offering - '. $customerSatisfaction->customer_satisfaction_name, 'header' => 'Spotted local safaris'])
@include('includes.validate_assets')
@section('content')

    @php
        $messageDisplayed=false;
    @endphp
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3> Local Safari's offering {{$customerSatisfaction->customer_satisfaction_name}}</h3>
                                <div class="row">
                                    @forelse($localTourPackages as $localTourPackage)
                                        @if($localTourPackage->tourOperator->status==1)
                                        <div class="col-md-4" style="margin-top: 15px">
                                            <div class="card h-100 border-primary card-with-gradient">
                                                <a href="{{route('localTourPackage.view',$localTourPackage->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                                    <img class="card-img-top"
                                                         src="{{ asset('public/localSafariBlogImages/'.$localTourPackage->safari_poster) }}"
                                                         style="width: 100%; height: 200px; object-fit: cover; filter: contrast(120%)" loading="lazy">
                                                    <div class="card-img-overlay">
                                                        <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                                            {{$localTourPackage->touristicAttraction->attraction_name }}<br>
                                                            <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$localTourPackage->safari_description}}</span>
                                                        </p>
                                                    </div>
                                                </a>
                                                <div class="card-body" style="position: relative; z-index: 2;">
                                                    @if ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)
                                                        <p><span class="badge badge-success badge-pill">{{abs ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel) }} days left</span></p>
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
                                        @else
                                            @if(!$messageDisplayed)
                                            <p>No local safaris are currently available that offer <b>{{$customerSatisfaction->customer_satisfaction_name}}</b>. However, we can help you find one. Please check your email for assistance.</p>
                                                @php
                                                $messageDisplayed=true;
                                                @endphp
                                            @endif
                                        @endif
                                    @empty
                                        <div class="col-md-12">
                                            <p style="padding-left: 20px">No local packages available</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="pagination">
                            {{$localTourPackages->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



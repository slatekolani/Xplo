@extends('layouts.main', [
    'title' => __("Event - " . $event->event_name),
    'header' => __('Event - ' . $event->event_name)
])

@include('includes.validate_assets')


@section('content')
    @php
        $noLocalSafariMessage=false;
    @endphp
    <div class="row" style="margin-top: 10px">
            <div class="card">
                <div class="card-body" style="background-color: rgba(255,255,255,0.85)">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header bg-primary text-white">
                                <h2 class="mb-0">{{$event->event_name}} (<span style="font-size:18px">{{$event->event_description}}</span>)</h2>
                                <p style="color:#ffd700;font-size:15px"><i>"Exploration enthusiasts, Travel on {{$event->event_name}} for an incredible memory."</i></p>
                            </div>
                        </div>

                        <div class="col-md-12">
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
                                                    <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; top: 0; right: 0; padding: 1rem;">
                                                        @if ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)
    
                                                        <span class="badge badge-primary badge-pill badge-sm">Upcoming</span>
                                                    @else
                                                        <span class="badge badge-danger badge-pill badge-sm">Expired</span>
                                                    @endif
                                                    </p>
                                                    <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                                        {{$localTourPackage->touristicAttraction->attraction_name }}<br>
                                                        <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$localTourPackage->safari_description}}</span>
                                                    </p>
                                                </div>
                                            </a>
                                            <div class="card-body" style="position: relative; z-index: 2;">
                                                @if ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)

                                                <p>{!! ($localTourPackage->CountDownDaysForLocalTourPackageTripLabel) !!} ~ Book Now! A lifetime experience awaits...</p>
                                                @else
                                                    <span class="badge badge-danger badge-pill">Expired</span>
                                                @endif
                                                <h5 class="card-title" style="font-size: 14px;font-weight: bold">A {{$localTourPackage->tourPackageType->tour_package_type_name}} special for {{$localTourPackage->tanzaniaAndWorldEvent->event_name}}</h5>
                                                <div style="display: flex">
                                                    <h5 class="card-title" style="font-size: 14px;font-weight: bold;color:#ffd700">&starf; {{$localTourPackage->tourType->tour_type_name}}</h5>
                                                    <h5 class="card-title" style="font-size: 14px;font-weight: bold;margin-left: 50px"> <i class="fas fa-users" style="color: red"></i> <span style="font-size: 13px;color:red">{{number_format($localTourPackage->TotalSpacesRemainedLabel)}} / {{ number_format($localTourPackage->maximum_travellers) }} seats</span></h5>
                                                </div>

                                                <p class="card-text" style="font-size: 14px;margin-bottom: 8px">
                                                    <b>Local</b>:
                                                    Tshs {{ number_format($localTourPackage->trip_price_adult_tanzanian) }}
                                                    <span style="color: dodgerblue">/Adult</span> ~
                                                    Tshs {{ number_format($localTourPackage->trip_price_child_tanzanian) }}
                                                    <span style="color: dodgerblue">/child</span>
                                                </p>
                                                <p class="card-text" style="font-size: 14px;">
                                                    <b>Foreigner</b>:
                                                    Tshs {{ number_format($localTourPackage->trip_price_adult_foreigner) }}
                                                    <span style="color: dodgerblue">/Adult</span> ~
                                                    Tshs {{ number_format($localTourPackage->trip_price_child_foreigner) }}
                                                    <span style="color: dodgerblue">/child</span>
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{route('localTourPackage.view',$localTourPackage->uuid)}}" class="btn btn-primary">View Details</a>
                                                    <p style="margin: 0;">Safari offered by: <a href="{{route('tourOperator.publicView',$localTourPackage->tourOperator->uuid)}}">{{$localTourPackage->tourOperator->company_name}} &rightsquigarrow;</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        @if(!$noLocalSafariMessage)
                                            <p style="padding-left: 20px">No local package special for <span style="color: dodgerblue">{{$event->event_name}}</span> has been published yet. However, we can find one for you. Please check here to request assistance in finding a suitable package.</p>
                                            @php
                                            $noLocalSafariMessage=true;
                                            @endphp
                                        @endif
                                    @endif
                                 @empty
                                    <div class="col-md-12">
                                        <p style="padding-left: 20px">No local package special for <span style="color: dodgerblue">{{$event->event_name}}</span> has been published yet. However, we can find one for you. Please check here to request assistance in finding a suitable package.</p>
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
@endsection

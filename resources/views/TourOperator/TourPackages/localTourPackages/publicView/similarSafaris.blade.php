<div class="tab-pane fade" id="nav-similarSafaris" role="tabpanel" aria-labelledby="nav-similarSafaris-tab">

    <div class="row">
        <div class="col-md-12">
            <h3>Similar Safari's to <a href="{{route('touristicAttraction.show', $localTourPackage->touristicAttraction->uuid)}}" class="attraction-link" data-toggle="tooltip" data-placement="top" data-attraction-id="{{$localTourPackage->touristicAttraction->id}}" style="color: dodgerblue;" title="{{$localTourPackage->touristicAttraction->attraction_description}}">{{$localTourPackage->touristicAttraction->attraction_name}}</a></h3>

            <div class="row">
    @forelse($similarLocalTourPackages as $similarLocalTourPackage)
        <div class="col-md-4" style="margin-top: 15px">
            <div class="card h-100 border-primary card-with-gradient">
                <a href="{{route('localTourPackage.view',$similarLocalTourPackage->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                    <img class="card-img-top"
                         src="{{ asset('public/localSafariBlogImages/'.$similarLocalTourPackage->safari_poster) }}"
                         style="height: auto; width: 100%; filter: contrast(120%)" loading="lazy">
                    <div class="card-img-overlay">
                        <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                            {{ $similarLocalTourPackage->touristicAttraction->attraction_name }}<br>
                            <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$similarLocalTourPackage->safari_description}}</span>
                        </p>
                    </div>
                </a>
                <div class="card-body" style="position: relative; z-index: 2;">
                    @if ($similarLocalTourPackage->CountDownDaysForLocalTourPackageTripLabel >= 0)
                        <p><span class="badge badge-success badge-pill">{{ number_format(abs($similarLocalTourPackage->CountDownDaysForLocalTourPackageTripLabel)) }} days left</span></p>
                    @else
                        <span class="badge badge-danger badge-pill">The tour has expired.</span>
                    @endif
                    <h5 class="card-title" style="font-size: 14px;font-weight: bold">A {{$similarLocalTourPackage->tourPackageType->tour_package_type_name}} special for {{$similarLocalTourPackage->tanzaniaAndWorldEvent->event_name}}</h5>
                    <div style="display: flex">
                        <h5 class="card-title" style="font-size: 14px;font-weight: bold;">&starf; {{$similarLocalTourPackage->tourType->tour_type_name}}</h5>
                        <h5 class="card-title" style="font-size: 14px;font-weight: bold;margin-left: 50px">&starf; Seats left: <span class="badge badge-danger badge-pill">{{number_format($similarLocalTourPackage->TotalSpacesRemainedLabel)}} / {{ number_format($similarLocalTourPackage->maximum_travellers) }} seats</span></h5>
                    </div>

                    <p class="card-text" style="font-size: 14px;margin-bottom: 8px">
                        <b>Local</b>:
                        T shs{{ number_format($similarLocalTourPackage->trip_price_adult_tanzanian) }}
                        /Adult -
                        T shs{{ number_format($similarLocalTourPackage->trip_price_child_tanzanian) }}
                        /child
                    </p>
                    <p class="card-text" style="font-size: 14px;">
                        <b>Foreigner</b>:
                        T shs {{ number_format($similarLocalTourPackage->trip_price_adult_foreigner) }}
                        /Adult -
                        T shs {{ number_format($similarLocalTourPackage->trip_price_child_foreigner) }}
                        /child
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{route('localTourPackage.view',$similarLocalTourPackage->uuid)}}" class="btn btn-primary">View Details</a>
                        <p style="margin: 0;">Safari offered by: <a href="{{route('tourOperator.publicView',$similarLocalTourPackage->tourOperator->uuid)}}">{{$similarLocalTourPackage->tourOperator->company_name}} &rightsquigarrow;</a></p>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <p>No similar safaris found</p>
    @endforelse
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 10px">
        <a href="#"
           style="float: right;" class="btn btn-primary btn-sm"> See More &blacktriangledown;</a>
    </div>
</div>
@push('after-scripts')

    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endpush




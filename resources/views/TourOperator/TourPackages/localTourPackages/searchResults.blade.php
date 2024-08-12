@extends('layouts.main', ['title' => __("Search Results"), 'header' => __("Search Results")])

@push('after-styles')
{{ Html::style(url('vendor/select2/css/select2.min.css')) }}
<style>

</style>
@endpush

@section('content')
    @guest

        <div class="card">
            <div class="card-body">
                <div class="row" style="padding-top: 30px">
                    <div class="col-md-12">
                        <form class="search-bar" type="get" action="{{route('localTourPackage.search')}}"
                              style="padding-top: 20px;position: relative">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" id="form1" name="search" class="form-control"
                                           style="width: 400px;" placeholder="Wanna explore more. Search again..."/>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search" style="width: 40px"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                @foreach($searchedLocalTourPackage as $searchedItem)
                    <h4>
                        Search results for "{{ $searchedItem }}"
                    </h4>
                @endforeach

                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            Local Safari's </h3>
                        <div class="row">
                            @forelse($localTourPackages as $localTourPackage)
                                @if($localTourPackage->tourOperator->status == 1)
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
                                            <h5 class="card-title" style="font-size: 14px;font-weight: bold">A {{$localTourPackage->tour_package_type_name !==null ? $localTourPackage->tour_package_type_name : 'No Package type listed'}} special for {{$localTourPackage->event_name !==null ? $localTourPackage->event_name : 'No event listed'}}</h5>
                                            <div style="display: flex">
                                                @if ($localTourPackage->tour_type_name !== null)
                                                    <h5 class="card-title" style="font-size: 14px; font-weight: bold;">&starf; {{ $localTourPackage->tour_type_name }}</h5>
                                                @else
                                                    <p>No tour type available</p>
                                                @endif
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
                                    @include('TourOperator.TourPackages.localTourPackages.failedPackageRecommendation')
                                @endif
                            @empty
                                <div class="col-md-12">
                                    <p style="padding-left: 20px">No local packages available</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="row pull-right" style="margin-top: 20px;margin-bottom: 20px">
                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-sm" style="margin-left: 10px">More? &blacktriangledown;</a>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection

@extends('layouts.main', ['title' => __("label.home"), 'header' => __("label.home")])

@push('after-styles')
    {{ Html::style(url('vendor/select2/css/select2.min.css')) }}

    <style>

    </style>
@endpush

@section('content')
    @guest
<br>
        <div class="card">
            <div class="card-body">
                <div class="row" style="padding-top: 5px">
                    <div class="col-md-12">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h3 style="color: gray; font-size: 30px; margin: 10px 10px 10px 10px;">
                                    {{$nation->nation_name}} ~ <span style="font-size: 25px; color: dodgerblue">{{$nation->nation_description}}</span>
                                </h3>
                            </div>

                            <p class="card-text" style="width: 100%;color: gray;margin: 5px 5px 5px 5px">Welcome to
                                Tanzania, where a diverse array of captivating attractions awaits. From the iconic
                                Serengeti with its Great Migration to the enchanting Zanzibar Archipelago, our country
                                offers an unforgettable blend of wildlife, landscapes, and cultural heritage. Join us
                                for an experience that leaves a lasting impression on your heart.</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card" style="background-color:white">
                                                <div class="card-body">
                                                    <div style="display: flex">
                                                        <img src="{{url('/public/HomeImages/Calender icon.jpeg')}}" style="width:50px;height:50px">
                                                        <p class="card-text" style="padding-left: 10px"><b>Best Time To Come</b> <br> June to October (Migration from june to July and January to February)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card" style="background-color:white">
                                                <div class="card-body">
                                                    <div style="display: flex">
                                                        <img src="{{url('/public/HomeImages/Clock icon.jpeg')}}" style="width: 50px; height: 50px">
                                                        <p class="card-text"><b>High Season</b> <br>July to March (Northern circuit parks get crowded)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card" style="background-color:white">
                                                <div class="card-body">
                                                    <div style="display: flex">
                                                        <img src="{{url('/public/HomeImages/Tanzania map.jpeg')}}" style="width: 70px; height: 70px">
                                                        <p class="card-text" style="padding-top: 20px"> <a href="{{ route('Tanzania.show', $nation->uuid) }}"> Wanna know more about Tanzania? &blacktriangleright;&blacktriangleright;</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="scroll-container">
                            <a href="{{route('tourOperatorReservation.allReservations')}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">Reservations</button></a>
                            @forelse($events as $event)
                                <a href="{{route('event.spotLocalSafaris',$event->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$event->event_name}}</button></a>
                                @empty
                            @endforelse

                            @forelse($tourPackageTypes as $tourPackageType)
                                    <a href="{{route('tourPackageType.spotLocalSafaris',$tourPackageType->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$tourPackageType->tour_package_type_name}}</button></a>
                                @empty
                            @endforelse

                                @forelse($customerSatisfactionCategories as $customerSatisfactionCategory)
                                        <a href="{{route('customerSatisfactionCategory.spotLocalSafaris',$customerSatisfactionCategory->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$customerSatisfactionCategory->customer_satisfaction_name}}</button></a>
                                     @empty
                                 @endforelse

                                @forelse($tourTypes as $tourType)
                                        <a href="{{route('tourType.spotLocalSafaris',$tourType->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$tourType->tour_type_name}}</button></a>
                                     @empty
                                 @endforelse

                                @forelse($touristicGames as $touristicGame)
                                        <a href="{{route('touristicGame.publicView',$touristicGame->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$touristicGame->game_name}}</button></a>
                                     @empty
                                 @endforelse
                            @forelse($touristicAttractionCategories as $touristicAttractionCategory)
                                <a href="{{route('localTourPackage.localSafariAttractionCategory',$touristicAttractionCategory->uuid)}}"><button class="btn btn-outline-primary" style="border-radius: 20px; border-color: gainsboro;">{{$touristicAttractionCategory->attraction_category}}</button></a>
                            @empty
                            @endforelse

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Natural beauty </h3>
                        <div class="row">
                            @forelse($touristicAttractions as $touristicAttraction)
                                <div class="col-md-4" style="margin-top: 15px">
                                    <a href="{{ route('touristicAttraction.show', $touristicAttraction->uuid) }}" style="text-decoration: none; position: relative; display: block;">
                                        <div class="card h-100 border-primary card-with-gradient">
                                            <div id="AttractionsIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @forelse(explode(',', $touristicAttraction->attraction_image) as $index => $image)
                                                        <li data-target="#AttractionsIndicators" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                                    @empty
                                                        <p>No image found!</p>
                                                    @endforelse
                                                </ol>
                                                <div class="carousel-inner">
                                                    @forelse(explode(',', $touristicAttraction->attraction_image) as $index => $image)
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
                                                    {{$touristicAttraction->attraction_name}}<br>
                                                    <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$touristicAttraction->attraction_description}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>Whoops! No Tanzanian attraction has been published yet. Our personnel are working on it</P>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-3">
                                    <a href="{{ route('Tanzania.show',$nation->uuid) }}" class="btn btn-primary btn-sm">
                                        Discover More of Tanzania <span class="ml-1">&#9654;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Regions </h3>
                        <div class="row">
                            @forelse($regions as $region)
                                <div class="col-md-4" style="margin-top: 15px">
                                    <a href="{{route('tanzaniaRegion.publicView',$region->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                        <div class="card h-100 border-primary card-with-gradient">
                                            <div id="AttractionsIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @forelse(explode(',', $region->region_icon_image) as $index => $image)
                                                        <li data-target="#AttractionsIndicators" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                                    @empty
                                                        <p>No image found!</p>
                                                    @endforelse
                                                </ol>
                                                <div class="carousel-inner">
                                                    @forelse(explode(',', $region->region_icon_image) as $index => $image)
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
                                                    {{$region->region_name}}<br>
                                                    <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$region->region_description}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>Whoops! No Region has been published yet. Our personnel are working on it</p>
                            @endforelse


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-3">
                                    <a href="{{ route('Tanzania.show',$nation->uuid) }}" class="btn btn-primary btn-sm">
                                        Discover More of Tanzania <span class="ml-1">&#9654;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Culture </h3>
                        <div class="row">
                                @forelse($cultures as $culture)
                                    <div class="col-md-4" style="margin-top: 15px">
                                        <a href="{{ route('tanzaniaRegion.publicView', $culture->tanzaniaRegion->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                            <div class="card h-100 border-primary card-with-gradient">
                                                <div id="AttractionsIndicators" class="carousel slide" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @forelse(explode(',', $culture->culture_image) as $index => $image)
                                                            <li data-target="#AttractionsIndicators" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                                        @empty
                                                            <p>No image found!</p>
                                                        @endforelse
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @forelse(explode(',', $culture->culture_image) as $index => $image)
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
                                                        {{$culture->culture_name}}<br>
                                                        <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$culture->basic_information}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            @empty
                                    <p>Whoops! No Tanzanian attraction has been published yet. Our personnel are working on it</P>
                            @endforelse
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-3">
                                    <a href="{{ route('Tanzania.show',$nation->uuid) }}" class="btn btn-primary btn-sm">
                                        Discover More of Tanzania <span class="ml-1">&#9654;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Local Safari's </h3>
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
                                                <p><span class="badge badge-success badge-pill">{{ abs($localTourPackage->CountDownDaysForLocalTourPackageTripLabel) }} days left</span></p>
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
                                @endif
                            @empty
                                <div class="col-md-12">
                                    <p style="padding-left: 20px">No local packages posted yet. We are still working on it</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                @if(!empty($localTourPackages) && $localTourPackages->count())
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right mt-3">
                            <a href="{{ route('localTourPackage.allLocalTourPackages') }}" class="btn btn-primary btn-sm">
                                Discover More <span class="ml-1">&#9654;</span>
                            </a>
                        </div>
                    </div>
                </div>
                    @endif
                <div class="row">
                    <div class="col-md-12">
                        <h3>Reservations included in Local Safaris </h3>
                        <div class="row">
                            <?php
                                $reservationCount = 0;
                            ?>

                            @forelse($reservationLocalTourPackages as $reservationLocalTourPackage)
                                @forelse($reservationLocalTourPackage->localTourPackageReservations as $localTourPackageReservation)
                                @if($localTourPackageReservation->tourOperator->status==1)
                                        @if($reservationCount < 3)
                                        <div class="col-md-4" style="margin-top: 15px">
                                    <a href="{{route('localTourPackage.view',$reservationLocalTourPackage->uuid)}}" style="text-decoration: none; position: relative; display: block;">
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
                                                            to {{ $reservationLocalTourPackage->touristicAttraction->attraction_name }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                        <?php
                                            $reservationCount++;
                                        ?>
                                        @else
                                            @break;
                                        @endif
                                @endif
                                @empty
                                @endforelse
                            @empty
                                <div class="col-md-12">
                                    <p style="padding-left: 20px">Whoops! No Reservation included yet from the tour packages.</p>
                                </div>
                            @endforelse
                        </div>
                        @if(!empty($reservationLocalTourPackages) && $reservationLocalTourPackages->count())
                            @if($reservationLocalTourPackage->tourOperator->status==1)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right mt-3">
                                    <a href="{{ route('tourOperatorReservation.allReservations') }}" class="btn btn-primary btn-sm">
                                        See More <span class="ml-1">&#9654;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Tangible touristic games</h3>
                        <div class="row">
                            @forelse($touristicGames as $touristicGame)
                                <div class="col-md-4" style="margin-top: 15px">
                                    <a href="{{route('touristicGame.publicView',$touristicGame->uuid)}}" style="text-decoration: none; position: relative; display: block;">
                                        <div class="card h-100 border-primary card-with-gradient">
                                            <div id="GameIndicator" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @forelse(explode(',', $touristicGame->game_images) as $index => $image)
                                                        <li data-target="#GameIndicator" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                                                    @empty
                                                        <p>No image found!</p>
                                                    @endforelse
                                                </ol>
                                                <div class="carousel-inner">
                                                    @forelse(explode(',', $touristicGame->game_images) as $index => $image)
                                                        <div class="carousel-item @if($index === 0) active @endif">
                                                            <img src="{{ asset('public/'.$image) }}" style="width: 100%; height: 350px; object-fit: cover; filter: contrast(120%);" loading="lazy">
                                                        </div>
                                                    @empty
                                                        <p>No image found!</p>
                                                    @endforelse
                                                </div>
                                            </div>

                                            <div class="card-img-overlay">
                                                <p class="card-text card-text-white" style="font-size: 1.5rem; font-weight: bold; position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem;">
                                                    {{$touristicGame->game_name}}<br>
                                                    <span style="font-family: 'Montserrat', sans-serif;font-weight: normal;font-size: 1rem">{{$touristicGame->game_category}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>Whoops! No Game has been published yet. Our personnel are working on it</P>
                            @endforelse
                        </div>
                        @if(!empty($touristicGames) && $touristicGames->count())
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right mt-3">
                                            <a href="{{ route('touristicGame.allTouristicGames') }}" class="btn btn-primary btn-sm">
                                                See More <span class="ml-1">&#9654;</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    @endguest
    @auth
        @if(Auth::user()->role==2)
            @include('TourOperator.overviewDashboard.view')
        @endif
    @endauth
@endsection
    @push('after-scripts')
        <script>
            $(document).ready(function () {
                $(".filter-container").on('scroll', function () {
                    var scrollLeft = $(this).scrollLeft();
                    $(".filter-container").css("transform", "translateX(-" + scrollLeft + "px)");
                });
            });
        </script>
    @endpush
@push('after-scripts')

    <script>
        $(function () {
            $(".select2").select2();


        });

    </script>
@endpush






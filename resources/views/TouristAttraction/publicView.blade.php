@extends('layouts.main', ['title' => $touristicAttraction->attraction_name, 'header' => $touristicAttraction->attraction_name])
@include('includes.validate_assets')

@section('content')

    <div class="col-md-12">
                <div class="card" style="margin-top: 30px">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3>Exploration enthusiasts,
                                Visit {{$touristicAttraction->attraction_name}} today. </h3>
                        </div>

                        <div class="tab-pane" id="pills-touristAttraction" role="tabpanel" aria-labelledby="pills-touristAttraction-tab">
                            <div class="nav-container">
                                <ul class="nav nav-tabs flex-nowrap" id="nav-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="color: dodgerblue" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-basicInformation-tab" data-toggle="tab" href="#nav-basicInformation" role="tab" aria-controls="nav-basicInformation" aria-selected="false">Basic information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-detail-tab" data-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">More detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-honeyPoints-tab" data-toggle="tab" href="#nav-honeyPoints" role="tab" aria-controls="nav-honeyPoints" aria-selected="false">Honey points</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-visitReason-tab" data-toggle="tab" href="#nav-visitReason" role="tab" aria-controls="nav-visitReason" aria-selected="false">Why Visit?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-advice-tab" data-toggle="tab" href="#nav-advice" role="tab" aria-controls="nav-advice" aria-selected="false">Advice</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-tourOperators-tab" data-toggle="tab" href="#nav-tourOperators" role="tab" aria-controls="nav-tourOperators" aria-selected="false">Tour Operators</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-attractionSafaris-tab" data-toggle="tab" href="#nav-attractionSafaris" role="tab" aria-controls="nav-attractionSafaris" aria-selected="false">Safari's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-FAQ-tab" data-toggle="tab" href="#nav-FAQ" role="tab" aria-controls="nav-FAQ" aria-selected="false">FAQ's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-attractionRules-tab" data-toggle="tab" href="#nav-attractionRules" role="tab" aria-controls="nav-attractionRules" aria-selected="false">Attraction rules</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-Gallery-tab" data-toggle="tab" href="#nav-Gallery" role="tab" aria-controls="nav-Gallery" aria-selected="false">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-googleMap-tab" data-toggle="tab" href="#nav-googleMap" role="tab" aria-controls="nav-googleMap" aria-selected="false">Google map</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            @include('TouristAttraction.publicView.about')
                            @include('TouristAttraction.publicView.basicInformation')
                            @include('TouristAttraction.publicView.detail')
                            @include('TouristAttraction.honeyPoints.publicView.honeyPoints')
                            @include('TouristAttraction.publicView.visitReason')
                            @include('TouristAttraction.publicView.advice')
                            @include('TouristAttraction.publicView.tourOperators')
                            @include('TouristAttraction.publicView.attractionSafaris')
                            @include('TouristAttraction.publicView.attractionRules')
                            @include('TouristAttraction.publicView.FAQ')
                            @include('TouristAttraction.publicView.gallery')
                            @include('TouristAttraction.publicView.googleMap')
                        </div>
                    </div>
                </div>
    </div>

@endsection



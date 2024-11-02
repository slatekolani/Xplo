@extends('layouts.main', ['title' => $tanzaniaRegion->region_name, 'header' => $tanzaniaRegion->region_name])
@include('includes.validate_assets')

@section('content')

        <div class="row" style="margin-top: 30px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: rgba(255,255,255,0.85)">
                        <div class="d-flex justify-content-center">
                            <h3 style="color: dodgerblue;font-size:30px">{{$tanzaniaRegion->region_name}}</h3>
                        </div>
                        <p style="text-align: center;color:black">{{$tanzaniaRegion->region_description}}</p>
                        <div class="tab-pane" id="pills-touristAttraction" role="tabpanel" aria-labelledby="pills-touristAttraction-tab">
                            <div class="nav-container">
                                <ul class="nav nav-tabs flex-nowrap" id="nav-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="color: dodgerblue;width: auto" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-tourOperators-tab" data-toggle="tab" href="#nav-tourOperators" role="tab" aria-controls="nav-tourOperators" aria-selected="false">Tour Operators</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-attractions-tab" data-toggle="tab" href="#nav-attractions" role="tab" aria-controls="nav-attractions" aria-selected="false">Attractions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-safari-tab" data-toggle="tab" href="#nav-safari" role="tab" aria-controls="nav-safari" aria-selected="false">Safari's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-Culture-tab" data-toggle="tab" href="#nav-Culture" role="tab" aria-controls="nav-Culture" aria-selected="false">Culture</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-economicActivities-tab" data-toggle="tab" href="#nav-economicActivities" role="tab" aria-controls="nav-economicActivities" aria-selected="false">Economic activities</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-precautions-tab" data-toggle="tab" href="#nav-precautions" role="tab" aria-controls="nav-precautions" aria-selected="false">Precautions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue" id="nav-FAQ-tab" data-toggle="tab" href="#nav-FAQ" role="tab" aria-controls="nav-FAQ" aria-selected="false">FAQ's</a>
                                    </li>
                              
                                    <li class="nav-item">
                                        <a class="nav-link" style="color: dodgerblue"  id="nav-Gallery-tab" data-toggle="tab" href="#nav-Gallery" role="tab" aria-controls="nav-Gallery" aria-selected="false">Gallery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            @include('AboutTanzania.tanzaniaRegions.publicView.about')
                            @include('AboutTanzania.tanzaniaRegions.publicView.economicActivities')
                            @include('AboutTanzania.tanzaniaRegions.publicView.precautions')
                            @include('AboutTanzania.tanzaniaRegions.publicView.tourOperators')
                            @include('AboutTanzania.tanzaniaRegions.publicView.attractions')
                            @include('AboutTanzania.tanzaniaRegions.publicView.safaris')
                            @include('AboutTanzania.tanzaniaRegions.publicView.culture')
                            @include('AboutTanzania.tanzaniaRegions.publicView.FAQ')
                            @include('AboutTanzania.tanzaniaRegions.publicView.gallery')
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


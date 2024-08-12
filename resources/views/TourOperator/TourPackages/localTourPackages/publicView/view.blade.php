@extends('layouts.main', [
    'title' => __("Safari to " . $localTourPackage->touristicAttraction->attraction_name),
    'header' => __('Safari to ' .$localTourPackage->touristicAttraction->attraction_name)
])
@include('includes.validate_assets')
@section('content')

    <div class="card" style="margin-top: 30px">
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('public/localSafariBlogImages/' . $localTourPackage->safari_poster) }}"
                             alt="Safari Poster"
                             style="height: 100%; width: 100%; object-fit: cover; object-position: center; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);"
                             loading="lazy">
                    </div>
                    <div class="col-md-6">
                        <h2><b>Safari to {{$localTourPackage->touristicAttraction->attraction_name}}</b></h2>
                        <br>
                        <p class="card-title" style="font-size: 14px;font-weight: bold">
                            {{$localTourPackage->touristicAttraction->attraction_description}}</p>
                        <p class="card-title" style="font-size: 14px;font-weight: bold">
                            {{$localTourPackage->touristicAttraction->basic_information}}</p>
                        <p class="card-title" style="font-size: 14px;font-weight: bold">
                            {{$localTourPackage->tourPackageType->tour_package_type_name}} special
                            for {{$localTourPackage->tanzaniaAndWorldEvent->event_name}}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('touristicAttraction.show', $localTourPackage->touristicAttraction->uuid)}}"
                               class="btn btn-primary btn-sm" style="margin-top: 20px">Learn more
                                about {{$localTourPackage->touristicAttraction->attraction_name}} <span class="ml-1">&#9654;</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="callout">
                <div class="callout-header">
                    <h3>Interested in this safari?</h3>
                </div>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <div class="callout-container">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Request Space
                    </button>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="exampleModalLongTitle">Booking <a href="{{route('tourOperator.publicView',$localTourPackage->tourOperator->uuid)}}" >{{$localTourPackage->tourOperator->company_name}}</a> for a safari to <a href="{{route('touristicAttraction.show',$localTourPackage->touristicAttraction->uuid)}}">{{$localTourPackage->touristicAttraction->attraction_name}}</a></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['enctype="multipart/form-data"','route'=>'localTourPackageBooking.store', 'autocomplete' => 'off','method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
                            @csrf
                            <section>
                                <div class="row" style="margin: auto">
                                    <div class="col-md-12">
                                        <div class="card" style="margin: auto">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <p>{{ getLanguageBlock('lang.auth.mandatory-field') }}</p>

                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('tourist_name', __("Full name"), ['class' => 'required_asterik']) }}
                                                                {{ Form::text('tourist_name',null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'tourist_name', 'required']) }}
                                                                {!! $errors->first('tourist_name', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('phone_number', __("Phone number"), ['class' => 'required_asterik']) }}
                                                                {{ Form::tel('phone_number', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'phone_number', 'required']) }}
                                                                {!! $errors->first('phone_number', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('email_address', __("Email address"), ['class' => 'required_asterik']) }}
                                                                {{ Form::email('email_address', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'email_address', 'required']) }}
                                                                {!! $errors->first('email_address', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('total_number_foreigner_child', __("Total non-resident children"), ['class' => 'required_asterik']) }}
                                                                {{ Form::number('total_number_foreigner_child', null, ['class' => 'form-control', 'autocomplete' => 'off','placeholder'=>'if none, type 0', 'id' => 'total_number_foreigner_child', 'required']) }}
                                                                {!! $errors->first('total_number_foreigner_child', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('total_number_local_child', __("Total resident children"), ['class' => 'required_asterik']) }}
                                                                {{ Form::number('total_number_local_child', null, ['class' => 'form-control', 'autocomplete' => 'off','placeholder'=>'if none, type 0', 'id' => 'total_number_local_child', 'required']) }}
                                                                {!! $errors->first('total_number_local_child', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('total_number_foreigner_adult', __("Total non-residents adult"), ['class' => 'required_asterik']) }}
                                                                {{ Form::number('total_number_foreigner_adult', null, ['class' => 'form-control', 'autocomplete' => 'off','placeholder'=>'if none, type 0', 'id' => 'total_number_foreigner_adult', 'required']) }}
                                                                {!! $errors->first('total_number_foreigner_adult', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('total_number_local_adult', __("Total residents adult"), ['class' => 'required_asterik']) }}
                                                                {{ Form::number('total_number_local_adult', null, ['class' => 'form-control', 'autocomplete' => 'off','placeholder'=>'if none, type 0', 'id' => 'total_number_local_adult', 'required']) }}
                                                                {!! $errors->first('total_number_local_adult', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('collection_station', __("Where would you like to be picked up?"), ['class' => 'required_asterik']) }}
                                                                <br>
                                                                @if(count($localTourCollectionStations) > 0)
                                                                    {{ Form::select('collection_station', $localTourCollectionStations->pluck('collection_stop_name', 'id'), null, ['class' => 'form-control select2', 'autocomplete' => 'off','style'=>'width:100%', 'id' => 'collection_station', 'required']) }}
                                                                @else
                                                                    <span class="badge badge-danger badge-pill">Error</span>
                                                                @endif
                                                                {!! $errors->first('collection_station', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            @forelse($safariAreaPreferenceReservations as $key => $safariAreaPreferenceReservation)
                                                                <h4>Would you love to use a reservation? <span style="color: dodgerblue;font-weight: bold">(optional)</span></h4>
                                                                <span>If you haven't figured out where to sleep during your safari, we highly recommend selecting an affordable option from the reservations offered by this tour operator</span>
                                                                <div class="form-group border {{ $key === 0 ? 'border-primary' : '' }} p-3" style="margin-top: 5px">
                                                                    <div class="d-flex align-items-center">
                                                                        <!-- Reservation Name -->
                                                                        <div class="mr-3">
                                                                            <h4>{{ $safariAreaPreferenceReservation->reservation_name }}</h4>
                                                                        </div>
                                                                        <!-- Images -->
                                                                        <div class="d-flex flex-wrap">
                                                                            @foreach(explode(',', $safariAreaPreferenceReservation->reservation_images) as $index => $image)
                                                                                <div class="mr-3 img-container">
                                                                                    <a href="{{ '/public/'.$image }}" data-fancybox="gallery" data-caption="{{ $safariAreaPreferenceReservation->reservation_name }}">
                                                                                        <img src="{{ '/public/'.$image }}" alt="{{ $safariAreaPreferenceReservation->reservation_name }}" class="img-thumbnail">
                                                                                    </a>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex justify-content-center mt-3">
                                                                        <div class="mr-3">
                                                                            <div class="text-center mt-3">
                                                                                <a href="{{$safariAreaPreferenceReservation->reservation_url}}" type="button" class="btn btn-primary btn-sm" target="_blank">Preview Website</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <input type="hidden" name="reservation_id" id="reservation_id_hidden" value="0">

                                                                            <input type="checkbox" id="reservation_id_checkbox" class="mr-2" onchange="updateReservationId()">
                                                                            <label for="reservation_id_checkbox" class="mb-0">{{ __("Use this reservation") }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="alertAbsence" style="margin-top: 5px">
                                                                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                                                    <h4>Reservations included in this safari...</h4>
                                                                    <strong>Info!</strong> This tour operator doesn't have reservations in this safari.
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('special_attention', __("Any special attention? (optional)")) }}
                                                                <br>
                                                                {{ Form::select('special_attention', $localTourPackageSupportedSpecialNeeds,null, ['class' => 'form-control select2', 'autocomplete' => 'off', 'id' => 'special_attention', 'style'=>'width:100%']) }}
                                                                {!! $errors->first('special_attention', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <p>This section requires you to fill in the total of children below the age of <b style="color: dodgerblue">{{$localTourPackage->free_of_charge_age}}</b></p>
                                                                {{ Form::label('total_free_of_charge_children', __("Total children"), ['class' => 'required_asterik']) }}
                                                                {{ Form::number('total_free_of_charge_children', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'total_free_of_charge_children', 'required']) }}
                                                                {!! $errors->first('total_free_of_charge_children', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                {{ Form::label('message', __("Any message? Write down..."), ['class' => 'required_asterik']) }}
                                                                {{ Form::textarea('message', null, ['class' => 'form-control', 'autocomplete' => 'off','maxLength'=>'100', 'id' => 'message', 'required']) }}
                                                                {!! $errors->first('message', '<span class="badge badge-danger">:message</span>') !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <input name="local_tour_package_id" value="{{$localTourPackage->id}}" hidden>
                                                        <input name="tour_operator_id" value="{{$localTourPackage->tourOperator->id}}" hidden>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="element-form">
                                                                <div class="form-group pull-left">
                                                                    {{ Form::button(trans('Request space'), ['class' => 'btn btn-primary btn-sm', 'type'=>'submit','style' => 'border-radius: 5px;']) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <br/>

                            {{ Form::close() }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 5px">
                <div class="col-md-12">
                    <div class="tab-pane" id="pills-touristAttraction" role="tabpanel" aria-labelledby="pills-touristAttraction-tab" style="margin-top: 10px">
                        <div class="nav-container">
                            <ul class="nav nav-tabs flex-nowrap" id="nav-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" style="color: dodgerblue" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tour overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-honeyPoints-tab" data-toggle="tab" href="#nav-honeyPoints" role="tab" aria-controls="nav-honeyPoints" aria-selected="true">Honey points</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-requestSpace-tab" data-toggle="tab" href="#nav-requestSpace" role="tab" aria-controls="nav-requestSpace" aria-selected="false">Book/Request space</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-Transport-tab" data-toggle="tab" href="#nav-Transport" role="tab" aria-controls="nav-Transport" aria-selected="false">Transport used</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-Reservation-tab" data-toggle="tab" href="#nav-Reservation" role="tab" aria-controls="nav-Reservation" aria-selected="false">Reservation to be used</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-tourOperator-tab" data-toggle="tab" href="#nav-tourOperator" role="tab" aria-controls="nav-tourOperator" aria-selected="false">Tour Operator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-similarSafaris-tab" data-toggle="tab" href="#nav-similarSafaris" role="tab" aria-controls="nav-similarSafaris" aria-selected="false">Similar Safari's</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-games-tab" data-toggle="tab" href="#nav-games" role="tab" aria-controls="nav-games" aria-selected="false">Touristic Games</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: dodgerblue" id="nav-gallery-tab" data-toggle="tab" href="#nav-gallery" role="tab" aria-controls="nav-gallery" aria-selected="false">Tour Gallery</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        @include('TourOperator.TourPackages.localTourPackages.publicView.overview')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.honeyPoints')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.transport')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.tourOperator')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.similarSafaris')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.gallery')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.games')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.requestSpace')
                        @include('TourOperator.TourPackages.localTourPackages.publicView.reservation')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')

    <script>
        $(function () {
            $(".select2").select2();


        });

    </script>
@endpush
@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox({
                // Options here
            });
        });
    </script>

@endpush

@push('after-scripts')
    <script>
        function updateReservationId() {
            var checkbox = document.getElementById('reservation_id_checkbox');
            var hiddenInput = document.getElementById('reservation_id_hidden');

            // If checkbox is checked, use reservation ID value
            if (checkbox.checked) {
                hiddenInput.value = "{{ $safariAreaPreferenceReservation->id }}";
            } else {
                // If checkbox is not checked, set value to 0
                hiddenInput.value = "0";
            }
        }
    </script>
@endpush


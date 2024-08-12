@extends('layouts.main', ['title' => __("Edit Reservation - " . $tourOperatorReservation->reservation_name), 'header' => __("Reservation - " . $tourOperatorReservation->reservation_name)])

@include('includes.validate_assets')
@section('content')

    {{ Form::model($tourOperatorReservation,['enctype="multipart/form-data"','route' => ['tourOperatorReservation.update', $tourOperatorReservation->uuid], 'method'=>'put','autocomplete' => 'off',
             'id' => 'update','class' => 'form-horizontal  needs-validation', 'novalidate']) }}
    {{ Form::hidden('user_id', $tourOperatorReservation->id, []) }}
    @csrf
    <section>
        <div class="row" style="margin: auto">
            <div class="col-md-12">
                <div class="card" style="margin: auto">
                    <div class="card-body">
                        <div class="col-md-12">
                            <p>{{ getLanguageBlock('lang.auth.mandatory-field') }}</p>
                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('reservation_name', __("Reservation name"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('reservation_name', $tourOperatorReservation->reservation_name, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'reservation_name', 'required']) }}
                                        {!! $errors->first('reservation_name', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('reservation_capacity', __("Reservation capacity"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('reservation_capacity', $tourOperatorReservation->reservation_capacity, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'reservation_capacity', 'maxLength'=>'300','required']) }}
                                        {!! $errors->first('reservation_capacity', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('reservation_images', __("Reservation images"), ['class' => 'required_asterik']) }}
                                        {{ Form::file('reservation_images[]', ['class' => 'form-control','multiple'=>true, 'autocomplete' => 'off', 'id' => 'reservation_images']) }}
                                        {!! $errors->first('reservation_images', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('reservation_url', __("Reservation url"), ['class' => 'required_asterik']) }}
                                                {{ Form::url('reservation_url',$tourOperatorReservation->reservation_url, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'reservation_url', 'required']) }}
                                                {!! $errors->first('reservation_url', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('facility_safari_preference', __("Which safari's do you use this facility at most?"), ['class' => 'required_asterik']) }}
                                                {{ Form::select('facility_safari_preference[]',$tourOperatorSafariPreferences,$tourOperatorReservationSafariPreferenceIds, ['class' => 'form-control select2','multiple', 'autocomplete' => 'off', 'id' => 'facility_safari_preference', 'required']) }}
                                                {!! $errors->first('facility_safari_preference', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('region_found', __("Reservation region"), ['class' => 'required_asterik']) }}
                                                {{ Form::select('region_found',$reservationRegion,$tourOperatorReservation->region_found, ['class' => 'form-control select2', 'autocomplete' => 'off', 'id' => 'region_found', 'required']) }}
                                                {!! $errors->first('region_found', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('touristic_game_deployed', __("Which touristic game would you love to make your customers enjoy? (optional)")) }}
                                                {{ Form::select('touristic_game_deployed',$touristicGames,$reservationTouristicGamesIds, ['class' => 'form-control select2','multiple', 'autocomplete' => 'off', 'id' => 'region_found']) }}
                                                {!! $errors->first('touristic_game_deployed', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('resident_child_price_reservation', __("Resident child price"), ['class' => 'required_asterik']) }}
                                                {{ Form::number('resident_child_price_reservation',$tourOperatorReservation->resident_child_price_reservation, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'resident_child_price_reservation', 'required']) }}
                                                {!! $errors->first('resident_child_price_reservation', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('resident_adult_price_reservation', __("Resident adult price"), ['class' => 'required_asterik']) }}
                                                {{ Form::number('resident_adult_price_reservation',$tourOperatorReservation->resident_adult_price_reservation, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'resident_adult_price_reservation', 'required']) }}
                                                {!! $errors->first('resident_adult_price_reservation', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('foreigner_adult_price_reservation', __("Foreigner adult price"), ['class' => 'required_asterik']) }}
                                                {{ Form::number('foreigner_adult_price_reservation',$tourOperatorReservation->foreigner_adult_price_reservation, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'foreigner_adult_price_reservation', 'required']) }}
                                                {!! $errors->first('foreigner_adult_price_reservation', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                {{ Form::label('foreigner_child_price_reservation', __("Foreigner child price"), ['class' => 'required_asterik']) }}
                                                {{ Form::number('foreigner_child_price_reservation',$tourOperatorReservation->foreigner_child_price_reservation, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'foreigner_child_price_reservation', 'required']) }}
                                                {!! $errors->first('foreigner_child_price_reservation', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table id="facilities">
                                    <thead>
                                    <tr>
                                        <th>Facility name</th>
                                        <th>Facility description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($tourOperatorReservationFacilities as $tourOperatorReservationFacility)
                                    <tr id="facilities{{$tourOperatorReservationFacility->id}}">
                                        <td><input type="text" class="form-control" placeholder="Wi-Fi" name="facility_name{{$tourOperatorReservationFacility->id}}" value="{{$tourOperatorReservationFacility->facility_name}}" maxlength="50" required></td>
                                        <td><input type="text" class="form-control" placeholder="Free wi-fi all over the perimeter ...." maxlength="200" name="facility_description{{$tourOperatorReservationFacility->id}}" value="{{$tourOperatorReservationFacility->facility_description}}" required></td>
                                        <td><a href="{{route('tourOperatorReservation.deleteReservationFacility',$tourOperatorReservationFacility->uuid)}}" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                    @empty
                                        <tr id="facilities">
                                            <td><input type="text" class="form-control" placeholder="Wi-Fi" name="facility_name1" maxlength="50" required></td>
                                            <td><input type="text" class="form-control" placeholder="Free wi-fi all over the perimeter ...." maxlength="200" name="facility_description1" required></td>
                                            <td><a class="fas fa-pencil-alt" id="addFacility">+</a></td>
                                        </tr>
                                    @endforelse
                                    <td><a class="btn btn-primary btn-sm" id="addFacility">Add</a></td>
                                    </tbody>
                                </table>
                            </div>
                            <input name="tour_operator_id" value="{{$tourOperatorReservation->tourOperator->id}}" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="element-form">
                                        <div class="form-group pull-left">
                                            {{ Form::button(trans('Update'), ['class' => 'btn btn-primary', 'type'=>'submit','style' => 'border-radius: 5px;']) }}
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
        $(document).ready(function ()
        {
            var i={{$tourOperatorReservationFacilities->count() + 1}};
            $('#addFacility').on('click',function (){
                i++;
                var html;
                html += '<tr>';
                html += '<td></td>'
                html += '<td><input type="text" class="form-control" maxlength="50" name="facility_name' + i + '" required></td>'
                html += '<td><input type="text" class="form-control" maxlength="50" name="facility_description' + i + '" required></td>'
                html += '<td><a class="fas fa-pencil-alt danger" id="removeFacility">-</a></td>';
                html += '</tr>';
                $('#facilities tbody').append(html);
            })
            $(document).on('click','#removeFacility',function ()
            {
                $(this).closest('tr').remove();
            })
        })
    </script>
@endpush


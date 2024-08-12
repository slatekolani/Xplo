@extends('layouts.main', ['title' => __("Create tourist attraction"), 'header' => __('Create tourist attraction')])

@include('includes.validate_assets')
@section('content')

    {{ Form::open(['route' => 'touristicAttraction.store', 'autocomplete' => 'off', 'method' => 'post', 'class' => 'needs-validation', 'novalidate', 'files' => true, 'enctype' => 'multipart/form-data']) }}
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
                                        {{ Form::label('attraction_name', __("Attraction name"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('attraction_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'attraction_name', 'required']) }}
                                        {!! $errors->first('attraction_name', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_description', __("Attraction description"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('attraction_description', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'attraction_description', 'required']) }}
                                        {!! $errors->first('attraction_description', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_category', __("Attraction category"), ['class' => 'required_asterik']) }}
                                        {{ Form::select('attraction_category', $attractionCategory,null, ['class' => 'form-control select2', 'autocomplete' => 'off', 'id' => 'attraction_category', 'required']) }}
                                        {!! $errors->first('attraction_category', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('best_time_of_visit', __("Best time of visit"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('best_time_of_visit', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'best_time_of_visit', 'required']) }}
                                        {!! $errors->first('best_time_of_visit', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('governing_body', __("Governing body"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('governing_body', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'governing_body', 'required']) }}
                                        {!! $errors->first('governing_body', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('website_link', __("Governing body website link"), ['class' => 'required_asterik']) }}
                                        {{ Form::url('website_link', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'website_link', 'required']) }}
                                        {!! $errors->first('website_link', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_region', __("Attraction region"), ['class' => 'required_asterik']) }}
                                        {{ Form::select('attraction_region', $regions,null, ['class' => 'form-control select2', 'autocomplete' => 'off', 'id' => 'attraction_region', 'required']) }}
                                        {!! $errors->first('attraction_region', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_image', __("Attraction Image"), ['class' => 'required_asterik']) }}
                                        {{ Form::file('attraction_image[]', ['class' => 'form-control','multiple'=>true, 'autocomplete' => 'off', 'id' => 'attraction_image', 'required']) }}
                                        {!! $errors->first('attraction_image', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('basic_information', __("Basic information of the attraction"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('basic_information',null, ['class' => 'form-control','maxLength'=>'1000', 'autocomplete' => 'off', 'id' => 'basic_information', 'required']) }}
                                        {!! $errors->first('basic_information', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_details', __("Attraction details"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('attraction_details',null, ['class' => 'form-control','maxLength'=>'1000', 'autocomplete' => 'off', 'id' => 'attraction_details', 'required']) }}
                                        {!! $errors->first('attraction_details', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_map', __("Attraction map"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('attraction_map',null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'attraction_map', 'required']) }}
                                        {!! $errors->first('attraction_map', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Advice to visitors</h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <table>
                                                <thead>
                                                <tr class="required_asterik">
                                                    <th>Advice number</th>
                                                    <th>Advice title</th>
                                                    <th>Advice description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="advices">
                                                    <td><input type="number" class="form-control" placeholder="1" name="advice_number1" required></td>
                                                    <td><input type="text" class="form-control" placeholder="Book in advance" name="advice_title1" maxlength="50" required></td>
                                                    <td><input type="text" class="form-control" placeholder="Mikumi can get busy ...." maxlength="500" name="advice_description1" required></td>
                                                    <td><a class="fas fa-pencil-alt" id="addAdvice">+</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Reasons to Visit the Attraction</h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <table>
                                                <thead>
                                                <tr class="required_asterik">
                                                    <th>Reason number</th>
                                                    <th>Reason title</th>
                                                    <th>Reason description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="reasons">
                                                    <td><input type="number" class="form-control" placeholder="1" name="reason_number1" required> </td>
                                                    <td><input type="text" class="form-control" placeholder="Diverse Scenery" name="reason_title1" required> </td>
                                                    <td><input type="text" class="form-control" placeholder="The Scenery ...." maxlength="500" name="reason_description1" required> </td>
                                                    <td><a class="fas fa-pencil-alt" id="addReason">+</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="element-form">
                                        <div class="form-group pull-left">
                                            {{ Form::button(trans('Add'), ['class' => 'btn btn-primary', 'type'=>'submit','style' => 'border-radius: 5px;']) }}
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
        $(document).ready(function (){
            var i=1;
            $('#addAdvice').on('click',function (){
                i++;
                var html='';
                html +='<tr>';
                html += '<td><input type="number" class="form-control" placeholder="1" name="advice_number'+i+'" required></td>';
                html += '<td><input type="text" class="form-control" placeholder="Advice title" name="advice_title'+i+'" required></td>';
                html += '<td><input type="text" class="form-control" placeholder="Advice description" maxlength="500" name="advice_description'+i+'" required></td>';
                html += '<td><a class="fas fa-pencil-alt danger" id="removeAdvice">-</a></td>';
                html += '</tr>';
                $('#advices').append(html);
            })
            $(document).on('click','#removeAdvice',function (){
                $(this).closest('tr').remove();
            })
        })
    </script>
@endpush

@push('after-scripts')
    <script>
        $(document).ready(function () {
            var i = 1;
            $('#addReason').on('click', function () {
                i++;
                var html;
                html += '<tr>';
                html += '<td><input type="number" class="form-control" placeholder="1" name="reason_number' + i + '" required></td>';
                html += '<td><input type="text" class="form-control" placeholder="Diverse Scenery" name="reason_title' + i + '" required></td>';
                html += '<td><input type="text" class="form-control" placeholder="The Scenery ..." maxlength="500" name="reason_description' + i + '" required></td>';
                html += '<td><a class="fas fa-pencil-alt danger" id="removeReason">-</a></td>';
                html += '</tr>';
                $('#reasons').append(html);
            })
            $(document).on('click', '#removeReason', function () {
                $(this).closest('tr').remove();
            })
        })
    </script>
@endpush


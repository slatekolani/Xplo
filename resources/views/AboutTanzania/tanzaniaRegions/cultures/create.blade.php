@extends('layouts.main', ['title' => __("Adding Culture for " .$tanzaniaRegion->region_name ), 'header' => __('Adding Culture for ' .$tanzaniaRegion->region_name)])

@include('includes.validate_assets')
@section('content')

    {{ Form::open(['enctype="multipart/form-data"','route'=>'regionCulture.store', 'files'=>true, 'autocomplete' => 'off','method' => 'post', 'class' => 'needs-validation', 'novalidate']) }}
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
                                        {{ Form::label('culture_name', __("Culture name"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('culture_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'culture_name', 'required']) }}
                                        {!! $errors->first('culture_name', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('basic_information', __("Basic information"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('basic_information',null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxLength'=>'300','style'=>'height:50px','id' => 'basic_information', 'required']) }}
                                        {!! $errors->first('basic_information', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('culture_image', __("Culture image"), ['class' => 'required_asterik']) }}
                                        {{ Form::file('culture_image[]', ['class' => 'form-control','multiple'=>true, 'autocomplete' => 'off','maxLength'=>'100','id' => 'culture_image', 'required']) }}
                                        {!! $errors->first('culture_image', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_language', __("Traditional language"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('traditional_language', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'traditional_language', 'required']) }}
                                        {!! $errors->first('traditional_language', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_dance', __("Traditional dance"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('traditional_dance', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'traditional_dance', 'required']) }}
                                        {!! $errors->first('traditional_dance', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_dance_description', __("Traditional dance description"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('traditional_dance_description', null, ['class' => 'form-control','maxLength'=>'100', 'style'=>'height:50px', 'autocomplete' => 'off', 'id' => 'traditional_dance_description', 'required']) }}
                                        {!! $errors->first('traditional_dance_description', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_food', __("Traditional food"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('traditional_food', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'traditional_food', 'required']) }}
                                        {!! $errors->first('traditional_food', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_food_description', __("Traditional food description"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('traditional_food_description', null, ['class' => 'form-control', 'autocomplete' => 'off','maxLength'=>'100','style'=>'height:50px', 'id' => 'traditional_food_description', 'required']) }}
                                        {!! $errors->first('traditional_food_description', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('traditional_food_image', __("Traditional food image"), ['class' => 'required_asterik']) }}
                                        {{ Form::file('traditional_food_image', null, ['class' => 'form-control', 'autocomplete' => 'off','id' => 'traditional_food_image', 'required']) }}
                                        {!! $errors->first('traditional_food_image', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('culture_history', __("Culture history"), ['class' => 'required_asterik']) }}
                                        {{ Form::textarea('culture_history', null, ['class' => 'form-control', 'autocomplete' => 'off','id' => 'culture_history', 'style'=>'height:100px','maxLength'=>'500','required']) }}
                                        {!! $errors->first('culture_history', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('cultural_video', __("Cultural video"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('cultural_video', null, ['class' => 'form-control', 'autocomplete' => 'off','id' => 'cultural_video','required']) }}
                                        {!! $errors->first('cultural_video', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Culture characteristics</h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <table>
                                                <thead>
                                                <tr class="required_asterik">
                                                    <th>Characteristic title</th>
                                                    <th>Characteristic description</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id="cultureCharacteristic">
                                                    <td><input type="text" class="form-control" name="characteristic_title1" maxlength="50" required></td>
                                                    <td><input type="text" class="form-control" maxlength="500" name="characteristic_description1" required></td>
                                                    <td><a class="fas fa-pencil-alt" id="addCultureCharacteristic">+</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <input type="text" name="tanzania_region_id" value="{{$tanzaniaRegion->id}}" hidden>
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
            $('#addCultureCharacteristic').on('click',function (){
               i++;
               var html='';
               html += '<tr>';
               html += '<td><input type="text" class="form-control" name="characteristic_title'+i+'" maxlength="50" required></td>';
               html += '<td><input type="text" class="form-control" maxlength="500" name="characteristic_description'+i+'" required></td>';
               html += '<td><a class="fas fa-pencil-alt danger" id="removeCultureCharacteristic">-</a></td>';
               html += '</tr>';
               $('#cultureCharacteristic').append(html);
            })
            $(document).on('click','#removeCultureCharacteristic',function (){
                $(this).closest('tr').remove();
            })
        })
    </script>
@endpush




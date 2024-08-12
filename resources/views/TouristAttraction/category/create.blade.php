@extends('layouts.main', ['title' => __("Create attraction category"), 'header' => __('Create attraction category')])

@include('includes.validate_assets')
@section('content')

    {{ Form::open(['route' => 'touristicAttractionCategory.store', 'autocomplete' => 'off', 'method' => 'post', 'class' => 'needs-validation', 'novalidate', 'files' => true, 'enctype' => 'multipart/form-data']) }}
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
                                        {{ Form::label('attraction_category', __("Attraction category"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('attraction_category', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'attraction_category', 'required']) }}
                                        {!! $errors->first('attraction_category', '<span class="badge badge-danger">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::label('attraction_category_description', __("Attraction category description"), ['class' => 'required_asterik']) }}
                                        {{ Form::text('attraction_category_description', null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'attraction_category_description', 'required']) }}
                                        {!! $errors->first('attraction_category_description', '<span class="badge badge-danger">:message</span>') !!}
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


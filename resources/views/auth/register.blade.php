@extends('layouts.main', ['title' => __("label.registration"), 'header' => __("label.registration")])

@include('includes.validate_assets')
@push('after-styles-end')
    <style>

    </style>
@endpush
@section('content')

    {{ Form::open(['url' => 'register', 'autocomplete' => 'off', 'class' => 'needs-validation', 'novalidate']) }}
@csrf
    <section>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="margin: auto">
                    <p class="card-header">{{ __('Get Signed Up') }}</p>
                    <div class="card-body">
                        <div class="col-md-12">

                            <p>{{ getLanguageBlock('lang.auth.mandatory-field') }}</p>

                            @include('auth.register.registration_fields')
                            <br/>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="required_asterik">
                                        {{ Form::checkbox('term_check',1, false, ['required']) }}
                                        {{ __('label.user_registration.agree_terms', ['url' => '']) }}
                                    </div>
                                    {!! $errors->first('term_check', '<span class="badge badge-danger">:message</span>')!!}
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="element-form">
                                        <div class="form-group pull-left">
                                            {{ Form::button(trans('label.register'), ['class' => 'btn btn-primary', 'type'=>'submit','style' => 'border-radius: 5px;']) }}
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

@push('after-script')
    <script>
        function refreshCaptcha() {
            $.ajax({
                url: "/refereshcapcha",
                type: 'get',
                dataType: 'html',
                success: function (json) {
                    $('.refereshrecapcha').html(json);
                },
                error: function (data) {
                    alert('Try Again.');
                }
            });
        }


    </script>
@endpush


@extends('layouts.main', ['title' => __("label.login"), 'header' => __("label.login")])

@include('includes.validate_assets')

@push('after-styles-end')
    <style>

    </style>
@endpush

@section('content')

    <section>
        {{ Form::open(['url' => 'login', 'autocomplete' => 'off', 'class' => 'needs-validation', 'novalidate' , 'name' => 'login']) }}
        @csrf
{{--        <div class="row" style="margin: auto">--}}
        <div class="row justify-content-center">

        <div class="col-md-6">
                <div class="card" style="padding-top: 60px;">
                    <p class="card-header" style="border-left: 5px solid dodgerblue;text-align:center;font-size: 20px;">{{ __('Welcome Back Friend!') }}</p>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-sm-12" >
                                    <div class="row" style="justify-content: center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{ Form::label('email', __("label.email")) }}
                                                {{ Form::text('email', null, ['class' => 'form-control create', 'autocomplete' => 'off', 'id' => 'email', 'aria-describedby' => 'emailHelp', 'required']) }}
                                                <small id="emailHelp">{{ __('label.email_helper') }}</small>
                                                {!!  $errors->first('email', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row" style="justify-content: center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                {{ Form::label('password', __("label.password")) }}
{{--                                                <a href="{{ route('auth.forgot_password') }}" class="pull-right"><b>Forgot Password?</b></a>--}}
                                                <a href="{{ route('password.request') }}"
                                                   class="pull-right">{{ __('passwords.forgot_password') }}</a>
                                                {{ Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'password', 'required']) }}
                                                {!! $errors->first('password', '<span class="badge badge-danger">:message</span>') !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" style="justify-content: center">

                                        <div class="col-md-8">
                                            <div class="form-group form-check">
                                                {{ Form::checkbox('remember', '1', false, ['class' => 'form-check-input', 'id' => 'remember']) }}
                                                {{ Form::label('remember', __("label.remember"), ['class' => 'form-check-label']) }}
                                                <div class="pull-right">
                                                    <button type="submit"
                                                            class="btn btn-primary">@lang("label.submit")</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <p style="text-align: center">@lang('label.account?')
                        <a href="{{ route('register') }}">@lang("Register an account")</a></p>
                        </div>
                </div>

            </div>
        </div>

        {{ Form::close() }}

    </section>
    <br/>

@endsection

@push('after-scripts')
    <script type="text/javascript">
        $('body').on('submit', 'form[name=login]', function (e) {
            e.preventDefault();
// Str lower email before submit
            var $email = $('#email').val();
            var lower_email = $email.toLowerCase();
            $("input[name=email]").val(lower_email);
            this.submit();
        });
    </script>
@endpush







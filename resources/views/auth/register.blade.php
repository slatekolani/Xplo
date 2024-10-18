@extends('layouts.main', ['title' => __("label.registration"), 'header' => __("label.registration")])

@include('includes.validate_assets')

@push('after-styles-end')
<style>
    body {
        background: url('https://source.unsplash.com/1600x900/?exploration,adventure') no-repeat center center fixed;
        background-size: cover;
    }
    .register-container {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
    }
    .register-header {
        background-color: #2ecc71;
        color: white;
        padding: 20px;
        border-radius: 10px 10px 0 0;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin: -30px -30px 30px -30px;
    }
    .form-control {
        border-radius: 20px;
    }
    .btn-register {
        background-color: #2ecc71;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .btn-register:hover {
        background-color: #27ae60;
        transform: translateY(-2px);
    }
    .agree-terms {
        color: #2ecc71;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .agree-terms:hover {
        color: #27ae60;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="container" style="padding: 20px 20px 20px 20px;background-color:white">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-container">
                <div class="register-header" style="font-size: 20px;text-align:center;padding:20px 20px 20px 20px;color:dodgerblue">
                    {{ __('Welcome to Your Next Adventure!') }}
                </div>
                {{ Form::open(['url' => 'register', 'autocomplete' => 'off', 'class' => 'needs-validation', 'novalidate']) }}
                @csrf
                <div class="form-group">
                    {{ Form::label('name', __("label.name")) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter your name']) }}
                    {!! $errors->first('name', '<span class="badge badge-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('email', __("label.email")) }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'Enter your email']) }}
                    {!! $errors->first('email', '<span class="badge badge-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('password', __("label.password")) }}
                    {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => 'Enter your password']) }}
                    {!! $errors->first('password', '<span class="badge badge-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', __("label.password_confirmation")) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'required', 'placeholder' => 'Confirm your password']) }}
                </div>
                <div class="form-group">
                    {{ Form::checkbox('terms', '1', false, ['required']) }}
                    <label for="terms">I agree to our <a href="#">Privacy Policy</a> & <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-register">@lang("label.register")</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
<script type="text/javascript">
    $('body').on('submit', 'form', function (e) {
        e.preventDefault();
        this.submit();
    });
</script>
@endpush

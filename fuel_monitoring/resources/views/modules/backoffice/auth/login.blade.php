@extends('templates.dmonitoring.wide')
@section('title', 'Administrator Login')
@section('body-class', 'login-bg-admin')

@section('main')
    {{ Form::open(['class'=>'form-horizontal login-bo', 'id' => 'login-bo']) }}
        <div class="login-wrapper">
            <div class="login">
                <div class="login-header">
                    <div class="logo"><img src="{{ asset('img/dakay-logo.png') }}" /></div>
                    <h5>Dakay Construction Administrator Login.</h5></div>
                <div class="login-body">
                    <div class="no-margin">
                        {{ Form::bsInput('text', 'username', null, 'Username', ['placeholder'=>'Please enter your username', 'autocomplete'=>'off']) }}
                        {{ Form::bsInput('password', 'password', null, 'Password', ['placeholder'=>'Please enter your password', 'autocomplete'=>'off']) }}

                        <div class="form-group captcha-form-group">
                            <div class="col-md-12">
                                <label for="password" class="control-label">Captcha</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-xs-7 col-md-7 no-padding">
                                            <input id="captcha" type="text" class="form-control" name="captcha" placeholder="Enter Captcha" autocomplete="off" />
                                        </div>
                                        <div id="captcha_img" class="col-xs-4 col-md-4">
                                            <img src="{!! captcha_src('login') !!}" alt="captcha"/>
                                        </div>
                                        @if ($errors->has('captcha'))
                                            <span class="help-block"><strong>{{ $errors->first('captcha') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button  type="submit" class="btn btn-danger btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
                </div>
                <div class="row no-margin">
                    <input type="checkbox" id="remember" checked="checked">
                    <label for="remember">Remember me</label>
                </div>
            </div>
            <p>Forgot your password? <a href="signup.html">Click here</a></p>
        </div>
    {{ Form::close() }}
@endsection

@push('scripts')
<script>
    CodeJquery(function () {

        $('#login-bo').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '/login',
                type: 'post',
                data: $(this).serialize(),
                // hasCaptcha: true
            });

        });

    });
</script>
@endpush



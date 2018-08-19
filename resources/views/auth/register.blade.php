<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Compass</title>
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div class="main-container fullscreen">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-7">
                    <div class="text-center">
                        <h1 class="h2">Create account</h1>
                        <p class="lead">Start doing things for free, in an instant</p>
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="form-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                                <div class="text-left">
                                    <small>Your password should be at least 8 characters</small>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col" style="border-right: 0.1px solid #E9EEF2 !important;">
                                            <div class="mb-4">
                                                <h6 style="text-align: center; height: 38px;">Applicants and/or Creators</h6>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="text-small" style="color: #6c757d !important;">Attempt Projects</span>
                                                </li>
                                                <li>
                                                    <span class="text-small" style="color: #6c757d !important;">Create Projects</span>
                                                </li>
                                                <li>
                                                    <span class="text-small" style="color: #6c757d !important;">Apply for Opportunities</span>
                                                </li>
                                            </ul>
                                            <div class="custom-control custom-radio d-inline-block">
                                                <input type="radio" id="plan-radio-1" name="customRadio" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="plan-radio-1"></label>
                                            </div>
                                        </div>
                                        <div class="col" style="border-left: 0.1px solid #E9EEF2 !important;">
                                            <div class="mb-4">
                                                <h6 style="text-align: center; height: 38px;">Companies</h6>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="text-small" style="color: #6c757d !important;">Create Projects</span>
                                                </li>
                                                <li>
                                                    <span class="text-small" style="color: #6c757d !important;">Post Opportunities</span>
                                                </li>
                                                <li style="color: transparent;">
                                                    <span class="text-small" style="color: #6c757d !important;">Hello</span>
                                                </li>
                                            </ul>
                                            <div class="custom-control custom-radio d-inline-block">
                                                <input type="radio" id="plan-radio-2" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="plan-radio-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
                                Create account
                            </button>
                            <small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a>
                            </small>
                            <br />
                            <small>Already have an account yet? <a href="/login">Login</a>
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('scripts.javascript')
</body>
</html>

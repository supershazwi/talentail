@extends ('layouts.main')

@section ('content')
<div class="jumbotron" style="
  background: #3a7bd5;
  background: -webkit-linear-gradient(to right, #3a7bd5, #3a6073);
  background: linear-gradient(to right, #3a7bd5, #3a6073); border-radius: 0px;">
    <div>
        <div class="row">
            <div class="col-lg-1" style="margin-bottom: 1.5rem;">

            </div>
            <div class="col-lg-5" style="margin-bottom: 1.5rem;">
                <h1 style="font-size: 58px; color: white; font-weight: bold;">Discover real world projects & build a portfolio</h1>
                <p style="color: white !important;">Talentail is the platform for you to not just say what you can do but show what you can do. Portfolios are not meant for just creative professionals.</p>
            </div>
            <div class="col-lg-1" style="margin-bottom: 1.5rem;">

            </div>
            <div class="col-lg-4" style="margin-bottom: 1.5rem;">
                <div class="card mb-3">
                    <div class="card-body">
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
                            </div>

                            <input id="url" type="hidden" name="url" value="/">

                            <button class="btn btn-block btn-primary" role="button" type="submit">
                                Create account
                            </button>
                            <br />
                            <div style="width: 100%; text-align: center;">
                            <small>By clicking 'Create Account' you agree to our <a href="#">Terms of Service</a>
                            </small>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1" style="margin-bottom: 1.5rem;">

            </div>
        </div>
    </div>
</div>    
<div class="container" style="padding-left: 4.5rem; padding-right: 4.5rem; padding-bottom: 2.5rem;">
    <div class="row" style="margin-top: 4.5rem;">
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper1">
                    <img alt="Wallpaper" src="/img/wallpaper5.png" style="width: 100%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Build your very own portfolio through applied knowledge</h4>
                    <p>There are countless other portfolio websites like Dribbble, Behance and Carbonmade that allow creative professionals to maintain their own portfolios. On Talentail, you build your own portfolio by attempting projects designed by our creators and getting assessed by them.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper2">
                    <img alt="Wallpaper" src="/img/wallpaper6.png" style="width: 100%; height: auto; margin-bottom: 1.5rem;">
                    <h4>High quality creators carefully selected from top firms</h4>
                    <p>The brightest diamonds are crafted by master gemcutters. To equip you with the right skill sets to excel at their work, we have meticulously sourced and assessed our creators from reputable companies.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper3">
                    <img alt="Wallpaper" src="/img/wallpaper7.png" style="width: 100%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Projects based on real world experience</h4>
                    <p>Our creators' reputation lie in the quality of their projects and the feedback they provide you. We go the extra length to make sure that our creators design projects that reflect their past experience as much as possible. This way, you are assured relevance and also usefulness.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(function() {
    let wallpaper1Height = document.getElementById("wallpaper1").clientHeight;
    let wallpaper2Height = document.getElementById("wallpaper2").clientHeight;
    let wallpaper3Height = document.getElementById("wallpaper3").clientHeight;

    let maxHeight = Math.max(wallpaper1Height, wallpaper2Height, wallpaper3Height);

    console.log("'" + maxHeight + "px'");

    document.getElementById("wallpaper1").style.height = maxHeight+"px";
    document.getElementById("wallpaper2").style.height = maxHeight+"px";
    document.getElementById("wallpaper3").style.height = maxHeight+"px";
});

</script>
@endsection

@section ('footer')
    
@endsection
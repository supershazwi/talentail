@extends ('layouts.main')

@section ('content')
<div class="jumbotron" style="
  background: #3a7bd5;
  background: -webkit-linear-gradient(to right, #3a7bd5, #3a6073);
  background: linear-gradient(to right, #3a7bd5, #3a6073); border-radius: 0px;">
    <div>
        <div class="row">
            @if(Auth::id() == null)
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
                        </div>
                        <div style="width: 100%; text-align: center;">
                            <small>By clicking 'Create account' you agree to our <a href="/terms-and-conditions">Terms of Service</a>
                            </small>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-1" style="margin-bottom: 1.5rem;">

            </div>

            @else
                <div class="col-lg-3" style="margin-bottom: 1.5rem;">

                </div>
                <div class="col-lg-6" style="margin-bottom: 1.5rem; text-align: center;">
                    <h1 style="font-size: 58px; color: white; font-weight: bold;">Discover real world projects & build a portfolio</h1>
                    <p style="color: white !important;">Talentail is the platform for you to not just say what you can do but show what you can do. Portfolios are not meant for just creative professionals.</p>
                </div>
            @endif
        </div>
    </div>
</div>    
<div class="container" style="padding-left: 1rem; padding-right: 1rem; padding-bottom: 1.5rem;">
    <h1 style="text-align: center !important; margin-top: 4.5rem;">Attempt projects to take your skills to the next level</h1>
    <div class="row" style="margin-top: 4.5rem;">
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper1" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/resume.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Build your very own portfolio through applied knowledge</h4>
                    <p>There are countless other portfolio websites like Dribbble, Behance and Carbonmade that allow creative professionals to maintain their own portfolios. On Talentail, you build your own portfolio by attempting projects designed by our creators and getting assessed by them.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper3" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/real-world.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Projects based on real world experience</h4>
                    <p>Our creators' reputation lie in the quality of their projects and the feedback they provide you. We go the extra length to make sure that our creators design projects that reflect their past experience as much as possible. This way, you are assured relevance and also usefulness.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper2" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/creator.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>High quality creators carefully selected from top firms</h4>
                    <p>The brightest diamonds are crafted by master gemcutters. To equip you with the right skill sets to excel at their work, we have meticulously sourced and assessed our creators from reputable companies.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
<div class="container" style="padding-left: 1rem; padding-right: 1rem; padding-bottom: 1.5rem;">
    <h1 style="text-align: center !important; margin-top: 4.5rem;">How it works</h1>
    <div class="row" style="margin-top: 4.5rem;">
        <div class="col-lg-3" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper4" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/web-design.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Step 1: Browse and select project</h4>
                    <p>All our projects are based and adapted from real world experiences. They are designed to assess specific competencies.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper5" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/web-design2.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Step 2: Complete the tasks tagged to the project</h4>
                    <p>Together with supplementary files that are given to you and also the ability to ask questions to the project creators, you are advised to complete the project and submit your answers before the deadline.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper6" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/rating.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Step 3: Receive assesssment by project creators</h4>
                    <p>Based on your answers, your competencies will be graded and also given a comprehensive review by project creators.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="wallpaper7" style="text-align: center;">
                    <img alt="Wallpaper" src="/img/resume.png" style="width: 25%; height: auto; margin-bottom: 1.5rem;">
                    <h4>Auto-populate your portfolio with your work and reviews</h4>
                    <p>Based on your answers, your competencies will be graded and also given a comprehensive review by project creators.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container" style="padding-left: 1rem; padding-right: 1rem; padding-bottom: 1.5rem;">
    <h1 style="text-align: center !important; margin-top: 4.5rem;">How it works</h1>
    <div class="row" style="margin-top: 4.5rem; text-align: center;">
        <div class="col-lg-12" style="margin-bottom: 1.5rem;">
            <div class="card mb-3">
                <div class="card-body" id="">
                    <img alt="Wallpaper" src="/img/high-level-process.png">
                </div>
            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript">

// $(function() {
//     let wallpaper1Height = document.getElementById("wallpaper1").clientHeight;
//     let wallpaper2Height = document.getElementById("wallpaper2").clientHeight;
//     let wallpaper3Height = document.getElementById("wallpaper3").clientHeight;

//     let maxHeight = Math.max(wallpaper1Height, wallpaper2Height, wallpaper3Height);

//     document.getElementById("wallpaper1").style.height = maxHeight+"px";
//     document.getElementById("wallpaper2").style.height = maxHeight+"px";
//     document.getElementById("wallpaper3").style.height = maxHeight+"px";


//     let wallpaper4Height = document.getElementById("wallpaper4").clientHeight;
//     let wallpaper5Height = document.getElementById("wallpaper5").clientHeight;
//     let wallpaper6Height = document.getElementById("wallpaper6").clientHeight;
//     let wallpaper7Height = document.getElementById("wallpaper7").clientHeight;

//     console.log(wallpaper4Height);

//     maxHeight = Math.max(wallpaper4Height, wallpaper5Height, wallpaper6Height, wallpaper7Height);

//     document.getElementById("wallpaper4").style.height = maxHeight+"px";
//     document.getElementById("wallpaper5").style.height = maxHeight+"px";
//     document.getElementById("wallpaper6").style.height = maxHeight+"px";
//     document.getElementById("wallpaper7").style.height = maxHeight+"px";
// });

</script>
@endsection

@section ('footer')
    
@endsection
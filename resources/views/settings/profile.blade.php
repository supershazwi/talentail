@extends ('layouts.main')

@section ('content')    
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
      <!-- Header -->
      <div class="header mt-md-5">
        @if (session('success'))
        <div class="alert alert-success" role="alert" id="successAlert">
          <h4 class="alert-heading" style="margin-bottom: 0;">Profile successfully updated!</h4>
        </div>
        @endif
        @if (session('error'))
          <div class="alert alert-danger">
            <h4 class="alert-heading" style="margin-bottom: 0;">{{session('error')}}</h4>
          </div>
        @endif
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Pretitle -->
              <h6 class="header-pretitle">
                Overview
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                Settings
              </h1>

            </div>
          </div> <!-- / .row -->
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                <li class="nav-item">
                  <a href="/settings" class="nav-link active">
                    Personal Information
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/settings/authentication" class="nav-link">
                    Authentication
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>

      <!-- Form -->
      <form class="mb-4" method="POST" action="/profile/save">
      @csrf
        <div class="row">
          <div class="col-12 col-md-12">
            
            <!-- First name -->
            <div class="form-group">

              <!-- Label -->
              <label>
                Name
              </label>

              <!-- Input -->
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name (e.g. Johnie Orange)" value="{{$user->name}}">

            </div>

          </div>
          <div class="col-12">
            
            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label class="mb-1">
                Email address
              </label>

              <!-- Form text -->
              <small class="form-text text-muted">
                This will be used to log onto the platform.
              </small>

              <!-- Input -->
              <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email (e.g. j.orange@gmail.com)" value="{{$user->email}}">

            </div>

          </div>
          <div class="col-12 col-md-6">
            
            <!-- Phone -->
            <div class="form-group">

              <!-- Label -->
              <label>
                Website
              </label>

              <!-- Input -->
              <input type="text" name="website" class="form-control" id="website" placeholder="Enter your website link (e.g. johnieorange.com)" value="{{$user->website}}">

            </div>
          </div>
          <div class="col-12 col-md-6">
            
            <!-- Birthday -->
            <div class="form-group">

              <!-- Label -->
              <label>
                LinkedIn
              </label>

              <!-- Input -->
              <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Enter your LinkedIn profile link (e.g. https://www.linkedin.com/in/jorange.007)" value="{{$user->linkedin}}">

            </div>
          </div>
          <div class="col-12 col-md-6">
            
            <!-- Phone -->
            <div class="form-group">

              <!-- Label -->
              <label>
                Facebook
              </label>

              <!-- Input -->
              <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter your Facebook profile link (e.g. https://www.facebook.com/jorange.007)" value="{{$user->facebook}}">

            </div>
          </div>
          <div class="col-12 col-md-6">
            
            <!-- Birthday -->
            <div class="form-group">

              <!-- Label -->
              <label>
                Twitter
              </label>

              <!-- Input -->
              <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Enter your Twitter profile link (e.g. https://www.twitter.com/jorange.007)" value="{{$user->twitter}}">
              
            </div>
          </div>

          <div class="col-12">
            
            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label class="mb-1">
                Description
              </label>

              <!-- Input -->
              <textarea type="text" placeholder="Tell us a little about yourself" name="description" id="description" class="form-control" rows="5" style="margin-bottom: 1.5rem;">{{$user->description}}</textarea>

            </div>

            <button type="submit" class="btn btn-primary">
              Update profile
            </button>

          </div>
        </div> <!-- / .row -->
      </form>

    </div>
  </div> <!-- / .row -->
</div>

<script type="text/javascript">
  setTimeout(function(){ document.getElementById("successAlert").style.display = "none" }, 3000);
</script>

@endsection

@section ('footer')
@endsection
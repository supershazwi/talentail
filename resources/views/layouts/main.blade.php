<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

	<!-- Libs CSS -->
	<!-- build:css /fonts/feather/feather.min.css -->
	<link rel="stylesheet" href="/fonts/feather/feather.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="/highlight.js/styles/vs2015.css">
	<link rel="stylesheet" href="/quill/dist/quill.core.css">
	<link rel="stylesheet" href="/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="/css/custom.css">
	<link rel="stylesheet" href="/flatpickr/dist/flatpickr.min.css">

	<link rel="stylesheet" type="text/css" href="/css/editormd.css" />

	<!-- Theme CSS -->
	<!-- build:css /css/theme.min.css -->
	<link rel="stylesheet" href="/css/theme.css" id="stylesheetLight">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<!-- endbuild -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
	<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>


	<script>var colorScheme = 'light';</script>
	<title>Talentail</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light" id="topnav">
	  <div class="container">

	    <!-- Toggler -->
	    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <!-- Brand -->
	    <a class="navbar-brand mr-auto" href="/">
	      <strong style="color: #0984e3; letter-spacing: 0.25rem;">TALENTAIL</strong>
	    </a>

	    
	    <div class="navbar-user">
	    	@if(Auth::id())
		    	<div class="navbar-user">
		    		
		    		<div class="dropdown mr-4 d-none d-lg-flex">
		    	
		    	    <!-- Toggle -->
		    	    <a href="/messages" class="text-muted" role="button">
						@if($messageCount > 0)
							<span class="icon active">
								<i class="fe fe-message-square"></i>
							</span>
						@else
							<span class="icon">
								<i class="fe fe-message-square"></i>
							</span>
						@endif
		    	    </a>

		    	  </div>

		    	  <!-- Dropdown -->
		    	  <div class="dropdown mr-4 d-none d-lg-flex">
		    	
		    	    <!-- Toggle -->
		    	    <a href="/notifications" class="text-muted" role="button">
		    	      @if($notificationCount > 0)
		    	      	<span class="icon active">
		    	      		<i class="fe fe-bell"></i>
		    	      	</span>
		    	      @else
		    	      	<span class="icon">
		    	      		<i class="fe fe-bell"></i>
		    	      	</span>
		    	      @endif
		    	    </a>

		    	  </div>

		    	  <div class="dropdown mr-4 d-none d-lg-flex">
		    	
		    	    <!-- Toggle -->
		    	    <a href="/shopping-cart" class="text-muted" role="button">
						@if($shoppingCartActive)
							<span class="icon active">
								<i class="fe fe-shopping-cart"></i>
							</span>
						@else
							<span class="icon">
								<i class="fe fe-shopping-cart"></i>
							</span>
						@endif
		    	    </a>

		    	  </div>

		    	  <div class="dropdown mr-4 d-none d-lg-flex">
		    	
		    	    <!-- Toggle -->
		    	    <a href="/credits" class="text-muted" role="button">
						<span class="icon">
							{{Auth::user()->credits}} Credits
						</span>
		    	    </a>

		    	  </div>

		    	  <!-- Dropdown -->
		    	  <div class="dropdown">
		    	
		    	    <!-- Toggle -->
		    	    <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    	    		@if(Auth::user()->avatar)
	    	    	     <img src="http://storage.googleapis.com/talentail-123456789/{{Auth::user()->avatar}}" alt="..." class="avatar-img rounded-circle">
	    	    	    @else
	    	    	    <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle">
	    	    	    @endif
		    	    </a>

		    	    <!-- Menu -->
		    	    <div class="dropdown-menu dropdown-menu-right">
		    	      <a href="/" class="dropdown-item">Dashboard</a>
		    	      <a href="/profile" class="dropdown-item">Profile</a>
		    	      <a href="/settings" class="dropdown-item">Settings</a>
		    	      <a href="/work-experience" class="dropdown-item">Work Experience</a>
		    	      <a href="/invoices" class="dropdown-item">Invoices</a>
		    	      <a href="/referrals" class="dropdown-item">Referrals</a>
		    	      
		    	      <!-- <a href="/lessons-overview" class="dropdown-item">Lessons</a> -->
		    	      <!-- <a href="/projects-overview" class="dropdown-item">Projects</a> -->
		    	      @if(!(Auth::user()->company && Auth::user()->creator))
		    	      <hr class="dropdown-divider">
		    	      @endif
		    	      @if(!Auth::user()->admin)
						@if(!Auth::user()->creator)
							@if(Auth::user()->creator_application != null && Auth::user()->creator_application->status == "pending")
								<a href="/creator-application-status" class="dropdown-item">Check Creator Application Status</a>
							@else
								<a href="/creator-application" class="dropdown-item">Apply to be a Creator</a>
							@endif
						@endif

						@if(!Auth::user()->company)
							@if(Auth::user()->company_application != null && Auth::user()->company_application->status == "pending")
								<!-- <a href="/company-application-status" class="dropdown-item">Check Company Application Status</a> -->
							@else
								<!-- <a href="/company-application" class="dropdown-item">Apply to be a Company</a> -->
							@endif
						@endif
		    	      
		    	      @endif

		    	      @if(Auth::user()->admin)
		    	      <a href="/creator-application-overview" class="dropdown-item">View Creator Applications</a>
		    	      <!-- <a href="/company-application-overview" class="dropdown-item">View Company Applications</a> -->
		    	      @endif
		    	      <!-- <a href="/interviews-overview" class="dropdown-item">Interviews</a> -->
		    	      <hr class="dropdown-divider">
		    	      <a href="/logout" class="dropdown-item">Logout</a>
		    	    </div>

		    	  </div>

		    	</div>
			@else
				<a class="btn btn-primary mr-auto" href="/login">
				    Login
				</a>
			@endif
		</div>

	    <!-- Collapse -->
	    <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

	      <!-- Navigation -->
	      <ul class="navbar-nav mr-auto">

	      	<li class="nav-item">
	          @if(!empty($parameter) && $parameter == "portfolio")
	          	<a class="nav-link active" href="/explore">
	          		Explore Portfolios
	          	</a>
	          @else
	          	<a class="nav-link" href="/explore">
	          		Explore Portfolios
	          	</a>
	          @endif
	        </li>

	        <!-- <li class="nav-item">
	          @if(!empty($parameter) && $parameter == "learn")
	          	<a class="nav-link active" href="/learn">
	          		Learn
	          	</a>
	          @else
	          	<a class="nav-link" href="/learn">
	          		Learn
	          	</a>
	          @endif
	        </li> -->
	        <li class="nav-item">
				@if(!empty($parameter) && $parameter == "discover")
					<a class="nav-link active" href="/discover">
						Discover Projects
					</a>
				@else
					<a class="nav-link" href="/discover">
						Discover Projects
					</a>
				@endif
	        </li>
	        <!-- <li class="nav-item">
	          @if(!empty($parameter) && $parameter == "groom")
	          	<a class="nav-link active" href="/groom">
	          		Groom
	          	</a>
	          @else
	          	<a class="nav-link" href="/groom">
	          		Groom
	          	</a>
	          @endif
	        </li> -->
	        <!-- <li class="nav-item">
	          @if(!empty($parameter) && $parameter == "secure")
	          	<a class="nav-link active" href="/secure">
	          		Secure
	          	</a>
	          @else
	          	<a class="nav-link" href="/secure">
	          		Secure
	          	</a>
	          @endif
	        </li> -->
	      </ul>

	    </div>

	  </div> <!-- / .container -->
	</nav>
	<div class="main-content">
		@yield('content')
		<div class="container">
			<div class="row" style="margin-top: 5rem;">
			  <div class="col-12 col-lg-12">
			    
			    <!-- Card -->
			    <div class="card card-inactive">
			      <div class="card-body">
			          <div class="row">
			              <div class="col-lg-4">
			                  <h3>Talentail</h3>
			                  <p class="text-muted" style="margin-bottom: 0;">At Talentail, we believe that everyone should be given an equal opportunity to control their career paths and ultimately their happiness.</p>
			              </div>
			              <div class="col-lg-2">
			                  <a href="/about-us" style="font-size: .875rem;">About Us</a><br />
			                  <a href="/contact-us" style="font-size: .875rem;">Contact Us</a><br />
			                  <a href="/faq" style="font-size: .875rem;">FAQ</a><br />
			                  <!-- <a href="/tutorials" style="font-size: .875rem;">Tutorials</a> -->
			              </div>
			              <div class="col-lg-3">
			                  <a href="/terms-and-conditions" style="font-size: .875rem;">Terms & Conditions</a><br />
			                  <a href="/privacy-policy" style="font-size: .875rem;">Privacy Policy</a><br />
			              </div>
			          </div>
			      </div>
			    </div>

			  </div>
			</div>
		</div>
	</div> <!-- / .main-content -->
	@include('scripts.javascript')
</body>
</html>
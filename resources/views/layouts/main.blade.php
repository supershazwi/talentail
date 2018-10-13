<!DOCTYPE html>

<html>

<head>

	<title>Talentail: Apply your knowledge onto real world projects</title>
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/css/editormd.css" />
	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/css/component.css" />
	<link rel="stylesheet" type="text/css" href="/css/toastr.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<link href="/img/favicon.ico" rel="icon" type="image/x-icon">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="At Talentail, you get to apply what you've learned onto real world projects and gain experience.">

	
	<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body>
	<div class="layout layout-nav-top">
	    <div class="navbar navbar-expand-lg sticky-top" style="background-color: #F7F9FA; border-bottom: 1px solid #E5E5E5;">
	        <a class="navbar-brand" href="/">
	            <img alt="Pipeline" src="/img/logo.svg" />
	        </a>
	        <div class="d-flex align-items-center">
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>
	            @if(Auth::id())
	            <div class="d-block d-lg-none ml-2">
	                <div class="dropdown">
	                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    	@if(Auth::user()->avatar)
	                        <img alt="Image" src="https://storage.cloud.google.com/talentail-123456789/{{Auth::user()->avatar}}" class="avatar" />
	                        @else
	                        <img alt="Image" src="/img/avatar.png" class="avatar" />
	                        @endif
	                    </a>
	                    <div class="dropdown-menu dropdown-menu-right">
	                        <a href="nav-side-user.html" class="dropdown-item">Profile</a>
	                        <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
	                        <a href="#" class="dropdown-item">Log Out</a>
	                    </div>
	                </div>
	            </div>
	            @endif
	        </div>
	        <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
	            <ul class="navbar-nav">
	                <li class="nav-item">
	                    <a class="nav-link" href="/">Home</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/roles">Roles</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/creators">Creators</a>
	                </li>
	                @if(Auth::id())
	                <li class="nav-item">
	                    <a class="nav-link" href="/messages">Messages</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/notifications">Notifications</a>
	                </li>
	                @endif
	            </ul>
	            <div class="d-lg-flex align-items-center">
	            	@if(Auth::id())
	                <div class="dropdown mx-lg-2">
	                    <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        Add New
	                    </button>
	                    <div class="dropdown-menu" aria-labelledby="newContentButton">
	                        <a class="dropdown-item" href="/projects/select-role">Project</a>
	                        @if(Auth::user() && Auth::user()->admin)
	                        <!-- <a class="dropdown-item" href="/companies/create">Company</a> -->
	                        <!-- <a class="dropdown-item" href="/projects/create">Competency</a> -->
	                        <a class="dropdown-item" href="/opportunities/create">Opportunity</a>
	                        <a class="dropdown-item" href="/roles/create">Role</a>
	                    	@endif
	                    </div>
	                </div>
	                <div class="d-none d-lg-block">
	                    <div class="dropdown">
	                        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        	                    @if(Auth::user()->avatar)
                                <img alt="Image" src="https://storage.cloud.google.com/talentail-123456789/{{Auth::user()->avatar}}" class="avatar" />
                                @else
                                <img alt="Image" src="/img/avatar.png" class="avatar" />
                                @endif
        	                </a>
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="/profile" class="dropdown-item">Profile</a>
        	                    <a href="/settings" class="dropdown-item">Account Settings</a>
        	                    <a href="/logout" class="dropdown-item">Log Out</a>
	                        </div>
	                    </div>
	                </div>
	                @else
	                <a href="/login" class="btn btn-primary btn-block">
	                    Login
	                </a>
	                @endif
	            </div>
	        </div>
	    </div>
	    <div class="main-container">
	    	@include('toast::messages')
	        @yield('content')
	        <div style="width: 100%; background-color: white; border-top: 1px solid #E5E5E5;">
		        <div style="padding: 1.5rem 1.5rem;">
				    <div class="row">
				        <div class="col-lg-4">
		                	<h5>Talentail</h5>
		                	<p class="text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		                </div>
				        <div class="col-lg-3">
							<a href="/about-us" style="font-size: .875rem;">About Us</a><br />
							<a href="/contact-us" style="font-size: .875rem;">Contact Us</a><br />
							<a href="/faq" style="font-size: .875rem;">Frequently Asked Questions</a>
		                </div>
		            </div>
		        </div>
		    </div>
	    </div>
	</div>

	<input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

	@include('scripts.javascript')

	<script type="text/javascript">
	    $(function () {
	        toastr.options = {
	            positionClass: 'toast-bottom-right'
	        }; 

	        var pusher = new Pusher("5491665b0d0c9b23a516", {
	          cluster: 'ap1',
	          forceTLS: true,
	          auth: {
	                  headers: {
	                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                  }
	              }
	        });

	        var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
	        messageChannel.bind('new-message', function(data) {
	            toastr.options.onclick = function () {
	                window.location.replace(data.url);
	            };

	            toastr.info("<strong>" + data.username + "</strong><br />" + data.text); 
	        });

	        var notificationChannel = pusher.subscribe('notifications_' + document.getElementById('loggedInUserId').value);
	        notificationChannel.bind('new-notification', function(data) {
	            toastr.options.onclick = function () {
	                window.location.replace(data.url);
	            };

	            toastr.success("<strong>" + data.username + "</strong><br />" + data.text); 
	        });
	    })
	</script> 
</body>

</html>
<!DOCTYPE html>

<html>

<head>

	<title>Talentail: Apply your knowledge onto real world projects</title>
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/css/editormd.css" />
	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/css/component.css" />
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
	<div class="layout layout-nav-side">
	    <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
	        <a class="navbar-brand" href="index.html">
	            <img alt="Pipeline" src="/img/logo.svg" />
	        </a>
	        <div class="d-flex align-items-center">
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>
	            <div class="d-block d-lg-none ml-2">
	                <div class="dropdown">
	                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <img alt="Image" src="/img/avatar-male-4.jpg" class="avatar" />
	                    </a>
	                    <div class="dropdown-menu dropdown-menu-right">
	                        <a href="nav-side-user.html" class="dropdown-item">Profile</a>
	                        <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
	                        <a href="#" class="dropdown-item">Log Out</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
	            <ul class="navbar-nav d-lg-block">
	                <li class="nav-item">
	                    <a class="nav-link" href="/">Home</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/skills">Skills</a>
	                </li>
	                <!-- <li class="nav-item">
	                    <a class="nav-link" href="/projects">Projects</a>
	                </li> -->
	                <!-- <li class="nav-item">
	                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#exploreDropdown" aria-controls="exploreDropdown">Explore</a>
	                    <div id="exploreDropdown" class="collapse">
	                        <ul class="nav nav-small flex-column">
	                            <li class="nav-item">
	                                <a class="nav-link" href="/skills">Skills</a>
	                            </li>
	                            <li class="nav-item">
	                                <a class="nav-link" href="/companies">Companies</a>
	                            </li>
	                        </ul>
	                    </div>
	                </li> -->
	                <li class="nav-item">
	                    <a class="nav-link" href="/messages">Messages</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/notifications">Notifications</a>
	                </li>
	            </ul>
	            <hr>
	            <div class="d-none d-lg-block w-100">
	                <ul class="nav nav-small flex-column">
	                    <li class="nav-item">
	                        <a href="/about-us" class="nav-link">About Us</a>
	                    </li>
	                    <li class="nav-item">
	                        <a href="/contact-us" class="nav-link">Contact Us</a>
	                    </li>
	                    <li class="nav-item">
	                        <a href="/faq" class="nav-link">FAQ</a>
	                    </li>
	                </ul>
	                <hr>
	            </div>
	            <div>
	                <div class="dropdown mt-2">
	                    <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        Add New
	                    </button>
	                    <div class="dropdown-menu" aria-labelledby="newContentButton">
	                        <a class="dropdown-item" href="/projects/select-skill">Project</a>
	                        @if(Auth::user() && Auth::user()->admin)
	                        <!-- <a class="dropdown-item" href="/companies/create">Company</a> -->
	                        <!-- <a class="dropdown-item" href="/projects/create">Competency</a> -->
	                        <!-- <a class="dropdown-item" href="/opportunities/create">Opportunity</a> -->
	                        <a class="dropdown-item" href="/skills/create">Skill</a>
	                    	@endif
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="d-none d-lg-block">
	            <div class="dropup">
	                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    <img alt="Image" src="/img/avatar-male-4.jpg" class="avatar" />
	                </a>
	                <div class="dropdown-menu">
	                    <a href="/profile" class="dropdown-item">Profile</a>
	                    <a href="/settings" class="dropdown-item">Account Settings</a>
	                    <a href="/logout" class="dropdown-item">Log Out</a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="main-container">
	        @yield('content')
	    </div>
	</div>
	@include('scripts.javascript')
</body>

</html>
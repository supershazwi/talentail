<!DOCTYPE html>

<html>

<head>

	<title>Compass</title>
	<link rel="stylesheet" type="text/css" href="/css/custom.css">
	<link rel="stylesheet" type="text/css" href="/css/theme.css">
	<link rel="stylesheet" type="text/css" href="/css/editormd.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A project management Bootstrap theme by Medium Rare">
	<link href="assets/img/favicon.ico" rel="icon" type="image/x-icon">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body>
	<div class="layout layout-nav-top">
	    <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
	        <a class="navbar-brand" href="/">
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
	                        <a href="/profile" class="dropdown-item">Profile</a>
	                        <a href="/settings" class="dropdown-item">Account Settings</a>
	                        <a href="/logout" class="dropdown-item">Log Out</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
	            <ul class="navbar-nav">
	                <li class="nav-item">
	                    <a class="nav-link" href="/">Home</a>
	                </li>
	                <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" id="exploreDropdown">Explore</a>
                            <div class="dropdown-menu" aria-labelledby="exploreDropdown">
                                <a class="dropdown-item" href="/skills">Skills</a>
                                <a class="dropdown-item" href="/companies">Companies</a>
                            </div>
                        </div>
                    </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="/messages">Messages</a>
	                </li>
	            </ul>
	            <div class="d-lg-flex align-items-center">
	                <!-- <form class="form-inline my-lg-0 my-2">
	                    <div class="input-group input-group-dark input-group-round">
	                        <div class="input-group-prepend">
	                            <span class="input-group-text">
	                                <i class="material-icons">search</i>
	                            </span>
	                        </div>
	                        <input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search app" aria-describedby="search-app">
	                    </div>
	                </form> -->
	                <div class="dropdown mx-lg-2">
	                    <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        Create New
	                    </button>
	                    <div class="dropdown-menu" aria-labelledby="newContentButton">
	                    	@if(Auth::user()->admin)
	                        <a class="dropdown-item" href="/companies/create">Company</a>
	                        <a class="dropdown-item" href="/projects/create">Competency</a>
	                        <a class="dropdown-item" href="/opportunities/create">Opportunity</a>
	                        <a class="dropdown-item" href="/skills/create">Skill</a>
	                    	@endif
	                        <a class="dropdown-item" href="/projects/create">Project</a>
	                    </div>
	                </div>
	                <div class="d-none d-lg-block">
	                    <div class="dropdown">
	                        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img alt="Image" src="/img/avatar-male-4.jpg" class="avatar" />
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="/profile" class="dropdown-item">Profile</a>
	                            <a href="/settings" class="dropdown-item">Account Settings</a>
	                            <a href="/logout" class="dropdown-item">Log Out</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="main-container">
	        <div class="container">
				@yield('content')
			</div>
	    </div>
	</div>
	@include('scripts.javascript')
</body>

</html>
@extends ('layouts.main')

@section ('content')
	<div class="header">
	  <div class="container">

	    <!-- Body -->
	    <div class="header-body">
	      <div class="row align-items-end">
	        <div class="col">
	          
	          <!-- Pretitle -->
	          <h6 class="header-pretitle">
	            Overview
	          </h6>

	          <!-- Title -->
	          <h1 class="header-title">
	            Dashboard
	          </h1>

	        </div>
	      </div> <!-- / .row -->
	    </div> <!-- / .header-body -->

	  </div>
	</div> <!-- / .header -->
	<div class="container">
		@if(Auth::user()->creator)
		@if(sizeof($creatorProjects) > 0)
		<div class="row">
			<div class="col-12 col-xl-12">
				<div class="card">	
				    <table class="table table-nowrap" style="margin-bottom: 0;">
				      <thead>
				        <tr>
				          <th scope="col">#</th>
				          <th scope="col">Project</th>
				          <th scope="col">Credits Earned</th>
				          <th scope="col">User</th>
				          <th scope="col">Status</th>
				        </tr>
				      </thead>
				      <tbody>
				      		@foreach($creatorProjects as $key=>$creatorProject)
				          <tr>
				            <th scope="row">{{$key+1}}</th>
				            <td><a href="/roles/{{$creatorProject->project->role->slug}}/projects/{{$creatorProject->project->slug}}/{{$creatorProject->user_id}}">{{$creatorProject->project->title}}</a></td>
				            <td>{{$creatorProject->project->amount}} * 0.8 = <strong style="text-decoration: underline;">{{number_format((0.8*$creatorProject->project->amount), 2, '.', '')}}</strong></td>
				            <td>{{$creatorProject->user->name}}</td>
				            <td><span class="badge badge-primary">{{$creatorProject->status}}</span></td>
				          </tr>
				          @endforeach
				      </tbody>
				    </table>
				</div>
			</div>
		</div>
		<hr style="margin-bottom: 2.5rem;"/>
		@else
		@endif
		@endif
		<div class="row">
			@if(Auth::user()->creator)
			<div class="col-12 col-xl-6">
				<div class="card">
					<div class="card-header">
						<div class="row align-items-top">
						  <div class="col">
						    
						    <!-- Title -->
						    <h4 class="card-header-title">
						      Created Projects
						    </h4>

						  </div>
						  <div class="col-auto">

						    <!-- Link -->
						    <a href="/profile/projects">View All</a>
						    |
						    <a href="/projects/select-role">Add Project</a>
						    
						  </div>
						</div> <!-- / .row -->
					</div>
					<div class="card-body">
					@if(sizeof($createdProjects) > 0)
					@foreach($createdProjects as $createdProject)
					<div class="row align-items-top">
					  <div class="col-auto">
					    
					    <!-- Avatar -->
					    <a href="/roles/{{$createdProject->role->slug}}/projects/{{$createdProject->slug}}" class="avatar avatar-4by3">
					    @if($createdProject->url)
					    <img src="https://storage.googleapis.com/talentail-123456789/{{$createdProject->url}}" alt="..." class="avatar-img rounded">
					    @else
					    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
					    @endif
					    </a>

					  </div>
					  <div class="col ml--2">

					    <!-- Title -->
					    <a href="/roles/{{$createdProject->role->slug}}/projects/{{$createdProject->slug}}"><h4 class="card-title mb-1">
					      {{$createdProject->title}}
					    </h4></a>
					  </div>
					</div> <!-- / .row -->

					<!-- Divider -->
					@if(!$loop->last)
					<hr>
					@endif
					@endforeach
					@else
					<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
					<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. Don't worry. We will notify you once you are required to take action.</p>
					@endif
					</div> <!-- / .card-body -->
				</div>
			</div>
			<div class="col-12 col-xl-6">

				<!-- Projects -->
				<div class="card">
				<div class="card-header">
					<div class="row align-items-top">
					  <div class="col">
					    
					    <!-- Title -->
					    <h4 class="card-header-title">
					      Action Needed
					    </h4>

					  </div>
					  <div class="col-auto">

					    <!-- Link -->
					    <!-- <a href="/lessons-overview" class="small">View all</a> -->
					    
					  </div>
					</div> <!-- / .row -->
				</div>
				<div class="card-body">
				@if(sizeof($actionsNeeded) > 0)
				@foreach($actionsNeeded as $actionNeeded)
				<div class="row align-items-top">
				  <div class="col-auto">
				    
				    <!-- Avatar -->
				    <a href="/roles/{{$actionNeeded->project->role->slug}}/projects/{{$actionNeeded->project->slug}}" class="avatar avatar-4by3">
				    @if($actionNeeded->project->url)
				    <img src="https://storage.googleapis.com/talentail-123456789/{{$actionNeeded->project->url}}" alt="..." class="avatar-img rounded">
				    @else
				    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
				    @endif
				    </a>

				  </div>
				  <div class="col ml--2">

				    <!-- Title -->
				    <a href="/roles/{{$actionNeeded->project->role->slug}}/projects/{{$actionNeeded->project->slug}}/review"><h4 class="card-title mb-1">
				      {{$actionNeeded->project->title}}
				    </h4></a>
				    <p style="margin-bottom: 0;">Leave a review for {{$actionNeeded->project->user->name}}.</p>
				    
				  </div>
				</div> <!-- / .row -->

				<!-- Divider -->
				@if(!$loop->last)
				<hr>
				@endif
				@endforeach
				@else
				<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
				<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. Don't worry. We will notify you once you are required to take action.</p>
				@endif
				</div> <!-- / .card-body -->
				</div>
			</div>
			@else
			<div class="col-12 col-xl-12">

				<!-- Projects -->
				<div class="card">
				<div class="card-header">
					<div class="row align-items-top">
					  <div class="col">
					    
					    <!-- Title -->
					    <h4 class="card-header-title">
					      Action Needed
					    </h4>

					  </div>
					  <div class="col-auto">

					    <!-- Link -->
					    <!-- <a href="/lessons-overview" class="small">View all</a> -->
					    
					  </div>
					</div> <!-- / .row -->
				</div>
				<div class="card-body">
				@if(sizeof($actionsNeeded) > 0)
				@foreach($actionsNeeded as $actionNeeded)
				<div class="row align-items-top">
				  <div class="col-auto">
				    
				    <!-- Avatar -->
				    <a href="/roles/{{$actionNeeded->project->role->slug}}/projects/{{$actionNeeded->project->slug}}" class="avatar avatar-4by3">
				    @if($actionNeeded->project->url)
				    <img src="https://storage.googleapis.com/talentail-123456789/{{$actionNeeded->project->url}}" alt="..." class="avatar-img rounded">
				    @else
				    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
				    @endif
				    </a>

				  </div>
				  <div class="col ml--2">

				    <!-- Title -->
				    <a href="/roles/{{$actionNeeded->project->role->slug}}/projects/{{$actionNeeded->project->slug}}/review"><h4 class="card-title mb-1">
				      {{$actionNeeded->project->title}}
				    </h4></a>
				    <p style="margin-bottom: 0;">Leave a review for {{$actionNeeded->project->user->name}}.</p>
				    
				  </div>
				</div> <!-- / .row -->

				<!-- Divider -->
				@if(!$loop->last)
				<hr>
				@endif
				@endforeach
				@else
				<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
				<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. Don't worry. We will notify you once you are required to take action.</p>
				@endif
				</div> <!-- / .card-body -->
				</div>
			</div>
			@endif
		</div>
		<div class="row">
			<div class="col-12 col-xl-4">

				<!-- Projects -->
				<div class="card">
				<div class="card-header">
				<div class="row align-items-top">
				  <div class="col">
				    
				    <!-- Title -->
				    <h4 class="card-header-title">
				      Projects in Progress
				    </h4>

				  </div>
				  <div class="col-auto">

				    <!-- Link -->
				    <!-- <a href="/lessons-overview" class="small">View all</a> -->
				    
				  </div>
				</div> <!-- / .row -->
				</div>
				<div class="card-body">

				@if(sizeof($attemptedProjects) > 0)
				@foreach($attemptedProjects as $attemptedProject)
				<div class="row align-items-top">
				  <div class="col-auto">
				    
				    <!-- Avatar -->
				    <a href="/roles/{{$attemptedProject->project->role->slug}}/projects/{{$attemptedProject->project->slug}}" class="avatar avatar-4by3">
				    @if($attemptedProject->project->url)
				    <img src="https://storage.googleapis.com/talentail-123456789/{{$attemptedProject->project->url}}" alt="..." class="avatar-img rounded">
				    @else
				    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
				    @endif
				    </a>

				  </div>
				  <div class="col ml--2">

				    <!-- Title -->
				    
				      <a href="/roles/{{$attemptedProject->project->role->slug}}/projects/{{$attemptedProject->project->slug}}"><h4 class="card-title mb-1">{{$attemptedProject->project->title}}</h4></a>
				    
				    
				  </div>
				</div> <!-- / .row -->

				<!-- Divider -->
				@if(!$loop->last)
				<hr>
				@endif
				@endforeach
				@else
				<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
				<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. <a href="/discover">Discover projects</a> created by our project creators.</p>
				@endif
				</div> <!-- / .card-body -->
				</div> <!-- / .card -->           

			</div>
			<div class="col-12 col-xl-4">

				<!-- Projects -->
				<div class="card">
				<div class="card-header">
				<div class="row align-items-top">
				  <div class="col">
				    
				    <!-- Title -->
				    <h4 class="card-header-title">
				      Submitted Projects
				    </h4>

				  </div>
				  <div class="col-auto">

				    <!-- Link -->
				    <!-- <a href="/projects-overview" class="small">View all</a> -->
				    
				  </div>
				</div> <!-- / .row -->
				</div>
				<div class="card-body">

				@if(sizeof($submittedProjects) > 0)
				@foreach($submittedProjects as $submittedProject)
				<div class="row align-items-top">
				  <div class="col-auto">
				    
				    <!-- Avatar -->
				    <a href="/roles/{{$submittedProject->project->role->slug}}/projects/{{$submittedProject->project->slug}}" class="avatar avatar-4by3">
				    @if($submittedProject->project->url)
				    <img src="https://storage.googleapis.com/talentail-123456789/{{$submittedProject->project->url}}" alt="..." class="avatar-img rounded">
				    @else
				    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
				    @endif
				    </a>
				    

				  </div>
				  <div class="col ml--2">

				    <!-- Title -->
				    <a href="project-overview.html"><h4 class="card-title mb-1">
				      Homepage Redesign
				    </h4></a>

				  </div>
				</div> <!-- / .row -->

				<!-- Divider -->
				@if(!$loop->last)
				<hr>
				@endif
				@endforeach
				@else
				<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
				<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. It's okay because perfection takes time.</p>
				@endif
				</div> <!-- / .card-body -->
				</div> <!-- / .card -->           

			</div>

			<div class="col-12 col-xl-4">

				<!-- Projects -->
				<div class="card">
				<div class="card-header">
				<div class="row align-items-top">
				  <div class="col">
				    
				    <!-- Title -->
				    <h4 class="card-header-title">
				      Reviewed Projects
				    </h4>

				  </div>
				  <div class="col-auto">

				    <!-- Link -->
				    <!-- <a href="/interviews-overview" class="small">View all</a> -->
				    
				  </div>
				</div> <!-- / .row -->
				</div>
				<div class="card-body">

				@if(sizeof($reviewedProjects) > 0)
				@foreach($reviewedProjects as $reviewedProject)
				<div class="row align-items-top">
				  <div class="col-auto">
				    
				    <!-- Avatar -->
				    <a href="/roles/{{$reviewedProject->project->role->slug}}/projects/{{$reviewedProject->project->slug}}" class="avatar avatar-4by3">
				    @if($reviewedProject->project->url)
				    <img src="https://storage.googleapis.com/talentail-123456789/{{$reviewedProject->project->url}}" alt="..." class="avatar-img rounded">
				    @else
				    <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="avatar-img rounded">
				    @endif
				    </a>

				  </div>
				  <div class="col ml--2">

				    <!-- Title -->
				    <a href="/roles/{{$reviewedProject->project->role->slug}}/projects/{{$reviewedProject->project->slug}}"><h4 class="card-title mb-1">
				      {{$reviewedProject->project->title}}
				    </h4></a>
				    
				  </div>
				</div> <!-- / .row -->

				<!-- Divider -->
				@if(!$loop->last)
				<hr>
				@endif
				@endforeach
				@else
				<p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😐</p>
				<p class="text-center" style="margin-bottom: 0 !important;">This section seems empty. A cup of coffee would be great right about now.</p>
				@endif
				</div> <!-- / .card-body -->
				</div> <!-- / .card -->           

			</div>
		</div>
	</div>
@endsection

@section ('footer')    
@endsection
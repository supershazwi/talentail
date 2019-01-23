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
		@if(Auth::user()->admin)
			<div class="row align-items-center">
			  <div class="col-auto">
			    <h2>
			      Created Projects
			    </h2>
			  </div>
			  <div class="col">
			  	<a href="/projects/select-role" class="btn btn-primary" style=" margin-top: -1.25rem; float: right;">Add Project</a>
			  	<a href="/profile/projects" class="btn btn-light" style="margin-right: 0.5rem; margin-top: -1.25rem; float: right;">View All</a>
			  </div>
			</div>
			@if(count($createdProjects) > 0)
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="card">	
					    <table class="table table-nowrap" style="margin-bottom: 0;">
					      <thead>
					        <tr>
					          <th scope="col">#</th>
					          <th scope="col">Project</th>
					          <th scope="col">Industry</th>
					          <th scope="col">Price</th>
					          <th scope="col">Status</th>
					        </tr>
					      </thead>
					      <tbody>
					      		@foreach($createdProjects as $key=>$createdProject)
					          <tr>
					            <th scope="row">{{$key+1}}</th>
					            <td><a href="/roles/{{$createdProject->role->slug}}/projects/{{$createdProject->slug}}">{{$createdProject->title}}</a></td>
					            <td>{{$createdProject->industry->title}}</td>
					            <td>${{$createdProject->amount}}</td>
					            @if($createdProject->published)
					            	<td><span class="badge badge-primary">Public</span></td>
					            @else
					            	<td><span class="badge badge-warning">Private</span></td>
					            @endif
					          </tr>
					          @endforeach
					      </tbody>
					    </table>
					</div>
				</div>
			</div>
			@else
			<div class="row align-items-center" id="talentailBox">
			  <div class="col-lg-12">
			    <div class="card">
			      <div class="card-body">
			        <div class="row justify-content-center" style="margin-top:1rem;">
			          <div class="col-12 col-md-5 col-xl-4 my-5">
			            <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😀</p>
			            <p class="text-center mb-3" style="margin-bottom: 2.25rem !important;">Projects help users gain the hands-on experience they need to get a step up in their careers. Boost the community by creating a project based on your own experiences. <a href="/projects/select-role">Create a project</a>.
			            </p>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			@endif
		@endif
		@if(Auth::user()->admin)
			<div class="row align-items-center">
			  <div class="col-auto">
			    <h2>
			      Your Projects Attempted By Users
			    </h2>
			  </div>
			  <div class="col">

			  </div>
			</div>
			@if(sizeof($creatorProjects) > 0)
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="card">	
					    <table class="table table-nowrap" style="margin-bottom: 0;">
					      <thead>
					        <tr>
					          <th scope="col">#</th>
					          <th scope="col">Project</th>
					          <th scope="col">Profits Earned</th>
					          <th scope="col">User</th>
					          <th scope="col">Status</th>
					        </tr>
					      </thead>
					      <tbody>
					      		@foreach($creatorProjects as $key=>$creatorProject)
					          <tr>
					            <th scope="row">{{$key+1}}</th>
					            <td><a href="/roles/{{$creatorProject->project->role->slug}}/projects/{{$creatorProject->project->slug}}/{{$creatorProject->user_id}}">{{$creatorProject->project->title}}</a></td>
					            <td>${{$creatorProject->project->amount}} * 0.8 = <strong style="text-decoration: underline;">${{number_format((0.8*$creatorProject->project->amount), 2, '.', '')}}</strong></td>
					            <td>{{$creatorProject->user->name}}</td>
					            @if($creatorProject->status == "Attempting")
					            <td><span class="badge badge-primary">{{$creatorProject->status}}</span></td>
					            @elseif($creatorProject->status == "Completed")
					            <td><span class="badge badge-info">{{$creatorProject->status}}</span></td>
					            @elseif($creatorProject->status == "Assessed")
					            <td><span class="badge badge-primary">{{$creatorProject->status}}</span></td>
					            @elseif($creatorProject->status == "Reviewed")
					            <td><span class="badge badge-success">{{$creatorProject->status}}</span></td>
					            @endif
					          </tr>
					          @endforeach
					      </tbody>
					    </table>
					</div>
				</div>
			</div>
			@else
			<div class="row align-items-center" id="talentailBox">
			  <div class="col-lg-12">
			    <div class="card">
			      <div class="card-body">
			        <div class="row justify-content-center" style="margin-top:1rem;">
			          <div class="col-12 col-md-5 col-xl-4 my-5">
			            <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😀</p>
			            <p class="text-center mb-3" style="margin-bottom: 2.25rem !important;">Users who have purchased your project will appear here.
			            </p>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			@endif
		@endif
		<div class="row align-items-center">
		  <div class="col-auto">
		    <h2>
		      Projects
		    </h2>
		  </div>
		</div>
		@if(count($attemptedProjects) > 0)
		<div class="row">
		  <div class="col-12 col-xl-12">
		    <div class="card">  
		        <table class="table table-nowrap" style="margin-bottom: 0;">
		          <thead>
		            <tr>
		              <th scope="col">#</th>
		              <th scope="col">Project</th>
		              <th scope="col">Role</th>
		              <th scope="col">Industry</th>
		              <th scope="col">Type</th>
		            </tr>
		          </thead>
		          <tbody>
		              @foreach($attemptedProjects as $key=>$attemptedProject)
		              <tr>
		                <th scope="row">{{$key+1}}</th>
		                <td><a href="/roles/{{$attemptedProject->project->role->slug}}/projects/{{$attemptedProject->project->slug}}">{{$attemptedProject->project->title}}</a></td>
		                <td><span class="badge badge-primary">{{$attemptedProject->project->role->title}}</span></td>
		                <td><span class="badge badge-warning">{{$attemptedProject->project->industry->title}}</span></td>
	                  	<!-- <td>
	                      <div class="custom-control custom-checkbox-toggle">
	                        @if($attemptedProject->added)
	                        <input type="checkbox" class="custom-control-input" name="visibility" id="attemptedProject_{{$attemptedProject->id}}" value="{{$attemptedProject->id}}" checked onchange="toggleVisibility(this.id)">
	                        @else
	                        <input type="checkbox" class="custom-control-input" name="visibility" id="attemptedProject_{{$attemptedProject->id}}" value="{{$attemptedProject->id}}" onchange="toggleVisibility(this.id)">
	                        @endif
	                        <label class="custom-control-label" for="attemptedProject_{{$attemptedProject->id}}" id="attemptedProject_{{$attemptedProject->id}}"></label>
	                      </div>
	                    </td> -->
	                    <td>
	                    	@if($attemptedProject->project->internal)
	                    	<span class="badge badge-dark">Internal</span>
	                    	@else
	                    	<span class="badge badge-dark">External</span>
	                    	@endif
	                    </td>
		              </tr>
		              @endforeach
		          </tbody>
		        </table>
		    </div>
		  </div>
		</div>
		@else
		<div class="row align-items-center" id="talentailBox">
		  <div class="col-lg-12">
		    <div class="card">
		      <div class="card-body">
		        <div class="row justify-content-center" style="margin-top:1rem;">
		          <div class="col-12 col-md-5 col-xl-4 my-5">
		            <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😀</p>
		            <p class="text-center mb-3" style="margin-bottom: 2.25rem !important;">Talentail projects are created by experienced professionals and have been designed according to their own work experiences. Reviewed projects will appear here. <a href="/projects">Discover projects</a>.
		            </p>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		@endif
		<div class="row align-items-center" style="margin-top: 0.5rem;">
		  <div class="col-auto">
		    <h2>
		      Portfolios
		    </h2>
		  </div>
		</div>
			@if(count($portfolios) > 0)
			<div class="row">
			  <div class="col-12 col-xl-12">
			    <div class="card">  
			        <table class="table table-nowrap" style="margin-bottom: 0;">
			          <thead>
			            <tr>
			              <th scope="col">#</th>
			              <th scope="col">Portfolio</th>
			              <th scope="col">No. of Internal Projects</th>
			              <th scope="col">No. of External Projects</th>
			            </tr>
			          </thead>
			          <tbody>
			              @foreach($portfolios as $key=>$portfolio)
			              <tr>
			                <th scope="row">{{$key+1}}</th>
			                <td><a href="/portfolios/{{$portfolio->id}}">{{$portfolio->role->title}}</a></td>
			                <td><span class="badge badge-primary">{{$portfolio->noOfInternalProjects}}</span></td>
			                <td><span class="badge badge-primary">{{$portfolio->noOfExternalProjects}}</span></td>
		                  	<!-- <td>
		                      <div class="custom-control custom-checkbox-toggle">
		                        @if($attemptedProject->added)
		                        <input type="checkbox" class="custom-control-input" name="visibility" id="attemptedProject_{{$attemptedProject->id}}" value="{{$attemptedProject->id}}" checked onchange="toggleVisibility(this.id)">
		                        @else
		                        <input type="checkbox" class="custom-control-input" name="visibility" id="attemptedProject_{{$attemptedProject->id}}" value="{{$attemptedProject->id}}" onchange="toggleVisibility(this.id)">
		                        @endif
		                        <label class="custom-control-label" for="attemptedProject_{{$attemptedProject->id}}" id="attemptedProject_{{$attemptedProject->id}}"></label>
		                      </div>
		                    </td> -->
			              </tr>
			              @endforeach
			          </tbody>
			        </table>
			    </div>
			  </div>
			</div>
			@else
			<div class="row align-items-center" id="talentailBox">
			  <div class="col-lg-12">
			    <div class="card">
			      <div class="card-body">
			        <div class="row justify-content-center" style="margin-top:1rem;">
			          <div class="col-12 col-md-5 col-xl-4 my-5">
			            <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">😀</p>
			            <p class="text-center mb-3" style="margin-bottom: 2.25rem !important;">Portfolios are built with both projects on Talentail and also your own work experiences. <a href="/portfolios/select-role">Build your portfolio</a>.
			            </p>
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			@endif
		<form action="/" method="POST" class="mb-4" enctype="multipart/form-data">
		@csrf
			<input type="hidden" name="attemptedProjectId" id="attemptedProjectId" value="" />
			<button type="submit" id="toggleVisibilityButton" style="display: none;" />
		</form>
	</div>

	<script type="text/javascript">
		function toggleVisibility(attemptedProjectId) {
			let attemptedIdString = attemptedProjectId.split("_");
			document.getElementById("attemptedProjectId").value = attemptedIdString[1];
			document.getElementById("toggleVisibilityButton").click();
		}
	</script>
@endsection

@section ('footer')
@endsection
@extends ('layouts.main')

@section ('content')
<div class="container">
	<div class="row" style="margin-top: 5rem;">
	  <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
	    <div class="text-center">
	      <img src="/img/illustrations/scale.svg" alt="..." class="img-fluid" style="height: 15rem !important;">
	    </div>
	  </div>
	  <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
	    <h1 class="display-4 mb-3">
	      <span style="border-bottom: 5px solid #0984e3;">Showcase</span> & <span style="border-bottom: 5px solid #0984e3;">explore</span> work portfolios endorsed by our experts
	    </h1>
	  </div>
	</div>
	<!-- <hr style="margin-top: 5rem;"/> -->
	<div class="row justify-content-center">
	  <div class="col-12 col-lg-12">
	    
	    <!-- Header -->
	    <div class="header mt-md-5">
	      <div class="header-body">
	        <div class="row align-items-center">
	          <div class="col">
	            
	            <!-- Pretitle -->
	            <h6 class="header-pretitle">
	              Browse
	            </h6>

	            <!-- Title -->
	            <h1 class="header-title">
	              Portfolios
	            </h1>

	          </div>
	        </div> <!-- / .row -->
	      </div>
	    </div>
	  </div>
	</div> <!-- / .row -->

	<div class="row">
		@foreach($portfolios as $portfolio)
		<div class="col-12 col-md-6 col-xl-4">
		  <div class="card">
		    <div class="card-body">
		      <div class="text-center">
		        <a href="/portfolios/{{$portfolio->id}}" class="card-avatar avatar avatar-lg mx-auto">
					@if($portfolio->user->avatar)
					 <img src="http://storage.googleapis.com/talentail-123456789/{{Auth::user()->avatar}}" alt="" class="avatar-img rounded">
					@else
					<img src="/img/avatar.png" alt="..." class="avatar-img rounded">
					@endif
		        </a>
		      </div>

		      <!-- Title -->
		      <a href="/portfolios/{{$portfolio->id}}"><h2 class="card-title text-center mb-3">
		        {{$portfolio->user->name}}
		      </h2></a>

		      <p class="text-center" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$portfolio->user->description}}</p>

		      <div class="text-center" style="margin-bottom: 0.75rem;">
			      @foreach($portfolio->roles as $role)
			      <span class="badge badge-primary">{{$role->title}}</span>
			     @endforeach
			  </div>

		      <div class="text-center" style="margin-bottom: 1.2rem;">
		      	@foreach($portfolio->industries as $industry)
			      <span class="badge badge-warning">{{$industry->title}}</span>
			     @endforeach
			  </div>

		      <!-- Divider -->
		      <hr>

		      <div class="row align-items-right">
		        <div class="col">
		          
		          <!-- Time -->
		          <p class="card-text small text-muted" style="margin-bottom: 0;">Overall rating</p>
		          <p class="card-text small text-muted">
		            ⭐️ {{$portfolio->rating}}
		          </p>

		        </div>
		        <div class="col-auto">
		          
		          <!-- Avatar group -->
		          <p class="card-text small text-muted" style="margin-bottom: 0;">Endorsed by</p>
		          <div class="avatar-group">
		          	@foreach($portfolio->projects as $project)
		            <a href="/profile/{{$project->user_id}}" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="{{$project->user->name}}">
		            	@if($project->user->avatar)
		            	 <img src="http://storage.googleapis.com/talentail-123456789/{{$project->user->avatar}}" alt="..." class="avatar-img rounded-circle"/>
		            	@else
		            	<img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle"/>
		            	@endif
		            </a>
		            @endforeach
		          </div>

		        </div>
		      </div> <!-- / .row -->
		    </div> <!-- / .card-body -->
		  </div>
		</div>
		@endforeach
	</div>

	<!-- <div class="row justify-content-center">
		<div class="col-12 col-lg-12">
			<nav aria-label="Page navigation example">
	            <ul class="pagination" style="float: right;">
	              <li class="page-item"><a class="page-link" href="#!">1</a></li>
	              <li class="page-item"><a class="page-link" href="#!">2</a></li>
	              <li class="page-item"><a class="page-link" href="#!">3</a></li>
	              <li class="page-item"><a class="page-link" href="#!">Next</a></li>
	            </ul>
	          </nav>
		</div>
	</div> -->
</div>
@endsection

@section ('footer')    
@endsection
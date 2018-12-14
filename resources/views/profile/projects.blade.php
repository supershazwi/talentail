@extends ('layouts.main')

@section ('content')
<div class="header">
  
  <div class="container" style="margin-top: 5rem;">

    <!-- Body -->
    <div class="header-body mt--5 mt-md--6">
      <div class="row align-items-top">
        <div class="col-auto">
          
          <!-- Avatar -->
          <div class="avatar avatar-xxl header-avatar-top">
              @if($user->avatar)
               <img src="https://storage.googleapis.com/talentail-123456789/{{$user->avatar}}" alt="..." class="avatar-img rounded-circle border border-4 border-body">
              @else
              <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle border border-4 border-body">
              @endif
          </div>

        </div>
        <div class="col mb-3 ml--3 ml-md--2">
          
          <!-- Pretitle -->
          <h6 class="header-pretitle">
            @if($user->creator)
                Creator
            @else
                Member
            @endif
          </h6>

          <!-- Title -->
          <h1 class="header-title">
            {{$user->name}}
          </h1>

          <p>{{$user->description}}</p>

          @if($user->website)
          <a target="_blank" href="{{$user->website}}" style="margin-right: 0.5rem;"><i class="fas fa-link"></i></a>
          @endif
          @if($user->linkedin)
          <a target="_blank" href="{{$user->linkedin}}" style="margin-right: 0.5rem;"><i class="fab fa-linkedin"></i></a>
          @endif
          @if($user->facebook)
          <a target="_blank" href="{{$user->facebook}}" style="margin-right: 0.5rem;"><i class="fab fa-facebook-square"></i></a>
          @endif
          @if($user->twitter)
          <a target="_blank" href="{{$user->twitter}}"><i class="fab fa-twitter-square"></i></a>
          @endif

        </div>
        @if($showMessage)
        <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3" style="margin-bottom: 0rem !important;">

          <a href="/messages/{{$user->id}}" class="btn btn-primary d-block d-md-inline-block">
            Message
          </a>

        </div>
        @endif
      </div> <!-- / .row -->
      <div class="row align-items-center">
        <div class="col">
          
          <!-- Nav -->
          <ul class="nav nav-tabs nav-overflow header-tabs">
            <li class="nav-item">
              @if(Auth::id() == $user->id)
              <a href="/profile" class="nav-link">
              Work Experience
              </a>
              @else
              <a href="/profile/{{$user->id}}" class="nav-link">
              Work Experience
              </a>
              @endif
            </li>
            @if($user->creator)
            <li class="nav-item">
                @if(Auth::id() == $user->id)
                <a href="/profile/projects" class="nav-link active">
                Created Projects
                </a>
                @else
                <a href="/profile/{{$user->id}}/projects" class="nav-link active">
                Created Projects
                </a>
                @endif
            </li>
            @endif
            <li class="nav-item">
              @if(Auth::id() == $user->id)
              <a href="/profile/reviews" class="nav-link">
              Reviews
              </a>
              @else
              <a href="/profile/{{$user->id}}/reviews" class="nav-link">
              Reviews
              </a>
              @endif
            </li>
          </ul>

        </div>
      </div>
    </div> <!-- / .header-body -->

  </div>
</div>
<div class="container">
  <div class="row">
    @foreach($projects as $project)
    @if($project->published)
    <div class="col-12 col-md-6 col-xl-4">
      <div class="card">
        <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}">
          @if($project->url)
          <img src="https://storage.googleapis.com/talentail-123456789/{{$project->url}}" alt="..." class="card-img-top">
          @else
          <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="card-img-top">
          @endif
        </a>
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
            
              @if(empty(request()->route()->parameters['userId']))
              <span class="badge badge-primary">
                Published
              </span>
              @endif
              <!-- Title -->
              
              <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}"><h2 class="card-title mb-2 name" style="margin-top: 0.75rem !important;">{{$project->title}}</h2></a>
              

              <!-- Subtitle -->
              <p style="margin-top: 0.75rem; margin-bottom: 0;">
                {{$project->description}}
              </p>

            </div>
          </div> <!-- / .row -->

          <!-- Divider -->
          <hr>

          <div class="row align-items-center">
            <div class="col">
              
              <!-- Time -->
              <p class="card-text" style="margin-bottom: 0;">${{$project->amount}}</p>
            </div>
            <!-- <div class="col-auto">
              
              <p class="card-text small text-muted" style="margin-bottom: 0;">Attempted by</p>
              <div class="avatar-group">
                <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                  <img alt="Image" src="/img/avatars/profiles/avatar-female-2.jpg" class="avatar-img rounded-circle"/>
                </a>
                <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                  <img alt="Image" src="/img/avatars/profiles/avatar-female-2.jpg" class="avatar-img rounded-circle"/>
                </a>
                <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                  <img alt="Image" src="/img/avatars/profiles/avatar-female-1.jpg" class="avatar-img rounded-circle"/>
                </a>
              </div>

            </div> -->
          </div>


        </div> <!-- / .card-body -->
      </div>
    </div>
    @else
      @if(empty(request()->route()->parameters['userId']))
        <div class="col-12 col-md-6 col-xl-4">
          <div class="card">
            <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}">
              @if($project->url)
              <img src="https://storage.googleapis.com/talentail-123456789/{{$project->url}}" alt="..." class="card-img-top">
              @else
              <img src="https://images.unsplash.com/photo-1482440308425-276ad0f28b19?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=95f938199a2d20d027c2e16195089412&auto=format&fit=crop&w=1050&q=80" alt="..." class="card-img-top">
              @endif
            </a>
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
              
                  <!-- Title -->
                  
                  <span class="badge badge-warning">
                    Private
                  </span>

                  <a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}"><h2 class="card-title mb-2 name" style="margin-top: 0.75rem;">{{$project->title}}</h2></a>
                  

                  <!-- Subtitle -->
                  <p style="margin-top: 0.75rem; margin-bottom: 0;">
                    {{$project->description}}
                  </p>

                </div>
              </div> <!-- / .row -->

              <!-- Divider -->
              <hr>

              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Time -->
                  <p class="card-text" style="margin-bottom: 0;">${{$project->amount}}</p>
                </div>
                <!-- <div class="col-auto">
                  
                  <p class="card-text small text-muted" style="margin-bottom: 0;">Attempted by</p>
                  <div class="avatar-group">
                    <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                      <img alt="Image" src="/img/avatars/profiles/avatar-female-2.jpg" class="avatar-img rounded-circle"/>
                    </a>
                    <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                      <img alt="Image" src="/img/avatars/profiles/avatar-female-2.jpg" class="avatar-img rounded-circle"/>
                    </a>
                    <a href="profile-posts.html" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="">
                      <img alt="Image" src="/img/avatars/profiles/avatar-female-1.jpg" class="avatar-img rounded-circle"/>
                    </a>
                  </div>

                </div> -->
              </div>


            </div> <!-- / .card-body -->
          </div>
        </div>
      @endif  
    @endif
    @endforeach
  </div> <!-- / .row -->
</div>
@endsection

@section ('footer')
@endsection
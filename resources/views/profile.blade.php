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
              <a href="/profile" class="nav-link active">
              Work Experience
              </a>
              @else
              <a href="/profile/{{$user->id}}" class="nav-link active">
              Work Experience
              </a>
              @endif
            </li>
            @if($user->creator)
            <li class="nav-item">
                @if(Auth::id() == $user->id)
                <a href="/profile/projects" class="nav-link">
                Projects
                </a>
                @else
                <a href="/profile/{{$user->id}}/projects" class="nav-link">
                Projects
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
    @foreach($user->experiences as $experience)
    <div class="col-12 col-lg-6">
      <div class="card">
        <div class="card-body">
          
          <!-- Avatar -->
          <!-- <div class="text-center">
            <a href="team-overview.html" class="card-avatar avatar avatar-lg mx-auto">
              <img src="/img/avatars/teams/team-logo-1.jpg" alt="" class="avatar-img rounded">
            </a>
          </div> -->

          <!-- Title -->
          <h2 class="card-title text-center mb-3">
            <a href="team-overview.html">{{$experience->company}}</a>
          </h2>

          <!-- Text -->
          <p class="card-text text-center text-muted mb-4">
            {{$experience->role}}
          </p>

          <p class="card-text text-center text-muted mb-4">
            @parsedown($experience->description)
          </p>

          <!-- Divider -->
          <hr>

          <div class="row align-items-center">
            <div class="col">
              
              <!-- Time -->
              <p class="card-text small text-muted">
                @if($experience->end_date == "0000-00-00")
                    {{date("M Y", strtotime($experience->start_date))}} - Present
                @else
                    {{date("M Y", strtotime($experience->start_date))}} - {{date("M Y", strtotime($experience->end_date))}}
                @endif
              </p>

            </div>
          </div> <!-- / .row -->

        </div> <!-- / .card-body -->
      </div>
    </div>
    @endforeach
  </div> <!-- / .row -->
</div>
@endsection

@section ('footer')
@endsection
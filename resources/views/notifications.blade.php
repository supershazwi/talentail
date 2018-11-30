@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
      
      <!-- Header -->
      <div class="header mt-md-5">
        <div class="header-body">

          <!-- Title -->
          <h1 class="header-title">
            Notifications
          </h1>

        </div>
      </div>

      <!-- Card -->
      @foreach($notifications as $notification)
      <div class="card">
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-auto">
              @if($notification->user->avatar)
                <img alt="{{$notification->user->name}}" src="http://storage.googleapis.com/talentail-123456789/{{$notification->user->avatar}}" class="avatar-img rounded-circle" style="width: 40px; height: 40px; float: left; margin-right: 1rem;"> 
              @else
                <img alt="{{$notification->user->name}}" src="/img/avatar.png" class="avatar-img rounded-circle" style="width: 40px; height: 40px; float: left; margin-right: 1rem;"> 
              @endif 
            </div>
            <div class="col ml--4">
              <p style="margin-bottom: 0rem;">{{$notification->user->name}} <a href="{{$notification->url}}">{{$notification->message}}</a></p>
              <p style="margin-bottom: 0rem;" class="text-muted">{{$notification->created_at->diffForHumans()}}</p>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
      @endforeach

    </div>
  </div> <!-- / .row -->
</div>
@endsection

@section ('footer')
    
    

@endsection
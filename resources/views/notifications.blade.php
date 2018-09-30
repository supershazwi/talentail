@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/notifications">Notifications</a>
              </li>
          </ol>
      </nav>
  </div>
  <div class="container" style="padding: 1.5rem !important;">
      <div class="content-list">
          <!--end of content list head-->
          <div class="content-list-body">
              @if(empty($notifications))
              <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
  text-align: center; text-align: center;">
                  <h1>🤨</h1>
                  <h6>You have no notifications yet</h6>
              </div>
              @elseif(count($notifications) == 0)
              <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
  text-align: center; text-align: center;">
                  <h1>🤨</h1>
                  <h6>You have no notifications yet</h6>
              </div>
              @else
              <ol class="list-group list-group-activity">
                  @foreach($notifications as $notification)
                  <a href="{{$notification->url}}">
                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <img alt="{{$notification->user->name}}" src="https://storage.cloud.google.com/talentail-123456789/{{$notification->user->avatar}}"" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">{{$notification->user->name}}</span>
                                  <span data-filter-by="text">{{$notification->message}}</span>
                              </div>
                              <span class="text-small" data-filter-by="text">{{$notification->created_at->diffForHumans()}}</span>
                          </div>
                      </div>
                  </li></a>
                  @endforeach
              </ol>
              @endif
          </div>
      </div>
  </div>
@endsection

@section ('footer')
    
    

@endsection
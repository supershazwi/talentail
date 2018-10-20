@extends ('layouts.main')

@section ('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">{{$role->title}} Projects</h1>
                <p class="lead">{{$role->description}}</p>
            </section>
            <div class="row">
                @foreach($role->projects as $project)
                  @if($project->published)
                  <div class="col-lg-12">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="col-lg-10" style="float: left; padding: 0px;">
                          <h5><a href="/roles/{{$role->slug}}/projects/{{$project->slug}}">{{$project->title}}</a></h5>
                          <p style="margin-top: 0.5rem;">{{$project->description}}</p>
                          <a href="/profile/{{$project->user->id}}" data-toggle="tooltip" data-placement="top" title="">
                              <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$project->user->avatar}}">
                          </a>
                          <a href="/profile/{{$project->user->id}}">
                            <span style="font-size: .875rem; line-height: 1.3125rem;">{{$project->user->name}}</span>
                          </a>
                        </div>
                        <div class="col-lg-1" style="text-align: center; float: right; padding: 0px;">
                          <h5 style="float: right; color: #16a085;">${{$project->amount}}</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                    @if(Auth::user() != null && Auth::user()->admin)
                      <div class="col-lg-12">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="col-lg-10" style="float: left; padding: 0px;">
                              <h5><a href="/roles/{{$role->slug}}/projects/{{$project->slug}}">{{$project->title}}</a></h5>

                                @if($project->published)
                                <span class="badge badge-success">Published</span>
                                @else
                                <span class="badge badge-warning">Private</span>
                                @endif
                              
                              <p style="margin-top: 0.5rem;">{{$project->description}}</p>
                              <a href="/profile/{{$project->user->id}}" data-toggle="tooltip" data-placement="top" title="">
                                  <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$project->user->avatar}}">
                              </a>
                              <a href="/profile/{{$project->user->id}}">
                                <span style="font-size: .875rem; line-height: 1.3125rem;">{{$project->user->name}}</span>
                              </a>
                            </div>
                            <div class="col-lg-1" style="text-align: center; float: right; padding: 0px;">
                              <h5 style="float: right; color: #16a085;">${{$project->amount}}</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                  @endif
                @endforeach
            </div>
        </div>
      </div>
  </div>

  <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

  <script type="text/javascript">
      $(function () {
          var pusher = new Pusher("5491665b0d0c9b23a516", {
            cluster: 'ap1',
            forceTLS: true,
            auth: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
          });

          toastr.options = {
              positionClass: 'toast-bottom-right'
          };     

          var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
          messageChannel.bind('new-message', function(data) {
              toastr.options.onclick = function () {
                  window.location.replace(data.url);
              };

              toastr.info("<strong>" + data.username + "</strong><br />" + data.message); 
          });

          var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
          purchaseChannel.bind('new-purchase', function(data) {
              toastr.success(data.username + ' ' + data.message); 
          });
      })
  </script>
@endsection

@section ('footer')
	
	

@endsection
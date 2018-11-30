@extends ('layouts.main')

@section ('content')
<div class="header" style="margin-top: 1.5rem;">
  <div class="container">
    <!-- Body -->
    <div class="header-body">
      <div class="row align-items-center">
        <div class="col-auto">
          
          <!-- Avatar group -->
          <div class="avatar-group">
            @if(Auth::id() == $project->user->id)
            <a href="/profile" class="avatar">
            @else
            <a href="/profile/{{$project->user->id}}" class="avatar">
            @endif


            @if($project->user->avatar)
            <img src="http://storage.googleapis.com/talentail-123456789/{{$project->user->avatar}}" alt="..." class="avatar-img rounded-circle">
            @else
            <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle">
            @endif
            </a>
          </div>

          <!-- Button -->
          @if(Auth::id() == $project->user->id)
          <a href="/profile" style="margin-left: 0.5rem !important;">
            {{$project->user->name}}
          </a>
          @else
          <a href="/profile/{{$project->user->id}}" style="margin-left: 0.5rem !important;">
            {{$project->user->name}}
          </a>
          @endif

        </div>
      </div>
      <div class="row align-items-top" style="margin-top: 1.5rem;">
        <div class="col-auto">

          <!-- Avatar -->
          <div class="avatar avatar-lg avatar-4by3">
            @if($project->thumbnail)
            <img src="http://storage.googleapis.com/talentail-123456789/{{$project->thumbnail}}" alt="..." class="avatar-img rounded">
            @else
            <img src="/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
            @endif
          </div>

        </div>
        <div class="col ml--3 ml-md--2">
          
          <!-- Pretitle -->
          <h6 class="header-pretitle">
            Projects
          </h6>

          <!-- Title -->
          <h1 class="header-title">
            {{$project->title}}
          </h1>

          <p>{{$project->description}}</p>

        </div>
      </div> <!-- / .row -->
    </div>
  </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5" style="padding-top: 0rem !important;">
                <h1 class="header-title" style="margin-bottom: 1.5rem;">Leave a Review</h1>
                <p><strong>Project</strong></p>
                <p>{{$project->title}}</p>
                @if(Request::route('userId'))
                <p><strong>User you are reviewing </strong></p>
                <p style="margin-bottom: 0;">{{$attemptedProject->user->name}}</p>
                @else
                <p><strong>User you are reviewing: </strong></p>
                <p style="margin-bottom: 0;">{{$project->user->name}}</p>
                @endif
            </section>
            @if (($errors->has('review') && strlen($errors->first('review')) > 0) || ($errors->has('rating') && strlen($errors->first('rating')) > 0))
            <div class="alert alert-danger">
                @if ($errors->has('rating') && strlen($errors->first('rating')) > 0)
                    <p style="color: #721c24 !important;">{{ $errors->first('rating') }}</p>
                @endif
                @if ($errors->has('review') && strlen($errors->first('review')) > 0)
                    <p style="color: #721c24 !important;">{{ $errors->first('review') }}</p>
                @endif
            </div>
            @endif
            <form id="reviewForm" method="POST" action="/{{Request::path()}}">
            @csrf
              <p><strong>Rating</strong></p>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @if(old('rating') == "Positive")
                <label class="btn btn-success" id="label_positive" onclick="positive()">
                  <input type="radio" name="rating" id="positive" autocomplete="off" onclick="positive()" value="Positive" checked> Positive
                </label>
                @else
                <label class="btn btn-default" id="label_positive" onclick="positive()">
                  <input type="radio" name="rating" id="positive" autocomplete="off" onclick="positive()" value="Positive"> Positive
                </label>
                @endif

                @if(old('rating') == "Neutral")
                <label class="btn btn-warning" id="label_neutral" onclick="neutral()">
                  <input type="radio" name="rating" id="neutral" autocomplete="off" onclick="neutral()" value="Neutral" checked> Neutral
                </label>
                @else
                <label class="btn btn-default" id="label_neutral" onclick="neutral()">
                  <input type="radio" name="rating" id="neutral" autocomplete="off" onclick="neutral()" value="Neutral"> Neutral
                </label>
                @endif

                @if(old('rating') == "Negative")
                <label class="btn btn-danger" id="label_negative" onclick="negative()">
                  <input type="radio" name="rating" id="negative" autocomplete="off" onclick="negative()" value="Negative" checked> Negative
                </label>
                @else
                <label class="btn btn-default" id="label_negative" onclick="negative()">
                  <input type="radio" name="rating" id="negative" autocomplete="off" onclick="negative()" value="Negative"> Negative
                </label>
                @endif
              </div>
              <p style="margin-top: 1.5rem;"><strong>Review</strong></p>
              <textarea class="form-control" name="review" id="review" rows="5" placeholder="Enter review">{{ old('review') }}</textarea>
              <button class="btn btn-primary" onclick="saveProject()" style="margin-top: 1.5rem;">Submit Review</button>
            </form>
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

        var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
        purchaseChannel.bind('new-purchase', function(data) {
            toastr.success(data.username + ' ' + data.message); 
        });
    })

    function positive() {
        document.getElementById("label_positive").className = "btn btn-success";
        document.getElementById("label_neutral").className = "btn btn-default";
        document.getElementById("label_negative").className = "btn btn-default";
    }

    function neutral() {
        document.getElementById("label_positive").className = "btn btn-default";
        document.getElementById("label_neutral").className = "btn btn-warning";
        document.getElementById("label_negative").className = "btn btn-default";
    }

    function negative() {
        document.getElementById("label_positive").className = "btn btn-default";
        document.getElementById("label_neutral").className = "btn btn-default";
        document.getElementById("label_negative").className = "btn btn-danger";
    }
</script>
@endsection

@section ('footer')

@endsection
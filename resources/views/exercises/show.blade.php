@extends ('layouts.main')

@section ('content')
<div class="header">
  <div class="container">
    <div class="row" style="margin-top: 3rem;">
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-12">
            <h1>Exercise Brief</h1>
            <div class="card">
              <div class="card-body exercise-brief" style="margin-bottom: -1rem;">
                @parsedown($exercise->brief)
                @if(count($exercise->exercise_files) > 0)
                <hr style="margin-top: 1.5rem; margin-bottom: 1.5rem;"/>
                <h3>Exercise Files</h3>
                <ul style="margin-left: -1.4rem;">
                  @foreach($exercise->exercise_files->sortBy('title') as $exerciseFile) 
                    <li><a href="https://storage.googleapis.com/talentail-123456789/{{$exerciseFile->url}}">{{$exerciseFile->title}}</a></li>
                  @endforeach
                </ul>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>Your Solution</h1>
              <div class="card">
                <div class="card-body" style="padding-bottom: 0.5rem;">
                  <h3>{{$exercise->solution_title}}</h3>
                  <input type="hidden" name="task_1" value="107">
                  <p>{{$exercise->solution_description}}</p>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h3>{{$exercise->title}}</h3>
            <span class="badge badge-soft-secondary" style="margin-bottom: .84375rem; white-space: normal;">{{$exercise->task->title}}</span>
            <p>{{$exercise->description}}</p>
            <p class="card-text small text-muted" style="margin-bottom: 0;">Estimated Time Taken</p>
            <p>{{$exercise->duration}}</p>
            <p class="card-text small text-muted" style="margin-bottom: 0;">Opportunities</p>
            <p>{{count($exercise->opportunities)}}</p>
            <p class="card-text small text-muted" style="margin-bottom: 0;">Attempts</p>
            <p>{{count($exercise->answered_exercises)}}</p>

            <form id="attemptForm" method="POST" action="/exercises/{{$exercise->slug}}/attempt-exercise" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="exerciseId" value="{{$exercise->id}}" />
              <button type="submit" class="btn btn-primary btn-block" id="saveTaskAttempt">Attempt Exercise</button>
            </form>

            @if(Auth::id() && Auth::user()->admin)
              <a href="/exercises/{{$exercise->slug}}/edit" class="btn btn-block btn-link text-muted" style="padding-bottom: 0rem;">Edit</a>
            @endif

          </div>
        </div>
        @if(!empty($answeredExercise) && count($answeredExercise->exercise->opportunities) > 0)
        <div class="card">
          <div class="card-body">
            <h3>Job Opportunities Requiring This Competency</h3>
            <ul style="margin-left: -1.4rem; margin-bottom: 0rem;">
              @foreach($answeredExercise->exercise->opportunities as $opportunity)
              <li><a href="/opportunities/{{$opportunity->slug}}">{{$opportunity->title}} - {{$opportunity->company->title}}, {{$opportunity->location}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
  "use strict";

  !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  }();
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('2fvbbrttnhyb');
</script>
@endsection

@section ('footer')   
@endsection
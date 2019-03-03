@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row align-items-center" style="margin-top: 7.5rem;">
    <!-- <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
      <div class="text-center">
        <img src="/img/companies.png" alt="..." class="img-fluid">
      </div>
    </div> -->
    <!-- <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
      <h1 class="display-4 mb-3">
        Secure a <span style="color: #0984e3;">Business Analyst</span> career
      </h1>
      <h1 style="color: #777d7f;">Attempt tasks designed to show your competence to hiring companies</h1>
    </div> -->
    <div class="col-lg-8 offset-lg-2" style="text-align: center;">
      <h1 class="display-4 mb-3">
        SECURE A <span style="border-bottom: 5px solid #0984e3; text-transform: uppercase;">{{$role->title}}</span> CAREER
      </h1>
      <h1 style="color: #3e3e3c; margin-bottom: 0rem; font-size: 1.5rem;">Create positive change for an organisation by bridging the gap across departments and creating solutions</h1>
    </div>
  </div>
  <hr style="margin-top: 7.5rem; margin-bottom: 2.5rem;"/>
  <div class="row">
    <div class="col-lg-12" style="text-align: center; margin-bottom: 2.5rem;">
      <h1 style="font-size: 1.5rem;">TASKS</h1>
      <p>Complete exercises under each listed tasks below <br/> and apply to job opportunities mapped to them</p>
      <!-- <p style="color: #3e3e3c; margin-bottom: 0rem;">Browse these categories and complete the respective tasks (<a href="#">Not sure how to go about this?</a>)</p> -->
    </div>
    @foreach($tasks as $task)
      @if(count($task->exercises) > 0)
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <!-- Title -->
            <a href="/tasks/{{$task->slug}}"><h2 class="card-title text-center mb-3">
              {{$task->title}}
            </h2></a>

            <!-- Text -->

            <p class="card-text text-center mb-4" style="margin-bottom: 0rem !important; overflow: hidden; text-overflow: ellipsis;display: -webkit-box; max-height: 72px; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
              {{$task->description}}
            </p>  

            <!-- Divider -->
            <hr>

            <div class="row align-items-center" style="text-align: center;">
              <div class="col">
                
                <p class="card-text small text-muted" style="margin-bottom: 0;">Exercises</p>
                <p style="margin-bottom: 0;">{{count($task->exercises)}}</p>

              </div>

              <div class="col">
                
                <p class="card-text small text-muted" style="margin-bottom: 0;">Opportunities</p>
                <p style="margin-bottom: 0;">{{count($task->opportunities)}}</p>

              </div>

              <div class="col">
                
                <p class="card-text small text-muted" style="margin-bottom: 0;">Attempts</p>
                <p style="margin-bottom: 0;">{{count($task->answered_exercises)}}</p>

              </div>
            </div> 
          </div>
        </div>
      </div>
      @endif
    @endforeach
  </div>
</div>
<!-- Start of HubSpot Embed Code -->
  <!-- Start of Async Drift Code -->
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
<!-- End of Async Drift Code -->
<!-- End of HubSpot Embed Code --> 
@endsection

@section ('footer')   
@endsection
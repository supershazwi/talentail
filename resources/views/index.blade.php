@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row align-items-center" style="margin-top: 5rem;">
    <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
      <div class="text-center">
        <img src="/img/illustrations/happiness.svg" alt="..." class="img-fluid">
      </div>
    </div>
    <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
      <h1 class="display-4 mb-3">
      <span style="color: #0984e3;">Break into</span> a new career with a work portfolio.
      </h1>
      <h1 style="color: #777d7f;">In today's day and age, learning is never enough. Attempt exercises to apply your knowledge and show companies what you're made of.</h1>
    </div>
  </div>
  <hr style="margin-top: 5rem;"/>
  <div class="row" style="margin-top: 5rem;">
    <div class="col-12 col-md-6 order-md-1 mb-5 mb-md-0">
      <div class="text-center">
        <img src="/img/illustrations/lost.svg" alt="..." class="img-fluid">
      </div>
    </div>
    <div class="col-12 col-md-5 col-xl-4 offset-xl-1 offset-md-1 order-md-1 my-5">
      <h1 class="display-4 mb-3">
        Common <span style="color: #e74c3c;">challenges</span> faced by new job seekers:
      </h1>
      <ul style="list-style: none;margin-left: 0;padding-left: 2.2em;text-indent: -2.2em;">
        <li><h1 style="color: #777d7f;">😫 No relevant work experience</h1></li>
        <li><h1 style="color: #777d7f;">😫 Not given an opportunity to showcase competencies</h1></li>
        <li><h1 style="color: #777d7f;">😫 Staying ahead of the competition</h1></li>
      </ul>
    </div>
  </div>
  <hr style="margin-top: 5rem;"/>
  <div class="row" style="margin-top: 5rem;">
    <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
      <div class="text-center">
        <img src="/img/illustrations/scale.svg" alt="..." class="img-fluid">
      </div>
    </div>
    <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
      <h1 class="display-4 mb-3">
        <span style="color: #0984e3;">Complete exercises</span> and be given a platform to:
      </h1>
      <ul style="list-style: none;margin-left: 0;padding-left: 2.2em;text-indent: -2.2em;">
        <li><h1 style="color: #777d7f;">😁 Showcase your competencies through tangible work</h1></li>
        <li><h1 style="color: #777d7f;">😁 Get first hand experience on what it takes to perform on a role</h1></li>
        <li><h1 style="color: #777d7f;">😁 Set yourself apart from other job seekers</h1></li>
      </ul>
    </div>
  </div>
  <!-- <hr style="margin-top: 5rem;"/>
  <div class="row" style="margin-top: 5rem;">
    <div class="col-12 col-lg-4">
      <div class="row no-gutters align-items-center justify-content-center">
        <div class="col-auto">
          <div class="display-2 mb-0">25</div>
        </div>
      </div>
      <div class="text-center">
        <h1 style="color: #777d7f; margin-bottom: 0;">Projects</h1>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="row no-gutters align-items-center justify-content-center">
        <div class="col-auto">
          <div class="display-2 mb-0">15</div>
        </div>
      </div>
      <div class="text-center">
        <h1 style="color: #777d7f; margin-bottom: 0;">Porfolios Endorsed</h1>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="row no-gutters align-items-center justify-content-center">
        <div class="col-auto">
          <div class="display-2 mb-0">10</div>
        </div>
      </div>
      <div class="text-center">
        <h1 style="color: #777d7f; margin-bottom: 0;">Companies</h1>
      </div>
    </div>
  </div> -->
  @if(!Auth::id())
  <hr style="margin-top: 5rem;"/>
  <div class="row justify-content-center" style="margin-top: 5rem; display: block; text-align: center;">
    <h1 class="display-4 mb-3">
        Begin your journey today
      </h1>
    <a href="/register" class="btn btn-lg btn-primary mb-3">
        Register
    </a>
  </div>
  @endif
</div>
@endsection

@section ('footer')   
@endsection
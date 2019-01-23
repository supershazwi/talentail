@extends ('layouts.main')

@section ('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-11">
      <section class="py-4 py-lg-5" style="text-align: center; padding-bottom: 0rem !important;">
         <img src="https://storage.googleapis.com/talentail-123456789/{{$company->url}}" alt="" class="avatar-img rounded" style="width: 7.5rem; height: 7.5rem;">
        <h1 style="margin-top: 1.5rem;">{{$company->title}}</h1>
        <p>{{$company->description}}</p>
        
        @if($company->website)
        <a target="_blank" href="{{$company->website}}" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fas fa-link"></i></a>
        @endif
        @if($company->linkedin)
        <a target="_blank" href="{{$company->linkedin}}" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
        @endif
        @if($company->facebook)
        <a target="_blank" href="{{$company->facebook}}" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-facebook-square"></i></a>
        @endif
        @if($company->twitter)
        <a target="_blank" href="{{$company->twitter}}" style="font-size: 1.5rem;"><i class="fab fa-twitter-square"></i></a>
        @endif

      </section>

      <div class="header mt-md-5" style="margin-top: 0rem !important;">
        <div class="header-body" style="padding-top: 0;">
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    Available Jobs
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Pre-Interview Projects
                  </a>
                </li>
              </ul>

            </div>
            <div class="col-auto mr">
              <a href="/companies/{{$company->slug}}/add-job" class="btn btn-primary" style="margin-bottom: -1.25rem;" onclick="addTask()">Add Job</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        
      </div>
    </div>
  </div>
</div>
@endsection

@section ('footer')    
@endsection
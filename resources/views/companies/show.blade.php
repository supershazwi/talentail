@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/companies">Companies</a>&nbsp;> {{$company->title}}
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="{{$company->avatar}}" class="avatar avatar-lg mr-1" style="border-radius: 0.5rem;"/>
                </div>
                <h1 class="display-4 mb-3">{{$company->title}} Opportunities</h1>
                <p class="lead">{{$company->description}}</p>
            </section>
            <div class="row">
              @foreach($company->opportunities as $opportunity)
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="col-lg-9" style="float: left; padding: 0px;">
                      <h5><a href="/opportunities/{{$opportunity->slug}}">{{$opportunity->title}}</a></h5>
                      <p style="margin-top: 0.5rem;">{{$opportunity->description}}</p>
                    </div>
                    <div class="col-lg-2" style="float: right; padding: 0px;">
                      <strong>Skill</strong>
                      <p>{{$opportunity->skill->title}}</p>
                      <strong>Competencies</strong>
                      <p>15</p>
                      <strong>Projects</strong>
                      <p>2</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
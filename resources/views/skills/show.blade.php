@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/skills">Skills</a>&nbsp;> {{$skill->title}}
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/project.svg" class="avatar avatar-lg mr-1" />
                </div>
                <h1 class="display-4 mb-3">{{$skill->title}} Projects</h1>
                <p class="lead">{{$skill->description}}</p>
            </section>
            <div class="row">
                @foreach($skill->projects as $project)
                <div class="col-lg-12">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="col-lg-10" style="float: left; padding: 0px;">
                        <h5><a href="/skills/{{$skill->slug}}/projects/{{$project->slug}}">{{$project->title}}</a></h5>
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
                @endforeach
            </div>
        </div>
      </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
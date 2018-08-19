@extends ('layouts.main')

@section ('content')
  <div class="row" style="margin-top: 25px;">
    <div class="col-lg-4">
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title">
            <h4>{{$topic->title}}</h4>
          </div>
          <div class="card-title">
            <p class="text-small"><i class="fas fa-check"></i> Elicit requirements for software development using interviews</p>
          </div>
          <div class="card-title">
            <p class="text-small"><i class="fas fa-check"></i> Critically evaluate information gathered from multiple sources</p>
          </div>
          <div class="card-title">
            <p class="text-small"><i class="fas fa-check"></i> Translate technical information into business language to ensure understanding of the requirements</p>
          </div>
          <div class="card-title">
            <p class="text-small"><i class="fas fa-check"></i> Translate technical information into business language to ensure understanding of the requirements</p>
          </div>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <p style="margin-right: 15px;"><a href="#">See 25 more competencies</a></p>
              </div>
          </div>
        </div>
      </div>
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title">
            <h4>Companies</h4>
          </div>
          <div class="card-title">
            <span class="text-small">Accenture, Deloitte, Capgemini, Standard Chartered Bank, ...</span>
          </div>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <p style="margin-right: 15px;"><a href="#">See 36 more companies</a></p>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4>Projects</h4>
              </div>
              <div class="card-list-body">
                  @foreach($topic->projects as $project)
                  <div class="card card-kanban">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-lg-11">
                              <div class="card-title">
                                  <a href="#" data-toggle="modal" data-target="#task-modal">
                                      <h5><a href="/topics/{{$topic->slug}}/projects/{{$project->slug}}">{{$project->title}}</a></h5>
                                  </a>
                              </div>
                              <p class="text-small">{{$project->description}}</p>
                              <a href="#" data-toggle="tooltip" data-placement="top" title="">
                                  <img class="avatar" src="/img/avatar-male-4.jpg">
                              </a>
                              <a href="#">
                                <span style="font-size: .875rem; line-height: 1.3125rem;">Roger Ver</span>
                              </a>
                            </div>
                            <div class="col-lg-1" style="text-align: center;">
                              <h5 style="float: right; color: #16a085;">$35</h5>
                            </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
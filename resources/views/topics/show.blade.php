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
            <span class="text-small">• Elicit requirements for software development using interviews</span>
          </div>
          <div class="card-title">
            <span class="text-small">• Critically evaluate information gathered from multiple sources</span>
          </div>
          <div class="card-title">
            <span class="text-small">• Translate technical information into business language to ensure understanding of the requirements</span>
          </div>
          <div class="card-title">
            <span class="text-small">• Translate technical information into business language to ensure understanding of the requirements</span>
          </div>
          <div class="card-meta d-flex justify-content-between">
              <div class="d-flex align-items-center">
                  <span style="margin-right: 15px;"><a href="#">See 25 more competencies</a></span>
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
                  <span style="margin-right: 15px;"><a href="#">See 36 more companies</a></span>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4>Use Cases</h4>
              </div>
              <div class="card-list-body">
                  @foreach($topic->useCases as $useCase)
                  <div class="card card-kanban">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-lg-11">
                            <div class="card-title">
                                <a href="#" data-toggle="modal" data-target="#task-modal">
                                    <h5><a href="/topics/{{$topic->slug}}/useCases/{{$useCase->slug}}">{{$useCase->title}}</a></h5>
                                </a>
                            </div>
                            <p class="text-small">{{$useCase->description}}</p>
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
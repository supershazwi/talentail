@extends ('layouts.main')

@section ('content')
  <div class="row" style="margin-top: 25px;">
    <div class="col-lg-4">
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title">
            <h4>Business Analyst</h4>
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
                  <div class="card card-kanban">
                      <div class="card-body">
                          <div class="dropdown card-options">
                              <button class="btn-options" type="button" id="kanban-dropdown-button-13" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item text-danger" href="#">Archive Card</a>
                              </div>
                          </div>
                          <div class="card-title">
                              <a href="#" data-toggle="modal" data-target="#task-modal">
                                  <h6><a href="#">Digital Transformation</a></h6>
                              </a>
                          </div>
                          <p class="text-small">Digital Transformation is not necessarily about digital technology, but about the fact that technology, which is digital, allows people to solve their traditional problems. And they prefer this digital solution to the old solution.</p>
                          <div class="card-meta d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                  <span style="margin-right: 15px;"><a href="#">#DigitalTransformation</a></span>
                                  <span style="margin-right: 15px;"><a href="#">#EarlyChildhood</a></span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card card-kanban">
                      <div class="card-body">
                          <div class="dropdown card-options">
                              <button class="btn-options" type="button" id="kanban-dropdown-button-13" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item text-danger" href="#">Archive Card</a>
                              </div>
                          </div>
                          <div class="card-title">
                              <a href="#" data-toggle="modal" data-target="#task-modal">
                                  <h6><a href="#">Data Migration</a></h6>
                              </a>
                          </div>
                          <p class="text-small">Data migration is the process of transporting data between computers, storage devices or formats. It is a key consideration for any system implementation, upgrade or consolidation.</p>
                          <div class="card-meta d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                  <span style="margin-right: 15px;"><a href="#">#DataMigration</a></span>
                                  <span style="margin-right: 15px;"><a href="#">#Telecommunications</a></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
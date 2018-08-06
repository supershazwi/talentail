@extends ('layouts.main')

@section ('content')
  <div class="row" style="margin-top: 25px;">
    <div class="col-lg-4">
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title">
            <h4>{{$useCase->title}}</h4>
            <p class="small-text">{{$useCase->description}}</p>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-lg btn-block btn-primary" style="margin-bottom: 0.75rem;">Ask a question</button>

      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title">
            <h4>Files</h4>
          </div>
          <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">
            <li class="list-group-item" data-t="null" data-i="null" data-l="null" data-e="null" style="padding: 0px; border-color: transparent; margin-bottom: 0.75rem;">
                <div class="media align-items-center">
                    <ul class="avatars">
                        <li>
                            <div class="avatar bg-primary">
                                <i class="material-icons">insert_drive_file</i>
                            </div>
                        </li>
                    </ul>
                    <div class="media-body d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#" data-filter-by="text" class="A-filter-by-text">Branding-Proforma</a>
                            <br>
                            <span class="text-small SPAN-filter-by-text" data-filter-by="text">15kb Text Document</span>
                        </div>
                        <div class="dropdown">
                            <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Download</a>
                                <a class="dropdown-item" href="#">Share</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item" data-t="null" data-i="null" data-l="null" data-e="null" style="padding: 0px; border-color: transparent; margin-bottom: 0.75rem;">
                <div class="media align-items-center">
                    <ul class="avatars">
                        <li>
                            <div class="avatar bg-primary">
                                <i class="material-icons">insert_drive_file</i>
                            </div>
                        </li>
                    </ul>
                    <div class="media-body d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#" data-filter-by="text" class="A-filter-by-text">Branding-Proforma</a>
                            <br>
                            <span class="text-small SPAN-filter-by-text" data-filter-by="text">15kb Text Document</span>
                        </div>
                        <div class="dropdown">
                            <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Download</a>
                                <a class="dropdown-item" href="#">Share</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4>Brief</h4>
              </div>
              
          </div>
      </div>
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4>To-dos</h4>
              </div>
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <p class="small-text" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: #007bff; cursor: pointer;">
                      1. Draw out the As-Is process map to detail the end-to-end process of variance analysis within the payroll run process.
                    </p>
                  </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <p class="small-text" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #007bff; cursor: pointer;">
                      2. Draw out the To-be process map to detail the end-to-end process of variance analysis within the payroll run process.
                    </p>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>`
    </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/skills">Skills</a>&nbsp;>&nbsp;<a href="/skills/{{$skill->slug}}">{{$skill->title}}</a>&nbsp;> {{$project->title}}
              </li>
          </ol>
      </nav>
      <div class="dropdown">
          <button class="btn btn-round" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="material-icons">settings</i>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/skills/{{$skill->slug}}/projects/{{$project->slug}}/edit">Edit Project</a>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">{{$project->title}}</h1>
                <p class="lead">{{$project->description}}</p>
            </section>
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#brief" role="tab" aria-controls="brief" aria-selected="true">Brief</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#competencies" role="tab" aria-controls="competencies" aria-selected="false">Competencies</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#opportunities" role="tab" aria-controls="opportunities" aria-selected="false">Opportunities</a>
                </li> -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="brief" role="tabpanel" aria-labelledby="brief-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Brief</h3>
                      </div>
                  </div>
                  <div class="content-list-body">
                      <div class="card mb-3">
                        <div class="card-body">
                          <h5>Birth of Superfoods Pte. Ltd.</h5>
                          <p class="text-small">Superfoods Pte. Ltd. was founded by Mr Lee in Singapore on September 2000 with the sole aim of making Singaporeans happy with the food he creates. Over the course of 18 years, Superfoods Pte. Ltd. has grown to a total of 5,000 shops across countries such as Indonesia, Phillipines, Malaysia, Thailand and Singapore and employs about 10,000 employees of all nationalities. Mr Lee has taken the role of Chairman and the role of CEO has been taken over by the previous Vice-President of Operations, Mrs Selena.</p>
                          <h5>Main Lines of Business</h5>
                          <p class="text-small">Superfoods has come far from its initial one-man pushcart stall operated by Mr Lee selling curry puffs at busy Raffles Place to fill the stomachs of hungry and driven professionals. Today, some of its lines of business include: </p>
                          <ul>
                            <li><p class="text-small">Extended range of food products like curry puffs, samosas, popiahs and goreng pisangs</p></li>
                            <li><p class="text-small">White-labelling of products for third party vendors to sell as their own</p></li>
                            <li><p class="text-small">Food ingredients at supermarkets like Sheng Shiong and NTUC Fairprice</p></li>
                          </ul>
                          <h5>Tight Competition</h5>
                          <p class="text-small">Following the success of Mr Lee and Superfoods, many young Singaporeans have started their own food businesses to get a shot at achieving success. Since then, many other businesses have sprouted to gain a portion of the marketshare that Superfoods owns. Businesses have started to automate their food production processes, upskilled their workforce and began experimenting with new food fusions.</p>
                          <h5>Innovate to Stay Ahead</h5>
                          <p class="text-small">Mr Lee has organised an all-hands meeting with all the key executives of Superfoods. The purpose of this meeting is to come up with ways that the current processes at Superfoods can be streamlined and bring about at least 20% reduction in cost and 10% reduction in time. Mr Lee has given you access to Superfoods' documents and you are now able to analyse the current processes and decide, how best to achieve Mr Lee's wishes.</p>
                        </div>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Tasks</h3>
                      </div>
                  </div>
                  <div class="content-list-body">
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" href="#">
                            1. Draw out the As-Is process map to detail the end-to-end process of variance analysis within the payroll run process.
                          </a>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <p class="text-small">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            <form class="dropzone" action="..." style="margin-bottom: 0px;">
                                <span class="dz-message" style="background-color: rgba(0, 0, 0, 0.03);">Drop files or click here to upload</span>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <a data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" href="#">
                            2. Draw out the To-be process map to detail the end-to-end process of variance analysis within the payroll run process.
                          </a>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <p class="text-small">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <a data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" href="#">
                            3. Derive the functional requirement specifications of the applications needed to support the To-be process map you have detailed in Step 2.
                          </a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            <p class="text-small">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab" data-filter-list="dropzone-previews">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Files</h3>
                          </div>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body row">
                          <div class="col">
                              <div class="d-none dz-template">
                                  <li class="list-group-item dz-preview dz-file-preview">
                                      <div class="media align-items-center dz-details">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary dz-file-representation">
                                                      <img class="avatar" data-dz-thumbnail />
                                                      <i class="material-icons">attach_file</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div class="dz-file-details">
                                                  <a href="#" class="dz-filename">
                                                      <span data-dz-name></span>
                                                  </a>
                                                  <br>
                                                  <span class="text-small dz-size" data-dz-size></span>
                                              </div>
                                              <img alt="Loader" src="/img/loader.svg" class="dz-loading" />
                                              <div class="dropdown">
                                                  <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="material-icons">more_vert</i>
                                                  </button>
                                                  <div class="dropdown-menu dropdown-menu-right">
                                                      <a class="dropdown-item" href="#">Download</a>
                                                      <a class="dropdown-item" href="#">Share</a>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
                                                  </div>
                                              </div>
                                              <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                  Cancel
                                              </button>
                                          </div>
                                      </div>
                                      <div class="progress dz-progress">
                                          <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                      </div>
                                  </li>
                              </div>
                              <form class="dropzone" action="http://mediumra.re/dropzone/upload.php">
                                  <span class="dz-message">Drop files here or click here to upload</span>
                              </form>
                              <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">

                                  <li class="list-group-item">
                                      <div class="media align-items-center">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary">
                                                      <i class="material-icons">insert_drive_file</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="Peggy Brown" src="/img/avatar-female-2.jpg" class="avatar" data-title="Peggy Brown" data-toggle="tooltip" data-filter-by="data-title" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div>
                                                  <a href="#" data-filter-by="text">client-questionnaire</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">48kb Text Doc</span>
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

                                  <li class="list-group-item">
                                      <div class="media align-items-center">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary">
                                                      <i class="material-icons">folder</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="Harry Xai" src="/img/avatar-male-2.jpg" class="avatar" data-title="Harry Xai" data-toggle="tooltip" data-filter-by="data-title" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div>
                                                  <a href="#" data-filter-by="text">moodboard_images</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">748kb ZIP</span>
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

                                  <li class="list-group-item">
                                      <div class="media align-items-center">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary">
                                                      <i class="material-icons">image</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="Ravi Singh" src="/img/avatar-male-3.jpg" class="avatar" data-title="Ravi Singh" data-toggle="tooltip" data-filter-by="data-title" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div>
                                                  <a href="#" data-filter-by="text">possible-hero-image</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">1.2mb JPEG image</span>
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

                                  <li class="list-group-item">
                                      <div class="media align-items-center">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary">
                                                      <i class="material-icons">insert_drive_file</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="Claire Connors" src="/img/avatar-female-1.jpg" class="avatar" data-title="Claire Connors" data-toggle="tooltip" data-filter-by="data-title" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div>
                                                  <a href="#" data-filter-by="text">LandingPrototypes</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">415kb Sketch Doc</span>
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

                                  <li class="list-group-item">
                                      <div class="media align-items-center">
                                          <ul class="avatars">
                                              <li>
                                                  <div class="avatar bg-primary">
                                                      <i class="material-icons">insert_drive_file</i>
                                                  </div>
                                              </li>
                                              <li>
                                                  <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" data-filter-by="data-title" />
                                              </li>
                                          </ul>
                                          <div class="media-body d-flex justify-content-between align-items-center">
                                              <div>
                                                  <a href="#" data-filter-by="text">Branding-Proforma</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">15kb Text Document</span>
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
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="competencies" role="tabpanel" aria-labelledby="competencies-tab">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Competencies</h3>
                          </div>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body">
                          <form class="checklist">
                              <div class="row">
                                  <div class="form-group col">
                                      <i class="fas fa-check"></i>
                                      <p class="text-small" style="margin-left: 0.5rem;">Elicit requirements for software development using interviews</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <i class="fas fa-check"></i>
                                      <p class="text-small" style="margin-left: 0.5rem;">Critically evaluate information gathered from multiple sources</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <i class="fas fa-check"></i>
                                      <p class="text-small" style="margin-left: 0.5rem;">Translate technical information into business language to ensure understanding of the requirements</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <i class="fas fa-times"></i>
                                      <p class="text-small" style="margin-left: 0.5rem; text-decoration: line-through;">Plans and designs complex business processes and system modifications</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <i class="fas fa-times"></i>
                                      <p class="text-small" style="margin-left: 0.5rem; text-decoration: line-through;">Makes recommendations to improve and support business activities</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                          </form>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
              <!-- <div class="tab-pane fade" id="opportunities" role="tabpanel" aria-labelledby="opportunities-tab">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Opportunities</h3>
                          </div>
                      </div>
                      <div class="content-list-body">
                          <div class="row">
                                <div class="col-lg-4">
                                    <div class="card card-kanban">
                                      <div class="card-body">
                                        <div class="card-title">
                                          <img src="https://media.licdn.com/dms/image/C4E0BAQHGdEBFMKrWAw/company-logo_200_200/0?e=1542844800&v=beta&t=uIFmDYe1mWP8no811npLHCfB4-dYN1GNI4yUyE1F0po" style="height: 48px; margin-bottom: 1rem;" />
                                          <h5>Capgemini</h5>
                                        </div>
                                        <form class="checklist">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Business Analyst</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Collaborative Session Designer</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">ASE Facilitator</a>
                                                </div>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card card-kanban">
                                      <div class="card-body">
                                        <div class="card-title">
                                          <img src="https://media.licdn.com/dms/image/C4E0BAQE_tMd_dRgIzQ/company-logo_200_200/0?e=1542844800&v=beta&t=5MNMf6T0W1nWivA3CD3Pk_Fl44e2Iq8zFWv-byPjTfA" style="height: 48px; margin-bottom: 1rem;" />
                                          <h5>Accenture</h5>
                                        </div>
                                        <form class="checklist">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Business Analyst</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Collaborative Session Designer</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">ASE Facilitator</a>
                                                </div>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card card-kanban">
                                      <div class="card-body">
                                        <div class="card-title">
                                          <img src="https://media.licdn.com/dms/image/C4E0BAQHl6azR037YeA/company-logo_200_200/0?e=1542844800&v=beta&t=Z3Tc185BX_AJE6BmkGSBo8uajFPsGleVCsyUH9mg6w0" style="height: 48px; margin-bottom: 1rem;" />
                                          <h5>Facebook</h5>
                                        </div>
                                        <form class="checklist">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Business Analyst</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">Collaborative Session Designer</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <i class="fas fa-angle-right"></i>
                                                    <a href="#" style="margin-left: 0.5rem;">ASE Facilitator</a>
                                                </div>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                          </div>
                      </div>
                  </div>
              </div> -->
        </div>
        <button class="btn btn-primary btn-round btn-floating btn-lg" type="button" data-toggle="collapse" data-target="#floating-chat" aria-expanded="false" aria-controls="sidebar-floating-chat">
            <i class="material-icons">chat_bubble</i>
            <i class="material-icons">close</i>
        </button>
        <div class="collapse sidebar-floating" id="floating-chat">
            <div class="sidebar-content">
                <div class="chat-module" data-filter-list="chat-module-body">
                    <div class="chat-module-top">
                        <form>
                            <div class="input-group input-group-round">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">search</i>
                                    </span>
                                </div>
                                <input type="search" class="form-control filter-list-input" placeholder="Search chat" aria-label="Search Chat" aria-describedby="search-chat">
                            </div>
                        </form>
                        <div class="chat-module-body">


                            <div class="media chat-item">
                                <img alt="Claire" src="assets/img/avatar-female-1.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Claire</span>
                                        <span data-filter-by="text">4 days ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Hey guys, just kicking things off here in the chat window. Hope you&#39;re all ready to tackle this great project. Let&#39;s smash some Brand Concept &amp; Design!</p>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Peggy" src="assets/img/avatar-female-2.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Peggy</span>
                                        <span data-filter-by="text">4 days ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Nice one <a href="#">@Claire</a>, we&#39;ve got some killer ideas kicking about already.
                                            <img src="https://media.giphy.com/media/aTeHNLRLrwwwM/giphy.gif" alt="alt text" title="Thinking">
                                        </p>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Marcus" src="assets/img/avatar-male-1.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Marcus</span>
                                        <span data-filter-by="text">3 days ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Roger that boss! <a href="">@Ravi</a> and I have already started gathering some stuff for the mood boards, excited to start! &#x1f525;</p>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Ravi" src="assets/img/avatar-male-3.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Ravi</span>
                                        <span data-filter-by="text">3 days ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <h1 id="-">&#x1f609;</h1>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Claire" src="assets/img/avatar-female-1.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Claire</span>
                                        <span data-filter-by="text">2 days ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Can&#39;t wait! <a href="#">@David</a> how are we coming along with the <a href="#">Client Objective Meeting</a>?</p>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="David" src="assets/img/avatar-male-4.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">David</span>
                                        <span data-filter-by="text">Yesterday</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Coming along nicely, we&#39;ve got a draft for the client questionnaire completed, take a look! &#x1f913;</p>

                                    </div>

                                    <div class="media media-attachment">
                                        <div class="avatar bg-primary">
                                            <i class="material-icons">insert_drive_file</i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" data-filter-by="text">questionnaire-draft.doc</a>
                                            <span data-filter-by="text">24kb Document</span>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Sally" src="assets/img/avatar-female-3.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Sally</span>
                                        <span data-filter-by="text">2 hours ago</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Great start guys, I&#39;ve added some notes to the task. We may need to make some adjustments to the last couple of items - but no biggie!</p>

                                    </div>

                                </div>
                            </div>



                            <div class="media chat-item">
                                <img alt="Peggy" src="assets/img/avatar-female-2.jpg" class="avatar" />
                                <div class="media-body">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">Peggy</span>
                                        <span data-filter-by="text">Just now</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>Well done <a href="#">@all</a>. See you all at 2 for the kick-off meeting. &#x1f91C;</p>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="chat-module-bottom">
                        <form class="chat-form">
                            <textarea class="form-control" placeholder="Type message" rows="1"></textarea>
                            <div class="chat-form-buttons">
                                <button type="button" class="btn btn-link">
                                    <i class="material-icons">tag_faces</i>
                                </button>
                                <div class="custom-file custom-file-naked">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                        <i class="material-icons">attach_file</i>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection

@section ('footer')
	
	

@endsection
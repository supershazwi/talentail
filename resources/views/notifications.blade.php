@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/notifications">Notifications</a>
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="content-list">
          <div class="row content-list-head" style="padding-top: 4.5rem !important;">
              <div class="col-auto">
                  <h1>Notifications</h1>
              </div>
          </div>
          <!--end of content list head-->
          <div class="content-list-body">
              <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 190px !important;
  text-align: center; text-align: center;">
                  <h1>🤨</h1>
                  <h6>You have no notifications yet</h6>
              </div>
              <!-- <ol class="list-group list-group-activity">


                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">playlist_add_check</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Claire" src="/img/avatar-female-1.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Claire</span>
                                  <span data-filter-by="text">completed the task</span><a href="#" data-filter-by="text">Set up client chat channel</a>
                              </div>
                              <span class="text-small" data-filter-by="text">Just now</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">person_add</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Ravi" src="/img/avatar-male-3.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Ravi</span>
                                  <span data-filter-by="text">joined the project</span>
                              </div>
                              <span class="text-small" data-filter-by="text">5 hours ago</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">playlist_add</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Kristina" src="/img/avatar-female-4.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Kristina</span>
                                  <span data-filter-by="text">added the task</span><a href="#" data-filter-by="text">Produce broad concept directions</a>
                              </div>
                              <span class="text-small" data-filter-by="text">Yesterday</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">playlist_add</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Marcus" src="/img/avatar-male-1.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Marcus</span>
                                  <span data-filter-by="text">added the task</span><a href="#" data-filter-by="text">Present concepts and establish direction</a>
                              </div>
                              <span class="text-small" data-filter-by="text">Yesterday</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">person_add</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Sally" src="/img/avatar-female-3.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Sally</span>
                                  <span data-filter-by="text">joined the project</span>
                              </div>
                              <span class="text-small" data-filter-by="text">2 days ago</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">date_range</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="Claire" src="/img/avatar-female-1.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">Claire</span>
                                  <span data-filter-by="text">rescheduled the task</span><a href="#" data-filter-by="text">Target market trend analysis</a>
                              </div>
                              <span class="text-small" data-filter-by="text">2 days ago</span>
                          </div>
                      </div>
                  </li>



                  <li class="list-group-item">
                      <div class="media align-items-center">
                          <ul class="avatars">
                              <li>
                                  <div class="avatar bg-primary">
                                      <i class="material-icons">add</i>
                                  </div>
                              </li>
                              <li>
                                  <img alt="David" src="/img/avatar-male-4.jpg" class="avatar" data-filter-by="alt" />
                              </li>
                          </ul>
                          <div class="media-body">
                              <div>
                                  <span class="h6" data-filter-by="text">David</span>
                                  <span data-filter-by="text">started the project</span>
                              </div>
                              <span class="text-small" data-filter-by="text">12 days ago</span>
                          </div>
                      </div>
                  </li>
              </ol> -->
          </div>
      </div>
  </div>
@endsection

@section ('footer')
    
    

@endsection
@extends ('layouts.main')

@section ('content')
    <div class="navbar bg-white breadcrumb-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/messages">Messages</a>
              </li>
          </ol>
      </nav>
    </div>
    <div class="content-container">
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
                        <img alt="Claire" src="/img/avatar-female-1.jpg" class="avatar" />
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
                        <img alt="Peggy" src="/img/avatar-female-2.jpg" class="avatar" />
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
                        <img alt="Marcus" src="/img/avatar-male-1.jpg" class="avatar" />
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
                        <img alt="Ravi" src="/img/avatar-male-3.jpg" class="avatar" />
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
                        <img alt="Claire" src="/img/avatar-female-1.jpg" class="avatar" />
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
                        <img alt="David" src="/img/avatar-male-4.jpg" class="avatar" />
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
                        <img alt="Sally" src="/img/avatar-female-3.jpg" class="avatar" />
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
                        <img alt="Peggy" src="/img/avatar-female-2.jpg" class="avatar" />
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
        <div class="sidebar collapse" id="sidebar-collapse">
            <div class="sidebar-content">
                <div class="chat-team-sidebar text-small">
                    <div class="chat-team-sidebar-top">
                        <div class="media align-items-center">
                            <a href="#" class="mr-2">
                                <img alt="Team Avatar" src="/img/logo-team.jpg" class="avatar avatar-lg" />
                            </a>
                            <div class="media-body">
                                <h5 class="mb-1">Pipeline Fans</h5>
                                <p>A collective of Pipeline enthusiasts sharing the the love</p>
                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                            </li>
                        </ul>
                    </div>
                    <div class="chat-team-sidebar-bottom">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="list-group">
                                <form class="px-3 mb-3">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members" aria-describedby="filter-members">
                                    </div>
                                </form>
                                <div class="list-group list-group-flush">

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Claire Connors" src="/img/avatar-female-1.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Claire Connors</h6>
                                                <span data-filter-by="text">Administrator</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Marcus Simmons" src="/img/avatar-male-1.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Marcus Simmons</h6>
                                                <span data-filter-by="text">Administrator</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Peggy Brown" src="/img/avatar-female-2.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Peggy Brown</h6>
                                                <span data-filter-by="text">Project Manager</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Harry Xai" src="/img/avatar-male-2.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Harry Xai</h6>
                                                <span data-filter-by="text">Project Manager</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Sally Harper" src="/img/avatar-female-3.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Sally Harper</h6>
                                                <span data-filter-by="text">Developer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Ravi Singh" src="/img/avatar-male-3.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Ravi Singh</h6>
                                                <span data-filter-by="text">Developer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Kristina Van Der Stroem" src="/img/avatar-female-4.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Kristina Van Der Stroem</h6>
                                                <span data-filter-by="text">Developer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">David Whittaker</h6>
                                                <span data-filter-by="text">Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Kerri-Anne Banks" src="/img/avatar-female-5.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Kerri-Anne Banks</h6>
                                                <span data-filter-by="text">Marketing</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Masimba Sibanda" src="/img/avatar-male-5.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Masimba Sibanda</h6>
                                                <span data-filter-by="text">Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Krishna Bajaj" src="/img/avatar-female-6.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Krishna Bajaj</h6>
                                                <span data-filter-by="text">Marketing</span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media media-member mb-0">
                                            <img alt="Kenny Tran" src="/img/avatar-male-6.jpg" class="avatar" />
                                            <div class="media-body">
                                                <h6 class="mb-0" data-filter-by="text">Kenny Tran</h6>
                                                <span data-filter-by="text">Contributor</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab" data-filter-list="dropzone-previews">
                                <form class="px-3 mb-3">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter files" aria-label="Filter Files" aria-describedby="filter-files">
                                    </div>
                                </form>
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
                                <ul class="list-group list-group-activity dropzone-previews flex-column-reverse list-group-flush">

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
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
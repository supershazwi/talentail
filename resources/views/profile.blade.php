@extends ('layouts.main')

@section ('content')

<div class="breadcrumb-bar navbar bg-white sticky-top">
    <nav aria-label="breadcrumb">
    </nav>
    @if(Auth::id() == $user->id)
    <a href="/profile/edit" class="btn btn-primary">Edit Profile</a>
    @endif
</div>   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">
                    <div class="page-header mb-4">
                        <div class="media">
                            @if($user->avatar)
                            <img alt="Image" src="https://storage.cloud.google.com/talentail-123456789/{{$user->avatar}}" class="avatar avatar-lg mt-1" />
                            @else
                            <img alt="Image" src="/img/avatar.png" class="avatar avatar-lg mt-1" />
                            @endif
                            <div class="media-body ml-3">
                                <h1 class="mb-0" style="margin-top: 0;">{{$user->name}} 
                                    @if($user->creator)
                                    <span class="badge badge-warning" style="font-size: 0.8rem;">Creator</span>
                                    @endif
                                </h1>
                                <p class="lead">{{$user->description}}</p>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-fill">
                        @if($user->creator)
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#workExperience" role="tab" aria-controls="workExperience" aria-selected="true">Work Experience</a>
                        </li>
                        @endif
                        @if($user->id == Auth::id())
                            @if($user->creator)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#gatheredRoles" role="tab" aria-controls="gatheredRoles" aria-selected="true">Gathered Roles</a>
                            </li>   
                            @else
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#gatheredRoles" role="tab" aria-controls="gatheredRoles" aria-selected="true">Gathered Roles</a>
                            </li>
                            @endif
                        @endif
                        @if($user->id == Auth::id())
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#attemptedProjects" role="tab" aria-controls="attemptedProjects" aria-selected="false">Attempted Projects</a>
                        </li>
                        @endif
                        @if($user->creator)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#createdProjects" role="tab" aria-controls="createdProjects" aria-selected="false">Created Projects</a>
                        </li>
                        @endif
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#opportunities" role="tab" aria-controls="opportunities" aria-selected="false">Opportunities</a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        @if($user->creator)
                        <div class="tab-pane fade show active" id="workExperience" role="tabpanel" aria-labelledby="workExperience-tab" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Work Experience</h3>
                                </div>
                            </div>
                            @if(count($user->experiences) > 0)
                            <div class="content-list-body row">
                                <div class="col-md-12">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            @foreach($user->experiences as $experience)
                                            <div class="card-title">
                                                <h4 data-filter-by="text">{{$experience->company}}</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <strong>{{$experience->role}}</strong>
                                                    <p>{{$experience->description}}</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p>{{date("M Y", strtotime($experience->start_date))}} - {{date("M Y", strtotime($experience->end_date))}}</p>
                                                </div>
                                            </div>
                                            @if(!$loop->last)
                                                <hr/>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else 
                            <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
                text-align: center; text-align: center;">
                                <h1>🤨</h1>
                                <h6>You have not added any work experience yet</h6>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if($user->creator)
                        <div class="tab-pane fade" id="gatheredRoles" role="tabpanel" aria-labelledby="gatheredRoles-tab" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Gathered Roles</h3>
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter roles" aria-label="Filter roles" aria-describedby="filter-roles">
                                    </div>
                                </form>
                            </div>
                            @if(count($rolesGained) > 0)   
                            <div class="content-list-body row">
                                @foreach($rolesGained as $roleGained)
                                <div class="col-md-6">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            <div class="card-title" style="text-align: center; max-width: 100%;">
                                                <h5 data-filter-by="text"><a href="/roles/{{$roleGained->role->slug}}">{{$roleGained->role->title}}</a></h5>
                                            </div>
                                            @foreach($roleGained->competency_scores as $competencyScore)
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <p>{{$competencyScore->competency->title}}</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <span class="fas fa-star star-rating" style="color: #6c757d !important;"></span>
                                                    <span>{{$competencyScore->score}}</span>
                                                </div>
                                            </div>
                                            @if(!$loop->last)
                                                <hr/>
                                            @endif
                                            @endforeach
                                            @if(count($roleGained->competency_scores) > 3)
                                            <div style="text-align: center; margin-top: 1.5rem;">
                                                <a href="#">See {{count($roleGained->competency_scores)-3}} more</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else 
                            <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
                text-align: center; text-align: center;">
                                <h1>🤨</h1>
                                <h6>You have not gathered roles yet because you <br />have not attempted and completed any project yet</h6>
                            </div>
                            @endif
                        </div>
                        @else
                        <div class="tab-pane fade show active" id="gatheredRoles" role="tabpanel" aria-labelledby="gatheredRoles-tab" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Gathered Roles</h3>
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter roles" aria-label="Filter roles" aria-describedby="filter-roles">
                                    </div>
                                </form>
                            </div>
                            @if(count($rolesGained) > 0)   
                            <div class="content-list-body row">
                                @foreach($rolesGained as $roleGained)
                                <div class="col-md-6">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            <div class="card-title" style="text-align: center; max-width: 100%;">
                                                <h5 data-filter-by="text"><a href="/roles/{{$roleGained->role->slug}}">{{$roleGained->role->title}}</a></h5>
                                            </div>
                                            @foreach($roleGained->competency_scores as $competencyScore)
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <p>{{$competencyScore->competency->title}}</p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <span class="fas fa-star star-rating" style="color: #6c757d !important;"></span>
                                                    <span>{{$competencyScore->score}}</span>
                                                </div>
                                            </div>
                                            @if(!$loop->last)
                                                <hr/>
                                            @endif
                                            @endforeach
                                            @if(count($roleGained->competency_scores) > 3)
                                            <div style="text-align: center; margin-top: 1.5rem;">
                                                <a href="#">See {{count($roleGained->competency_scores)-3}} more</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else 
                            <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
                text-align: center; text-align: center;">
                                <h1>🤨</h1>
                                <h6>You have not gathered roles yet because you <br />have not attempted and completed any project yet</h6>
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="tab-pane fade" id="attemptedProjects" role="tabpanel" aria-labelledby="attemptedProjects-tab" data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Attempted Projects</h3>
                                    </div>
                                    <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects" aria-describedby="filter-projects">
                                        </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                @if(count($attemptedProjects) > 0) 
                                <div class="content-list-body row">
                                    @foreach($attemptedProjects as $attemptedProject)
                                    <div class="col-lg-6">
                                        <div class="card card-project">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h5 data-filter-by="text"><a href="/roles/{{$attemptedProject->project->role->slug}}/projects/{{$attemptedProject->project->slug}}">{{$attemptedProject->project->title}}</a></h5>
                                                    @if($attemptedProject->status == "Completed")
                                                    <span class="badge badge-warning">{{$attemptedProject->status}}</span>
                                                    @else
                                                    <span class="badge badge-success">{{$attemptedProject->status}}</span>
                                                    @endif
                                                </div>
                                                <span>{{$attemptedProject->project->description}}</span>
                                                <br />
                                                <br />
                                                <a href="/profile/{{$attemptedProject->project->user_id}}" data-toggle="tooltip" data-placement="top" title="">
                                                    <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$attemptedProject->project->user->avatar}}">
                                                </a>
                                                <a href="/profile/{{$attemptedProject->project->user_id}}">
                                                  <span style="font-size: .875rem; line-height: 1.3125rem;">{{$attemptedProject->project->user->name}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else 
                                <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
                    text-align: center; text-align: center;">
                                    <h1>🤨</h1>
                                    <h6>You have not attempted any project yet</h6>
                                </div>
                                @endif
                                <!--end of content list body-->
                            </div>
                            <!--end of content list-->
                        </div>
                        @if($user->creator)
                        <div class="tab-pane fade" id="createdProjects" role="tabpanel" aria-labelledby="createdProjects-tab" data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Created Projects</h3>
                                        @if(Auth::id() == $user->id)
                                        <a href="/projects/select-role" class="btn btn-primary" style="margin-left: 1.5rem;">Create Project</a>
                                        @endif
                                    </div>
                                    <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects" aria-describedby="filter-projects">
                                        </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                @if(count($user->projects) > 0)
                                <div class="content-list-body row">
                                    @foreach($user->projects as $project)
                                    <div class="col-lg-6">
                                        <div class="card card-project">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <a href="#" data-toggle="modal" data-target="#task-modal">
                                                        <h5><a href="/roles/{{$project->role->slug}}/projects/{{$project->slug}}" data-filter-by="text">{{$project->title}}</a></h5>
                                                        @if($project->published)
                                                        <span class="badge badge-success">Published</span>
                                                        @else
                                                        <span class="badge badge-warning">Private</span>
                                                        @endif
                                                    </a>
                                                </div>
                                                <span>{{$project->description}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="alert alert-light" role="alert" style="height: 450px !important; padding-top: 9.5rem !important;
                    text-align: center; text-align: center;">
                                    <h1>🤨</h1>
                                    <h6>You have not created any project yet</h6>
                                </div>
                                @endif
                                <!--end of content list body-->
                            </div>
                            <!--end of content list-->
                        </div>
                        @endif
                        <!--end of tab-->
                    </div>
                    <form class="modal fade" id="team-add-modal" tabindex="-1" role="dialog" aria-labelledby="team-add-modal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Team</h5>
                                    <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <!--end of modal head-->
                                <ul class="nav nav-tabs nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="team-add-details-tab" data-toggle="tab" href="#team-add-details" role="tab" aria-controls="team-add-details" aria-selected="true">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="team-add-members-tab" data-toggle="tab" href="#team-add-members" role="tab" aria-controls="team-add-members" aria-selected="false">Members</a>
                                    </li>
                                </ul>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                            <h6>Team Details</h6>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Name</label>
                                                <input class="form-control col" type="text" placeholder="Team name" name="team-name" />
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3">Description</label>
                                                <textarea class="form-control col" rows="3" placeholder="Team description" name="team-description"></textarea>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="team-add-members" role="tabpanel" aria-labelledby="team-add-members-tab">
                                            <div class="users-manage" data-filter-list="form-group-users">
                                                <div class="mb-3">
                                                    <ul class="avatars text-center">

                                                        <li>
                                                            <img alt="Claire Connors" src="/img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                                        </li>

                                                        <li>
                                                            <img alt="Marcus Simmons" src="/img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                                        </li>

                                                        <li>
                                                            <img alt="Peggy Brown" src="/img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                                        </li>

                                                        <li>
                                                            <img alt="Harry Xai" src="/img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members" aria-describedby="filter-members">
                                                </div>
                                                <div class="form-group-users">

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-1" checked>
                                                        <label class="custom-control-label" for="user-manage-1">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Claire Connors" src="/img/avatar-female-1.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-2" checked>
                                                        <label class="custom-control-label" for="user-manage-2">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Marcus Simmons" src="/img/avatar-male-1.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-3" checked>
                                                        <label class="custom-control-label" for="user-manage-3">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Peggy Brown" src="/img/avatar-female-2.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-4" checked>
                                                        <label class="custom-control-label" for="user-manage-4">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Harry Xai" src="/img/avatar-male-2.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-5">
                                                        <label class="custom-control-label" for="user-manage-5">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Sally Harper" src="/img/avatar-female-3.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-6">
                                                        <label class="custom-control-label" for="user-manage-6">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Ravi Singh" src="/img/avatar-male-3.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-7">
                                                        <label class="custom-control-label" for="user-manage-7">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kristina Van Der Stroem" src="/img/avatar-female-4.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-8">
                                                        <label class="custom-control-label" for="user-manage-8">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="David Whittaker" src="/img/avatar-male-4.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-9">
                                                        <label class="custom-control-label" for="user-manage-9">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kerri-Anne Banks" src="/img/avatar-female-5.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-10">
                                                        <label class="custom-control-label" for="user-manage-10">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Masimba Sibanda" src="/img/avatar-male-5.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-11">
                                                        <label class="custom-control-label" for="user-manage-11">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Krishna Bajaj" src="/img/avatar-female-6.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-12">
                                                        <label class="custom-control-label" for="user-manage-12">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kenny Tran" src="/img/avatar-male-6.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end of modal body-->
                                <div class="modal-footer">
                                    <button role="button" class="btn btn-primary" type="submit">
                                        Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>     

@endsection

@section ('footer')
	
	

@endsection
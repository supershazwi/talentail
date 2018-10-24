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
                                @if($user->website)
                                <a target="_blank" href="{{$user->website}}" style="margin-right: 0.5rem;"><i class="fas fa-link"></i></a>
                                @endif
                                @if($user->linkedin)
                                <a target="_blank" href="{{$user->linkedin}}" style="margin-right: 0.5rem;"><i class="fab fa-linkedin"></i></a>
                                @endif
                                @if($user->facebook)
                                <a target="_blank" href="{{$user->facebook}}" style="margin-right: 0.5rem;"><i class="fab fa-facebook-square"></i></a>
                                @endif
                                @if($user->twitter)
                                <a target="_blank" href="{{$user->twitter}}"><i class="fab fa-twitter-square"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#workExperience" role="tab" aria-controls="workExperience" aria-selected="true">Work Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#gatheredRoles" role="tab" aria-controls="gatheredRoles" aria-selected="true">Gathered Roles</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#attemptedProjects" role="tab" aria-controls="attemptedProjects" aria-selected="false">Attempted Projects</a>
                        </li>
                        @if($user->creator)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#createdProjects" role="tab" aria-controls="createdProjects" aria-selected="false">Created Projects</a>
                        </li>
                        @endif
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#opportunities" role="tab" aria-controls="opportunities" aria-selected="false">Opportunities</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content">
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
                                                    <p>@parsedown($experience->description)</p>
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
                                @if(Auth::id() == $user->id)
                                <h6>You have not added any work experience yet</h6>
                                @else
                                <h6>{{$user->name}} has not added any work experience yet</h6>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="gatheredRoles" role="tabpanel" aria-labelledby="gatheredRoles-tab" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Gathered Roles</h3>
                                </div>
                                <!-- <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter roles" aria-label="Filter roles" aria-describedby="filter-roles">
                                    </div>
                                </form> -->
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
                                @if(Auth::id() == $user->id)
                                <h6>You have not gathered roles yet because you <br />have not attempted and completed any project yet</h6>
                                @else
                                <h6>{{$user->name}} has not gathered roles yet because {{$user->name}} <br />has not attempted and completed any project yet</h6>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="attemptedProjects" role="tabpanel" aria-labelledby="attemptedProjects-tab" data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Attempted Projects</h3>
                                    </div>
                                    <!-- <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects" aria-describedby="filter-projects">
                                        </div>
                                    </form> -->
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
                                                    @if($user->avatar)
                                                    <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$attemptedProject->project->user->avatar}}">
                                                    @else
                                                    <img alt="Image" class="avatar" src="/img/avatar.png"/>
                                                    @endif
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
                                    @if(Auth::id() == $user->id)
                                    <h6>You have not attempted any project yet</h6>
                                    @else
                                    <h6>{{$user->name}} has not attempted any project yet</h6>
                                    @endif
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
                                    <!-- <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects" aria-describedby="filter-projects">
                                        </div>
                                    </form> -->
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
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Reviews</h3>
                                    </div>
                                   <!--  <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects" aria-describedby="filter-projects">
                                        </div>
                                    </form> -->
                                </div>
                                <!--end of content list head-->
                                @if(count($user->received_reviews) > 0)
                                <div class="content-list-body row">
                                    @foreach($user->received_reviews as $received_review)
                                    <div class="col-lg-12">
                                        <div class="card card-project">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h5><a href="/roles/{{$received_review->project->role->slug}}/projects/{{$received_review->project->slug}}" data-filter-by="text">{{$received_review->project->title}}</a></h5>
                                                    @if($received_review->rating == "Positive")
                                                    <span class="badge badge-success">Positive</span>
                                                    @elseif($received_review->rating == "Neutral")
                                                    <span class="badge badge-warning">Neutral</span>
                                                    @else
                                                    <span class="badge badge-danger">Negative</span>
                                                    @endif
                                                </div>
                                                <p>{{$received_review->description}}</p>
                                                <a href="/profile/{{$received_review->project->user->id}}" data-toggle="tooltip" data-placement="top" title="">
                                                    @if($user->avatar)
                                                    <img class="avatar" src="https://storage.cloud.google.com/talentail-123456789/{{$received_review->project->user->avatar}}">
                                                    @else
                                                    <img alt="Image" src="/img/avatar.png" class="avatar" />
                                                    @endif
                                                </a>
                                                <a href="/profile/{{$received_review->project->user->id}}">
                                                  <span style="font-size: .875rem; line-height: 1.3125rem;">{{$received_review->project->user->name}}</span>
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
                                    @if(Auth::id() == $user->id)
                                    <h6>You have no reviews given to you by other users yet</h6>
                                    @else
                                    <h6>{{$user->name}} has no reviews given by other users yet</h6>
                                    @endif
                                </div>
                                @endif
                                <!--end of content list body-->
                            </div>
                            <!--end of content list-->
                        </div>
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
        @if(Auth::id() && !empty($clickedUserId) && $clickedUserId != null)
        <button class="btn btn-primary btn-floating btn-lg" type="button" data-toggle="collapse" data-target="#floating-chat" aria-expanded="false" aria-controls="sidebar-floating-chat" style="margin-right: 1.5rem; height: 48px;" id="rectangleChat" onmouseover="highlightButtons()" onmouseleave="unhighlightButtons()">
            Ask me anything!
        </button>
        <button class="btn btn-primary btn-round btn-floating btn-lg" type="button" data-toggle="collapse" data-target="#floating-chat" aria-expanded="false" aria-controls="sidebar-floating-chat" id="circleChat" onmouseover="highlightButtons()" onmouseleave="unhighlightButtons()">
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
                        <div class="chat-module-body" id="newMessagesDiv">
                            @foreach($messages as $message)
                            <div class="media chat-item">
                                @if($message->user->avatar)
                                <img alt="{{$message->user->name}}" src="https://storage.cloud.google.com/talentail-123456789/{{$message->user->avatar}}" class="avatar" />
                                @else
                                <img alt="{{$message->user->name}}" src="/img/avatar.png" class="avatar" />
                                @endif
                                <div class="media-body" style="padding: 0.7rem 1rem;">
                                    <div class="chat-item-title">
                                        <span class="chat-item-author" data-filter-by="text">{{$message->user->name}}</span>
                                        <span data-filter-by="text">{{$message->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="chat-item-body" data-filter-by="text">
                                        <p>{{$message->message}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="chat-module-bottom">
                        <form class="chat-form">
                            <textarea class="form-control" placeholder="Type message" id="chat-input" rows="1" onkeypress="keyPress()"></textarea>
                            @if(Auth::id())
                            <input id="userId" type="hidden" value="{{Auth::user()->id}}" />
                            <input id="userName" type="hidden" value="{{Auth::user()->name}}" />
                            <input id="userAvatar" type="hidden" value="{{Auth::user()->avatar}}" />
                            <input id="clickedUserId" type="hidden" value="{{$clickedUserId}}" />
                            <input id="messageChannel" type="hidden" value="{{$messageChannel}}" />
                            <input id="projectId" type="hidden" value="0" />
                            <input id="projectOwner" type="hidden" value="{{$clickedUserId}}" />
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>     

<script type="text/javascript">
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    function keyPress() {
        var key = window.event.keyCode;

        if (key === 13) {
            var messageText = document.getElementById("chat-input").value;
            var data = {message_text: messageText, clickedUserId: document.getElementById("clickedUserId").value, messageChannel: document.getElementById("messageChannel").value, projectId: document.getElementById("projectId").value};
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
               type:'POST',
               url:'/messages/'+document.getElementById("clickedUserId").value,
               data: data,
               success:function(data){

               }
            });
        }
    }

    if(document.getElementById("clickedUserId") != null) {
        var pusher = new Pusher("5491665b0d0c9b23a516", {
          cluster: 'ap1',
          forceTLS: true,
          auth: {
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              }
        });

        console.log("SUBSCRIBE TO: " + document.getElementById("messageChannel").value);

        var channel = pusher.subscribe(document.getElementById("messageChannel").value);
        channel.bind('new-message', function(data) {
            console.log(data);
            if(data.avatar == "") {
              document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='/img/avatar.png' class='avatar'><div class='media-body' style='padding: 0.7rem 1rem;'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
            } else {
              document.getElementById("newMessagesDiv").insertAdjacentHTML("beforeend", "<div class='media chat-item'><img alt='" + data.username + "' src='https://storage.cloud.google.com/talentail-123456789/" + data.avatar + "' class='avatar'><div class='media-body' style='padding: 0.7rem 1rem;'><div class='chat-item-title'><span class='chat-item-author SPAN-filter-by-text' data-filter-by='text'>" + data.username + "</span><span data-filter-by='text' class='SPAN-filter-by-text'>Just now</span></div><div class='chat-item-body DIV-filter-by-text' data-filter-by='text'><p>" + data.text + "</p></div></div></div>");
            }
            
            document.getElementById("newMessagesDiv").scrollTop = document.getElementById("newMessagesDiv").scrollHeight;
            
            document.getElementById("chat-input").value = "";
        }); 
    }

    function highlightButtons() {
        document.getElementById("circleChat").style.background = "#0156cf";
        document.getElementById("circleChat").style.borderColor = "#0156cf";
        document.getElementById("rectangleChat").style.background = "#0156cf";
        document.getElementById("rectangleChat").style.borderColor = "#0156cf";
    }

    function unhighlightButtons() {
        document.getElementById("circleChat").style.background = "#076bff";
        document.getElementById("circleChat").style.borderColor = "#076bff";
        document.getElementById("rectangleChat").style.background = "#076bff";
        document.getElementById("rectangleChat").style.borderColor = "#076bff";
    }

</script>

@endsection

@section ('footer')
	
	

@endsection
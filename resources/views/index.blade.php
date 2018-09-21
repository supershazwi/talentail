@extends ('layouts.main')

@section ('content')
<div class="breadcrumb-bar navbar bg-white sticky-top">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Overview</a>
            </li>
        </ol>
    </nav>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/logo-color.svg" class="avatar avatar-lg mr-1" />
                    <div>
                        <span class="badge badge-success">1.0</span>
                    </div>
                </div>
                <h1 class="display-4 mb-3">Pipeline Components</h1>
                <p class="lead">In addition to the default <a href="components-bootstrap.html">Bootstrap Components</a>, Pipeline includes many custom components suited to project management and team-based aplications</p>
            </section>
            <div class="row">


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#activity-modal">
                            <img alt="Activity" class="card-img-top" src="/img/components/activity.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#activity-modal">Activity</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#avatar-modal">
                            <img alt="Avatar" class="card-img-top" src="/img/components/avatar.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#avatar-modal">Avatar</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#avatar-list-modal">
                            <img alt="Avatar List" class="card-img-top" src="/img/components/avatar-list.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#avatar-list-modal">Avatar List</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-kanban-modal">
                            <img alt="Card - Kanban" class="card-img-top" src="/img/components/card-kanban.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-kanban-modal">Card - Kanban</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-note-modal">
                            <img alt="Card - Note" class="card-img-top" src="/img/components/card-note.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-note-modal">Card - Note</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-project-modal">
                            <img alt="Card - Project" class="card-img-top" src="/img/components/card-project.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-project-modal">Card - Project</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-team-modal">
                            <img alt="Card - Team" class="card-img-top" src="/img/components/card-team.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-team-modal">Card - Team</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-task-modal">
                            <img alt="Card - Task" class="card-img-top" src="/img/components/card-task.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-task-modal">Card - Task</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#card-list-modal">
                            <img alt="Card List" class="card-img-top" src="/img/components/card-list.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#card-list-modal">Card List</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#chat-item-modal">
                            <img alt="Chat Item" class="card-img-top" src="/img/components/chat-item.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#chat-item-modal">Chat Item</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#chat-module-modal">
                            <img alt="Chat Module" class="card-img-top" src="/img/components/chat-module.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#chat-module-modal">Chat Module</a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#checklist-modal">
                            <img alt="Checklist" class="card-img-top" src="/img/components/checklist.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#checklist-modal">Checklist</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-6">
                    <div class="card mb-3">
                        <a href="#" data-toggle="modal" data-target="#files-modal">
                            <img alt="Files" class="card-img-top" src="/img/components/files.png">
                        </a>
                        <div class="card-body">
                            <a class="card-title h6" href="#" data-toggle="modal" data-target="#files-modal">Files</a>
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
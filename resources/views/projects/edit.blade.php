@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/projects">Projects</a>&nbsp;> Edit Project
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/project.svg" class="avatar avatar-lg mr-1" />
                </div>
                <h1 class="display-4 mb-3">Edit Project</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
            <h3>Project Title</h3>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
            <h3 style="margin-top: 1.5rem;">Project Description</h3>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
            <ul class="nav nav-tabs nav-fill" style="margin-top: 1.5rem;">
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
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="brief" role="tabpanel" aria-labelledby="brief-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Brief</h3>
                      </div>
                  </div>
                  <div class="content-list-body">
                      <div class="card">
                        <div class="card-body">
                          <div id="layout">
                              <div id="test-editormd" style="border-radius: 0.5rem;">
                                  <textarea style="display:none;"></textarea>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Tasks</h3>
                          <button class="btn btn-primary" style="margin-left: 1.5rem;" onclick="createTask()">Create Task</button>
                      </div>
                  </div>
                  <!-- <span class="dz-message">No tasks added yet</span> -->
                  <div class="content-list-body">
                    <div class="accordion" id="tasksList">
                      
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
                                      <input type="checkbox" name="" value="">
                                      <p class="text-small" style="margin-left: 0.5rem;">Elicit requirements for software development using interviews</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <input type="checkbox" name="" value="">
                                      <p class="text-small" style="margin-left: 0.5rem;">Critically evaluate information gathered from multiple sources</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <input type="checkbox" name="" value="">
                                      <p class="text-small" style="margin-left: 0.5rem;">Translate technical information into business language to ensure understanding of the requirements</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <input type="checkbox" name="" value="">
                                      <p class="text-small" style="margin-left: 0.5rem;">Plans and designs complex business processes and system modifications</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                              <div class="row">
                                  <div class="form-group col">
                                      <input type="checkbox" name="" value="">
                                      <p class="text-small" style="margin-left: 0.5rem;">Makes recommendations to improve and support business activities</p>
                                  </div>
                                  <!--end of form group-->
                              </div>
                          </form>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
            </div>
            <div style="margin-top: 1.5rem !important;">
              <button class="btn btn-primary" style="float: right;">Create Project</button>
              <button class="btn btn-default" style="float: right; margin-right: 0.5rem;">Save</button>
              <button class="btn btn-default" style="float: right; margin-right: 0.5rem;">Cancel</button>
            </div>
          </div>
      </div>
  </div>

  <script type="text/javascript">
    function createTask() {
      let cardCounter = document.querySelectorAll('.task-card').length + 1;

      document.getElementById("tasksList").innerHTML += "<div class='card task-card' id='card_" + cardCounter + "' style='margin-bottom: 1.5rem;'><div class='card-header' id='heading_" + cardCounter + "'><h5 class='todo-title'>To-do #" + cardCounter + " Title</h5><input type='text' name='title' class='form-control todo-title-input' id='todo-title-input_" + cardCounter + "' placeholder='Enter title'></div><div id='collapse_" + cardCounter + "' class='collapse show collapse-heading' aria-labelledby='heading_" + cardCounter + "' data-parent='#tasksList'><div class='card-body'><h5 class='todo-description'>To-do #" + cardCounter + " Description</h5><input type='text' name='description' class='form-control todo-description-input' id='todo-description-input_" + cardCounter + "' placeholder='Enter description'><br /><input type='radio' name='mcq' value='mcq' class='radio-mcq' id='radio-mcq_" + cardCounter + "'> <span class='text-small'>Multiple Choice Question</span><br/><input type='radio' name='open-ended' value='open-ended' class='radio-open-ended' id='radio-open-ended_" + cardCounter + "'> <span class='text-small'>Open-ended</span><br/><input type='radio' name='na' value='na' class='radio-na' id='radio-na_" + cardCounter + "'> <span class='text-small'>N.A.</span><br/><hr /><input type='checkbox' name='file-upload' value='file-upload' class='checkbox-file-upload' id='checkbox-file-upload_" + cardCounter + "'><span class='text-small' style='margin-left: 0.5rem;'>File Upload</span><br /><button class='btn btn-danger delete-task' id='delete-task_" + cardCounter + "' onclick='deleteTask()' style='float: right; margin-bottom: 1.5rem;'>Delete</button></div></div></div>";
    }

    function deleteTask() {
      let taskIdString = event.target.id.split("_");
      let cardId = "card_"+taskIdString[1];

      let elem = document.getElementById(cardId);
      elem.parentNode.removeChild(elem);

      // need to recalculate all the ids
      // task-card
      let x = document.getElementsByClassName("task-card");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "card_"+(i+1);
      }

      // card-header
      x = document.getElementsByClassName("card-header");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "heading_"+(i+1);
      }

      // todo-title
      x = document.getElementsByClassName("todo-title");
      for (i = 0; i < x.length; i++) {        
          x[i].innerHTML = "To-do #"+(i+1)+" Title";
      }

      // todo-title-input
      x = document.getElementsByClassName("todo-title-input");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "todo-title-input_"+(i+1);
      }

      // collapse-heading
      x = document.getElementsByClassName("collapse-heading");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "collapse_"+(i+1);
      }

      // todo-description
      x = document.getElementsByClassName("todo-description");
      for (i = 0; i < x.length; i++) {        
          x[i].innerHTML = "To-do #"+(i+1)+" Description";
      }

      // todo-description-input
      x = document.getElementsByClassName("todo-description-input");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "todo-description-input_"+(i+1);
      }

      // radio-mcq
      x = document.getElementsByClassName("radio-mcq");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-mcq_"+(i+1);
      }

      // radio-open-ended
      x = document.getElementsByClassName("radio-open-ended");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-open-ended_"+(i+1);
      }

      // radio-na
      x = document.getElementsByClassName("radio-na");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-na_"+(i+1);
      }

      // checkbox-file-upload
      x = document.getElementsByClassName("checkbox-file-upload");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "checkbox-file-upload_"+(i+1);
      }

      // delete-task
      x = document.getElementsByClassName("delete-task");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "delete-task_"+(i+1);
      }
    }
  </script>
@endsection

@section ('footer')
  
@endsection
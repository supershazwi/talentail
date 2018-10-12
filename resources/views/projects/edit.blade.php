@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top" style="display: -webkit-box;">
      <nav aria-label="breadcrumb">
      </nav>
      <div id="cancel-url" style="display: none;">{{Request::url()}}</div>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">Edit a {{$role->title}} Project</h1>
                <p class="lead">{{$role->description}}</p>
            </section>
            <form method="POST" action="/roles/{{$role->slug}}/projects/{{$project->slug}}/save-project" enctype="multipart/form-data">
            @csrf
            <input name="id" class="form-control" id="id" type="hidden" value="{{$project->id}}">
            <h3>Project Title</h3>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$project->title}}">
            <h3 style="margin-top: 1.5rem;">Project Summary</h3>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter summary">{{$project->description}}</textarea>
            <ul class="nav nav-tabs nav-fill" style="margin-top: 1.5rem;">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#brief" role="tab" aria-controls="brief" aria-selected="true">Detailed Role Brief</a>
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
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#miscellaneous" role="tab" aria-controls="miscellaneous" aria-selected="false">Miscellaneous</a>
                </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="brief" role="tabpanel" aria-labelledby="brief-tab" data-filter-list="card-list-body">
                  <div class="row content-list-head">
                      <div class="col-auto">
                          <h3>Detailed Role Brief</h3>
                      </div>
                  </div>
                    <div class="content-list-body">
                        <div class="card">
                          <div class="card-body">
                            <div id="layout">
                                <div id="test-editormd2" style="border-radius: 0.5rem;">
                                    <textarea style="display:none;" name="brief"></textarea>
                                </div>
                                <div id="brief-info" style="display: none;">{{$project->brief}}</div>
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
                          <button class="btn btn-primary" style="margin-left: 1.5rem;" onclick="addTask()">Add Task</button>
                      </div>
                  </div>
                  <!-- <span class="dz-message">No tasks added yet</span> -->
                  <div class="content-list-body">
                    @foreach($project->tasks as $key=>$task)
                    <div class="accordion task-accordion" id="tasksList_{{$key+1}}">
                      <div class="card task-card" id="card_{{$key+1}}" style="margin-bottom: 1.5rem;">
                        <div class="card-header" id="heading_{{$key+1}}">
                          <h5 class="todo-title">To-do #{{$key+1}} Title</h5>
                          <input type="text" name="todo-title_{{$key+1}}" class="form-control todo-title-input" id="todo-title-input_{{$key+1}}" placeholder="Enter title" value="{{$task->title}}">
                          <input type="hidden" name="task-id_{{$key+1}}" value="{{$task->id}}">
                        </div>
                        <div id="collapse_{{$key+1}}" class="collapse show collapse-heading" data-parent="#tasksList">
                          <div class="card-body">
                            <h5 class="todo-description">To-do #{{$key+1}} Description</h5>
                            <input type="text" name="todo-description_{{$key+1}}" class="form-control todo-description-input" id="todo-description-input_{{$key+1}}" placeholder="Enter description" value="{{$task->description}}">
                            <div style="margin-top: 1.5rem;">
                              @if($task->mcq)
                              <input type="radio" name="todo_{{$key+1}}" value="mcq" class="radio-mcq" id="radio-mcq_{{$key+1}}" onclick="launchMcq()" checked> 
                              @else
                              <input type="radio" name="todo_{{$key+1}}" value="mcq" class="radio-mcq" id="radio-mcq_{{$key+1}}" onclick="launchMcq()" >
                              @endif
                              <span class="text-small">Multiple Choice Question</span> 
                            </div>
                            @if($task->mcq)
                            @foreach($task->answers as $answerKey=>$answer)
                              <div class="accordion answer-accordion" id="answersList_{{$key+1}}_{{$answerKey+1}}">
                                <div class="input-group">
                                  <input type="text" name="answer_{{$key+1}}_{{$answerKey+1}}" class="form-control todo-answer-input_{{$key+1}}" id="todo-answer-input_{{$key+1}}_{{$answerKey+1}}" placeholder="Enter answer {{$answerKey+1}}" style="margin-top: 1.5rem;" value="{{$answer->title}}">
                                  <div class="input-group-append" style="height: 40px; margin-top: 1.5rem;">
                                    <span class="input-group-text remove-answer" id="delete-answer_{{$key+1}}_{{$answerKey+1}}" onclick="deleteAnswer()">
                                      <input type="hidden" class="deleted-answer-id" name="deleted-answer-id_{{$key+1}}_{{$answerKey+1}}" id="deleted-answer-id_{{$key+1}}_{{$answerKey+1}}" value="{{$answer->id}}" />
                                      <i class="fas fa-times-circle" id="span_{{$key+1}}_{{$answerKey+1}}"></i>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                            <input type="hidden" name="answers-deleted" value="" id="answers-deleted" />
                            <div class="accordion answer-accordion" id="answersList_{{$key+1}}_{{count($task->answers)+1}}">
                            </div>
                            <div style="margin-top: 1.5rem;" id="mcq-buttons_{{$key+1}}">
                              @if($task->mcq)
                              <input type="checkbox" name="checkbox-multiple-select_{{$key+1}}" value="file-upload" class="checkbox-multiple-select_{{$key+1}}" id="checkbox-multiple-select_{{$key+1}}" checked>
                              @else
                              <input type="checkbox" name="checkbox-multiple-select_{{$key+1}}" value="file-upload" class="checkbox-multiple-select_{{$key+1}}" id="checkbox-multiple-select_{{$key+1}}">

                              @endif
                              <span class="text-small" style="margin-left: 0.5rem;">Enable Multiple Select</span>
                              <button class="btn btn-primary btn-sm add-task" style="float: right;" id="add-task_{{$key+1}}" onclick="addAnswer()">Add Answer</button><hr>
                            </div>
                            @endif
                            <div>
                              @if($task->open_ended) 
                              <input type="radio" name="todo_{{$key+1}}" value="open-ended" class="radio-open-ended" id="radio-open-ended_{{$key+1}}" onclick="removeMcq()" checked> 
                              @else
                              <input type="radio" name="todo_{{$key+1}}" value="open-ended" class="radio-open-ended" id="radio-open-ended_{{$key+1}}" onclick="removeMcq()"> 
                              @endif
                              <span class="text-small">Open-ended</span>
                            </div>
                            <div>
                              @if($task->na) 
                              <input type="radio" name="todo_{{$key+1}}" value="na" class="radio-na" id="radio-na_{{$key+1}}" onclick="removeMcq()" checked> 
                              @else
                              <input type="radio" name="todo_{{$key+1}}" value="na" class="radio-na" id="radio-na_{{$key+1}}" onclick="removeMcq()"> 
                              @endif
                              <span class="text-small">N.A.</span>
                            </div>
                            <hr>
                            @if($task->file_upload)
                            <input type="checkbox" name="checkbox-file-upload_{{$key+1}}" value="file-upload" class="checkbox-file-upload_{{$key+1}}" id="checkbox-file-upload_1" checked>
                            @else
                            <input type="checkbox" name="checkbox-file-upload_{{$key+1}}" value="file-upload" class="checkbox-file-upload_{{$key+1}}" id="checkbox-file-upload_1">
                            @endif
                            <span class="text-small" style="margin-left: 0.5rem;">File Upload</span>
                            <br>
                            <button class="btn btn-danger delete-task btn-sm" id="delete-task_{{$key+1}}" onclick="deleteTask()" style="float: right; margin-bottom: 1.5rem;">Delete</button>
                            <input type="hidden" class="deleted-task-id" id="deleted-task-id_{{$key+1}}" name="deleted-task-id_{{$key+1}}" value="{{$task->id}}" />
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div class="accordion task-accordion" id="tasksList_{{count($project->tasks)+1}}">
                    </div>
                  </div>
                  <input type="hidden" name="tasks-deleted" value="" id="tasks-deleted" />
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
                              <div class="box">
                                <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="visibility: hidden; margin-bottom: 1.5rem;"/>
                                <label for="file-1" style="position: absolute; left: 0; margin-left: 12px; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.2rem 1.25rem; height: 36px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 1rem;">Choose Files</span></label>
                              </div>
                              <div id="selectedFiles"></div>
                              <ul class="list-group list-group-activity dropzone-previews flex-column-reverse" style="margin-top: 1rem;">
                                @foreach($project->project_files as $projectFile) 
                                  <li class="list-group-item" id="file-group_{{$projectFile->id}}">
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
                                                  <a href="https://storage.cloud.google.com/talentail-123456789/{{$projectFile->url}}" download="{{$projectFile->title}}" data-filter-by="text">{{$projectFile->title}}</a>
                                                  <br>
                                                  <span class="text-small" data-filter-by="text">{{round($projectFile->size/1048576, 2)}} MB, {{$projectFile->mime_type}}</span>
                                              </div>
                                          </div>
                                          <span class="input-group-text remove-file" id="delete-file_{{$projectFile->id}}" onclick="deleteFile()" style="border-color: transparent; margin-right: 0px; padding: 0px;">
                                            <i class="fas fa-times-circle" id="span_{{$projectFile->id}}"></i>
                                          </span>
                                      </div>
                                  </li>
                                @endforeach 
                              </ul>
                              <input type="hidden" name="files-deleted" value="" id="files-deleted" />
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
                          @foreach($role->competencies as $competency)
                            <div class="row">
                                <div class="form-group col">
                                    <div class="form-check">
                                      @if(in_array($competency->id, $competencyIdArray))
                                      <input type="checkbox" name="competency[]" class="form-check-input" value="{{$competency->id}}" checked>
                                      @else
                                      <input type="checkbox" name="competency[]" class="form-check-input" value="{{$competency->id}}">
                                      @endif
                                      <p>
                                        {{$competency->title}}
                                      </p>
                                    </div>
                                </div>
                                <!--end of form group-->
                            </div>
                          @endforeach
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
              <div class="tab-pane fade" id="miscellaneous" role="tabpanel" aria-labelledby="miscellaneous-tab">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Miscellaneous</h3>
                          </div>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body">
                        <h5 style="margin-top: 1.5rem;">Project Price</h5>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$</span>
                          </div>
                          <input type="number" class="form-control" placeholder="Enter project price in dollars" aria-label="Project price" aria-describedby="basic-addon1" name="price" value="{{$project->amount}}">
                        </div>
                        <h5 style="margin-top: 1.5rem;">Project Duration</h5>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="Enter project duration in hours" aria-label="Recipient's username" aria-describedby="basic-addon2" name="hours" value="{{$project->hours}}">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">hours</span>
                          </div>
                        </div>
                      </div>
                  </div>
                  <!--end of content list-->
              </div>
            </div>
            <div style="margin-top: 1.5rem !important;">
              <button class="btn btn-primary" style="float: right; margin-right: 0.5rem;" type="submit" id="saveProject">Save Project</button>
              <button class="btn btn-default" style="float: right; margin-right: 0.5rem;" onclick="cancel()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
  </div>

  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/autosize.min.js"></script>
  <script type="text/javascript" src="/js/popper.min.js"></script>
  <script type="text/javascript" src="/js/prism.js"></script>
  <script type="text/javascript" src="/js/draggable.bundle.legacy.js"></script>
  <script type="text/javascript" src="/js/swap-animation.js"></script>
  <script type="text/javascript" src="/js/dropzone.min.js"></script>
  <script type="text/javascript" src="/js/list.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
  <script type="text/javascript" src="/js/theme.js"></script>
  <script type="text/javascript" src="/js/editormd.js"></script>
  <script type="text/javascript" src="/languages/en.js"></script>
  <script type="text/javascript" src="/js/custom-file-input.js"></script>
  <script type="text/javascript">

    var editor2 = editormd({
        id   : "test-editormd2",
        path : "/lib/",
        height: 640,
        onload : function() {
            //this.watch();
            //this.setMarkdown("###test onloaded");
            //testEditor.setMarkdown("###Test onloaded");
            editor2.insertValue(document.getElementById("brief-info").innerHTML);
        }
    });

    var selDiv = "";
    
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
      document.querySelector('#file-1').addEventListener('change', handleFileSelect, false);
      selDiv = document.querySelector("#selectedFiles");
    }
    
    function handleFileSelect(e) {
      if(!e.target.files) return;
      selDiv.innerHTML = "";
      
      var files = e.target.files;
      for(var i=0; i<files.length; i++) {
        var f = files[i];
        
        selDiv.innerHTML += f.name + "<br/>";
      }
    }

    function deleteFile() {
      let fileIdString = event.target.id.split("_");
      let fileId = fileIdString[1];

      if(document.getElementById("files-deleted").value == "") {
        document.getElementById("files-deleted").value += fileId;
      } else {
        document.getElementById("files-deleted").value += ", " + fileId;
      }

      let elem = document.getElementById("file-group_"+fileId);
      elem.parentNode.removeChild(elem);
    }

    function addAnswer() {
      event.preventDefault();
      // find out which add answer button was clicked
      let taskIdString = event.target.id.split("_");
      let taskId = taskIdString[1];
      let answerId = document.querySelectorAll('.todo-answer-input_' + taskId).length + 1; 

      document.getElementById("answersList_" + taskId + "_" + answerId).innerHTML += "<div class='input-group'><input type='text' name='answer_" + taskId + "_" + answerId + "' class='form-control todo-answer-input_" + taskId + "' id='todo-answer-input_" + taskId + "_" + answerId + "' placeholder='Enter answer " + answerId + "' style='margin-top: 1.5rem;'><div class='input-group-append' style='height: 40px; margin-top: 1.5rem;'><span class='input-group-text remove-answer' id='delete-answer_" + taskId + "_" + answerId + "' onclick='deleteAnswer()'><i class='fas fa-times-circle' id='span_" + taskId + "_" + answerId + "'></i></span></div></div>"

      document.getElementById("answersList_" + taskId + "_" + answerId).insertAdjacentHTML('afterend', "<div class='accordion answer-accordion' id='answersList_" + taskId + "_" + (answerId+1) + "'></div>");
    }

    function deleteAnswer() {
      let answerIdString = event.target.id.split("_");
      let taskId = answerIdString[1];
      let answerId = parseInt(answerIdString[2]);
      let answersListId = "answersList_" + taskId + "_" + answerId;

      if(document.getElementById("answers-deleted").value == "") {
        document.getElementById("answers-deleted").value += document.getElementById("deleted-answer-id_" + taskId + "_" + answerId).value;
      } else {
        document.getElementById("answers-deleted").value += ", " + document.getElementById("deleted-answer-id_" + taskId + "_" + answerId).value;
      }

      console.log(document.getElementById("answers-deleted").value);

      // find total number of answers first
      let answerCount = document.getElementsByClassName("todo-answer-input_" + taskId).length;

      let elem = document.getElementById(answersListId);
      elem.parentNode.removeChild(elem);

      // need to recalculate all the ids
      // start with answerslist
      let x = document.getElementsByClassName("todo-answer-input_" + taskId);

      for (i = answerId; i < answerCount; i++) {  
          let x = document.getElementById("todo-answer-input_" + taskId + "_" + (parseInt(i) + 1));      
          x.className = "form-control todo-answer-input_" + taskId;
          x.name = "answer_" + taskId + "_" + i;
          x.id = "todo-answer-input_" + taskId + "_" + i;
          x.placeholder = "Enter answer " + i;

          let y = document.getElementById("answersList_" + taskId + "_" + (i+1));
          y.id = "answersList_" + taskId + "_" + i;

          let u = document.getElementById("delete-answer_" + taskId + "_" + (i+1));
          u.id = "delete-answer_" + taskId + "_" + i;

          let v = document.getElementById("span_" + taskId + "_" + (i+1));
          v.id = "span_" + taskId + "_" + i;
      }

      let z = document.getElementById("answersList_" + taskId + "_" + (answerCount+1));
      z.id = "answersList_" + taskId + "_" + answerCount;
    }

    function addTask() {
      event.preventDefault();
      let cardCounter = document.querySelectorAll('.task-card').length + 1;

      document.getElementById("tasksList_" + cardCounter).innerHTML += "<div class='card task-card' id='card_" + cardCounter + "' style='margin-bottom: 1.5rem;'><div class='card-header' id='heading_" + cardCounter + "'><h5 class='todo-title'>To-do #" + cardCounter + " Title</h5><input type='text' name='todo-title_" + cardCounter + "' class='form-control todo-title-input' id='todo-title-input_" + cardCounter + "' placeholder='Enter title'></div><div id='collapse_" + cardCounter + "' class='collapse show collapse-heading' data-parent='#tasksList'><div class='card-body'><h5 class='todo-description'>To-do #" + cardCounter + " Description</h5><input type='text' name='todo-description_" + cardCounter + "' class='form-control todo-description-input' id='todo-description-input_" + cardCounter + "' placeholder='Enter description'><div style='margin-top: 1.5rem;'><input type='radio' name='todo_" + cardCounter + "' value='mcq' class='radio-mcq' id='radio-mcq_" + cardCounter + "' onclick='launchMcq()'> <span class='text-small'>Multiple Choice Question</span> </div><div class='accordion answer-accordion' id='answersList_" + cardCounter + "_1'></div><div style='margin-top: 1.5rem; display: none;' id='mcq-buttons_" + cardCounter + "'><input type='checkbox' name='checkbox-multiple-select_" + cardCounter + "' value='file-upload' class='checkbox-multiple-select_" + cardCounter + "' id='checkbox-multiple-select_" + cardCounter + "'><span class='text-small' style='margin-left: 0.5rem;'>Enable Multiple Select</span><button class='btn btn-primary btn-sm add-task' style='float: right;' id='add-task_" + cardCounter + "' onclick='addAnswer()'>Add Answer</button><hr></div><div> <input type='radio' name='todo_" + cardCounter + "' value='open-ended' class='radio-open-ended' id='radio-open-ended_" + cardCounter + "' onclick='removeMcq()'> <span class='text-small'>Open-ended</span></div><div><input type='radio' name='todo_" + cardCounter + "' value='na' class='radio-na' id='radio-na_" + cardCounter + "' onclick='removeMcq()'> <span class='text-small'>N.A.</span></div><hr><input type='checkbox' name='checkbox-file-upload_" + cardCounter + "' value='file-upload' class='checkbox-file-upload_" + cardCounter + "' id='checkbox-file-upload_" + cardCounter + "'><span class='text-small' style='margin-left: 0.5rem;'>File Upload</span><br><button class='btn btn-danger delete-task btn-sm' id='delete-task_" + cardCounter + "' onclick='deleteTask()' style='float: right; margin-bottom: 1.5rem;'>Delete</button></div></div></div>";

        document.getElementById("tasksList_" + cardCounter).insertAdjacentHTML('afterend', "<div class='accordion task-accordion' id='tasksList_" + (cardCounter+1) + "'></div>");
    }

    function deleteTask() {
      event.preventDefault();

      let taskIdString = event.target.id.split("_");
      let tasksListId = "tasksList_"+taskIdString[1];

      console.log(taskIdString[1]);

      if(document.getElementById("deleted-task-id_"+taskIdString[1]) != null) {
        if(document.getElementById("tasks-deleted").value == "") {
          document.getElementById("tasks-deleted").value += document.getElementById("deleted-task-id_"+taskIdString[1]).value;
        } else {
          document.getElementById("tasks-deleted").value += ", " + document.getElementById("deleted-task-id_"+taskIdString[1]).value;
        }
      }

      // find total number of answers first
      let taskCount = document.getElementsByClassName("task-card").length;

      let elem = document.getElementById(tasksListId);
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
          x[i].name = "todo-title-input_"+(i+1);
      }

      x = document.getElementsByClassName("deleted-task-id");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "deleted-task-id_"+(i+1);     
          x[i].name = "deleted-task-id_"+(i+1);
      }

      x = document.getElementsByClassName("deleted-answer-id");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "deleted-answer-id_"+(i+1);     
          x[i].name = "deleted-answer-id_"+(i+1);
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
          x[i].name = "todo-description-input_"+(i+1);
      }

      // radio-mcq
      x = document.getElementsByClassName("radio-mcq");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-mcq_"+(i+1);   
          x[i].name = "todo_"+(i+1);
      }

      // radio-open-ended
      x = document.getElementsByClassName("radio-open-ended");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-open-ended_"+(i+1);   
          x[i].name = "todo_"+(i+1);
      }

      // radio-na
      x = document.getElementsByClassName("radio-na");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "radio-na_"+(i+1);   
          x[i].name = "todo_"+(i+1);
      }

      // delete-task
      x = document.getElementsByClassName("delete-task");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "delete-task_"+(i+1);
      }

      // task-accordion
      x = document.getElementsByClassName("task-accordion");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "tasksList_"+(i+1);
      }

      taskId = parseInt(taskIdString[1]);

      // loop through tasks
      for (i = taskId; i < taskCount; i++) {  
          // loop through answersList
          let counter = 1;
          while(document.getElementById("answersList_" + (i + 1) + "_" + counter) != null) {
            let a = document.getElementById("answersList_" + (i + 1) + "_" + counter);
            if(a != null) {
              a.id = "answersList_" + i + "_" + counter;
            }

            a = document.getElementById("todo-answer-input_" + (i + 1) + "_" + counter);
            if(a != null) {
              a.id = "todo-answer-input_" + i + "_" + counter;
              a.name = "answer_" + i + "_" + counter;
              a.className = "form-control todo-answer-input_" + i;
            }

            a = document.getElementById("delete-answer_" + (i+1) + "_" + counter);
            if(a != null) {
              a.id = "delete-answer_" + i + "_" + counter;
            }

            a = document.getElementById("span_" + (i+1) + "_" + counter);
            if(a != null) {
              a.id = "span_" + i + "_" + counter;
            }

            a = document.getElementById("mcq-buttons_" + (i+1));
            if(a != null) {
              a.id = "mcq-buttons_" + i;
            }

            a = document.getElementById("checkbox-file-upload_" + (i+1));
            if(a != null) {
              a.id = "checkbox-file-upload_" + i;
              a.className = "checkbox-file-upload_" + i;
              a.name = "checkbox-file-upload_" + i;
            }

            a = document.getElementById("checkbox-multiple-select_" + (i+1));
            if(a != null) {
              a.id = "checkbox-multiple-select_" + i;
              a.className = "checkbox-multiple-select_" + i;
              a.name = "checkbox-multiple-select_" + i;
            }

            a = document.getElementById("add-task_" + (i+1));
            if(a != null) {
              a.id = "add-task_" + i;
            }

            counter++;
          }
        let z = document.getElementById("answersList_" + (i+1) + "_" + counter);
        if(z != null) {
          z.id = "answersList_" + i + "_" + counter;
        }
      }
    }

    function launchMcq() {
      let idString = event.target.id.split("_");
      let mcqButtons = document.getElementById("mcq-buttons_" + idString[1]);
      mcqButtons.style.display = "block";
    }

    function removeMcq() {
      let idString = event.target.id.split("_");
      let mcqButtons = document.getElementById("mcq-buttons_" + idString[1]);
      mcqButtons.style.display = "none";
    }

    function removeFile(event) {
      console.log(event.parentElement.parentElement.parentElement);
      let a = event.parentElement.parentElement.parentElement;
      a.parentNode.removeChild(a);
    }

    function cancel() {
      let url = document.getElementById("cancel-url").innerHTML;
      window.location.replace(url.slice(0, -5));
    }
  </script>
@endsection

@section ('footer')
  
@endsection
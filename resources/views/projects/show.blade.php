@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top" style="display: -webkit-box;">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/skills">Skills</a>&nbsp;>&nbsp;<a href="/skills/{{$skill->slug}}">{{$skill->title}}</a>&nbsp;> {{$project->title}}
              </li>
          </ol>
      </nav>
      @if($project->user_id == Auth::id())
      <a href="/skills/{{$skill->slug}}/projects/{{$project->slug}}/edit" class="btn btn-primary">Edit Project</a>
      @else
      <button class="btn btn-link" style="color: #6c757d;"><strong>$139.00</strong></button>
      <a href="/skills/{{$skill->slug}}/projects/{{$project->slug}}/edit" class="btn btn-success">Purchase</a>
      @endif
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
                          @parsedown($project->brief)
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
                      @foreach($project->tasks as $key=>$task)
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <a data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="true" aria-controls="collapse{{$key+1}}" href="#">
                            {{$key+1}}. {{$task->title}}
                          </a>
                        </div>

                        <div id="collapse{{$key+1}}" class="collapse show" aria-labelledby="heading{{$key+1}}" data-parent="#accordionExample">
                          <div class="card-body">
                            <p>{{$task->description}}</p>
                            @if($task->mcq) 
                              @if($task->multiple_select)
                                @foreach($task->answers as $answer) 
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="answer_{{$task->id}}_{{$answer->id}}">
                                    <label class="form-check-label" for="defaultCheck1">
                                      <p>{{$answer->title}}</p>
                                    </label>
                                  </div>
                                @endforeach
                              @else
                                @foreach($task->answers as $answer) 
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_{{$task->id}}" id="answer_{{$task->id}}_{{$answer->id}}" value="{{$answer->title}}">
                                    <label class="form-check-label" for="exampleRadios1">
                                      <p>{{$answer->title}}</p>
                                    </label>
                                  </div>
                                @endforeach
                              @endif
                            @elseif($task->open_ended)
                              <textarea class="form-control" name="answer_{{$task->id}}" id="answer_{{$task->id}}" rows="5" placeholder="Enter your answer here"></textarea>
                            @endif

                            @if($task->file_upload) 
                              <div class="box">
                                <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="visibility: hidden;"/>
                                <label for="file-1" style="position: absolute; left: 0; margin-left: 1.5rem; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.2rem 1.25rem; height: 36px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 1rem;">Choose Files</span></label>
                              </div>
                              <div id="selectedFiles" style="margin-top: 1.5rem;"></div>
                            @endif
                            <!-- <form class="dropzone" action="..." style="margin-bottom: 0px;">
                                <span class="dz-message" style="background-color: rgba(0, 0, 0, 0.03);">Drop files or click here to upload</span>
                            </form> -->
                          </div>
                        </div>
                      </div>
                      @endforeach
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
                            <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">
                              @foreach($project->project_files as $projectFile) 
                                <li class="list-group-item">
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
                                                <span class="text-small" data-filter-by="text">{{number_format($projectFile->size/1024,2)}} MB, {{$projectFile->mime_type}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                              @endforeach 
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
                      @foreach($project->competencies as $competency)
                      <div class="content-list-body">
                          <div class="row">
                              <div class="form-group col">
                                  <div class="form-check">
                                    <i class="fas fa-check form-check-input"></i>
                                    <p>
                                      {{$competency->title}}
                                    </p>
                                  </div>
                              </div>
                              <!--end of form group-->
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <!--end of content list-->
              </div>
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
                            <!-- <div class="chat-form-buttons">
                                <button type="button" class="btn btn-link">
                                    <i class="material-icons">tag_faces</i>
                                </button>
                                <div class="custom-file custom-file-naked">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                        <i class="material-icons">attach_file</i>
                                    </label>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>

  <script type="text/javascript">

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

  </script>
@endsection

@section ('footer')
	
	

@endsection
@extends ('layouts.main')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-12">
        
        <!-- Header -->
        <div class="header mt-md-5">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">
                
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Portfolio Management
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Create a portfolio - {{session('selectedRole')->title}}
                </h1>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

        <form id="projectForm" method="POST" class="mb-4" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          

          
          <div class="container">
            <div class="row align-items-center">
              <div class="col-auto" style="padding-left: 0px;">
                <label class="mb-1">
                  Projects
                </label>
              </div>
              <div class="col">

              </div>
              <div class="col-auto mr--3">
                <button class="btn btn-primary" style="margin-bottom: 0.1875rem !important;" onclick="addProject()">Add Project</button>
              </div>
            </div>
          </div>
          <div class="content-list-body">
            <div class="project-accordion" id="projectsList_1">
            </div>
          </div>
        </div>

        <hr class="mt-4 mb-5">

        <button class="btn btn-primary" id="createPortfolio" type="submit" style="float: right; display: none;">Create Portfolio</button>
        <button class="btn btn-default" id="savePortfolio" type="submit" style="float: right; margin-right: 0.5rem; display: none;">Save</button>
        <button class="btn btn-default" onclick="cancel()" style="float: right; margin-right: 0.5rem; display: none;">Cancel</button>

        </form>

        <button onclick="savePortfolio()" class="btn btn-block btn-primary">
          Save portfolio
        </button>
        <a href="#" class="btn btn-block btn-link text-muted">
          Cancel
        </a>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function handleFileSelect(e) {
      let fileId = e.path[0].id.split('_'); // #file_1
      if(!e.target.files) return;
      document.getElementById('selectedFiles_'+fileId[1]).innerHTML = "";
      
      var files = e.target.files;
      for(var i=0; i<files.length; i++) {
        var f = files[i];
        
        document.getElementById('selectedFiles_'+fileId[1]).innerHTML += f.name + "<br/>";
      }
    }

    function addProject() {
      event.preventDefault();

      
      let cardCounter = document.querySelectorAll('.project-card').length + 1;

      document.getElementById("projectsList_" + cardCounter).innerHTML += "<div class='card' id='projectsList_" + cardCounter + "'><div class='card-body project-card' id='card_" + cardCounter + "'><div class='row'><div class='col-12 col-md-12'><div class='form-group'><label class='project-title'>Project #" + cardCounter + " Title</label><input type='text' name='project-title_" + cardCounter + "' class='form-control project-title-input' id='project-title-input_" + cardCounter + "' placeholder='Enter title'></div></div></div><div class='row'><div class='col-12 col-md-12'><div class='form-group'><label class='project-description'>Project #" + cardCounter + " Description</label><input type='text' name='project-description_" + cardCounter + "' class='form-control project-description-input' id='project-description-input_" + cardCounter + "' placeholder='Enter description'></div></div></div><div class='row'><div class='col-12 col-md-12'><div class='form-group'><label class='mb-1'>Supporting files</label><small class='form-text text-muted'>Upload files pertaining to this project.</small><div class='box'><input type='file' name='file_" + cardCounter + "[]' id='file_" + cardCounter + "' class='inputfile inputfile_" + cardCounter + "' multiple style='visibility: hidden; margin-bottom: 1.5rem;'/><label id='file-label_" + cardCounter + "' for='file_" + cardCounter + "' style='position: absolute; left: 0; margin-left: 12px; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.5rem 1rem 0.5rem 1rem; background: #2c7be5; color: white;'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='17' viewBox='0 0 20 17' fill='white'><path d='M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z'/></svg> <span style='font-size: 1rem;'>Choose Files</span></label></div><div id='selectedFiles_" + cardCounter + "'></div></div></div></div><div class='row align-items-center'><div class='col-auto'></div><div class='col'></div><div class='col-auto'><button class='btn btn-danger delete-project' id='delete-project_" + cardCounter + "' onclick='deleteProject()'>Delete Project</button></div></div></div></div>";

      document.getElementById("projectsList_" + cardCounter).insertAdjacentHTML('afterend', "<div class='project-accordion' id='projectsList_" + (cardCounter+1) + "'></div>");

      document.querySelector('#file_' + cardCounter).addEventListener('change', handleFileSelect, false);
    }

    function deleteProject() {
      let projectIdString = event.target.id.split("_");
      let projectsListId = "projectsList_"+projectIdString[1];

      // find total number of answers first
      let projectCount = document.getElementsByClassName("project-card").length;

      let elem = document.getElementById(projectsListId);
      elem.parentNode.removeChild(elem);

      // need to recalculate all the ids
      // task-card
      let x = document.getElementsByClassName("project-card");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "card_"+(i+1);
      }

      x = document.getElementsByClassName("card");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "card_"+(i+1);
      }

      // card-header
      x = document.getElementsByClassName("card-header");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "heading_"+(i+1);
      }

      // project-title
      x = document.getElementsByClassName("project-title");
      for (i = 0; i < x.length; i++) {        
          x[i].innerHTML = "Project #"+(i+1)+" Title";
      }

      // project-title-input
      x = document.getElementsByClassName("project-title-input");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "project-title-input_"+(i+1);     
          x[i].name = "project-title-input_"+(i+1);
      }

      // project-description
      x = document.getElementsByClassName("project-description");
      for (i = 0; i < x.length; i++) {        
          x[i].innerHTML = "Project #"+(i+1)+" Description";
      }

      // project-description-input
      x = document.getElementsByClassName("project-description-input");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "project-description-input_"+(i+1);  
          x[i].name = "project-description-input_"+(i+1);
      }

      // delete-project
      x = document.getElementsByClassName("delete-project");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "delete-project_"+(i+1);
      }

      // project-accordion
      x = document.getElementsByClassName("project-accordion");
      for (i = 0; i < x.length; i++) {        
          x[i].id = "projectsList_"+(i+1);
      }

      projectId = parseInt(projectIdString[1]);

      console.log("projectId: " + projectId);
      console.log("projectCount: " + projectCount);

      for (i = projectId; i < projectCount; i++) {
        console.log('file_' + (i + 1));
        x = document.getElementById('file_' + (i + 1));
        x.id = "file_" + i;
        x.name = "file_" + i;
        x.className = "inputfile inputfile_" + i;

        x = document.getElementById('file-label_' + (i + 1));
        x.id = 'file-label_' + i;
        x.htmlFor = 'file_' + i;

        x = document.getElementById('selectedFiles_' + (i + 1));
        x.id = 'selectedFiles_' + i;
      }
    }
  </script>

@endsection

@section ('footer')
@endsection
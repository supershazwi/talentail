@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
      
      <!-- Header -->
      <div class="header mt-md-5">
        @if (session('success'))
        <div class="alert alert-success" role="alert" id="successAlert">
          <h4 class="alert-heading" style="margin-bottom: 0;">Your application has been submitted. We will get back to you shortly.</h4>
        </div>
        @endif
        <div class="header-body">

          <!-- Title -->
          <h1 class="header-title">
            Apply to be a Creator
          </h1>
        </div>
      </div>

      <p>Creators are given the responsibility of creating gateways for applicants to their dream careers. Creators are encouraged to model projects based upon their real world experiences without compromising confidential information.</p>
      <p>We place high importance on the quality of projects that are available on the platform. This ensures that applicants get the value from the dollars and cents that they part with and that companies can rely on the projects as a pre-filtering mechanism of applicants without losing quality.</p>

      <!-- Card -->
      <form method="POST" action="/projects/apply" enctype="multipart/form-data">
        @csrf
        <div class="card" style="margin-top: 1.5rem;">
          <div class="card-body">
            <div class="form-group">
              <label class="mb-1">
                Please provide a brief description of the projects that you would like to create
              </label>
              <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description" style="margin-bottom: 0 !important;"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 0;">
              <label class="mb-1">
                Attach some of your work
              </label>
              <div class="box">
                <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple style="visibility: hidden; margin-bottom: 1.5rem;"/>
                <label for="file-1" style="position: absolute; left: 0; margin-left: 1.5rem; margin-bottom: 1.5rem;  border-radius: 0.25rem !important; padding: 0.5rem 1rem 0.5rem 1rem; background: #2c7be5; color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="white"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span style="font-size: 1rem;">Choose Files</span></label>
              </div>
              <div id="selectedFiles"></div>
            </div>
          </div>
        </div>

        <button class="btn btn-primary" role="button" type="submit">
            Submit Application
        </button>
      </form>


    </div>
  </div> <!-- / .row -->
</div>

<script type="text/javascript">

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

  setTimeout(function(){ document.getElementById("successAlert").style.display = "none" }, 3000);

</script>
@endsection

@section ('footer')

@endsection
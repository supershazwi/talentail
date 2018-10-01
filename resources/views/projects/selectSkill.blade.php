@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/projects">Projects</a>&nbsp;> Create a Project
              </li>
          </ol>
      </nav>
      <button class="btn btn-primary" onclick="submit()">Submit</button>
  </div>  

  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">Create a Project</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
            <form method="POST" action="/projects/select-skill">
              {{ csrf_field() }}
              <div class="form-group">
                <h3>Select Skill</h3>
                <select class="js-example-basic-single form-control" name="skill" id="" style="height: 100px !important; width: 100%;">
                  <option value="Nil">Select skill</option>
                  @foreach($skills as $skill)
                    <option value="{{$skill->id}}">{{$skill->title}}</option>
                  @endforeach
                </select>
              </div>
              <div style="margin-top: 1.5rem !important; text-align: right;">
                <button class="btn btn-primary" id="submit" style="display: none;">Submit</button>
              </div>
            </form>
          </div>
      </div>
  </div>

  <script type="text/javascript">
      function submit() {
          document.getElementById("submit").click();
      }
  </script>
@endsection

@section ('footer')
  
@endsection
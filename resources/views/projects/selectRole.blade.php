@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
      </nav>
  </div>  

  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">Create a Project</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
            <form method="POST" action="/projects/select-role">
              {{ csrf_field() }}
              <div class="form-group">
                <h3>Select Role</h3>
                <select class="js-example-basic-single form-control" name="role" id="" style="height: 100px !important; width: 100%;">
                  <option value="Nil">Select role</option>
                  @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->title}}</option>
                  @endforeach
                </select>
              </div>
              <div style="margin-top: 1.5rem !important; text-align: right;">
                <button class="btn btn-primary" id="submit">Submit</button>
              </div>
            </form>
          </div>
      </div>
  </div>
@endsection

@section ('footer')
  
@endsection
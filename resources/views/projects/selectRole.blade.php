@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
      
      <!-- Header -->
      <div class="header mt-md-5">
        <div class="header-body">
          <!-- Title -->
          <h1 class="header-title">
            Select Role
          </h1>
        </div>
      </div>

      <!-- Card -->

    </div>
  </div> <!-- / .row -->
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
      <div class="row align-items-center">
        <div class="col">
          <p>Select the role that you are creating this project for.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-4 col-xl-4">
      <div class="row align-items-center">
        <div class="col">
          <form method="POST" action="/projects/select-role">
            {{ csrf_field() }}
            <div class="form-group">
              <select class="form-control" data-toggle="select" name="role">
                <option value="Nil">Select role</option>
                @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->title}}</option>
                @endforeach
              </select>
            </div>
            <div>
              <button class="btn btn-primary" id="submit" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section ('footer')
  
@endsection
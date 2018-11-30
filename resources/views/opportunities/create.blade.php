@extends ('layouts.main')

@section ('content')  
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-11">
              <section class="py-4 py-lg-5">
                  <h1 class="display-4 mb-3">Create an Opportunity</h1>
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </section>
                  <form method="POST" action="/opportunities">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <h3>Title</h3>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                      <h3>Description</h3>
                      <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                      <h3>Location</h3>
                      <input type="text" name="location" class="form-control" id="location" placeholder="Enter location">
                    </div>
                    <div class="form-group">
                      <h3>Company</h3>
                      <select class="js-example-basic-single form-control" name="company_id" style="height: 100px !important; width: 100%;">
                        <option value="Nil">Select Company</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <h3>Role</h3>
                      <select class="js-example-basic-single form-control" name="role_id" style="height: 100px !important; width: 100%;">
                        <option value="Nil">Select role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Create Opportunity</button>
                  </form>
          </div>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
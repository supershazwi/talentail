@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-11">
              <section class="py-4 py-lg-5">
                  <h1 class="display-4 mb-3">Create a Company</h1>
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </section>
                  <form method="POST" action="/companies">
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
                      <h3>Website</h3>
                      <input type="text" name="website" class="form-control" id="website" placeholder="Enter website">
                    </div>
                    <div class="form-group">
                      <h3>Facebook</h3>
                      <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter facebook">
                    </div>
                    <div class="form-group">
                      <h3>Twitter</h3>
                      <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Enter twitter">
                    </div>
                    <div class="form-group">
                      <h3>LinkedIn</h3>
                      <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Enter linkedin">
                    </div>
                    <div class="form-group">
                      <h3>Email</h3>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <h3>Avatar</h3>
                      <input type="text" name="avatar" class="form-control" id="avatar" placeholder="Enter avatar">
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Create Company</button>
                  </form>
          </div>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
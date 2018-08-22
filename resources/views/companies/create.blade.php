@extends ('layouts.main')

@section ('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="page-header">
              <h1>Create a company</h1>
              <p class="lead">Help open the door for talents out there to discover their interests</p>
            </div>
            <form method="POST" action="/companies">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description" maxlength="255"></textarea>
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control" id="website" placeholder="Enter website">
              </div>
              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Enter facebook">
              </div>
              <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Enter twitter">
              </div>
              <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Enter linkedin">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="text" name="avatar" class="form-control" id="avatar" placeholder="Enter avatar">
              </div>
              <button type="submit" class="btn btn-primary">Create Company</button>
            </form>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
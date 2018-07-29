@extends ('layouts.main')

@section ('content')
    <div class="row" style="margin-top: 25px;">
        <div class="col-lg-8">
            <div class="page-header">
              <h1>Create a topic</h1>
              <p class="lead">Help open the door for talents out there to discover their interests</p>
            </div>
            <form method="POST" action="/topics">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="10" placeholder="Enter description"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Create Topic</button>
            </form>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
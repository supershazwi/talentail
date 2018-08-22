@extends ('layouts.main')

@section ('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="page-header">
              <h1>Create an opportunity</h1>
              <p class="lead">Help open the door for talents out there to discover their interests</p>
            </div>
            <form method="POST" action="/opportunities">
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
                <label for="skill">Skill</label>
                <select class="js-example-basic-single form-control" name="skill_id" style="height: 100px !important; width: 100%;">
                  <option value="Nil">Select Skill</option>
                  @foreach($skills as $skill)
                  <option value="{{$skill->id}}">{{$skill->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <select class="js-example-basic-single form-control" name="company_id" style="height: 100px !important; width: 100%;">
                  <option value="Nil">Select Company</option>
                  @foreach($companies as $company)
                  <option value="{{$company->id}}">{{$company->title}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Create Opportunity</button>
            </form>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
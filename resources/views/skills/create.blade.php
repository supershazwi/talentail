@extends ('layouts.main')

@section ('content')
    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/skills">Skills</a>&nbsp;> Create a Skill
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-11">
              <section class="py-4 py-lg-5">
                  <div class="mb-3 d-flex">
                      <img alt="Pipeline" src="/img/success.svg" class="avatar avatar-lg mr-1" />
                  </div>
                  <h1 class="display-4 mb-3">Create a Skill</h1>
                  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </section>
                  <form method="POST" action="/skills">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <h3>Title</h3>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                      <h3>Description</h3>
                      <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description" maxlength="255"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Create Skill</button>
                  </form>
          </div>
        </div>
    </div>
@endsection

@section ('footer')
	
	

@endsection
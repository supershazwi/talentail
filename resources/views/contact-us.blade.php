@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/contact-us">Contact Us</a>
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/satellite.svg" class="avatar avatar-lg mr-1" />
                </div>
                <h1 class="display-4 mb-3">Have questions? We will help you answer them.</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
        </div>
        <div class="col-xl-10 col-lg-11">
          <div class="card">
              <div class="card-body">
                  <div class="tab-content">
                      <div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                          <!--end of avatar-->
                          <form method="POST" action="/settings">
                              @csrf
                              <div class="form-group row align-items-center">
                                  <label class="col-3">Name</label>
                                  <div class="col">
                                      <input type="text" placeholder="Name" value="" id="name" name="name" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group row align-items-center">
                                  <label class="col-3">Email</label>
                                  <div class="col">
                                      <input type="email" placeholder="Enter your email address" value="" id="email" name="email" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-3">Description</label>
                                  <div class="col">
                                      <textarea type="text" placeholder="Tell us a little about yourself" name="description" id="description" class="form-control" rows="4"></textarea>
                                  </div>
                              </div>
                              <div class="row justify-content-end">
                                  <div class="col">
                                      <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>
@endsection

@section ('footer')
    
    

@endsection
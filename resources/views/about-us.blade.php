@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/about-us">About Us</a>
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/team.svg" class="avatar avatar-lg mr-1" />
                </div>
                <h1 class="display-4 mb-3">Meet the team behind Talentail</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
            <div class="tab-pane fade show active" id="team" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                <!--end of content list head-->
                <div class="content-list-body row">
                    <div class="col-xl-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <img src="/img/shaz.jpg" style="width: 50%; border-radius: 0.5rem;"/>
                                <h5 data-filter-by="text" style="margin-top: 1rem;">Shazwi Suwandi</h5>
                                <p style="margin-top: 0.5rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <a href="https://www.linkedin.com/in/shazwi/"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of content-list-body-->
            </div>
        </div>
      </div>
  </div>
@endsection

@section ('footer')
    
    

@endsection
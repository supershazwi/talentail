@extends ('layouts.main')

@section ('content')
<div class="container">
    <div class="row" style="margin-top: 5rem;">
      <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
        <div class="text-center">
          <img src="/img/illustrations/happiness.svg" alt="..." class="img-fluid">
        </div>
      </div>
      <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
        <h1 class="display-4 mb-3">
          <span style="border-bottom: 5px solid #0984e3;">Discover</span> opportunities and understand what it takes to excel at one.
        </h1>
      </div>
    </div>
    <!-- <hr style="margin-top: 5rem;"/> -->
    <div class="row justify-content-center">
      <div class="col-12 col-lg-12">
        
        <!-- Header -->
        <div class="header mt-md-5">
          <div class="header-body">
            <div class="row align-items-center">
              <div class="col">
                
                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Overview
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Opportunities
                </h1>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>
      </div>
    </div> <!-- / .row -->

    <div class="row">
      @foreach($opportunities as $opportunity)
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <a href="/opportunities/{{$opportunity->slug}}" class="card-avatar avatar avatar-lg mx-auto">
                  <img src="https://storage.googleapis.com/talentail-123456789/{{$opportunity->url}}" alt="..." class="avatar-img rounded">
              </a>
            </div>

            <!-- Title -->
            <a href="/opportunities/{{$opportunity->slug}}"><h2 class="card-title text-center mb-3">
              {{$opportunity->title}}
            </h2></a>

            <p class="text-center" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$opportunity->description}}</p>

            <!-- Divider -->
            <hr>

            <div class="row">
              <div class="col" style="text-align: center;">
                  <p class="card-text small text-muted" style="margin-bottom: 0;">Available Jobs</p>
                  <p style="margin-bottom: 0;">2</p>
              </div>
              <div class="col" style="text-align: center;">
                
                <!-- Avatar group -->
                <p class="card-text small text-muted" style="margin-bottom: 0;">Pre-Interview Projects</p>
                <p style="margin-bottom: 0;">2</p>

              </div>
            </div> <!-- / .row -->
          </div> <!-- / .card-body -->
        </div>
      </div>
      @endforeach
    </div>

    <!-- <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination" style="float: right;">
                  <li class="page-item"><a class="page-link" href="#!">1</a></li>
                  <li class="page-item"><a class="page-link" href="#!">2</a></li>
                  <li class="page-item"><a class="page-link" href="#!">3</a></li>
                  <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                </ul>
              </nav>
        </div>
    </div> -->
</div>
@endsection

@section ('footer')    
@endsection
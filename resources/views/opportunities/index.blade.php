@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row align-items-center" style="margin-top: 7.5rem;">
    <!-- <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
      <div class="text-center">
        <img src="/img/companies.png" alt="..." class="img-fluid">
      </div>
    </div> -->
    <!-- <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">
      <h1 class="display-4 mb-3">
        Secure a <span style="color: #0984e3;">Business Analyst</span> career
      </h1>
      <h1 style="color: #777d7f;">Attempt tasks designed to show your competence to hiring companies</h1>
    </div> -->
    <div class="col-lg-8 offset-lg-2" style="text-align: center;">
      <h1 class="display-4 mb-3">
        DISCOVER <span style="border-bottom: 5px solid #0984e3; text-transform: uppercase;">BUSINESS ANALYST</span> OPPORTUNITIES
      </h1>
      <h1 style="color: #3e3e3c; margin-bottom: 0rem; font-size: 1.5rem;">Create positive change for an organisation by bridging the gap across departments and creating solutions</h1>
    </div>
  </div>
  <hr style="margin-top: 7.5rem; margin-bottom: 2.5rem;"/>

    <div class="row">
      @foreach($opportunities as $opportunity)
      <div class="col-12 col-md-6 col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <a href="/opportunities/{{$opportunity->slug}}" class="card-avatar avatar avatar-lg mx-auto">
                  <img src="https://storage.googleapis.com/talentail-123456789/{{$opportunity->company->url}}" alt="..." class="avatar-img rounded">
              </a>
            </div>

            <!-- Title -->
            <a href="/opportunities/{{$opportunity->slug}}"><h2 class="card-title text-center mb-3">
              {{$opportunity->title}} 
            </h2></a>

            <p class="text-center" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; margin-bottom: 0.5rem;">{{$opportunity->company->title}}</p>

            <p class="text-center" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
            {{$opportunity->location}}</p>

            <!-- Divider -->
            <hr>

            <div class="row">
              <div class="col" style="text-align: center;">
                  <p class="card-text small text-muted" style="margin-bottom: 0;">Exercises</p>
                  <p style="margin-bottom: 0;">{{count($opportunity->exercises)}}</p>
                </div>
                <div class="col" style="text-align: center;">
                  
                  <!-- Avatar group -->
                  <p class="card-text small text-muted" style="margin-bottom: 0;">Applications</p>
                  <p style="margin-bottom: 0;">0</p>

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
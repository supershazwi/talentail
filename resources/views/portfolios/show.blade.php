@extends ('layouts.main')

@section ('content')
<form method="POST" action="/portfolios/{{$portfolio->id}}/add-portfolio-to-cart" id="addPortfolioToCart">
  @csrf
  <input type="hidden" name="portfolio_id" value="{{$portfolio->id}}" />
  <button type="submit" style="display: none;" id="addPortfolioToCartButton">Submit</button>
</form>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-11">
      <section class="py-4 py-lg-5" style="text-align: center; padding-bottom: 0rem !important;">
        @if($portfolio->user->avatar)
         <img src="http://storage.googleapis.com/talentail-123456789/{{$portfolio->user->avatar}}" alt="" class="avatar-img rounded" style="width: 7.5rem; height: 7.5rem;">
        @else
        <img src="/img/avatar.png" alt="..." class="avatar-img rounded" style="width: 7.5rem; height: 7.5rem;">
        @endif
        <h1 style="margin-top: 1.5rem;">{{$portfolio->user->name}}</h1>
        <p>{{$portfolio->user->description}}</p>
        <div class="text-center" style="margin-bottom: 0.75rem;">
          <h2>
            ⭐️ {{$portfolio->rating}}
          </h2>
        </div>

        <div class="text-center" style="margin-bottom: 0.75rem;">
            @foreach($portfolio->roles as $role)
            <span class="badge badge-primary">{{$role->title}}</span>
           @endforeach
        </div>

          <div class="text-center" style="margin-bottom: 1.2rem;">
            @foreach($portfolio->industries as $industry)
            <span class="badge badge-warning">{{$industry->title}}</span>
           @endforeach
        </div>
        <!-- <p>Shazwi has been working as a tech consultant since graduating from National University of Singapore and has gained significant experience in digital transformation projects. He likes to overthink in his everyday life and sometimes land himself onto problems that he wants to solve. When push comes to shove, he will roll up his sleeves, his pants, tie up his hair and sit tight till a solution is found. He still can't afford his own bat signal yet, so he can only be contactable on the other channels below.</p> -->
      
        <a target="_blank" href="https://www.linkedin.com/in/shazwi/" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
        <a target="_blank" href="https://www.facebook.com/supershazwi" style="margin-right: 1rem; font-size: 1.5rem;"><i class="fab fa-facebook-square"></i></a>
        <a target="_blank" href="https://twitter.com/supershazwi" style="font-size: 1.5rem;"><i class="fab fa-twitter-square"></i></a>

      </section>

      <div class="header mt-md-5" style="margin-top: 0rem !important;">
        <div class="header-body" style="padding-top: 0;">
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Nav -->
              <ul class="nav nav-tabs nav-overflow header-tabs">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    Business Analyst
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="/attempt/others" class="nav-link">
                    Others
                  </a>
                </li> -->
              </ul>

            </div>
          </div>
        </div>
      </div>

      <div class="content-list-body row">
          <div class="col-lg-12">
            @foreach($portfolio->user->attempted_projects as $attemptedProject)
              <div class="card mb-3" style="margin-bottom: 0rem !important;">
                  <div class="card-body">
                      <a href="#"><h3 data-filter-by="text">{{$attemptedProject->project->title}}</h3></a>
                      <p style="margin-top: 0.5rem;">{{$attemptedProject->project->description}}</p>
                      <div class="row">
                        <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="/img/frs-sample.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="/img/sipoc-sample.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="/img/prioritisation-sample.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div>
                        <!-- <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="https://tallyfy.com/wp-content/uploads/2017/10/SIPOC.png" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="http://storage.googleapis.com/talentail-123456789/assets/9Pgh5YOy6MuV4pHfjWa13li4dwh2LfFvZLsZmQWH.jpeg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div>
                        <div class="col-lg-4" style="margin-bottom: 1rem;">
                          <img class="thumbnail" src="http://pbsanjacinto.weebly.com/uploads/1/3/4/9/13495198/739345_orig.jpg" style="width: 100%; border: 1px solid #E9EEF2; border-radius: 0.5rem; height: 200px;" onclick="showModal(this.src)"/>
                        </div> -->
                      </div>
                      <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 1rem;">
                          <button class="btn btn-link" onclick="alertSample()" style="padding-left: 0rem;">See full repository of documents</button>
                        </div>
                      </div>
                      <hr style="margin-top: 0rem;"/>
                      @if($attemptedProject->project->user->avatar)
                       <img src="http://storage.googleapis.com/talentail-123456789/{{$attemptedProject->project->user->avatar}}" alt="..." class="avatar-img rounded-circle" style="height: 3rem; width: 3rem; float: left;">
                      @else
                      <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle" style="height: 3rem; width: 3rem; float: left;">
                      @endif
                      <div style="margin-left: 4rem !important;">
                        <p style="margin-bottom: 0.5rem;"><a href="/profile/{{$attemptedProject->project->user->id}}">{{$attemptedProject->project->user->name}}</a> <span class="badge badge-warning" style="font-size: 0.8rem;">Creator</span></p>
                        <p style="margin-bottom: 0rem;">He is an engaging, proactive and confident individual who is always ready for more challenges. I was particularly impressed by his ability to analyze the toughest problems for this project. his analytical capabilities and drive is what will make him a success.</p>
                      </div>
                  </div>
              </div>
              @if(!$loop->last) 
                <hr style="margin-top: 2.5rem; margin-bottom: 2.5rem;"/>
              @endif
            @endforeach
          </div>
          <!-- <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <p>What you'll be getting from your purchase:</p>
                <ul style="margin-left: -1.4rem;">
                  <li>Contact details of {{$portfolio->name}}</li>
                  <li>A competent candidate who has been endorsed by experts</li>
                  <li>Saved time and effort from not having to assess the candidate's competencies</li>
                </ul>
                @if($addedToCart) 
                <button class="btn btn-block btn-primary" disabled>
                  Added to Cart
                </button>
                @else
                <button class="btn btn-block btn-primary" onclick="addPortfolioToCart()">
                  Add to Cart | 25 Credits
                </button>
                @endif
              </div>
            </div>
          </div> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function addPortfolioToCart() {
    document.getElementById("addPortfolioToCartButton").click();
  }
</script>
@endsection

@section ('footer')    
@endsection
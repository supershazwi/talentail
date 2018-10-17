@extends ('layouts.main')

@section ('content')
    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="display-4 mb-3">Apply to be a Creator</h1>
                    <p class="lead">Creators are given the responsibility of creating gateways for applicants to their dream careers. Creators are encouraged to model projects based upon their real world experiences without compromising confidential information.</p>
                    <p class="lead">We place high importance on the quality of projects that are available on the platform. This ensures that applicants get the value from the dollars and cents that they part with and that companies can rely on the projects as a pre-filtering mechanism of applicants without losing quality.</p>
                </section>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="/projects/apply">
                            @csrf
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                      <label for="description"><h5>Please provide a brief description of the projects that you would like to create</h5></label>
                                      <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" role="button" type="submit" style="float: right;">
                                Apply to be a Creator
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('footer')
  
  

@endsection
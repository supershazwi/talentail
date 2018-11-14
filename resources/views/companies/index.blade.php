@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">Companies</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </section>
                <div class="row">
                    @foreach($companies as $company)
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <img src="{{$company->avatar}}" style="height: 48px; margin-bottom: 1rem;" />
                                <h5><a href="/companies/{{$company->slug}}">{{$company->title}}</a></h5>
                                <p style="margin-top: 0.5rem;">{{$company->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('footer')
  
  

@endsection
@extends ('layouts.main')

@section ('content')
    <div class="row" style="margin-top: 1.5rem;">
        <div class="col-auto">
            <h3>Companies</h3>
        </div>
    </div>
    <div class="row">
        @foreach($companies as $company)
          <div class="col-lg-4">
              <div class="card card-kanban">
                <div class="card-body">
                  <div class="card-title">
                    <img src="{{$company->avatar}}" style="height: 48px; margin-bottom: 1rem;" />
                    <h4><a href="/companies/{{$company->slug}}">{{$company->title}}</a></h4>
                  </div>
                  <p>{{$company->description}}</p>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection

@section ('footer')
	
	

@endsection
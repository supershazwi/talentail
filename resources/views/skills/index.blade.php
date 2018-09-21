@extends ('layouts.main')

@section ('content')
    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/skills">Skills</a>
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
                    <h1 class="display-4 mb-3">Skills</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </section>
                <div class="row">
                    @foreach($skills as $skill)
                    <div class="col-xl-4 col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5><a href="/skills/{{$skill->slug}}">{{$skill->title}}</a></h5>
                                <p style="margin-top: 0.5rem;">{{$skill->description}}</p>
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
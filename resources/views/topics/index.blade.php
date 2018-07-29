@extends ('layouts.main')

@section ('content')
    <div class="row" style="margin-top: 25px;">
        @foreach($topics as $topic)
          <div class="col-lg-4">
              <div class="card card-kanban">
                <div class="card-body">
                  <div class="dropdown card-options">
                    <button class="btn-options" type="button" id="..." data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      ...
                    </div>
                  </div>
                  <div class="card-title">
                    <h4><a href="/topics/{{$topic->slug}}">{{$topic->title}}</a></h4>
                  </div>
                  <ul class="avatars">
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Claire Connors"><img alt="Shazwi" class="avatar" src="/img/avatar-male-4.jpg" /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Claire Connors"><img alt="Shazwi" class="avatar" src="/img/avatar-male-4.jpg" /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Claire Connors"><img alt="Shazwi" class="avatar" src="/img/avatar-male-4.jpg" /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Claire Connors"><img alt="Shazwi" class="avatar" src="/img/avatar-male-4.jpg" /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Claire Connors"><img alt="Shazwi" class="avatar" src="/img/avatar-male-4.jpg" /></a>
                    </li>
                  </ul>
                  <p>{{$topic->description}}</p>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection

@section ('footer')
	
	

@endsection
@extends ('layouts.main')

@section ('content')
    @include('toast::messages')
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
                <div class="tab-pane fade show active" id="teams" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                    <div class="row content-list-head">
                        <div class="col-auto">
                        </div>
                        <form class="col-md-auto">
                            <div class="input-group input-group-round">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">filter_list</i>
                                    </span>
                                </div>
                                <input type="search" class="form-control filter-list-input" placeholder="Filter skills" aria-label="Filter skills" aria-describedby="filter-skills">
                            </div>
                        </form>
                    </div>
                    <!--end of content list head-->
                    <div class="content-list-body row">
                        @foreach($skills as $skill)
                        <div class="col-xl-4 col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 data-filter-by="text"><a href="/skills/{{$skill->slug}}">{{$skill->title}}</a></h5>
                                    <p style="margin-top: 0.5rem;">{{$skill->description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--end of content-list-body-->
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

    <script type="text/javascript">
        $(function () {
            var pusher = new Pusher("5491665b0d0c9b23a516", {
              cluster: 'ap1',
              forceTLS: true,
              auth: {
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  }
            });

            toastr.options = {
                positionClass: 'toast-bottom-right'
            };     

            var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
            messageChannel.bind('new-message', function(data) {
                toastr.options.onclick = function () {
                    window.location.replace(data.url);
                };

                toastr.info("<strong>" + data.username + "</strong><br />" + data.message); 
            });

            var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
            purchaseChannel.bind('new-purchase', function(data) {
                toastr.success(data.username + ' ' + data.message); 
            });
        })
    </script>

@endsection

@section ('footer')

@endsection
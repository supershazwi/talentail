@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">Opportunities</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </section>
                <div class="tab-pane fade show active" id="opportunities" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                    <div class="content-list-body row">
                        @foreach($opportunities as $opportunity)
                        <div class="col-xl-4 col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 data-filter-by="text"><a href="/opportunities/{{$opportunity->id}}">{{$opportunity->title}}</a></h5>
                                    <p style="margin-top: 0.5rem;">{{$opportunity->location}}</p>
                                    <a href="/profile/12" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                        <img class="avatar" src="{{$opportunity->company->avatar}}" style="border-radius: 0.5rem;">
                                    </a>
                                    <a href="/profile/12">
                                        <span style="font-size: .875rem; line-height: 1.3125rem;">{{$opportunity->company->title}}</span>
                                    </a>
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

            var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
            purchaseChannel.bind('new-purchase', function(data) {
                toastr.success(data.username + ' ' + data.message); 
            });
        })
    </script>

@endsection

@section ('footer')

@endsection
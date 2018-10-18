@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">Roles</h1>
                    <p class="lead">Individuals come together to ensure that a company operates like a well-oiled machine. Each one of them plays an important role in fulfilling the company's mission. Be the best in the role that you're in so that you can make the greatest impact at work.</p>
                </section>
                <div class="tab-pane fade show active" id="roles" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
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
                                <input type="search" class="form-control filter-list-input" placeholder="Filter roles" aria-label="Filter roles" aria-describedby="filter-roles">
                            </div>
                        </form>
                    </div>
                    <!--end of content list head-->
                    <div class="content-list-body row">
                        @foreach($roles as $role)
                        <div class="col-xl-4 col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 data-filter-by="text"><a href="/roles/{{$role->slug}}">{{$role->title}}</a></h5>
                                    <p style="margin-top: 0.5rem;">{{$role->description}}</p>
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
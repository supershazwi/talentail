@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">{{$template->title}}</h1>
                    <p class="lead">{{$template->description}}</p>
                </section>
                <div class="tab-pane fade show active" id="templates" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                    <div class="content-list-body row">
                       
                    </div>
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
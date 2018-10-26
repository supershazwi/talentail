@extends ('layouts.main')

@section ('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-11">
        <section class="py-4 py-lg-5">
            <h1 class="display-4 mb-3">Tutorials</h1>
            <p class="lead">We are constantly improving this section. Reach out to us if our tutorials are missing the mark.</p>
        </section>
        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-body">
                <h5 style="margin-bottom: 0;"><a href="/tutorials/create-projects">How do I create projects?</a></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

  <script type="text/javascript">
      $(function () {
          if(document.getElementById('loggedInUserId').value != "") {
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
          }
      })
  </script>
@endsection

@section ('footer')
    
    

@endsection
@extends ('layouts.main')

@section ('content')
<div class="header">
  <div class="container">

    <!-- Body -->
    <div class="header-body">
      <div class="row align-items-center">
        <div class="col">
          
          <!-- Pretitle -->
          <h6 class="header-pretitle">
            Overview
          </h6>

          <!-- Title -->
          <h1 class="header-title">
            Tutorials
          </h1>

        </div>
      </div> <!-- / .row -->
      <div class="row align-items-center">
        <div class="col">
          
          <!-- Nav -->
          <ul class="nav nav-tabs nav-overflow header-tabs">
            <li class="nav-item">
              <a href="/tutorials" class="nav-link active">
                Candidates
              </a>
            </li>
            <li class="nav-item">
              <a href="/tutorials/creators" class="nav-link">
                Creators
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>

  </div>
</div> <!-- / .header -->

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


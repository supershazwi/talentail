@extends ('layouts.main')

@section ('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">Have questions?</h1>
                <p class="lead">Contact us. We'd love to hear from you and answer them.</p>
            </section>
        </div>
        <div class="col-xl-10 col-lg-11">
          <div class="card">
              <div class="card-body">
                  <div class="tab-content">
                      <div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                          <!--end of avatar-->
                          @if (session('contactStatus'))
                              <div class="alert alert-success">
                                  {{ session('contactStatus') }}
                              </div>
                          @endif
                          <form method="POST" action="/contact-us">
                              @csrf
                              <div class="form-group row align-items-center">
                                  <label class="col-3">Name</label>
                                  <div class="col">
                                      <input type="text" placeholder="Name" value="" id="name" name="name" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group row align-items-center">
                                  <label class="col-3">Email</label>
                                  <div class="col">
                                      <input type="email" placeholder="Enter your email address" value="" id="email" name="email" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-3">Description</label>
                                  <div class="col">
                                      <textarea type="text" placeholder="Tell us a little about yourself" name="description" id="description" class="form-control" rows="4"></textarea>
                                  </div>
                              </div>
                              <div class="row justify-content-end">
                                  <div class="col">
                                      <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                  </div>
                              </div>
                          </form>
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
@extends ('layouts.main')

@section ('content')
  <div class="breadcrumb-bar navbar bg-white sticky-top">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/faq">FAQ</a>
              </li>
          </ol>
      </nav>
  </div>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-11">
            <section class="py-4 py-lg-5">
                <div class="mb-3 d-flex">
                    <img alt="Pipeline" src="/img/faq.svg" class="avatar avatar-lg mr-1" />
                </div>
                <h1 class="display-4 mb-3">Frequently Asked Questions</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </section>
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-3">
                  <div class="card-body">
                      <h5>1. What is the difference between Talentail and other sites such as Coursera, Udacity, etc.?</h5>
                      <p style="margin-top: 0.5rem;">What better way to use the knowledge you've gained from these sites than to apply it onto real world use cases? There will be others who have taken the same course but what sets you apart is the work that you create.</p>
                  </div>
                </div>
                <div class="card mb-3">
                  <div class="card-body">
                      <h5>2. Why would companies trust the creators on this platform?</h5>
                      <p style="margin-top: 0.5rem;">We have vetted each creator on the platform by looking at not only their experiences but also their tangible work to determine that they are fit to create projects and assess the competencies of each seeker.</p>
                  </div>
                </div>
                <div class="card mb-3">
                  <div class="card-body">
                      <h5>3. Why come up with this idea?</h5>
                      <p style="margin-top: 0.5rem;">We have come a long way in using resumes to introduce ourselves and our capabilities. However, with the introduction of Applicant Tracking Systems & strict recruitment processes, it has led to practices such as "resume hacking". We serve to supercharge your resumes by making it easier for you to gather your "tangibles".</p>
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
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="A platform for career newcomers or switchers to gain the necessary work experience by attempting real world projects.">

  <!-- Libs CSS -->
  <!-- build:css /fonts/feather/feather.min.css -->
  <link rel="stylesheet" href="/fonts/feather/feather.css">
  <!-- endbuild -->
  <link rel="stylesheet" href="/highlight.js/styles/vs2015.css">
  <link rel="stylesheet" href="/quill/dist/quill.core.css">
  <link rel="stylesheet" href="/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/flatpickr/dist/flatpickr.min.css">

  <link rel="stylesheet" type="text/css" href="/css/editormd.css" />

  <!-- Theme CSS -->
  <!-- build:css /css/theme.min.css -->
  <link rel="stylesheet" href="/css/theme.css" id="stylesheetLight">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <!-- endbuild -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>


  <script>var colorScheme = 'light';</script>
  <title>Talentail</title>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122657233-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122657233-1');
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" id="topnav">
    <div class="container">

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand -->
      <a class="navbar-brand order-lg-first" href="/">
        <strong style="color: #0984e3; letter-spacing: 0.25rem;">TALENTAIL</strong>
      </a>

      
      <div class="navbar-user order-lg-last">
        @if(Auth::id())
          <div class="navbar-user">
            
            <div class="dropdown mr-4 d-none d-lg-flex">
          
              <!-- Toggle -->
              <a href="/messages" class="text-muted" role="button">
            @if($messageCount > 0)
              <span class="icon active">
                <i class="fe fe-message-square"></i>
              </span>
            @else
              <span class="icon">
                <i class="fe fe-message-square"></i>
              </span>
            @endif
              </a>

            </div>

            <!-- Dropdown -->
            <div class="dropdown mr-4 d-none d-lg-flex">
          
              <!-- Toggle -->
              <a href="/notifications" class="text-muted" role="button">
                @if($notificationCount > 0)
                  <span class="icon active">
                    <i class="fe fe-bell"></i>
                  </span>
                @else
                  <span class="icon">
                    <i class="fe fe-bell"></i>
                  </span>
                @endif
              </a>

            </div>

            <div class="dropdown mr-4 d-none d-lg-flex">
          
              <!-- Toggle -->
              <a href="/shopping-cart" class="text-muted" role="button">
            @if($shoppingCartActive)
              <span class="icon active">
                <i class="fe fe-shopping-cart"></i>
              </span>
            @else
              <span class="icon">
                <i class="fe fe-shopping-cart"></i>
              </span>
            @endif
              </a>

            </div>



            <!-- Dropdown -->
            <div class="dropdown">
          
              <!-- Toggle -->
              <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(Auth::user()->avatar)
                   <img src="https://storage.googleapis.com/talentail-123456789/{{Auth::user()->avatar}}" alt="..." class="avatar-img rounded-circle">
                  @else
                  <img src="/img/avatar.png" alt="..." class="avatar-img rounded-circle">
                  @endif
              </a>

              <!-- Menu -->
              <div class="dropdown-menu dropdown-menu-right">
                <a href="/" class="dropdown-item">Dashboard</a>
                <a href="/profile" class="dropdown-item">Profile</a>
                <a href="/settings" class="dropdown-item">Settings</a>
                <a href="/work-experience" class="dropdown-item">Work Experience</a>
                @if(Auth::user()->creator)
                <a href="/ordered-projects" class="dropdown-item">Projects Purchased by Customers</a>
                <a href="/invoices" class="dropdown-item">Invoices</a>
                @endif
                <a href="/referrals" class="dropdown-item">Referrals</a>
                
                <!-- <a href="/lessons-overview" class="dropdown-item">Lessons</a> -->
                <!-- <a href="/projects-overview" class="dropdown-item">Projects</a> -->
                @if(!(Auth::user()->creator))
                <hr class="dropdown-divider">
                @endif
                @if(!Auth::user()->admin)
            @if(!Auth::user()->creator)
              @if(Auth::user()->creator_application != null && Auth::user()->creator_application->status == "pending")
                <a href="/creator-application-status" class="dropdown-item">Check Creator Application Status</a>
              @else
                <a href="/creator-application" class="dropdown-item">Apply to be a Creator</a>
              @endif
            @endif

            @if(!Auth::user()->company)
              @if(Auth::user()->company_application != null && Auth::user()->company_application->status == "pending")
                <!-- <a href="/company-application-status" class="dropdown-item">Check Company Application Status</a> -->
              @else
                <!-- <a href="/company-application" class="dropdown-item">Apply to be a Company</a> -->
              @endif
            @endif
                
                @endif

                @if(Auth::user()->creator)
                <hr class="dropdown-divider">
                  <a href="/creator-application" class="dropdown-item">Check Creator Application</a>
                @endif

                @if(Auth::user()->admin)
                <a href="/blog/admin" class="dropdown-item">Blog Admin</a> 
                <a href="/creator-application-overview" class="dropdown-item">View Creator Applications</a>
                <!-- <a href="/company-application-overview" class="dropdown-item">View Company Applications</a> -->
                @endif
                <!-- <a href="/interviews-overview" class="dropdown-item">Interviews</a> -->
                <hr class="dropdown-divider">
                <a href="/logout" class="dropdown-item">Logout</a>
              </div>

            </div>

          </div>
      @else
        <a class="btn btn-primary mr-auto" href="/login">
            Login
        </a>
      @endif
    </div>

      <!-- Collapse -->
      <div class="collapse navbar-collapse mr-auto" id="navbar">

        <!-- Navigation -->
        <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            @if(!empty($parameter) && $parameter == "portfolio")
              <a class="nav-link active" href="/explore">
                Explore Portfolios
              </a>
            @else
              <a class="nav-link" href="/explore">
                Explore Portfolios
              </a>
            @endif
          </li>
          <li class="nav-item">
        @if(!empty($parameter) && $parameter == "discover")
          <a class="nav-link active" href="/discover">
            Discover Projects
          </a>
        @else
          <a class="nav-link" href="/discover">
            Discover Projects
          </a>
        @endif
          </li>
        </ul>
      </div>

    </div> <!-- / .container -->
  </nav>
  <div class="main-content">

    @if(!empty($shoppingCart))
    <form method="POST" action="/process-payment" id="processCreditPayment">
      @csrf
      <input type="hidden" id="projectsArray" name="projectsArray" value="{{$projectsArray}}"/>
      <input type="hidden" id="creditAmount" name="creditAmount" value="{{$shoppingCart->total}}"/>
      <button type="submit" style="display: none;" id="processPaymentButton">Submit</button>
    </form>
    @endif


    <!-- -->

    <div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-card card" data-toggle="lists" data-lists-values='["name"]'>
            <div class="card-body" style="padding: 0.8rem; max-height: 10000px;">
                <!-- <div id="dropin-container" style="margin-top: -2rem;"></div>
                <button class="btn btn-primary" id="submit-button">Select Payment Type</button>
                <button class="btn btn-primary" id="make-payment" style="display: none;" onclick="makeDollarPayment()">Make Payment</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
          
          <!-- Header -->
          <div class="header mt-md-5">
            @if(session('projectsNameArray'))
            <div class="alert alert-primary" role="alert" id="successAlert">
              <h4 class="alert-heading" style="margin-bottom: 0;">You have successfully purchased the project(s): </h4>
              <ul style="margin-bottom: 0;">
                @foreach(session('projectsNameArray') as $name)
                <li style="color: white !important;">{{$name}}</li>
                @endforeach
              </ul>
              <br/>
              <a href="/" style="color: white !important; text-decoration: underline;"><h4 class="alert-heading" style="margin-bottom: 0;">View the project(s)</h4></a>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger" role="alert" id="dangerAlert">
              <h4 class="alert-heading" style="margin-bottom: 0;">{{session('error')}}</h4>
            </div>
            @endif


            <div class="header-body">

              <!-- Title -->
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Pretitle -->
                  <h6 class="header-pretitle">
                    Overview
                  </h6>

                  <!-- Title -->
                  <h1 class="header-title">
                    Shopping Cart
                  </h1>

                </div>
              </div> <!-- / .row -->
              <div class="row align-items-center">
                <div class="col">
                  
                  <!-- Nav -->
                  <ul class="nav nav-tabs nav-overflow header-tabs">
                    <li class="nav-item">
                      <a href="/shopping-cart" class="nav-link">
                        Current
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/shopping-cart/history" class="nav-link active">
                        History
                      </a>
                    </li>
                  </ul>

                </div>
              </div>

            </div>
          </div>

          <!-- Card -->
          

        </div>
      </div> <!-- / .row -->
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
        @if(!empty($shoppingCarts) && sizeof($shoppingCarts) > 0)
        <div class="card">
            <table class="table table-nowrap" style="margin-bottom: 0;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Shopping Cart</th>
                  <th scope="col">Total Value</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($shoppingCarts as $key=>$shoppingCart)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td><a href="/shopping-cart/{{$shoppingCart->id}}">{{$shoppingCart->id}}</a></td>
                    <td>${{$shoppingCart->total}}</td>
                    <td>{{$shoppingCart->created_at}}</td>
                    <td><span class="badge badge-primary">{{$shoppingCart->status}}</span></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @else
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-center" style="margin-top:1rem;">
              <div class="col-12 col-md-5 col-xl-4 my-5">
                <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">🛒</p>
                <h2 class="text-center mb-3" style="margin-bottom: 2.25rem !important;"> Shopping cart history currently empty.
                </h2>
              </div>
            </div>
          </div>
        </div>
        @endif

        @if(empty($shoppingCarts)) 
        <div class="col-12 col-lg-10 col-xl-8">
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-center" style="margin-top:1rem;">
                <div class="col-12 col-md-5 col-xl-4 my-5">
                  <p class="text-center mb-5" style="font-size: 2rem; margin-bottom: 0.25rem !important; -webkit-transform: scaleX(-1); transform: scaleX(-1);">🛒</p>
                  <h2 class="text-center mb-3" style="margin-bottom: 2.25rem !important;"> No history records at the moment.
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
      </div>
    </div>
    <div class="container">
      <div class="row" style="margin-top: 5rem;">
        <div class="col-12 col-lg-12">
          
          <!-- Card -->
          <div class="card card-inactive">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <h3>Talentail</h3>
                        <p style="margin-bottom: 0; font-size: .875rem;">At Talentail, we believe that everyone should be given an equal opportunity to control their career paths and ultimately their happiness.</p>
                    </div>
                    <div class="col-lg-3">
                        <!-- <a target="_blank" href="https://www.instagram.com/talentail/"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="https://fb.me/talentail" style="margin-left: 0.5rem;"><i class="fab fa-facebook"></i></a> -->
                        <!-- <p class="" style="margin-top: .65rem; margin-bottom: 0; font-size: .875rem;">7 Temasek Boulevard</p> -->
                        <p class="" style="margin-bottom: 0; font-size: .875rem;">7 Temasek Boulevard</p>
                        <p class="" style="margin-bottom: 0; font-size: .875rem;">#12-07 Suntec Tower One</p>
                        <p class="" style="margin-bottom: 0; font-size: .875rem;">Singapore 038987</p>
                    </div>
                    <div class="col-lg-2">
                        <a href="/about-us" style="font-size: .875rem;">About Us</a><br />
                        <a href="/contact-us" style="font-size: .875rem;">Contact Us</a><br />
                        <a href="/faq" style="font-size: .875rem;">FAQ</a><br />
                        <!-- <a href="/tutorials" style="font-size: .875rem;">Tutorials</a> -->
                    </div>
                    <div class="col-lg-2">
                        <a href="/blog" style="font-size: .875rem;">Blog</a><br />
                        <a href="/terms-and-conditions" style="font-size: .875rem;">Terms & Conditions</a><br />
                        <a href="/privacy-policy" style="font-size: .875rem;">Privacy Policy</a><br />
                    </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="loggedInUserId" value="{{Auth::id()}}" />

  <script type="text/javascript">
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    var button = document.querySelector('#submit-button');

    function makeCreditPayment() {
      document.getElementById("processPaymentButton").click();
    }
  </script>

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


      function removeLineItem(id) {
          document.getElementById("shopping_cart_line_item_id").value = id;
          document.getElementById("removeLineItemButton").click();
      }

      function emptyCart() {
          document.getElementById("emptyCartButton").click();
      }
  </script>

  <script type="text/javascript" src="/js/autosize.min.js"></script>
  <script type="text/javascript" src="/js/popper.min.js"></script>
  <script type="text/javascript" src="/js/prism.js"></script>
  <script type="text/javascript" src="/js/draggable.bundle.legacy.js"></script>
  <script type="text/javascript" src="/js/swap-animation.js"></script>
  <script type="text/javascript" src="/js/dropzone.min.js"></script>
  <script type="text/javascript" src="/js/list.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.js"></script>
  <script type="text/javascript" src="/js/theme.js"></script>
  <!-- <script type="text/javascript" src="/js/editormd.js"></script> -->
  <script type="text/javascript" src="/js/custom-file-input.js"></script>
  <script type="text/javascript" src="/js/toastr.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script type="text/javascript">
      $(function () {
          toastr.options = {
              positionClass: 'toast-bottom-right'
          }; 

          var pusher = new Pusher("5491665b0d0c9b23a516", {
            cluster: 'ap1',
            forceTLS: true,
            auth: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
          });

          var messageChannel = pusher.subscribe('messages_' + document.getElementById('loggedInUserId').value);
          messageChannel.bind('new-message', function(data) {
              toastr.options.onclick = function () {
                  window.location.replace(data.url);
              };

              if('/' + document.getElementById('currentUrl').value != data.url) {
                  toastr.info("<strong>" + data.username + "</strong><br />" + data.text); 
              }
          });

          var purchaseChannel = pusher.subscribe('purchases_' + document.getElementById('loggedInUserId').value);
          purchaseChannel.bind('new-purchase', function(data) {
              toastr.success(data.username + ' ' + data.message); 
          });
      })
  </script> 
  <script type="text/javascript">
    function load() {
      document.getElementById("paypalLink").className = "btn btn-primary is-loading";
    }
  </script>
</body>
</html>
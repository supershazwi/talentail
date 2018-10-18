@extends ('layouts.main')

@section ('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">Leave a Review</h1>
                    <p class="lead"><strong>Project: </strong>{{$project->title}}</p>
                    @if(Request::route('userId'))
                    <p class="lead"><strong>User you are reviewing: </strong>{{$attemptedProject->user->name}}</p>
                    @else
                    <p class="lead"><strong>User you are reviewing: </strong>{{$project->title}}</p>
                    @endif
                </section>
                @if (($errors->has('review') && strlen($errors->first('review')) > 0) || ($errors->has('rating') && strlen($errors->first('rating')) > 0))
                <div class="alert alert-danger">
                    @if ($errors->has('rating') && strlen($errors->first('rating')) > 0)
                        <p style="color: #721c24 !important;">{{ $errors->first('rating') }}</p>
                    @endif
                    @if ($errors->has('review') && strlen($errors->first('review')) > 0)
                        <p style="color: #721c24 !important;">{{ $errors->first('review') }}</p>
                    @endif
                </div>
                @endif
                <form id="reviewForm" method="POST" action="/{{Request::path()}}">
                @csrf
                  <h3>Rating</h3>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @if(old('rating') == "Positive")
                    <label class="btn btn-success" id="label_positive" onclick="positive()">
                      <input type="radio" name="rating" id="positive" autocomplete="off" onclick="positive()" value="Positive" checked> Positive
                    </label>
                    @else
                    <label class="btn btn-default" id="label_positive" onclick="positive()">
                      <input type="radio" name="rating" id="positive" autocomplete="off" onclick="positive()" value="Positive"> Positive
                    </label>
                    @endif

                    @if(old('rating') == "Neutral")
                    <label class="btn btn-warning" id="label_neutral" onclick="neutral()">
                      <input type="radio" name="rating" id="neutral" autocomplete="off" onclick="neutral()" value="Neutral" checked> Neutral
                    </label>
                    @else
                    <label class="btn btn-default" id="label_neutral" onclick="neutral()">
                      <input type="radio" name="rating" id="neutral" autocomplete="off" onclick="neutral()" value="Neutral"> Neutral
                    </label>
                    @endif

                    @if(old('rating') == "Negative")
                    <label class="btn btn-danger" id="label_negative" onclick="negative()">
                      <input type="radio" name="rating" id="negative" autocomplete="off" onclick="negative()" value="Negative" checked> Negative
                    </label>
                    @else
                    <label class="btn btn-default" id="label_negative" onclick="negative()">
                      <input type="radio" name="rating" id="negative" autocomplete="off" onclick="negative()" value="Negative"> Negative
                    </label>
                    @endif
                  </div>
                  <h3 style="margin-top: 1.5rem;">Review</h3>
                  <textarea class="form-control" name="review" id="review" rows="5" placeholder="Enter review">{{ old('review') }}</textarea>
                  <button class="btn btn-primary pull-right" onclick="saveProject()" style="margin-top: 1.5rem;">Submit Review</button>
                </form>
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

        function positive() {
            document.getElementById("label_positive").className = "btn btn-success";
            document.getElementById("label_neutral").className = "btn btn-default";
            document.getElementById("label_negative").className = "btn btn-default";
        }

        function neutral() {
            document.getElementById("label_positive").className = "btn btn-default";
            document.getElementById("label_neutral").className = "btn btn-warning";
            document.getElementById("label_negative").className = "btn btn-default";
        }

        function negative() {
            document.getElementById("label_positive").className = "btn btn-default";
            document.getElementById("label_neutral").className = "btn btn-default";
            document.getElementById("label_negative").className = "btn btn-danger";
        }
    </script>

@endsection

@section ('footer')

@endsection
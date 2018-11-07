@extends ('layouts.main')

@section ('content')

@if(!empty($shoppingCart))
<form method="POST" action="/shopping-cart/remove-line-item" id="removeLineItem">
@csrf
<input type="hidden" name="shopping_cart_id" value="{{$shoppingCart->id}}" />
<input type="hidden" name="shopping_cart_line_item_id" id="shopping_cart_line_item_id" value="" />
<button type="submit" style="display: none;" id="removeLineItemButton">Submit</button>
</form>

<form method="POST" action="/shopping-cart/empty-cart" id="emptyCart">
@csrf
<input type="hidden" name="shopping_cart_id" value="{{$shoppingCart->id}}" />
<button type="submit" style="display: none;" id="emptyCartButton">Submit</button>
</form>
@endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <section class="py-4 py-lg-5">
                    <h1 class="display-4 mb-3">Shopping Cart</h1>
                    @if(!empty($shoppingCart) && $shoppingCart->no_of_items == 1)
                    <p class="lead">{{$shoppingCart->no_of_items}} project in cart</p>
                    @elseif(!empty($shoppingCart) && $shoppingCart->no_of_items > 1)
                    <p class="lead">{{$shoppingCart->no_of_items}} projects in cart</p>
                    @else
                    <p class="lead">No project in cart</p>
                    @endif
                </section>
                @if(!empty($shoppingCart) && $shoppingCart->no_of_items != 0)
                <div class="content-list-body">
                    <ol class="list-group list-group-activity filter-list-1541347497074"><li class="list-group-item" style="padding: 1.0rem 1.25rem;">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    @foreach($shoppingCart->shopping_cart_line_items as $shoppingCartLineItem)
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <a href="/roles/{{$shoppingCartLineItem->project->role->slug}}/projects/{{$shoppingCartLineItem->project->slug}}">{{$shoppingCartLineItem->project->title}}</a>
                                            <p class="text-small SPAN-filter-by-text" data-filter-by="text">{{$shoppingCartLineItem->project->user->name}}</p>
                                        </div>
                                        <div class="col-lg-1">

                                        </div>
                                        <div class="col-lg-1">
                                            <a href="#" style="float: right;" onclick="removeLineItem(this.id)" id="{{$shoppingCartLineItem->id}}">Remove</a>
                                        </div>
                                        <div class="col-lg-2">
                                            <h5 style="float: right; color: #16a085;">${{$shoppingCartLineItem->project->amount}}</h5>
                                        </div>
                                    </div>
                                    @if(!$loop->last)
                                        <hr style="margin-top: 1rem; margin-bottom: 1rem;" />
                                    @endif
                                    @endforeach
                                    <hr style="margin-top: 1rem; margin-bottom: 1rem;" />
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <a href="#" style="float: right;" onclick="emptyCart()">Empty Cart</a>
                                        </div>
                                        <!-- <div class="col-lg-2">
                                            <p style="float: right;"><strong>Total</strong></p>
                                            <h5 style="float: right; color: #16a085;">$198.00</h5>


                                        </div> -->
                                        <div class="col-lg-1">
                                            <p style="float: right;">Total</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <h5 style="float: right; color: #16a085; margin-bottom: 0.3rem;">${{$shoppingCart->total}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
                <button onclick="addProjectToCart()" class="btn btn-success" style="float: right; margin-top: 1.5rem; margin-bottom: 0.5rem;">Confirm Purchase</button>
                @endif
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


        function removeLineItem(id) {
            document.getElementById("shopping_cart_line_item_id").value = id;
            document.getElementById("removeLineItemButton").click();
        }

        function emptyCart() {
            document.getElementById("emptyCartButton").click();
        }
    </script>

@endsection

@section ('footer')

@endsection
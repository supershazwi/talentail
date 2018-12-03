@extends ('layouts.main')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
      
      <!-- Header -->
      <div class="header mt-md-5">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col">
              
              <!-- Pretitle -->
              <h6 class="header-pretitle">
                Detail
              </h6>

              <!-- Title -->
              <h1 class="header-title">
                Invoice {{$invoice->id}}
              </h1>

            </div>
          </div> <!-- / .row -->
        </div>
      </div>

      <!-- Content -->
      <div class="card card-body p-5">
        <div class="row">
          <div class="col text-right">

            <!-- Badge -->
            <div class="badge badge-primary">
              {{$invoice->status}}
            </div>

          </div>
        </div> <!-- / .row -->
        <div class="row">
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12">
            
            <!-- Table -->
            <div class="table-responsive">
              <table class="table my-4">
                <thead>
                  <tr>
                    <th class="px-0 bg-transparent border-top-0">
                      <span class="h6">Item</span>
                    </th>
                    <th class="px-0 bg-transparent border-top-0 text-right">
                      <span class="h6">Price</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($invoice->shopping_cart_line_items as $lineItem)
                    @if($lineItem->project_id)
                    <tr>
                      <td class="px-0">
                        <a href="/roles/{{$lineItem->project->role->slug}}/projects/{{$lineItem->project->slug}}">{{$lineItem->project->title}}</a>
                      </td>
                      <td class="px-0 text-right">
                        {{$lineItem->project->amount}} Credits
                      </td>
                    </tr>
                    @elseif($lineItem->credit_id)
                    <tr>
                      <td class="px-0">
                        <a href="/credits">{{$lineItem->credit->type}}</a>
                        <p class="text-small SPAN-filter-by-text" data-filter-by="text" style="margin-bottom: 0;">{{$lineItem->credit->credits}} credits @ ${{number_format($lineItem->credit->amount / $lineItem->credit->credits, 1)}}/credit</p>
                      </td>
                      <td class="px-0 text-right">
                        {{$lineItem->credit->amount}} Credits
                      </td>
                    </tr>
                    @endif
                  @endforeach
                  <tr>
                    <td class="px-0 border-top border-top-2">
                     <strong>Total amount paid</strong>
                    </td>
                    <td colspan="2" class="px-0 text-right border-top border-top-2">
                      <span class="h3">
                        {{$invoice->total}} Credits
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <hr class="my-5">
            
            <!-- Title -->
            <h6 class="text-uppercase">
              Notes
            </h6>

            <!-- Text -->
            <p class="text-muted mb-0">
              We really appreciate your business and if there’s anything else we can do, please let us know! This is our unique attempt at making the process of getting your desired job much fairer.
            </p>

          </div>
        </div> <!-- / .row -->
      </div>

    </div>
  </div> <!-- / .row -->
</div>
@endsection

@section ('footer')
    
    

@endsection
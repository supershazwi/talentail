@extends ('layouts.main')

@section ('content')
<div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
            
            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">

                <h6 class="header-pretitle">
                  Overview
                </h6>
                <!-- Title -->
                <h1 class="header-title">
                  Invoices
                </h1>

              </div>
            </div>

            <!-- Card -->
            <div class="card">
                <table class="table table-nowrap">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Invoice</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($invoices as $key=>$invoice)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><a href="/invoices/{{$invoice->id}}">{{$invoice->id}}</a></td>
                        <td>{{$invoice->created_at}}</td>
                        <td><span class="badge badge-primary">{{$invoice->status}}</span></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div> <!-- / .row -->
      </div>
@endsection

@section ('footer')
    
    

@endsection
@extends ('layouts.main')

@section ('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="page-header">
              <h1>Apply to be a creator</h1>
            </div>
            <div class="kanban-col" style="margin-top: 1.5rem;">
                <div class="card-list">
                    <div class="card-list-header">
                        <h4>Creators lie in the center of Talentail</h4>
                    </div>
                    <div class="card-list-body">
                        <div class="card card-kanban">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <p>Creators are given the responsibility of creating gateways for applicants to their dream careers. Creators are encouraged to model projects based upon their real world experiences without compromising confidential information.</p>
                                  </div>
                                </div>
                                <br />
                                <div class="row">
                                  <div class="col-lg-12">
                                    <p>We place high importance on the quality of projects that are available on the platform. This ensures that applicants get the value from the dollars and cents that they part with and that companies can rely on the projects as a pre-filtering mechanism of applicants without losing quality.</p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-list-header" style="margin-top: 1.5rem;">
                        <h4>Tell us more about yourself</h4>
                    </div>
                    <div class="card-list-body">
                        <div class="card card-kanban">
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                        <div class="form-group">
                                          <label for="description">Description</label>
                                          <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
                                        </div>
                                        <span>or</span>
                                        <button class="btn btn-primary" role="button" type="submit">
                                            Retrieve information from LinkedIn
                                        </button>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" role="button" type="submit" style="float: right;">
                Submit Application
            </button>
        </div>
    </div>
@endsection

@section ('footer')
  
  

@endsection
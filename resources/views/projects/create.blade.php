@extends ('layouts.main')

@section ('content')
  <div class="row" style="margin-top: 25px;">
    <div class="col-lg-12">
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title" style="max-width: 100%;">
            <h4>General Description</h4>
            <div class="form-group">
                <label for="title"><strong>Title</strong></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" autofocus>
            </div>
            <div class="form-group">
                <label for="description"><strong>Description</strong></label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title" style="max-width: 100%;">
            <h4>Skills</h4>
            <div class="form-group">
                <label for="title"><strong>Title</strong></label>
                <select class="js-example-basic-single form-control" name="state" style="height: 100px !important; width: 100%;">
                  <option value="Nil">Select Skill</option>
                  <option value="AL">Alabama</option>
                  <option value="WY">Wyoming</option>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-kanban">
        <div class="card-body">
          <div class="card-title" style="max-width: 100%;">
            <h4>Provided Files</h4>
            <form class="dropzone" action="..." style="margin-bottom: 0px;">
                <span class="dz-message" style="background-color: rgba(0, 0, 0, 0.03);">Drop files or click here to upload</span>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4>Brief</h4>
              </div>
              <div id="layout">
                  <div id="test-editormd" style="border-radius: 0.5rem;">
                      <textarea style="display:none;"></textarea>
                  </div>
              </div>
          </div>
      </div>
      <div class="kanban-col">
          <div class="card-list">
              <div class="card-list-header">
                  <h4 style="float: left;">To-dos</h4>
                  <button type="button" class="btn btn-primary" style="margin-left: 1.5rem;">Add To-do</button>
              </div>
              <br />
              <div class="card card-kanban">
                <div class="card-body">
                  <div class="card-title" style="max-width: 100%;">
                    <div class="form-group">
                        <label for="title"><strong>Title</strong></label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="description"><strong>Description</strong></label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description"><strong>Type</strong></label>
                        <form class="checklist">

                            <div class="row">
                                <div class="form-group col">
                                    <div class="custom-control custom-checkbox col">
                                        <input type="checkbox" class="custom-control-input" id="checklist-item-1-mcq">
                                        <label class="custom-control-label" for="checklist-item-1-mcq"></label>
                                        <div>
                                            <input type="text" placeholder="Checklist item" value="Multiple Choice Question" data-filter-by="value" />
                                            <div class="checklist-strikethrough"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end of form group-->
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <div class="custom-control custom-checkbox col">
                                        <input type="checkbox" class="custom-control-input" id="checklist-item-2-text-field">
                                        <label class="custom-control-label" for="checklist-item-2-text-field"></label>
                                        <div>
                                            <input type="text" placeholder="Checklist item" value="Text Field" data-filter-by="value" />
                                            <div class="checklist-strikethrough"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end of form group-->
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <div class="custom-control custom-checkbox col">
                                        <input type="checkbox" class="custom-control-input" id="checklist-item-3-file-upload">
                                        <label class="custom-control-label" for="checklist-item-3-file-upload"></label>
                                        <div>
                                            <input type="text" placeholder="Checklist item" value="File Upload" data-filter-by="value" />
                                            <div class="checklist-strikethrough"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end of form group-->
                            </div>

                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <button class="btn btn-primary" type="button" id="submitproject" style="float: right;">Submit</button>
    </div>
  </div>
@endsection

@section ('footer')
    
@endsection
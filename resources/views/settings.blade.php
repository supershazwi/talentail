@extends ('layouts.main')

@section ('content')    

<div class="breadcrumb-bar navbar bg-white sticky-top">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/settings">Account Settings</a>
            </li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 mb-3">
            <ul class="nav nav-tabs flex-lg-column">
                <li class="nav-item">
                    <a class="nav-link active" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Authentication</a>
                </li>
            </ul>
        </div>
        <div class="col-xl-8 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="password" aria-labelledby="password-tab">
                            <form>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Current Password</label>
                                    <div class="col">
                                        <input type="password" placeholder="Enter your current password" name="password-current" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">New Password</label>
                                    <div class="col">
                                        <input type="password" placeholder="Enter a new password" name="password-new" class="form-control" />
                                        <small>Password must be at least 8 characters long</small>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Confirm Password</label>
                                    <div class="col">
                                        <input type="password" placeholder="Confirm your new password" name="password-new-confirm" class="form-control" />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary pull-right">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="notifications" aria-labelledby="notifications-tab">
                            <form>
                                <h6>Activity Notifications</h6>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-1" checked>
                                        <label class="custom-control-label" for="notify-1">Someone assigns me to a task</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-2" checked>
                                        <label class="custom-control-label" for="notify-2">Someone mentions me in a conversation</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-3" checked>
                                        <label class="custom-control-label" for="notify-3">Someone adds me to a project</label>
                                    </div>
                                </div>
                                <div class="form-group mb-md-4">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-4">
                                        <label class="custom-control-label" for="notify-4">Activity on a project I am a member of</label>
                                    </div>
                                </div>
                                <h6>Service Notifications</h6>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-5">
                                        <label class="custom-control-label" for="notify-5">Monthly newsletter</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-6" checked>
                                        <label class="custom-control-label" for="notify-6">Major feature enhancements</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-switch">
                                        <input type="checkbox" class="custom-control-input" id="notify-7">
                                        <label class="custom-control-label" for="notify-7">Minor updates and bug fixes</label>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save preferences</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('footer')
	
	

@endsection
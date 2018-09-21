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
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Authentication</a>
                </li>
            </ul>
        </div>
        <div class="col-xl-8 col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                            <div class="media mb-4">
                                <img alt="Image" src="/img/download.png" class="avatar avatar-lg" />
                                <div class="media-body ml-3">
                                    <div class="custom-file custom-file-naked d-block mb-1">
                                        <input type="file" class="custom-file-input d-none" id="avatar-file">
                                        <label class="custom-file-label position-relative" for="avatar-file">
                                            <span class="btn btn-primary">
                                                Upload avatar
                                            </span>
                                        </label>
                                    </div>
                                    <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
                                </div>
                            </div>
                            <!--end of avatar-->
                            <form method="POST" action="/settings">
                                @csrf
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Name</label>
                                    <div class="col">
                                        <input type="text" placeholder="Name" value="{{$user->name}}" id="name" name="name" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Email</label>
                                    <div class="col">
                                        <input type="email" placeholder="Enter your email address" value="{{$user->email}}" id="email" name="email" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Description</label>
                                    <div class="col">
                                        <textarea type="text" placeholder="Tell us a little about yourself" name="description" id="description" class="form-control" rows="4">{{$user->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary pull-right">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="password" aria-labelledby="password-tab">
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
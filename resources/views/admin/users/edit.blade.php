@extends('layouts.adminapp')

@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Profile Edit</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a> </li>
                                <li class="breadcrumb-item active"><a href="#">Edit Profile</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <div class="row justify-content-md-center">
                        <div class="col-md-9 col-lg-10 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-card-center">Edit Profile</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('users.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="eventRegInput1">Name*</label>
                                                    <input type="text" id="key1" class="form-control" placeholder="Enter name here" name="name" 
                                                    value="{{ old('name', $user->name) }}" required>
                                                    @if ($errors->has('name'))
                                                    <div class="alert alert-danger alert-dismissible userNameError" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="eventRegInput1">Email*</label>
                                                    <input type="email" id="url" class="form-control" placeholder="Enter email here" name="email" value="{{ old('email', $user->email) }}" required>
                                                    @if ($errors->has('email'))
                                                    <div class="alert alert-danger alert-dismissible userNameError" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="basicSelect">Notification Switch*</label>
                                                    <select name="notification_switch" class="form-control" id="basicSelect" required>
                                                    <option value="">Select</option>
                                                    <option value="1" {{ $user->notification_switch == 1 ? 'selected' : ''}}>On</option> 
                                                    <option value="0" {{ $user->notification_switch == 0 ? 'selected' : ''}}>Off</option>                          
                                                    </select> 
                                                    @if ($errors->has('notification_switch'))
                                                    <div class="alert alert-danger alert-dismissible userNameError" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{ $errors->first('notification_switch') }}
                                                    </div>
                                                    @endif  
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="eventRegInput1">Phone*</label>
                                                    <input type="text" id="url" class="form-control" placeholder="Enter phone here" name="phone" value="{{ old('phone', $user->phone) }}">
                                                    @if ($errors->has('phone'))
                                                    <div class="alert alert-danger alert-dismissible userNameError" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{ $errors->first('phone') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="eventRegInput1">New Password</label>
                                                    <input type="password" id="url" class="form-control" placeholder="Enter password here" name="password">
                                                    @if ($errors->has('password'))
                                                    <div class="alert alert-danger alert-dismissible userNameError" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="eventRegInput1">Confirm Password</label>
                                                    <input type="password" id="url" class="form-control" placeholder="Enter email here" name="password_confirmation">
                                                </div>
                                            </div>

                                            <div class="form-actions right">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Update Profile 
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
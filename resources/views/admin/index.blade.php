@extends('layouts.adminapp')
@section('content')
<div class="app-content content">
<div class="content-wrapper">
 <div class="content-body">
 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Notification</h4>
                </div>
                <form action="{{route('notifications.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" id="basicInput" name="title" required="" >
                                    </fieldset>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                        <label for="basicInput">Description</label>
                                        <input type="text" class="form-control" id="basicInput" name="description" required="" >
                                    </fieldset>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                        <label for="basicInput">Expiry Date</label>
                                        <input type="date" class="form-control" id="basicInput" name="expiry_date" required="" >
                                    </fieldset>
                                    @if ($errors->has('expiry_date'))
                                        <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                    @endif
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicSelect">Global</label>
                                        <select name="global" class="form-control" id="basicSelect">
                                        <option value="">Select</option>
                                        <option value="No" selected>No</option>
                                        <option value="Yes">Yes</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicSelect">User</label>
                                        <select name="user" class="form-control" id="basicSelect">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{ $user->name}}</option>
                                        @endforeach
                                        </select>
                                    </fieldset>
                                    @if ($errors->has('user'))
                                        <span class="text-danger">{{ $errors->first('user') }}</span>
                                    @endif
                                </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicSelect">Type</label>
                                            <select name="type" class="form-control" id="basicSelect">
                                            <option value="">Select Type</option>
                                            @foreach ($types as $type)
                                                <option value="{{$type->name}}">{{ $type->name}}</option>
                                            @endforeach
                                            </select>
                                        </fieldset>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>


                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                @impersonating($guard = null)
                                <button type="submit" class="btn btn-primary" disabled>
                                    <i class="fa fa-check-square-o"></i> submit
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> submit
                                </button>
                                    @endImpersonating
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>



@endsection
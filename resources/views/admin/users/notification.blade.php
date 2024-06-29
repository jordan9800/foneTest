@extends('layouts.adminapp')
@section('content')
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Notifications List</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Notifications List
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->

          <!-- File export table -->
          <section id="file-export">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="card-content collapse show">
                              <div class="card-body card-dashboard">
                                <div class="selectSearch">
                                    <h3 class="card-text">Notifications</h3>
                                    <form method ="POST" action="{{ route('notifications.mark.read') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                                        <button type="sbumit" class = "btn btn-info btnInfo" data-toggle="tooltip" data-placement="top" title="Info">Mark All Read</button>
                                    </form>
                                </div>
                                  
                                  <table class="table table-striped table-bordered file-export">
                                      <thead>
                                          <tr>
                                              <th>Title</th>
                                              <th>Description</th>
                                              <th>Expiry Date</th>
                                              <th>Type</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($notifications as $notification)
                                          <tr>
                                            <td>{{ $notification->data['title'] }}</td>
                                            <td>{{ $notification->data['description'] }}</td>
                                            <td>{{ $notification->data['expiry_date'] }}</td>
                                            <td>{{ $notification->data['type'] }}</td>
                                            <td>
                                              @if(isset($notification->read_at))
                                               - 
                                              @else
                                                <form method ="POST" action="{{ route('notifications.mark.read') }}">
                                                    @csrf
                                                    <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                                    <button type="sbumit" class = "btn btn-info btnInfo" data-toggle="tooltip" data-placement="top" title="Info"><i class="fa fa-check"></i> Mark Read</button>
                                                </form>
                                              @endif
                                            </td>
                                          </tr>
                                        
                                          @endforeach
                                      </tbody>
                                     
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          
         
        </div>
      </div>
    </div>

@endsection


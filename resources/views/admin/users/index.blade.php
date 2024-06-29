@extends('layouts.adminapp')
@section('content')
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Users List</h3>
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Users List
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
                                    <h3 class="card-text">Users</h3>
                                </div>
                                  
                                  <table class="table table-striped table-bordered file-export">
                                      <thead>
                                          <tr>
                                             <th>S.N</th>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Phone Number</th>
                                              <th>Notification Switch</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      
                                      @foreach($users as $user)
                                          <tr>
                                            <td><a href="#">{{$user->id}}</a></td>
                                            <td>{{$user->name }}</td>
                                            <td>{{$user->email}}</td>
                                            @if(is_null($user->phone))
                                                <td>-</td> 
                                            @else 
                                                <td>{{$user->phone}}</td>
                                            @endif 
                                            @if($user->notification_switch == 0)
                                                <td>Off</td> 
                                            @else 
                                                <td>On</td>
                                            @endif 
                                              <td>
                                                @if(auth()->user()->is_admin)
                                                <a href="{{ route('impersonate', $user->id) }}" class="actionBtn btn btn-primary btnInfo" data-toggle="tooltip" data-placement="top" title="Impersonate"><i class="fa fa-user-secret"></i></a>
                                                @endif
                                                
                                                <a href="#" class="btn btn-info btnInfo" data-toggle="tooltip" data-placement="top" title="Info"><i class="ft-eye-off"></i></a>
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


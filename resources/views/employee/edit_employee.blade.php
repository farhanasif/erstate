
@extends('master')

@section('dashboard-title', 'Edit Employee Information')
@section('breadcrumb-title', 'Edit Employee Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Employee Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('updateEmployee',$employee->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $employee->name }}">
                              @if($errors->has('name'))
                                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Position</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="position" class="form-control" placeholder="Position" value="{{ $employee->position }}">
                              @if($errors->has('position'))
                                  <strong class="text-danger">{{ $errors->first('position') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="address" class="form-control" placeholder="Address"> --}}
                              <textarea name="address" id="perment_address" cols="3" rows="3" class="form-control" placeholder="Address">{{ $employee->address }}</textarea>
                              @if($errors->has('address'))
                                  <strong class="text-danger">{{ $errors->first('address') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $employee->phone }}">
                              @if($errors->has('phone'))
                                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $employee->email }}">
                              @if($errors->has('email'))
                                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">NID</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="nid" class="form-control" placeholder="NID" value="{{ $employee->nid }}">
                              @if($errors->has('nid'))
                                  <strong class="text-danger">{{ $errors->first('nid') }}</strong>
                              @endif
                          </div>
                          </div>

                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Department</label>
                          <div class="col-md-8 col-sm-8 ">
                            <input type="text" name="department" class="form-control" placeholder="Department" value="{{ $employee->department }}">
                            {{-- <textarea name="permanent_address" id="permanent_address" cols="3" rows="3" class="form-control" placeholder="Perment Address"></textarea> --}}
                            @if($errors->has('department'))
                                <strong class="text-danger">{{ $errors->first('department') }}</strong>
                            @endif
                        </div>
                        </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Submit">
                              <a href="{{route('allEmployee')}}" class="btn btn-info">Back</a>
                            </div>
                          </div>
                        </div>
                    </div>
              </form>
            <!-- /.card -->
            </div>
          </div>
    </div>
    <div class="col"></div>
  </div>
@endsection


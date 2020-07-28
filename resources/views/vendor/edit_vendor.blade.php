
@extends('master')

@section('dashboard-title', 'Edit Vendor Information')
@section('breadcrumb-title', 'Edit Vendor Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Vendor Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('updateVendor',$vendor->id)}}" method="post">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $vendor->name }}">
                              @if($errors->has('name'))
                                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align"> Company Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{ $vendor->company_name }}">
                              @if($errors->has('company_name'))
                                  <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="address" class="form-control" placeholder="Address"> --}}
                              <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address">{{ $vendor->address }}</textarea>
                              @if($errors->has('address'))
                                  <strong class="text-danger">{{ $errors->first('address') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $vendor->phone }}">
                              @if($errors->has('phone'))
                                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $vendor->email }}">
                              @if($errors->has('email'))
                                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Website</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="website" class="form-control" placeholder="Website" value="{{ $vendor->website }}">
                              @if($errors->has('website'))
                                  <strong class="text-danger">{{ $errors->first('website') }}</strong>
                              @endif
                          </div>
                          </div>

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="address" class="form-control" placeholder="Address"> --}}
                              <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description">{{ $vendor->description }}</textarea>
                              @if($errors->has('description'))
                                  <strong class="text-danger">{{ $errors->first('description') }}</strong>
                              @endif
                          </div>
                          </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Update">
                              <a href="{{route('allVendor')}}" class="btn btn-info">Back</a>
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


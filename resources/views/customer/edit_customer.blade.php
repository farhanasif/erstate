
@extends('master')

@section('dashboard-title', 'Edit Customer Information')
@section('breadcrumb-title', 'Edit Customer Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Edit Customer Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('updateCustomer',$customer->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $customer->name }}">
                              @if($errors->has('name'))
                                  <strong class="text-danger">{{ $errors->first('name') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Father Spouse</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="father_spouse" class="form-control" placeholder="Father Spouse" value="{{ $customer->father_spouse }}">
                              @if($errors->has('father_spouse'))
                                  <strong class="text-danger">{{ $errors->first('father_spouse') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="address" class="form-control" placeholder="Address"> --}}
                              <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Address"> {{ $customer->address }} </textarea>
                              @if($errors->has('address'))
                                  <strong class="text-danger">{{ $errors->first('address') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Phone</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $customer->phone }}">
                              @if($errors->has('phone'))
                                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $customer->email }}">
                              @if($errors->has('email'))
                                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">NID</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="nid" class="form-control" placeholder="NID" value="{{ $customer->nid }}">
                              @if($errors->has('nid'))
                                  <strong class="text-danger">{{ $errors->first('nid') }}</strong>
                              @endif
                          </div>
                          </div>

                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Perment Address</label>
                          <div class="col-md-8 col-sm-8 ">
                            {{-- <input type="text" name="description" class="form-control" placeholder="Description"> --}}
                            <textarea name="permanent_address" id="permanent_address" cols="3" rows="3" class="form-control" placeholder="Perment Address">{{ $customer->permanent_address }}</textarea>
                            @if($errors->has('perment_address'))
                                <strong class="text-danger">{{ $errors->first('permanent_address') }}</strong>
                            @endif
                        </div>
                        </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Update">
                              <a href="{{route('allProduct')}}" class="btn btn-info">Back</a>
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


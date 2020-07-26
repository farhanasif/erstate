
@extends('master')

@section('dashboard-title', 'Add Product Information')
@section('breadcrumb-title', 'Add Product Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Add Product Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('updateProduct',$product->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">
                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align"> Project Name</label>
                          <div class="col-md-8 col-sm-3 ">
                            <select name="project_name" class="form-control">
                                <option value="">--select--</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project_name'))
                                <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Flat Type</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="flat_type" class="form-control" placeholder="Flat Type">
                              @if($errors->has('flat_type'))
                                  <strong class="text-danger">{{ $errors->first('flat_type') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Floor Number</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="floor_number" class="form-control" placeholder="Floor Number">
                              @if($errors->has('floor_number'))
                                  <strong class="text-danger">{{ $errors->first('floor_number') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Flat Size</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="flat_size" class="form-control" placeholder="Flat Size">
                              @if($errors->has('flat_size'))
                                  <strong class="text-danger">{{ $errors->first('flat_size') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Unit Price</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="unit_price" class="form-control" placeholder="Unit Price">
                              @if($errors->has('unit_price'))
                                  <strong class="text-danger">{{ $errors->first('unit_price') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Total Flat Price</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="total_flat_price" class="form-control" placeholder="Total Flat Price">
                              @if($errors->has('project_name'))
                                  <strong class="text-danger">{{ $errors->first('total_flat_price') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Car Parking Charge</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="car_parking_charge" class="form-control" placeholder="Car Parking Charge">
                              @if($errors->has('car_parking_charge'))
                                  <strong class="text-danger">{{ $errors->first('car_parking_charge') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Utility Charge</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="utility_charge" class="form-control" placeholder="Utility Charge">
                              @if($errors->has('utility_charge'))
                                  <strong class="text-danger">{{ $errors->first('utility_charge') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Additional Work Charge</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="additional_work_charge" class="form-control" placeholder="Additional Work Charge">
                              @if($errors->has('additional_work_charge'))
                                  <strong class="text-danger">{{ $errors->first('additional_work_charge') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Other Charge</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="other_charge" class="form-control" placeholder="Other Charge">
                              @if($errors->has('other_charge'))
                                  <strong class="text-danger">{{ $errors->first('other_charge') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Discount</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="discount" class="form-control" placeholder="Discount">
                              @if($errors->has('discount'))
                                  <strong class="text-danger">{{ $errors->first('discount') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Refund Additional Work Charge</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="refund_additional_work_charge" class="form-control" placeholder="Refund Additional Work Charge">
                              @if($errors->has('refund_additional_work_charge'))
                                  <strong class="text-danger">{{ $errors->first('refund_additional_work_charge') }}</strong>
                              @endif
                          </div>
                          </div>
                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Net Total</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="net_total" class="form-control" placeholder="Net Total">
                              @if($errors->has('net_total'))
                                  <strong class="text-danger">{{ $errors->first('net_total') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">file_attached</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="file" name="file_attached" class="form-control" placeholder="File Attached">
                              @if($errors->has('file_attached'))
                                  <strong class="text-danger">{{ $errors->first('file_attached') }}</strong>
                              @endif
                          </div>
                          </div> 

    
                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                          <div class="col-md-8 col-sm-8 ">
                            {{-- <input type="text" name="description" class="form-control" placeholder="Description"> --}}
                            <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                            @if($errors->has('description'))
                                <strong class="text-danger">{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                        </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Submit">
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


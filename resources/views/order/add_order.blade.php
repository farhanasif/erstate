@extends('master')

@section('breadcrumb-title', 'Create Purchase Order Manage')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Create Purchase Order Manage</h3>
        </div>
        @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeIOrder') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Project Name</label>
                        <select name="project_name" id="" class="form-control">
                            <option value="">--Select Project Name--</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('project_name'))
                            <strong class="text-danger">{{ $errors->first('project_name') }}</strong>
                        @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Vendor name</label>
                          <select name="vendor_name" id="" class="form-control">
                              <option value="">--Select Vendor Name--</option>
                              @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"> {{ $vendor->name }}</option>
                              @endforeach
                          </select>
                            @if($errors->has('vendor_name'))
                                <strong class="text-danger">{{ $errors->first('vendor_name') }}</strong>
                            @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Media Name</label>
                        <input type="text" name="media_name" id="" class="form-control" placeholder="Media Name">
                        @if($errors->has('media_name'))
                            <strong class="text-danger">{{ $errors->first('media_name') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" id="" class="form-control" placeholder="Issue Date">
                        @if($errors->has('issue_date'))
                            <strong class="text-danger">{{ $errors->first('issue_date') }}</strong>
                        @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Person 1</label>
                        <input type="text" name="contact_person" id="" class="form-control" placeholder="Contact Person 1">
                        @if($errors->has('contact_person'))
                            <strong class="text-danger">{{ $errors->first('contact_person') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact Person 2</label>
                        <input type="text" name="contact_person" id="" class="form-control" placeholder="Contact Person 2">
                        @if($errors->has('contact_person'))
                            <strong class="text-danger">{{ $errors->first('contact_person') }}</strong>
                        @endif
                    </div>
                </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Note</label>
                        <input type="text" name="note" id="" class="form-control" placeholder="Note">
                        @if($errors->has('note'))
                            <strong class="text-danger">{{ $errors->first('note') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" id="" class="form-control" placeholder="Subject">
                        @if($errors->has('subject'))
                            <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Delivery Date</label>
                        <input type="date" name="delivery_date" id="" class="form-control">
                        @if($errors->has('delivery_date'))
                            <strong class="text-danger">{{ $errors->first('delivery_date') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Message Body</label>
                        <textarea name="message_body" id="" cols="3" rows="3" class="form-control" placeholder="Message Body"></textarea>
                        @if($errors->has('message_body'))
                            <strong class="text-danger">{{ $errors->first('message_body') }}</strong>
                        @endif
                    </div>
                </div>

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>


              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Requisition Confirmed ID</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    {{-- <label></label> --}}
                                    <select name="rqn_confirmed_id" class="form-control" id="">
                                        <option value="">--Select Requisition Confirmed ID</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div id="items" class="body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Unit</th>
                                            <th>Description</th>
                                            <th>Qty.</th>
                                            <th>Rate</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center text-danger" colspan="7">No Items Found Or Please Select Requisition Confirmed ID</td>
                                            </tr>
                                        </tbody>
    
                                        <tfoot>
    
                                        <tr>
                                            <th colspan="5" class="text-right">Total Amount</th>
                                            <th>
                                                <span>0</span>
                                                <input value="0" type="hidden" name="totalAmount">
                                            </th>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                      </div>
                </div>
              </div>

              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allOrder') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection


  
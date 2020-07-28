
@extends('master')

@section('dashboard-title', 'Add Sell Information')
@section('breadcrumb-title', 'Add Sell Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Add Sell Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('storeSales')}}" method="post">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Customer Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="text" name="customer_name" class="form-control" placeholder="Customer Name">
                              @if($errors->has('customer_name'))
                                  <strong class="text-danger">{{ $errors->first('customer_name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align"> Project Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="project_name" class="form-control" placeholder="Project Name"> --}}
                              <select name="project_name" id="" class="form-control">
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
                            <label  class="col-form-label col-md-3 col-sm-3 label-align"> Product Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="product_name" class="form-control" placeholder="Product Name"> --}}
                              <select name="product_name" id="" class="form-control">
                                <option value="">--select--</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->id }}</option>
                                @endforeach
                              </select>
                              @if($errors->has('product_name'))
                                  <strong class="text-danger">{{ $errors->first('product_name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align"> Employee Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="employee_name" class="form-control" placeholder="Employee Name"> --}}
                              <select name="employee_name" id="" class="form-control">
                                <option value="">--select--</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                              </select>
                              @if($errors->has('employee_name'))
                                  <strong class="text-danger">{{ $errors->first('employee_name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align"> Customer Name</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="customer_name" class="form-control" placeholder="Customer Name"> --}}
                              <select name="customer_id" id="" class="form-control">
                                <option value="">--select--</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                              </select>
                              @if($errors->has('customer_name'))
                                  <strong class="text-danger">{{ $errors->first('customer_name') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                            <div class="col-md-8 col-sm-3 ">
                              {{-- <input type="text" name="address" class="form-control" placeholder="Address"> --}}
                              <textarea name="description" id="address" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                              @if($errors->has('description'))
                                  <strong class="text-danger">{{ $errors->first('description') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Amount</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="amount" class="form-control" placeholder="Amount">
                              @if($errors->has('phone'))
                                  <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Amount Paid</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="amount_paid" class="form-control" placeholder="Amount Paid">
                              @if($errors->has('amount_paid'))
                                  <strong class="text-danger">{{ $errors->first('amount_paid') }}</strong>
                              @endif
                          </div>
                          </div>

                          <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Amount Due</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="number" name="amount_due" class="form-control" placeholder="Amount Due">
                              @if($errors->has('amount_due'))
                                  <strong class="text-danger">{{ $errors->first('amount_due') }}</strong>
                              @endif
                          </div>
                          </div>

                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Sales Date</label>
                            <div class="col-md-8 col-sm-3 ">
                              <input type="date" name="sales_date" class="form-control">
                              {{-- <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea> --}}
                              @if($errors->has('sales_date'))
                                  <strong class="text-danger">{{ $errors->first('sales_date') }}</strong>
                              @endif
                          </div>
                          </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Submit">
                              <a href="{{route('allSales')}}" class="btn btn-info">Back</a>
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


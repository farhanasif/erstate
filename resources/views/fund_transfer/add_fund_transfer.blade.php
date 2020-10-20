@extends('master')

@section('breadcrumb-title', 'Fund Transfer Information')

@section('custom_css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" type="text/css" media="all" href="{{ URL::to('css/report_print.css') }}" />
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Fund Transfer Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ url('/fund_transfer/create') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label> From Project</label>
                      <select name="from_project" id="">
                          <option value="">--select from project name--</option>
                      </select>
                      @if($errors->has('from_project'))
                        <strong class="text-danger">{{ $errors->first('from_project') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label> To Project</label>
                      <select name="to_project" id="">
                          <option value="">--select to project name--</option>
                      </select>
                      @if($errors->has('to_project'))
                        <strong class="text-danger">{{ $errors->first('to_project') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label> To Project</label>
                      <input  class="form-control" type="text" class="form-controll" name="item_name" placeholder="Item Name">
                      @if($errors->has('item_name'))
                        <strong class="text-danger">{{ $errors->first('item_name') }}</strong>
                      @endif
                    </div>
                  </div>

                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Amount</label>
                          <input type="text" name="amount" id="" class="form-control" placeholder="0">
                        @if($errors->has('amount'))
                            <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                        @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Transfer Date</label>
                          <input type="text" name="" class="form-control" placeholder="Transfer Date">
                          @if($errors->has('transfer_date'))
                          <strong class="text-danger">{{ $errors->first('transfer_date') }}</strong>
                      @endif
                      </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allItem') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
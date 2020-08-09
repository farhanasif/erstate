

@extends('master')

@section('breadcrumb-title', ' Create Cr Voucher')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title"> Create Cr Voucher</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('save_credit') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project</label>
                      <select name="project_id" class="form-control">
                        <option value="">--select project--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bank/Cash</label>
                      <select name="bank_id" class="form-control">
                        <option value="">--select bank--</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('bank_id'))
                        <strong class="text-danger">{{ $errors->first('bank_id') }}</strong>
                    @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Cheque No</label>
                        <input type="text" name="cheque_no" class="form-control" placeholder="Cheque No">
                        @if($errors->has('cheque_no'))
                            <strong class="text-danger">{{ $errors->first('cheque_no') }}</strong>
                        @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Voucher Date</label>
                        <input type="date" class="form-control" name="voucher_date" id="voucher_date">
                        @if($errors->has('voucher_date'))
                          <strong class="text-danger">{{ $errors->first('voucher_date') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Perticulers</label>
                      <input type="text" name="perticulars" class="form-control" placeholder="perticulars">
                      @if($errors->has('perticulars'))
                          <strong class="text-danger">{{ $errors->first('perticulars') }}</strong>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Account Head Name</label>
                        <select name="lname_id" class="form-control">
                          <option value="">--select account head--</option>
                          @foreach ($lnames as $lname)
                              <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                          @endforeach
                      </select>
                      @if($errors->has('lname_id'))
                          <strong class="text-danger">{{ $errors->first('lname_id') }}</strong>
                      @endif
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                          <label>Amount</label>
                          <input type="text" name="amount" class="form-control" placeholder="0">
                          @if($errors->has('amount'))
                              <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                          @endif
                      </div>
                    </div>
                  </div>
                  
                </div>
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('lname.index') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script>
      $(document).ready(function() {
          $(function() { 
       $( "#voucher_date" ).datepicker();
    });
      });
  </script>
      
  @endsection
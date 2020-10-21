@extends('master')

@section('breadcrumb-title', 'Create General Information')

@section('custom_css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Create General Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ url('/installment/create') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label> Project</label>
                    <select name="project_name" id="" class="form-control">
                        <option value="">--select project name--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id}}">{{ $project->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('from_project'))
                    <strong class="text-danger">{{ $errors->first('from_project') }}</strong>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Buyer Name</label>
                        <input type="text" name="buyer_name" disabled class="form-control" placeholder="Buyer Name">
                    @if($errors->has('buyer_name'))
                    <strong class="text-danger">{{ $errors->first('buyer_name') }}</strong>
                    @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label> Bank/Cash</label>
                      <select name="amount_type" id="" class="form-control select2bs4">
                        <option value="">--select</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('amount_type'))
                        <strong class="text-danger">{{ $errors->first('amount_type') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Amount</label>
                        <input type="text" name="installment_amount" id="" class="form-control" placeholder="0">
                        @if($errors->has('installment_amount'))
                            <strong class="text-danger">{{ $errors->first('installment_amount') }}</strong>
                        @endif                      
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Combined Amount</label>
                        <input type="text" name="combined_amount" id="" class="form-control" placeholder="0">
                        @if($errors->has('combined_amount'))
                            <strong class="text-danger">{{ $errors->first('combined_amount') }}</strong>
                        @endif                      
                    </div>
                </div>

                    <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Due Amount</label>
                        <input type="text" name="due_amount" disabled id="" class="form-control" placeholder="0">
                      @if($errors->has('due_amount'))
                          <strong class="text-danger">{{ $errors->first('due_amount') }}</strong>
                      @endif                      
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Date</label>
                        <input type="text" name="installment_date" id="installment_date" class="form-control" placeholder="Installment Date">
                        @if($errors->has('installment_date'))
                        <strong class="text-danger">{{ $errors->first('installment_date') }}</strong>
                    @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ url('/installment/index') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
 $(function () {
      $( "#installment_date" ).datepicker({dateFormat: 'yy-mm-dd'});
 })
</script>
    
@endsection
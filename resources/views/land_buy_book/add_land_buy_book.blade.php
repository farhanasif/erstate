
@extends('master')

@section('breadcrumb-title', 'Add land buy book information')

@section('custom_css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add land buy book information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeLandbuybook') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" placeholder="File No">
                                @if($errors->has('file_no'))
                                    <strong class="text-danger">{{ $errors->first('file_no') }}</strong>
                                @endif                    
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Donar Name</label>
                            <input type="text" name="donor_name" class="form-control" placeholder="Donar Name">
                                @if($errors->has('donor_name'))
                                    <strong class="text-danger">{{ $errors->first('donor_name') }}</strong>
                                @endif
                        </div>
                    </div>
    
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Recipient Name</label>
                            <input type="text" name="recipient_name" class="form-control" placeholder="Recipient Name">
                                @if($errors->has('recipient_name'))
                                    <strong class="text-danger">{{ $errors->first('recipient_name') }}</strong>
                                @endif
                        </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Documents No</label>
                    <input type="text" class="form-control" name="documents_no" placeholder="Documents No">
                      @if($errors->has('documents_no'))
                          <strong class="text-danger">{{ $errors->first('documents_no') }}</strong>
                      @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Date">
                    @if($errors->has('date'))
                        <strong class="text-danger">{{ $errors->first('date') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Khatian No Details:</h3>
                </div>
        </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>C.S. khatian: </label>
                        <input type="text" name="cs_khatian" class="form-control" placeholder="C.S. khatian">
                        @if($errors->has('cs_khatian'))
                            <strong class="text-danger">{{ $errors->first('cs_khatian') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>R.S. khatian:</label>
                        <input type="text" name="rs_khatian" class="form-control" placeholder="R.S. Khatian">
                        @if($errors->has('rs_khatian'))
                            <strong class="text-danger">{{ $errors->first('rs_khatian') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>S.A. Khatian:</label>
                        <input type="text" name="sa_khatian" class="form-control" placeholder="S.A. Khatian">
                        @if($errors->has('sa_khatian'))
                            <strong class="text-danger">{{ $errors->first('sa_khatian') }}</strong>
                        @endif
                    </div>
                </div>
            </div>

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Dag No Details:</h3>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>S.A. Dag:</label>
                        <input type="text" name="sa_dag" class="form-control" placeholder="S.A. Dag">
                        @if($errors->has('sa_dag'))
                            <strong class="text-danger">{{ $errors->first('sa_dag') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>R.S Dag</label>
                        <input type="text" name="rs_dag" class="form-control" placeholder="R.S Dag">
                        @if($errors->has('rs_dag'))
                            <strong class="text-danger">{{ $errors->first('rs_dag') }}</strong>
                        @endif
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Land Amount(Percent):</label>
                    <input type="text" name="amount_of_land" id="amount_of_land" class="form-control" placeholder="Land Amount(Percent)">
                    @if($errors->has('amount_of_land'))
                        <strong class="text-danger">{{ $errors->first('amount_of_land') }}</strong>
                    @endif
                </div>
           </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Rejection Amount Name(Percent): </label>
                    <input type="text" name="rejection_amount" class="form-control" placeholder="Rejection Amount Name(Percent)">
                    @if($errors->has('rejection_amount'))
                        <strong class="text-danger">{{ $errors->first('rejection_amount') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Hold No: </label>
                    <input type="text" name="hold_no" class="form-control" placeholder="Hold No">
                    @if($errors->has('hold_no'))
                        <strong class="text-danger">{{ $errors->first('hold_no') }}</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success ">Submit</button>
        <a href="{{ route('allLandbuybook') }}" type="submit" class="btn btn-info">Back</a>
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

      $( "#date" ).datepicker({dateFormat: 'yy-mm-dd'});
</script>
    
@endsection
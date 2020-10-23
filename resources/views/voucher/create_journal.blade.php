@extends('master')

@section('breadcrumb-title', ' Create Journal Voucher')


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
          <h3 class="card-title"> Create Journal Voucher</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('save_journal') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id_dr" class="form-control">
                        <option value="">--select project name (Dr)--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_dr">
                        <div class="row" id="row_1">
                          <div class="col-md-5 {{$errors->has('name') ? 'has-error' : ''}}">
                            <div class="form-group">
                              <label>Account Head Name <span style="color: red;">*</span></label>
                              <select name="lname_id_dr[]" class="form-control">
                                <option value="">--select account head (Dr)--</option>
                                @foreach ($lnames as $lname)
                                    <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                                @endforeach
                            </select>
                              @if($errors->has('name'))
                                <span class="help-block text-danger">
                                  {{$errors->first('name')}}
                                </span>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4 {{$errors->has('amount') ? 'has-error' : ''}}">
                            <div class="form-group">
                                <label>Amount <span style="color: red;">*</span></label>
                                <input type="text" name="amount_dr" id="amount_dr" class="form-control" placeholder="0">
                                @if($errors->has('amount'))
                                  <span class="help-block text-danger">
                                    {{$errors->first('amount')}}
                                  </span>
                                @endif
                            </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project<span style="color: red;">*</span></label>
                      <select name="project_id_cr" class="form-control">
                        <option value="">--select project name (Cr)--</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_id'))
                        <strong class="text-danger">{{ $errors->first('project_id') }}</strong>
                    @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12" id="journal_details_cr">
                        <div class="row" id="row_1">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Account Head Name<span style="color: red;">*</span></label>
                              <select name="lname_id_cr[]" class="form-control">
                                <option value="">--select account head (Cr)--</option>
                                @foreach ($lnames as $lname)
                                    <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount<span style="color: red;">*</span></label>
                                <input readonly type="text" name="amount_cr" id="amount_cr" class="form-control" placeholder="0">
                            </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

              {{-- <div class="col-sm-6">
                <div class="form-group">
                  <label>&nbsp;&nbsp; Journal Date<span style="color: red;">*</span></label>
                  <div class="col-md-12 col-sm-12">
                    <input type="text" class="form-control" name="journal_date" id="journal_date" placeholder="Journal Date">
                      @if($errors->has('journal_date'))
                        <strong class="text-danger">{{ $errors->first('journal_date') }}</strong>
                      @endif
                  </div>
                </div>
              </div> --}}

              <div class="col-sm-6">
                  <div class="form-group">
                  <label>&nbsp;&nbsp; Date<span style="color: red;">*</span></label>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="form-control" name="voucher_date" id="voucher_date" placeholder="Date">
                        @if($errors->has('voucher_date'))
                          <strong class="text-danger">{{ $errors->first('voucher_date') }}</strong>
                        @endif
                    </div>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name<span style="color: red;">*</span></label>
                  <select name="bank" class="form-control">
                    <option value="">--select Bank--</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                    <label>Perticulers<span style="color: red;">*</span></label>
                    <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                    @if($errors->has('perticulers'))
                        <strong class="text-danger">{{ $errors->first('perticulers') }}</strong>
                    @endif
                </div>
              </div>

                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="#" type="submit" class="btn btn-info">Back</a>
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
      $( "#journal_date" ).datepicker({dateFormat: 'yy-mm-dd'});
      $( "#voucher_date" ).datepicker({dateFormat: 'yy-mm-dd'});

      $("#amount_dr").on("input", function () {
        var d = $(this).val();
        $('#amount_cr').val(d);
      });
     
  </script>
      
  @endsection
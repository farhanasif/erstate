

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
                      <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                      @if($errors->has('perticulars'))
                          <strong class="text-danger">{{ $errors->first('perticulars') }}</strong>
                      @endif
                  </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12" id="voucher_details">
                      <div class="row" id="row_1">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Account Head Name</label>
                            <select name="lname_id[]" class="form-control">
                              <option value="">--select account head--</option>
                              @foreach ($ltypes as $ltype)
                                  <option value="{{ $ltype->id }}">{{ $ltype->name }}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Amount</label>
                              <input type="text" name="amount[]" class="form-control" placeholder="0">
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-4">
                                <span style="font-size: 1.2em; color: Tomato;" id="addButton"> 
                                  <i class="far fa-plus-square fa-lg pt-3"></i>
                                </span>
                            </div>
                        </div>
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
                 <a href="{{ route('allcreditvoucher') }}" type="submit" class="btn btn-info">Back</a>
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
        var i=1;

        console.log('here you go');

        $("#addButton").click(function (e) {
          e.preventDefault();
          i++;

          _dynamic_div = `<div class="row" id="row_`+i+`">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Account Head Name</label>
                            <select name="lname_id[]" class="form-control">
                              <option value="">--select account head--</option>
                              @foreach ($ltypes as $ltype)
                                  <option value="{{ $ltype->id }}">{{ $ltype->name }}</option>
                              @endforeach
                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Amount</label>
                              <input type="text" name="amount[]" class="form-control" placeholder="0">
                          </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group pt-4">
                                <span style="font-size: 1.2em; color: red;" class="btn_remove" id="`+i+`"> 
                                  <i class="far fa-trash-alt pt-3"></i>
                                </span>
                            </div>
                        </div>
                      </div>`;
          //console.log(_dynamic_div);
          $('#voucher_details').append(_dynamic_div)
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            //console.log(button_id);   
            $('#row_'+button_id+'').remove();  
      });
      });
  </script>
      
  @endsection
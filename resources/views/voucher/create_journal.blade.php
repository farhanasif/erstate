

@extends('master')

@section('breadcrumb-title', ' Create Journal Voucher')

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
                      <label>Project</label>
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
                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Account Head Name</label>
                              <select name="lname_id_dr[]" class="form-control">
                                <option value="">--select account head (Dr)--</option>
                                @foreach ($lnames as $lname)
                                    <option value="{{ $lname->id }}">{{ $lname->name }}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount_dr[]" class="form-control" placeholder="0">
                            </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group pt-4">
                                  <span style="font-size: 1.2em; color: Tomato;" id="addButtonDr"> 
                                    <i class="far fa-plus-square fa-lg pt-3"></i>
                                  </span>
                              </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project</label>
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
                              <label>Account Head Name</label>
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
                                <label>Amount</label>
                                <input type="text" name="amount_cr[]" class="form-control" placeholder="0">
                            </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group pt-4">
                                  <span style="font-size: 1.2em; color: Tomato;" id="addButtonCr"> 
                                    <i class="far fa-plus-square fa-lg pt-3"></i>
                                  </span>
                              </div>
                          </div>
                        </div>
                        
                      </div>
                        
                  </div>
                    
                  </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label>Perticulers</label>
                      <textarea name="perticulers" id="perticulers" cols="3" rows="3" class="form-control" placeholder="Perticulers"></textarea>
                      @if($errors->has('perticulars'))
                          <strong class="text-danger">{{ $errors->first('perticulars') }}</strong>
                      @endif
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                      <label>Journal Date</label>
                      <input type="date" class="form-control" name="journal_date" id="journal_date">
                      @if($errors->has('voucher_date'))
                        <strong class="text-danger">{{ $errors->first('voucher_date') }}</strong>
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

  <script>
      $(document).ready(function() {
        var i=1;
        var j=1;

        console.log('here you go');

        $("#addButtonDr").click(function (e) {
          e.preventDefault();
          i++;

          _dynamic_div = `<div class="row" id="row_`+i+`">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Account Head Name</label>
                            <select name="lname_id[]" class="form-control">
                              <option value="">--select account head (Dr)--</option>
                              @foreach ($lnames as $lname)
                                  <option value="{{ $lname->id }}">{{ $lname->name }}</option>
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
          $('#journal_details_dr').append(_dynamic_div)
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            //console.log(button_id);   
            $('#row_'+button_id+'').remove();  
      });


      //journal details cr

      $("#addButtonCr").click(function (e) {
        e.preventDefault();
        j++;

        _dynamic_div_cr = `<div class="row" id="row_`+j+`">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Account Head Name</label>
                          <select name="lname_id[]" class="form-control">
                            <option value="">--select account head (Cr)--</option>
                            @foreach ($lnames as $lname)
                                <option value="{{ $lname->id }}">{{ $lname->name }}</option>
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
                              <span style="font-size: 1.2em; color: red;" class="btn_remove" id="`+j+`"> 
                                <i class="far fa-trash-alt pt-3"></i>
                              </span>
                          </div>
                      </div>
                    </div>`;
        //console.log(_dynamic_div);
        $('#journal_details_dr').append(_dynamic_div_cr)
      });

      $(document).on('click', '.btn_remove', function(){
          var button_id = $(this).attr("id");
          //console.log(button_id);   
          $('#row_'+button_id+'').remove();  
    });
      });
  </script>
      
  @endsection

@extends('master')

@section('breadcrumb-title', 'Add land owner information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add land owner information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="" method="POST">
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                                @if($errors->has('father_spouse'))
                                    <strong class="text-danger">{{ $errors->first('father_spouse') }}</strong>
                                @endif
                        </div>
                    </div>
    
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control" placeholder="Father Name">
                            @if($errors->has('father_name'))
                                <strong class="text-danger">{{ $errors->first('father_name') }}</strong>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" placeholder="Mother Name">
                            @if($errors->has('mother_name'))
                                <strong class="text-danger">{{ $errors->first('mother_name') }}</strong>
                            @endif
                    </div>
                </div>
                </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>NID No</label>
                        <input type="number" name="nid_no" class="form-control" placeholder="NID No">
                            @if($errors->has('nid_no'))
                                <strong class="text-danger">{{ $errors->first('nid_no') }}</strong>
                            @endif
                    </div>
                </div>
    
                    <div class="col-md-4">
                    <div class="form-group">
                        <label>Mobile No</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile No">
                            @if($errors->has('mobile'))
                                <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                            @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            @endif
                    </div>
                </div>
            </div>

            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Address:</h3>
                  </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Perment</label>
                      <textarea name="permanent_address" id="permanent_address" cols="3" rows="3" class="form-control" placeholder="Perment"></textarea>
                      @if($errors->has('perment_address'))
                          <strong class="text-danger">{{ $errors->first('permanent_address') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Present</label>
                    <textarea name="present_address" id="present_address" cols="3" rows="3" class="form-control" placeholder="Present"></textarea>
                    @if($errors->has('present_address'))
                        <strong class="text-danger">{{ $errors->first('present_address') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name of Media Man</label>
                    <input type="text" class="form-control" name="media_man" placeholder="Name of Media Man">
                      @if($errors->has('media_man'))
                          <strong class="text-danger">{{ $errors->first('media_man') }}</strong>
                      @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Name of Investigation person</label>
                  <input type="text" name="investigation_person" class="form-control" placeholder="Name of Investigation person">
                  @if($errors->has('investigation_person'))
                      <strong class="text-danger">{{ $errors->first('investigation_person') }}</strong>
                  @endif
              </div>
          </div>
        </div>
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Land Details:</h3>
                  </div>
            </div>

          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Mouza: </label>
                    <input type="text" name="mouza" class="form-control" placeholder="Mouza">
                    @if($errors->has('mouza'))
                        <strong class="text-danger">{{ $errors->first('mouza') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>P.S: </label>
                    <input type="text" name="ps" class="form-control" placeholder="P.S">
                    @if($errors->has('ps'))
                        <strong class="text-danger">{{ $errors->first('ps') }}</strong>
                    @endif
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>Dist.:</label>
                    <input type="text" name="district" class="form-control" placeholder="Dist.">
                    @if($errors->has('district'))
                        <strong class="text-danger">{{ $errors->first('district') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>C.S. Khatian:</label>
                    <input type="text" name="cs_khatian" class="form-control" placeholder="C.S. Khatian">
                    @if($errors->has('cs_khatian'))
                        <strong class="text-danger">{{ $errors->first('cs_khatian') }}</strong>
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

            <div class="col-md-4">
                <div class="form-group">
                    <label>R.S. Khatian: </label>
                    <input type="text" name="rs_khatian" class="form-control" placeholder="R.S. Khatian">
                    @if($errors->has('rs_khatian'))
                        <strong class="text-danger">{{ $errors->first('rs_khatian') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>C.S/S.A. Dag:</label>
                    <input type="text" name="cs_sa_dag" class="form-control" placeholder="C.S/S.A. Dag">
                    @if($errors->has('cs_sa_dag'))
                        <strong class="text-danger">{{ $errors->first('cs_sa_dag') }}</strong>
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

            <div class="col-md-4">
                <div class="form-group">
                    <label>Total Land of R.S:</label>
                    <input type="text" name="total_land_of_rs" class="form-control" placeholder="Total Land of R.S">
                    @if($errors->has('total_land_of_rs'))
                        <strong class="text-danger">{{ $errors->first('total_land_of_rs') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Purchase of Land:</label>
                    <input type="text" name="purchase_of_land" class="form-control" placeholder="Purchase of Land">
                    @if($errors->has('purchase_of_land'))
                        <strong class="text-danger">{{ $errors->first('purchase_of_land') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Remaining Balance: </label>
                    <input type="text" name="remaining_balance" class="form-control" placeholder="Remaining Balance">
                    @if($errors->has('remaining_balance'))
                        <strong class="text-danger">{{ $errors->first('remaining_balance') }}</strong>
                    @endif
                </div>
            </div>
          </div>

          <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Land History:</h3>
              </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Purchase of Land Price: </label>
                    <input type="text" name="tp_land_price" class="form-control" placeholder="Total Purchase of Land Price">
                    @if($errors->has('tp_land_price'))
                        <strong class="text-danger">{{ $errors->first('tp_land_price') }}</strong>
                    @endif
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Per Bigha Price:</label>
                    <input type="text" name="per_bigha_price" class="form-control" placeholder="Per Bigha Price">
                    @if($errors->has('per_bigha_price'))
                        <strong class="text-danger">{{ $errors->first('per_bigha_price') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Purchase of Land (Decimal): </label>
                    <input type="text" name="purchase_of_land" class="form-control" placeholder="Purchase of Land (Decimal)">
                    @if($errors->has('purchase_of_land'))
                        <strong class="text-danger">{{ $errors->first('purchase_of_land') }}</strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Number of Installment</th>
                    <th>Date</th>
                    <th>Particular</th>
                    <th>Cumulative Figure</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Registration Date:</label>
                    <input type="date" name="registration_date" id="registration_date" class="form-control" placeholder="Registration Date">
                    @if($errors->has('registration_date'))
                        <strong class="text-danger">{{ $errors->first('registration_date') }}</strong>
                    @endif
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label>Deed Number: </label>
                    <input type="text" name="deed_number" class="form-control" placeholder="Deed Number">
                    @if($errors->has('deed_number'))
                        <strong class="text-danger">{{ $errors->first('deed_number') }}</strong>
                    @endif
                </div>
            </div>
        </div>
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="" type="submit" class="btn btn-info">Back</a>
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
     $( "#registration_date" ).datepicker();
     $( "#hand_over_date" ).datepicker();
  });
    });
</script>
    
@endsection
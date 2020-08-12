
@extends('master')

@section('breadcrumb-title', 'Add Employee Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Employee Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeEmployee') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @if($errors->has('name'))
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                @endif                 
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control" placeholder="Position">
                                @if($errors->has('position'))
                                    <strong class="text-danger">{{ $errors->first('position') }}</strong>
                                @endif
                            </div>
                        </div>


                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Phone">
                              @if($errors->has('phone'))
                                  <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                              @endif
                        </div>
                    </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email">
                      @if($errors->has('email'))
                          <strong class="text-danger">{{ $errors->first('email') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>NID</label>
                    <input type="number" name="nid" class="form-control" placeholder="NID">
                    @if($errors->has('nid'))
                        <strong class="text-danger">{{ $errors->first('nid') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Department</label>
                  <input type="text" name="department" class="form-control" placeholder="Department">
                  @if($errors->has('department'))
                      <strong class="text-danger">{{ $errors->first('department') }}</strong>
                  @endif
              </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" id="perment_address" cols="3" rows="3" class="form-control" placeholder="Address"></textarea>
                @if($errors->has('address'))
                    <strong class="text-danger">{{ $errors->first('address') }}</strong>
                @endif
            </div>
        </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allEmployee') }}" type="submit" class="btn btn-info">Back</a>
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
     $( "#launching_date" ).datepicker();
     $( "#hand_over_date" ).datepicker();
  });
    });
</script>
    
@endsection
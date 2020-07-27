

@extends('master')

@section('dashboard-title', 'Add Project Information')
@section('breadcrumb-title', 'Add Project Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header bg-success">
          <h3 class="card-title">Add Item Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeProject') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name">
                      @if($errors->has('name'))
                          <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                          @if($errors->has('description'))
                              <strong class="text-danger">{{ $errors->first('description') }}</strong>
                          @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Location</label>
                          <input type="text" name="location" class="form-control" placeholder="Location">
                          @if($errors->has('location'))
                              <strong class="text-danger">{{ $errors->first('location') }}</strong>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Facing</label>
                        <input type="text" name="facing" class="form-control" placeholder="Facing">
                        @if($errors->has('facing'))
                          <strong class="text-danger">{{ $errors->first('facing') }}</strong>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Building Height</label>
                      <input type="text" name="building_height" class="form-control" placeholder="Building Height">
                      @if($errors->has('building_height'))
                        <strong class="text-danger">{{ $errors->first('building_height') }}</strong>
                      @endif
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label>Land Area</label>
                    <input type="text" class="form-control" name="land_area"  placeholder="Land Area" >
                    @if($errors->has('land_area'))
                      <strong class="text-danger">{{ $errors->first('land_area') }}</strong>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label>Lanching Date</label>
                  <input type="date" class="form-control" name="launching_date" id="launching_date">
                  @if($errors->has('launching_date'))
                    <strong class="text-danger">{{ $errors->first('launching_date') }}</strong>
                  @endif
              </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <label>Hand Over Date</label>
                <input type="date" class="form-control" name="hand_over_date" id="hand_over_date">
                @if($errors->has('hand_over_date'))
                  <strong class="text-danger">{{ $errors->first('hand_over_date') }}</strong>
                @endif
            </div>
        </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allProject') }}" type="submit" class="btn btn-info">Back</a>
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

@extends('master')

@section('dashboard-title', 'Add Project Information')
@section('breadcrumb-title', 'Add Project Information')

@section('content')

  <div class="row">
    <div class="col"></div>
    <div class="col-md-10">
        <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">Add Project Information</h3>
            </div>
    
            @include('message')
    
            <div class="card-body">
              <!-- /.card -->
                <!-- Horizontal Form -->
               <form class="form-horizontal form-label-left" action="{{route('storeProject')}}" method="post">
                 @csrf
    
                   <div class="row">
                      <div class="col-md-10 offset-1">
                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
                          <div class="col-md-8 col-sm-3 ">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                        </div>
    
                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                          <div class="col-md-8 col-sm-8 ">
                            {{-- <input type="text" name="description" class="form-control" placeholder="Description"> --}}
                            <textarea name="description" id="description" cols="3" rows="3" class="form-control" placeholder="Description"></textarea>
                            @if($errors->has('description'))
                                <strong class="text-danger">{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                        </div>
    
                        <div class="form-group row">
                            <label  class="col-form-label col-md-3 col-sm-3 label-align">Location</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" name="location" class="form-control" placeholder="Location">
                                @if($errors->has('location'))
                                    <strong class="text-danger">{{ $errors->first('location') }}</strong>
                                @endif
                            </div>
                          </div>
    
                        <div class="form-group row">
                          <label  class="col-form-label col-md-3 col-sm-3 label-align">Facing</label>
                          <div class="col-md-8 col-sm-8 ">
                            <input type="text" name="facing" class="form-control" placeholder="Facing">
                             @if($errors->has('facing'))
                                <strong class="text-danger">{{ $errors->first('facing') }}</strong>
                             @endif
                          </div>
                        </div>
    
                        <div class="form-group row">
                          <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Building Height</label>
                            <div class="col-md-8 col-sm-8 ">
                                <input type="text" name="building_height" class="form-control" placeholder="Building Height">
                              @if($errors->has('building_height'))
                                <strong class="text-danger">{{ $errors->first('building_height') }}</strong>
                              @endif
                            </div>
                        </div>
    
                        <div class="form-group row">
                          <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Land Area</label>
                            <div class="col-md-8 col-sm-8 ">
                              <input type="text" class="form-control" name="land_area"  placeholder="Land Area" >
                              @if($errors->has('land_area'))
                                <strong class="text-danger">{{ $errors->first('land_area') }}</strong>
                              @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Launching Date</label>
                              <div class="col-md-8 col-sm-8 ">
                                <input type="date" class="form-control" name="launching_date" id="launching_date">
                                @if($errors->has('launching_date'))
                                  <strong class="text-danger">{{ $errors->first('launching_date') }}</strong>
                                @endif
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Hand Over Date</label>
                              <div class="col-md-8 col-sm-8 ">
                                <input type="date" class="form-control" name="hand_over_date" id="hand_over_date">
                                @if($errors->has('hand_over_date'))
                                  <strong class="text-danger">{{ $errors->first('hand_over_date') }}</strong>
                                @endif
                              </div>
                          </div>
    
                          <div class="form-group row">
                            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                              <div class="col-md-8 col-sm-8 ">
                                <input  class="btn btn-success" type="submit" value="Submit">
                              <a href="{{route('allProject')}}" class="btn btn-info">Back</a>
                            </div>
                          </div>
                        </div>
                    </div>
              </form>
            <!-- /.card -->
            </div>
          </div>
    </div>
    <div class="col"></div>
  </div>
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

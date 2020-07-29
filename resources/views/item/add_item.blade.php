@extends('master')

@section('breadcrumb-title', 'Add Item Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Add Item Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('storeItem') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Item Name</label>
                      <input  class="form-control" type="text" class="form-controll" name="item_name" placeholder="Item Name">
                      @if($errors->has('item_name'))
                        <strong class="text-danger">{{ $errors->first('item_name') }}</strong>
                      @endif
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Unit</label>
                          <input type="text" name="unit" id="" class="form-control" placeholder="Unit">
                        @if($errors->has('unit'))
                            <strong class="text-danger">{{ $errors->first('unit') }}</strong>
                        @endif                      
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Description</label>
                          <textarea style="width: 100%;" class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
                          @if($errors->has('description'))
                          <strong class="text-danger">{{ $errors->first('description') }}</strong>
                      @endif
                      </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('allItem') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection
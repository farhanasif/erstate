

@extends('master')

@section('breadcrumb-title', 'Add Bank/Cash Information')

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Add Bank/Cash Information</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('banks.store') }}" method="POST">
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
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Account No</label>
                        <input type="text" name="account_no" class="form-control" placeholder="Account">
                        @if($errors->has('account_no'))
                            <strong class="text-danger">{{ $errors->first('account_no') }}</strong>
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
                   <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Submit</button>
                 <a href="{{ route('banks.index') }}" type="submit" class="btn btn-info">Back</a>
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
      @if ($message = Session::get('success'))
        console.log('{{ $message }}');
        Swal.fire({
            icon: 'success',
            title: '{{ $message }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
      @endif
      
      @if ($message = Session::get('error'))
        console.log('{{ $message }}');
        Swal.fire({
            icon: 'error',
            title: '{{ $message }}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 7000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
      @endif
    
    });
      
  </script>
    
@endsection
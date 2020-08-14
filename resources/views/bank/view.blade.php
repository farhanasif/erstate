
@extends('master')

@section('breadcrumb-title', 'Bank/Cash Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Bank/Cash Information</h3>
        <a href="{{route('banks.create')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Bank/Cash</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-banks" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Description</th>
              <th>Account</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($banks as $bank)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bank->name }}</td>
                <td>{{ $bank->description }}</td>
                <td>{{ $bank->account_no }}</td>
                <td>
                    <a href="{{ route('banks.edit',$bank) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <form action="{{route('delete_bank')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$bank->id}}" name="id" placeholder="Search">
                        <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
              @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
    $('#all-banks').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection



@extends('master')

@section('breadcrumb-title', 'All Customer Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Customer Information</h3>
        <a href="{{route('showAddCustomer')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Customer</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-customer" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Father Spouse</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>NID</th>
              <th>Permanent Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($customers as $customer)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->father_spouse }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->nid }}</td>
                <td>{{ $customer->permanent_address }}</td>
                <td>
                    <a href="{{ route('editCustomer',$customer->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteCustomer',$customer->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
    $('#all-customer').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


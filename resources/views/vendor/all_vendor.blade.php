
@extends('master')

@section('breadcrumb-title', 'All Vendor Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Vendor Information</h3>
        <a href="{{route('showAddVendor')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Vendor</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-vendor" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Website</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($vendors as $vendor)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->company_name }}</td>
                <td>{{ $vendor->address }}</td>
                <td>{{ $vendor->phone }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->website }}</td>
                <td>{{ $vendor->description }}</td>
                <td>
                  <div style="width: 150px; display: block;">
                    <a href="{{ route('editVendor',$vendor->id) }}" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteVendor',$vendor->id) }}" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a>
                  </div>
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
    $('#all-vendor').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


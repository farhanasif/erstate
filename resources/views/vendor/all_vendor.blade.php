
@extends('master')

@section('dashboard-title', ' All Vendor Information')
@section('breadcrumb-title', 'All Vendor Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Vendor Information</h3>
        <a href="{{route('showAddVendor')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Vendor</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-vendor" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Name</th>
              <th class="bg-success">Company Name</th>
              <th class="bg-success">Address</th>
              <th class="bg-success">Phone</th>
              <th class="bg-success">Email</th>
              <th class="bg-success">Website</th>
              <th class="bg-success">Description</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($vendors as $vendor)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->position }}</td>
                <td>{{ $vendor->address }}</td>
                <td>{{ $vendor->phone }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->website }}</td>
                <td>{{ $vendor->description }}</td>
                <td>
                    <a href="{{ route('editVendor',$vendor->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteVendor',$vendor->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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


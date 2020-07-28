
@extends('master')

@section('dashboard-title', ' All Product Information')
@section('breadcrumb-title', 'All Product Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Product Information</h3>
        <a href="{{route('showAddProduct')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Product</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-product" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Project Name</th>
              <th class="bg-success">Flat Type</th>
              <th class="bg-success">Floor Number</th>
              <th class="bg-success">Flat Size</th>
              <th class="bg-success">Unit Price</th>
              <th class="bg-success">Total Flat Price</th>
              <th class="bg-success">Car Parking Charge	</th>
              <th class="bg-success">Utility Charge</th>
              <th class="bg-success">Additional Work Charge</th>
              <th class="bg-success">Other Charge</th>
              <th class="bg-success">Discount</th>
              <th class="bg-success">Refund Additional Work Charge</th>
              <th class="bg-success">Net Total</th>
              <th class="bg-success">Description</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($productsInformations as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->project_name }}</td>
                <td>{{ $product->flat_type }}</td>
                <td>{{ $product->floor_number }}</td>
                <td>{{ $product->flat_size }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>{{ $product->total_flat_price }}</td>
                <td>{{ $product->car_parking_charge }}</td>
                <td>{{ $product->utility_charge }}</td>
                <td>{{ $product->additional_work_charge }}</td>
                <td>{{ $product->other_charge }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->refund_additional_work_charge }}</td>
                <td>{{ $product->net_total }}</td>
                <td>{{ $product->description }}</td>
                <td class="row">
                    <a href="{{ route('editProduct',$product->id) }}" class="btn btn-warning row"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteProduct',$product->id) }}" class="btn btn-danger row ml-2"><i class="far fa-trash-alt"></i></a>
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
    $('#all-product').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


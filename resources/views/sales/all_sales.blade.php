
@extends('master')

@section('dashboard-title', ' All Sell Information')
@section('breadcrumb-title', 'All Sell Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Sell Information</h3>
        <a href="{{route('showAddSales')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Sell</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-sale" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Customer Name</th>
              <th class="bg-success">Project Name</th>
              <th class="bg-success">Product Name</th>
              <th class="bg-success">Employee Name</th>
              <th class="bg-success">Customer Name</th>
              <th class="bg-success">Description</th>
              <th class="bg-success">Amount</th>
              <th class="bg-success">Amount paid</th>
              <th class="bg-success">Amount Due</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($salesInformations as $sale)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sale->customer_name }}</td>
                <td>{{ $sale->project_name }}</td>
                <td>{{ $sale->product_id }}</td>
                <td>{{ $sale->employee_name }}</td>
                <td>{{ $sale->customer_name }}</td>
                <td>{{ $sale->description }}</td>
                <td>{{ $sale->amount }}</td>
                <td>{{ $sale->amount_paid }}</td>
                <td>{{ $sale->amount_due }}</td>
                <td>
                    <a href="{{ route('editSales',$sale->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteSales',$sale->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
    $('#all-sale').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


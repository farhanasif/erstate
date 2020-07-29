
@extends('master')

@section('breadcrumb-title', 'All Sell Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Sell Information</h3>
        <a href="{{route('showAddSales')}}" class="btn btn-defult float-sm-right"><i class="fas fa-plus"></i> Add Sell</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-sale" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Customer Name</th>
              <th>Project Name</th>
              <th>Product Name</th>
              <th>Employee Name</th>
              <th>Customer Name</th>
              <th>Description</th>
              <th>Amount</th>
              <th>Amount paid</th>
              <th>Amount Due</th>
              <th>Action</th>
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
         scrollY:        '50vh',
    } );
} );
</script>
@endsection


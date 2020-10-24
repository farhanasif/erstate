
@extends('master')

@section('breadcrumb-title', 'All Debit Vouchers')

@section('content')
@section('stylesheet')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Debit Vouchers</h3>
        <a href="{{route('debitvoucher')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Dr Voucher</a>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
            <tr>
              <th>SL</th>
              <th>Voucher Id</th>
              <th>Voucher Date</th>
              <th>LName</th>
              <th>Bank Name</th>
              <th>Checque No</th>
              <th>Amount</th>
              <th>Project Name</th>
              <th>Particulars</th>
              <th>Action</th>
            </tr>
            </tr>
          </thead>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#all-ltypes').DataTable( {
    //         "info": true,
    //         "autoWidth": false,
    //         scrollX:'50vh', 
    //         scrollY:'50vh',
    //         scrollCollapse: true,
    //     } );
    // });

    $(document).ready( function () {
    $('#all-ltypes').DataTable({
        processing:true,
        serverSide:true,
        "responsive": true,
        "autoWidth": false,
        ajax:"{{url('alldebitvoucher/datatable')}}",
        columns:[
          { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'voucher_id', name: 'voucher_id' },
            { data: 'voucher_date', name: 'voucher_date' },
            { data: 'lname', name: 'lname' },
            { data: 'bank_name', name: 'bank_name' },
            { data: 'cheque_no', name: 'cheque_no' },
            { data: 'amount', name: 'amount'},
            { data: 'project_name', name: 'project_name'},
            { data: 'perticulers', name: 'perticulers'},
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endsection


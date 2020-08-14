
@extends('master')

@section('breadcrumb-title', 'All Credit Vouchers')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Credit Vouchers</h3>
        <a href="{{route('creditvoucher')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Cr Voucher</a>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th>Voucher</th>
              <th>Account Head</th>
              <th>Made of Payment</th>
              <th>Amount</th>
              <th>Project</th>
              <th>Particulars</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($voucher_details as $voucher_detail)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><b>Voucher No<br />{{ $voucher_detail->voucher_id }}</b><br />Date: {{ $voucher_detail->voucher_date }}</td>
                <td>{{ $voucher_detail->lname }}</td>
                <td>{{ $voucher_detail->bank_name }}<br />Cheque: {{ $voucher_detail->cheque_no }}</td>
                <td>{{ $voucher_detail->amount }}</td>
                <td><b>{{ $voucher_detail->project_name }}</b></td>
                <td>{{ $voucher_detail->perticulers }}</td>
                <td>
                    {{-- <a href="{{ route('voucher_detail.edit',$voucher_detail) }}" class="btn btn-warning"><i class="far fa-edit"></i></a> --}}
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
        $('#all-ltypes').DataTable( {
            "info": true,
            "autoWidth": false,
            scrollX:'50vh', 
            scrollY:'50vh',
            scrollCollapse: true,
        } );
    });
</script>
@endsection


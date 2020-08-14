
@extends('master')

@section('breadcrumb-title', 'All Journal Vouchers')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Journal Vouchers</h3>
        <a href="{{ route('journalvoucher') }}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Journal Voucher</a>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-journal" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th>Voucher No</th>
              <th>Particulars</th>
              <th>Project Name</th>
              <th>Date</th>
              <th>Head Of Account Name</th>
              <th>Dr</th>
              <th>Cr</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
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
        $('#all-journal').DataTable( {
            "info": true,
            "autoWidth": false,
            scrollX:'50vh', 
            scrollY:'50vh',
            scrollCollapse: true,
        } );
    });
</script>
@endsection


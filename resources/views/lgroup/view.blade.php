
@extends('master')

@section('breadcrumb-title', 'Ledger Groups')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Ledger Groups</h3>
        <a href="{{route('lgroup.create')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Ledger Group</a>
        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($lgroups as $lgroup)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lgroup->name }}</td>
                <td>{{ $lgroup->code }}</td>
                <td>
                    <a href="{{ route('lgroup.edit',$lgroup) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
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
} );
</script>
@endsection


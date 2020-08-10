
@extends('master')

@section('breadcrumb-title', 'Ledger Names')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Ledger Names</h3>
        <a href="{{route('lname.create')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Ledger</a>
        @include('message')
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-ltypes" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Type Name</th>
              <th>Group</th>
              <th>Unit</th>
              <th>Dr/Cr</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($lnames as $lname)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lname->name }}</td>
                <td>{{ $lname->ltype_name }}</td>
                <td>{{ $lname->lgroup_name }}</td>
                <td>{{ $lname->unit }}</td>
                <td>{{ $lname->is_debit == 1 ? 'Dr' : 'Cr' }}</td>
                <td>
                    <a href="{{ route('lname.edit',$lname->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <form action="{{route('ledgername_delete')}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ledger?');">
                      @csrf
                      <input type="hidden" value="{{$lname->id}}" name="id" placeholder="Search">
                      <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                  </form>
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


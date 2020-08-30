
@extends('master')

@section('breadcrumb-title', 'All Item Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Item Information</h3>
        <a href="{{route('showAddItem')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Item</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-item" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Item Name</th>
              <th>Item Description</th>
              <th>Unit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->unit }}</td>
                <td>
                  <div style="width: 150px; display: block;">
                    <a href="{{ route('editItem',$item->id) }}" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteItem',$item->id) }}" class="btn btn-danger" title="Delete"><i class="far fa-trash-alt"></i></a>
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
    $('#all-item').DataTable( {
        // scrollY:        '50vh',
        // scrollCollapse: true,
        "responsive": true,
      "autoWidth": false,
    } );
} );
</script>
@endsection


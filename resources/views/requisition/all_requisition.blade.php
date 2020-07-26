
@extends('master')

@section('dashboard-title', ' All Requisition Information')
@section('breadcrumb-title', 'All Requisition Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Requisition Information</h3>
        <a href="{{route('showAddRequisition')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Requisition</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-requisition" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Project Name</th>
              <th class="bg-success">Employee Name</th>
              <th class="bg-success">Contact Person</th>
              <th class="bg-success">Remark</th>
              <th class="bg-success">Requisition Date</th>
              <th class="bg-success">Required Date</th>
              <th class="bg-success">Remark</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($requisitionInformations as $requisition)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $requisition->project_name }}</td>
                <td>{{ $requisition->employee_name }}</td>
                <td>{{ $requisition->contact_person }}</td>
                <td>{{ $requisition->remark }}</td>
                <td>{{ $requisition->purpose }}</td>
                <td>{{ date('j F, Y', strtotime($requisition->requisition_date)) }}</td>
                <td>{{ date('j F, Y', strtotime($requisition->required_date)) }}</td>
                <td class="row">
                    <a href="{{ route('editRequisition',$requisition->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteRequisition',$requisition->id) }}" class="btn btn-danger ml-2"><i class="far fa-trash-alt"></i></a>
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
    $('#all-requisition').DataTable( {
        "info": true,
          "autoWidth": false,
          scrollX:'50vh', 
          scrollY:'50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


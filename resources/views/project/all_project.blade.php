
@extends('master')

@section('breadcrumb-title', 'All Project Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Project Information</h3>
        <a href="{{route('showAddProject')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Project</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-project" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>Name</th>
              <th>Location</th>
              <th>Facing</th>
              <th>Building Height</th>
              <th>Land Area</th>
              <th>Launching Date</th>
              <th>Hand Over Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($projects as $project)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->location }}</td>
                <td>{{ $project->facing }}</td>
                <td>{{ $project->building_height }}</td>
                <td>{{ $project->land_area }}</td>
                <td>{{ date('j F, Y', strtotime($project->launching_date)) }}</td>
                <td>{{ date('j F, Y', strtotime($project->hand_over_date)) }}</td>
                <td>
                    <a href="{{ route('editProject',$project->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="{{ route('deleteProject',$project->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
    $('#all-project').DataTable( {
        // scrollY:        '50vh',
        // scrollCollapse: true,
        "responsive": true,
      "autoWidth": false,
    } );
} );
</script>
@endsection


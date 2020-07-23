
@extends('master')

@section('dashboard-title', ' All Project Information')
@section('breadcrumb-title', 'All Project Information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All Project Information</h3>
        <a href="{{route('showAddProject')}}" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Add Project</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-project" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th class="bg-success">SL NO</th>
              <th class="bg-success">Name</th>
              <th class="bg-success">Description</th>
              <th class="bg-success">Location</th>
              <th class="bg-success">Facing</th>
              <th class="bg-success">Building Height</th>
              <th class="bg-success">Land Area</th>
              <th class="bg-success">Launching Date</th>
              <th class="bg-success">Hand Over Date</th>
              <th class="bg-success">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($projects as $project)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
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
        scrollY:        '50vh',
        scrollCollapse: true,
    } );
} );
</script>
@endsection


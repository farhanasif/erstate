@extends('master')
@section('content')

@section('breadcrumb-title', 'Profit & Loss A/C (Income Statement)')

        <!-- Main content -->
        <section class="content">

          <!-- general form elements disabled -->
          <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Select month range to continue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form role="form" action="" method="get">
                    <div class="row">
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; Project Name</label>
                          <div class="col-md-12 col-sm-12">
                         <select name="project_name" id="project_name" class="form-control select2bs4">  
                            <option value="">--select project name</option>
                          @foreach($projects as $project)
                            <option value="{{ $project->name }}">{{ $project->name }}</option>
                          @endforeach
                        </select>  
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; From Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" class="form-control" name="from_date" placeholder="From Date For Profit & Loss" id="from_data">
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; To Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" class="form-control" name="to_date" placeholder="To Date For Profit & Loss" id="to_data">
                          </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href=""><button type="submit" id="generate" class="btn btn-success">Generate</button></a>
                </div>
              </form>
                <!-- /.card-footer -->
            </div>
        </section>
        <!-- /.content -->
@endsection
@section('customjs')

<script>
$(document).ready(function() {

  $(function() {
     $( "#from_data" ).datepicker({
          dateFormat: "YYYY-MM-DD HH:mm:ss",
          orientation: "bottom left"
     });
    $( "#to_data" ).datepicker({
          dateFormat: "YYYY-MM-DD HH:mm:ss",
          orientation: "bottom left"
     });
    });
  });
</script>

@endsection

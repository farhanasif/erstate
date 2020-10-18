@extends('master')
@section('content')
@section('custom_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" type="text/css" media="all" href="{{ URL::to('css/report_print.css') }}" />

@endsection

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
                             <input type="text" id="from_data" class="form-control" name="from_date" placeholder="From Date For Profit & Loss">
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; To Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" id="to_data" class="form-control" name="to_date" placeholder="To Date For Profit & Loss">
                          </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    <a href=""><button type="submit" id="generate" class="btn btn-success">Generate</button></a>
                </div> -->
              </form>
                <!-- /.card-footer -->
            </div><br>
            <div id="indivi" class="card card-secondary">
              
            </div>
        </section>
        <!-- /.content -->
@endsection
@section('custom_js')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $( "#from_data" ).datepicker({dateFormat: 'yy-mm-dd'});
    $( "#to_data" ).datepicker({dateFormat: 'yy-mm-dd'});
    //$("#from_date").datepicker('show');
  } );

  $('#to_data').change(function (e) {
        e.preventDefault();

        // var studentId=$("#studentList").val();
        // var examName=$("#examName").val();

        //console.log(classId, sectionId);

        $.ajax({
                type: "get",
                url:"{{url('print/profit_loss/account')}}",
                
                success: function (data) {
                    
                    $('#indivi').html(data);
                }
            });
       // ajax:"{{url('individual/admitCardSectionWiseList/')}}"+'/'+classId+'/'+sectionId,
        
    //table.destroy();

    });
</script>

@endsection
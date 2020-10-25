@extends('master')
@section('content')
@section('custom_css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" type="text/css" media="all" href="{{ URL::to('css/report_print.css') }}" />
@endsection

@section('breadcrumb-title', 'Daily Income Summary Sheet')

        <!-- Main content -->
        <section class="content">

          <!-- general form elements disabled -->
          <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Select month range to continue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form role="form" action="#" method="get">
                    <div class="row">
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; Project Name</label>
                          <div class="col-md-12 col-sm-12">
                         <select name="project_name" required id="project_name" class="form-control select2bs4">  
                            <option value="">--select project name</option>
                          
                            <option value="#">Noubody Housing Limited</option>
                         
                        </select>  
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; From Month</label>
                          <div class="col-md-12 col-sm-12">
                          <!-- <input type="text" id="from_date"> -->
                             <input type="text" required name="from_date" id="from_date" class="form-control" placeholder="From Date For Trading Account">
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label>&nbsp;&nbsp; To Month</label>
                          <div class="col-md-12 col-sm-12">
                             <input type="text" required id="to_date" class="form-control" name="to_date" placeholder="To Date For Trading Account">
                          </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href=""><button type="submit" id="generate" class="btn btn-success">Generate</button></a>
                </div>
              </form>
                <!-- /.card-footer -->
          </div><br>
             
          
            <!-- <div id="indivi" class="card card-secondary">
              
            </div> -->


        </section>
        <!-- /.content -->
@endsection
@section('custom_js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $( "#from_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    $( "#to_date" ).datepicker({dateFormat: 'yy-mm-dd'});
    //$("#from_date").datepicker('show');
  } );


  // $('#to_data').change(function (e) {
  //       e.preventDefault();

  //       // var studentId=$("#studentList").val();
  //       // var examName=$("#examName").val();

  //       //console.log(classId, sectionId);

  //       $.ajax({
  //               type: "get",
  //               url:"{{url('print/trading/accounts')}}",
                
  //               success: function (data) {
                    
  //                   $('#indivi').html(data);
  //               }
  //           });
  //      // ajax:"{{url('individual/admitCardSectionWiseList/')}}"+'/'+classId+'/'+sectionId,
        
  //   //table.destroy();

  //   });


</script>

@endsection
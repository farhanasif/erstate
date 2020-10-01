
@extends('master')

@section('breadcrumb-title', 'All landowner information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">All landowner information</h3>
        <a href="{{route('showAddLandowner')}}" class="btn btn-default float-sm-right"><i class="fas fa-plus"></i> Add Landowner</a>

        @include('message')

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="all-landowner" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>SL NO</th>
              <th>File No</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Mother Name</th>
              <th>NID No </th>
              <th>Mobile</th>
              <th>Permanent Address</th>
              <th>Present Address</th>
              <th>Media Man</th>
              <th>Investigation Person</th>
              <th>Mouza</th>
              <th>PS</th>
              <th>District </th>
              <th>CS Khatian</th>
              <th>RS Khatian</th>
              <th>SA Khatian</th>
              <th>CS/SA Dag</th>
              <th>RS Dag</th>
              <th>Total Land Of RS</th>
              <th>Purchase Of Land</th>
              <th>Remaining Balance </th>
              <th>Tp Land Price</th>
              <th>Per Bigha Price</th>
              <th>Registration Date</th>
              <th>Deed Number</th>
              <th>Action</th>
            </tr>
          </thead>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

@section('custom_js')
<script>

$(document).ready( function () {
    $('#all-landowner').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('landowner/all-datatable')}}",
        columns:[
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'file_no', name: 'file_no' },
            { data: 'name', name: 'name' },
            { data: 'father_name', name: 'father_name' },
            { data: 'mother_name', name: 'mother_name' },
            { data: 'district', name: 'district', },
            { data: 'cs_khatian', name: 'cs_khatian' },
            { data: 'rs_khatian', name: 'rs_khatian' },
            { data: 'sa_khatian', name: 'sa_khatian' },
            { data: 'cs_sa_dag', name: 'cs_sa_dag' },
            { data: 'rs_dag', name: 'rs_dag', },
            { data: 'action', name: 'action' }
        ]
    });
});
//delete 
function deleteLandowner(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    //Delete by ajax from list-datatable
                    var url="{{url('landowner/delete-landowner')}}";
                    $.ajax({
                        //config part
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        //config part
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting The Landowner data.....',
                                html:"<i class='fa fa-spinner fa-spin' style='font-size: 24px;'></i>",
                                confirmButtonColor: '#3085d6',
                                allowOutSideClick:false,
                                showCancelButton:false,
                                showConfirmButton:false
                            });
                        },
                        success:function (response) {
                            Swal.close();
                            if(response==="success") {
                                Swal.fire({
                                    title:'success',
                                    text: 'You Have Successfully Deleted The Land buy book',
                                    type:'success',
                                    confirmButtonText: 'OK'
                                }).then(function(result){
                                    if (result.value) {
                                        window.location.reload();
                                    }
                                });
                            }
                            console.log(response);
                        },
                        error:function (error) {
                            Swal.fire({
                                title: 'Error',
                                text:'Something Went Wrong',
                                type:'error',
                                showConfirmButton: true
                            });
                            console.log(error);
                        }
                    })
                }
            });
        }
</script>
@endsection





@extends('master')

@section('breadcrumb-title', 'Landowner Details information')

@section('content')

<section class="content">

  <div class="card card-success card-outline">
    <div class="card-header">
        <h3 class="card-title">Landowner Details information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table id="all-landowner" class="table table-bordered table-striped">
            <h4 class="text-center">General information</h4>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Address</th>
                    <th>NID</th>
                    </tr>
              </thead>
              <tbody>
                <tr>
                    <td>{{ $landowner_details->name }}</td>
                    <td>{{ $landowner_details->father_name }}</td>
                    <td>{{ $landowner_details->mother_name }}</td>
                    <td> <b>Permanent Address:</b> {{ $landowner_details->permanent_address }} <br> <b>Present Address:</b> {{ $landowner_details->present_address }}</td>
                    <td>{{ $landowner_details->nid_no }}</td>
                </tr>
    
              </tbody>
              
          </table>

      <table id="all-landowner" class="table table-bordered table-striped">
            <h4 class="text-center">Land Schedule</h4>
        <thead>
            <tr>
              <th colspan="3" class="text-center">Khatian</th>
              <th colspan="2" class="text-center">Dag</th>
            </tr>
            <tr>
                <th>CS</th>
                <th>SA</th>
                <th>RS</th>
                <th>CS/SA</th>
                <th>RS</th>
                </tr>
          </thead>
          <tbody>
                <tr>
                    <td>{{ $landowner_details->cs_khatian }}</td>
                    <td>{{ $landowner_details->sa_khatian }}</td>
                    <td>{{ $landowner_details->rs_khatian }}</td>
                    <td>{{ $landowner_details->cs_sa_dag }}</td>
                    <td>{{ $landowner_details->rs_dag }}</td>
                </tr>
          </tbody>
          
      </table>
      <br>

      <table class="table table-bordered">
        <thead>
            <tr>
                <th>Total Land Amount of CS and SA Dag</th>
                <td>{{ $landowner_details->cs_sa_dag }}</td>
                <th>Total Land Amount of RS Dag</th>
                <td>{{ $landowner_details->total_land_of_rs }}</td>
                <th>RS Dag</th>
                <td>{{ $landowner_details->rs_dag }}</td>
            </tr>
        </thead>      
    </table>

    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Total Land Amount of RS {{ $landowner_details->rs_dag }}</th>
                <td>{{ $landowner_details->total_land_of_rs }}</td>
                <th>Purchase of Land</th>
                <td>{{ $landowner_details->purchase_of_land }}</td>
                <th>Due</th>
                <td>{{ $landowner_details->total_land_of_rs - $landowner_details->purchase_of_land }}</td>
            </tr>
        </thead>      
    </table>
    <br>
    <table id="all-landowner" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Total Land Amount</th>
                <th>Per Percent Amount</th>
                <th>Total Bigha Price</th>
                <th>Total Amount</th>
                </tr>
          </thead>
          <tbody>
            <tr>
                <td>{{ $landowner_details->purchase_of_land }}</td>
                <td>{{ number_format($landowner_details->tp_land_price_percent) }}</td>
                <td>{{ number_format($landowner_details->per_bigha_price) }}</td>
                <td>{{ number_format($landowner_details->purchase_of_land * $landowner_details->tp_land_price_percent) }}</td>
            </tr>

          </tbody>
          
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection

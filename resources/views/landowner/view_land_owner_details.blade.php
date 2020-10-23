
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

        <table id="all-landowner" class="table table-bordered">
            <div class="card-header bg-info">
                <h4 class="card-title ">General information</h4>
            </div>
            <br>
            <tbody>
                <tr>
                    <th style="width: 150px">Name</th>
                    <td>{{ $landowner_details->name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Father Name</th>
                    <td>{{ $landowner_details->father_name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Mother Name</th>
                    <td>{{ $landowner_details->mother_name }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">Address</th>
                    <td> <b>Permanent Address:</b> {{ $landowner_details->permanent_address }} <br> <b>Present Address:</b> {{ $landowner_details->present_address }}</td>
                </tr>
                <tr>
                    <th style="width: 150px">NID</th>
                    <td>{{ $landowner_details->nid_no }}</td>                
                </tr>
            </tbody>
          </table>
          <br>

      <table id="all-landowner" class="table table-bordered table-striped">
            <div class="card-header bg-info">
                <h4 class="card-title ">Land Schedule</h4>
            </div>
            <br>
        <thead>
            <tr>
              <th colspan="3" class="text-center">Khatian</th>
              <th colspan="2" class="text-center">Dag</th>
            </tr>
            <tr class="text-center">
                <th>CS</th>
                <th>SA</th>
                <th>RS</th>
                <th>CS/SA</th>
                <th>RS</th>
                </tr>
          </thead>
          <tbody>
                <tr class="text-center">
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
        <tbody>
            <tr>
                <th style="width: 300px;">Total Land Amount of CS and SA Dag</th>
                <td colspan="2" class="text-center">{{ $landowner_details->cs_sa_dag }}</td>
                <td>Percent</td>
            </tr>
            <tr>
                <th style="width: 300px;">Total Land Amount of RS Dag</th>
                <td class="text-center">{{ $landowner_details->rs_dag }}</td>
                <td class="text-center">{{ $landowner_details->total_land_of_rs }}</td>
                <td>Percent</td>
            </tr>
        </tbody>      
    </table>

    <br>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 300px">Total Land Amount of RS {{ $landowner_details->rs_dag }}  </th>
                <td class="text-center" style="width: 150px" >{{ $landowner_details->total_land_of_rs }}</td>
                <td>Percent</td>
            </tr>
            <tr>
                <th style="width: 300px">Purchase of Land  </th>
                <td class="text-center" style="width: 150px" >{{ $landowner_details->purchase_of_land }}</td>
                <td>Percent</td>
            </tr>
            <tr>
                <th style="width: 300px" class="text-right">Available  </th>
                <td class="text-center" style="width: 150px" >{{ $landowner_details->total_land_of_rs - $landowner_details->purchase_of_land }}</td>
                <td>Percent</td>
            </tr>
        </tbody>      
    </table>
    <br>
    <table id="all-landowner" class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 300px">Total Land Amount  </th>
                <td style="width: 200px; text-align:center;">{{ $landowner_details->purchase_of_land }}</td>
                <td>Percent</td>
            </tr>
            <tr>
                <th style="width: 300px">Per Percent Amount </th>
                <td style="width: 200px; text-align:center;">{{ number_format($landowner_details->tp_land_price_percent)."/-" }}</td>
                <td>TK</td>
            </tr>
            <tr>
                <th style="width: 300px">Total Bigha Price  </th>
                <td style="width: 200px; text-align:center;">{{ number_format($landowner_details->per_bigha_price)."/-" }}</td>
                <td>TK</td>
            </tr>
            <tr>
                <th style="width: 300px">Total Amount  </th>
                <td style="width: 200px; text-align:center;">{{ number_format($landowner_details->purchase_of_land * $landowner_details->tp_land_price_percent)."/-" }}</td>
                <td>TK</td>
            </tr>
          </tbody>          
      </table>
      <br>

      <table id="all-landowner" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>SL</th>
            <th>Installment</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Combined Amount</th>
            <th>Due Amount</th>
            </tr>
      </thead>
      <tbody>
          @php
              $total_amount = $landowner_details->purchase_of_land * $landowner_details->tp_land_price_percent;
              $due_amount = $total_amount;
              $combined_amount = 0;
          @endphp
        @foreach ($installment_details as $key => $installment)
        @php
            $due_amount -= $installment->installment_amount;
            $combined_amount += $installment->installment_amount;
        @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $loop->iteration }} Installment</td>
                <td>{{ $installment->installment_date }}</td>
                <td>{{ number_format($installment->installment_amount)."/-" }}</td>
                <td>{{ number_format($combined_amount)."/-" }}</td>
                <td>{{ number_format($due_amount) ."/-" }}</td>
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

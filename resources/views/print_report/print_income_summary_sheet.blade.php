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
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
            
                <div class="card-body">
                <button class="text-right text-warning" onclick="print_current_page()">Print this page</button>
                  <h5 style="text-align:center">Noboudoy Purbachal City<br/>Daily Income Summary Sheet</h5><p style="text-align:center">For Financial Year 2019-2020</p>
                </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Serial No</th>
                      <th style="width: 10px">Voucher No</th>
                      <th style="width: 40px">Head Of Income</th>
                      <th style="width: 10px">Cash</th>
                      <th style="width: 20px">Bank</th>
                      <th style="width: 10px">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>7667667676</td>
                      <td>Sales promosational ex.-news papes</td>
                      <td>97878778</td>
                      <td>Sonali Bank</td>
                      <td>97878778</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>7667667676</td>
                      <td>Sales promosational ex.-news papes</td>
                      <td>97878778</td>
                      <td>Sonali Bank</td>
                      <td>97878778</td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>7667667676</td>
                      <td>Sales promosational ex.-news papes</td>
                      <td>97878778</td>
                      <td>Sonali Bank</td>
                      <td>97878778</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td style=" font-weight: bold;">Total Expenditure Taka</td>
                      <td></td>
                      <td></td>
                      <td style=" font-weight: bold;">7878797878778 /=</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="row">
                <div class="col-sm-4">
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Prepared By</h5><br>
                        <p class="card-text">Executive <br/>Finance & Accounts</p>           
                    </div>    
                </div>
                <div class="col-sm-4">   
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Checked By</h5><br>
                        <p class="card-text">General Manager <br/>Finance & Accounts</p>     
                    </div> 
                </div>
                <div class="col-sm-4">   
                    <div class="card-body">
                        <h5 style="font-size: 110%;" class="card-title">Approved By</h5>
                        <p class="card-text">Chirman/Managing Director</p>
                    </div> 
                </div>
              </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('custom_js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

function print_current_page()
    {
      window.print();
    }
</script>

@endsection
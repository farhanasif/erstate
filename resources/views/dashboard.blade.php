@extends('master')

@section('dashboard-title', 'Admin Dashboard')
@section('breadcrumb-title', 'Admin Dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-project-diagram"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Project</span>
              <span class="info-box-number" id="totalProject">
                {{-- <small>%</small> --}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-boxes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Product</span>
              <span class="info-box-number" id="totalProducts">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-dolly"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sell</span>
              <span class="info-box-number" id="totalSells">
              
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-dolly"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Requisition</span>
              <span class="info-box-number" id="totalRequisitions">
              
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">purchase RQN</span>
              <span class="info-box-number" id="totalRqnConfirmed">10
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-red elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> Purchase Order</span>
              <span class="info-box-number" id="totalOrder">
                
                {{-- <small>%</small> --}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Type</span>
              <span class="info-box-number" id="totalLedgerType">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Group</span>
              <span class="info-box-number" id="totalLedgerGroup">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>

    <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ledger Name</span>
              <span class="info-box-number" id="totalLedgerName">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-green elevation-1"><i class="fas fa-university"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bank Or Cash</span>
              <span class="info-box-number" id="totalBankOrCash">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number" id="totalUser">
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-red elevation-1"><i class="fas fa-user-lock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Role Manage</span>
              <span class="info-box-number">12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-receipt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Report</span>
              <span class="info-box-number">14</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
@endsection

@section('custom_js')
<script>
 $.ajax({url: "{{url('/total/project')}}", success: function(result){
    $("#totalProject").html(result);
      //var total_q = parseInt(result);
      $.ajax({url: "{{url('/total/product')}}", success: function(result){
              $("#totalProducts").html(result);

          }});
      $.ajax({url: "{{url('/total/sell')}}", success: function(result){
            $("#totalSells").html(result);
        }});
      $.ajax({url: "{{url('/total/requisition')}}", success: function(result){
            $("#totalRequisitions").html(result);
      }});
      $.ajax({url: "{{url('/total/order')}}", success: function(result){
            $("#totalOrder").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerType')}}", success: function(result){
            $("#totalLedgerType").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerGroup')}}", success: function(result){
            $("#totalLedgerGroup").html(result);
      }});
      $.ajax({url: "{{url('/total/ledgerName')}}", success: function(result){
            $("#totalLedgerName").html(result);
      }});
      $.ajax({url: "{{url('/total/bankorcash')}}", success: function(result){
           $("#totalBankOrCash").html(result);
      }});
      $.ajax({url: "{{url('/total/user')}}", success: function(result){
           $("#totalUser").html(result);
      }});
    }});
</script>
@endsection

<!DOCTYPE html>
<html>
  <title>&nbsp;</title>
  <head>
    <meta charset="UTF-8">
    <title>&nbsp;</title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/report_print.css') }}" />

  </head>
  <body>
    {{-- <button class="print-button">Print Page</button> --}}
    <button onclick="print_current_page()">Print this page</button>
    <div class="lik-uftcl-ptf-main-body">
      <div class="lik-uftcl-ptf-print-body">
        <form>
          <div class="lik-uftcl-pdf-header"></div>
          <div class="lik-uftcl-pdf-body">
            <div class="main-2" style="width: 798px!important; border-radius: 0px!important; padding: 0px!important;">
              <div class="body-top" >
                <p class="ptf-ln-3">
                  <span><br> {{ $projectDetails[0]->name }}  <br/>  Balance Sheet</span>
                  <span></span>
                  <span>From {{ $from_dat }} to {{ $to_dat }}</span>
                </p>
              </div>

             <div style="width:800px">

              <div style="width:48%; float:left; margin:5px">
                <table>
                  <thead>
                    <tr>
                      <th> Capital & Liabilities </th>
                      <th>TK</th>
                    </tr>
                  </thead>
            
                  <tbody>
                    @php $liability_sum = 0;@endphp
                    @foreach ($liabilities as $liability)

                  @php
                    $liability_sum+= $liability->amount;
                 @endphp
                    <tr>
                      <td> {{ $liability->l_name }} </td>
                      <td style="text-align:right;"> {{ $liability->amount }} </td>
                    </tr> 
                    @endforeach

                    <tr>
                      <td> Previous Years Profit Tk </td>
                    </tr>
                    <tr>
                      <td> This Year Profit Tk </td>
                      <td> {{ $this_year_profit}} </td>
                    </tr>

                  </tbody>
        
                </table>
             </div>
              <div style="width:48%; float:right; margin:5px">
                 <table>
                   <thead>
                     <tr>
                       <th> Property & Assets </th>
                       <th>TK</th>
                     </tr>
                   </thead>

                   <tbody>
                     @php $asset_sum = 0; @endphp

                     @foreach ($adjustments as $adjustment)
                     @php
                       $asset_sum+= $adjustment->vd_amount - $adjustment->amount;
                     @endphp
                     <tr>
                       <td> {{ $adjustment->ledger_name }} </td>
                       <td> {{ $adjustment->vd_amount - $adjustment->amount }} </td>
                     </tr>
                     @endforeach

                     @foreach ($assets as $asset)
                     @php
                        $asset_sum+= $asset->amount;
                     @endphp
                     <tr>
                       <td> {{ $asset->l_name }} </td>
                       <td style="text-align:right;"> {{ $asset->amount }}</td>
                     </tr>  
                     @endforeach

                   </tbody>
                 </table>
              </div>
           </div>
              
              <div style="width:50%;float:left;margin-left:10px">
                <p class="ptf-ln-3" style="width:66%; margin-top:10px!important;"><b>  Total</b></p>
                <p style=""><u></u> {{ $liability_sum +  $this_year_profit }} </p>
              </div>
              
              <div style="width:48%;float:right;margin-right:15px; margin-top:-40px;">
                <p class="ptf-ln-3" style="width:66%;"><b>  Total</b></p>
                <p style="float:right;"><u></u> {{ $asset_sum }} </p>
              </div>
            </div>
             {{-- <h3>There is no data found</h3> --}}

        <!-- table section end -->
        <div class="body-mid" style="padding-top: 25px;">
          <p style="text-align: center;font-size: 12px;line-height: .5;">"Please report to us within 48 hours if this statement is incorrect. Otherwise this statement will be considered to be confirmed by you."</p>
          <hr style="border-top:.5px dotted;">
          <div class="body-mid-left">
            <span style="font-size: 12px;"><b>Print Date</b></span>
            <span style="font-size: 12px;">:</span>
            <span style="font-size: 12px;"><?php echo date('d-M-Y'); ?></span>
          </div>
          <div class="body-mid-right2">
            <span style="font-size: 12px;"><b>Page 1 of 1</b></span>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
// $(".print-button").on("click", function() {
// $("#search-grid").hide();
// $(".main-footer").hide();
// $('#title_data').hide();
// $('.print-button').hide();
// window.print();
// window.location = url;
// });
    function print_current_page()
    {
      window.print();
    }
</script>
</body>
</html>
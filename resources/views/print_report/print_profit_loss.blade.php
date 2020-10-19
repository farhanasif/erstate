<!DOCTYPE html>
<html>
  <title>&nbsp;</title>
  <head>
    <meta charset="UTF-8">
    <title>&nbsp;</title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ URL::to('css/report_print.css') }}" />

  </head>
  <body>
    <button class="print-button">Print Page</button>
    <div class="lik-uftcl-ptf-main-body">
      <div class="lik-uftcl-ptf-print-body">
        <form>
          <div class="lik-uftcl-pdf-header"></div>
          <div class="lik-uftcl-pdf-body">
            <div class="main-2" style="width: 798px!important; border-radius: 0px!important; padding: 0px!important;">
              <div class="body-top" >
                <p class="ptf-ln-3">
                  <span>{{$projectDetails[0]->name}} <br/>  Profit & Loss A/C (Income Statement)</span>
                  <span></span>
                  {{-- <img src="../images/logo/acf-pf.png" alt="acf" style="width: 200px;height: 100px;margin-left: auto;margin-right: auto;"> --}}
                  <span>For Financial Year 2019 - 2020</span>
                </p>
              </div>
            <?php $total_income = 0; $total_profit_head = 0;$total_adj_tk = 0;?>
            @if(count($data))
            <div style="width:900px">
              <div style="width:48%; float:right; margin:5px">
                    <table class="">
                      <thead>
                        <tr class="">
                          <th> Particulars (profit & loss) </th>
                          <th>TK</th>
                        </tr>
                      </thead>
                
                      <tbody>
                        
                        <tr>
                        <td> Balance C/D </td>
                        <td style="text-align:right;">{{ $data['total_income'] - $data['expen'][0]->total_expen }}</td>
                        </tr>
                      </tbody>
            
                    </table>
                 </div>
                 <div style="width:48%; float:left;margin:5px">
                    <table class="">
                      <thead>
                        <tr class="">
                          <th> Particulars (Cr Profit & loss) </th>
                          <th>TK</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach ($data['profite_head'] as $item)
                      <?php $total_profit_head += $item->amount; ?>
                        <tr>
                          <td> {{$item->l_name}} </td>
                          <td style="text-align:right;">{{$item->amount }}</td>
                        </tr>
                      @endforeach 
                      @foreach ($data['adjustment'] as $item)
                      <?php $total_profit_head += $item->amount; ?>
                        <tr>
                          <td> {{$item->particulars}} </td>
                          <td style="text-align:right;">{{$item->amount }}</td>
                        </tr>
                      @endforeach 
                        <tr>
                          <td> Net Profit </td>
                          <td style="text-align:right;"><u><?php echo $data['total_income'] - $data['expen'][0]->total_expen - $total_profit_head; ?></u></td>
                        </tr>  
                      </tbody>
                    </table>
                 </div>
              </div>
              
              <div style="width:48%;float:left;margin-left:8px">
                <p class="ptf-ln-3" style="width:66%; margin-top:10px!important;"><b>  Total</b></p>
                <p style=""><u>{{ $data['total_income'] - $data['expen'][0]->total_expen }}</u></p>
              </div>
              <div style="width:48%;float:right;margin-right:15px">
                <p class="ptf-ln-3" style="width:66%; margin-top:10px!important;"><b>  Total</b></p>
                <p style=""><u>{{ $data['total_income'] - $data['expen'][0]->total_expen }}</u></p>
              </div>
            </div>
            @else
             <h3>There is no data found</h3>
            @endif  
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
$(".print-button").on("click", function() {
$("#search-grid").hide();
$(".main-footer").hide();
$('#title_data').hide();
$('.print-button').hide();
window.print();
window.location = url;
});

</script>
</body>
</html>
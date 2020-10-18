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
            <div class="main-2" style="border-radius: 0px!important; padding: 0px!important;">
              <div class="body-top">
                <p class="ptf-ln-3">
                  <span>Noboudoy Housing Limited <br/> Noboudoy Purbachal City <br/>  Profit & Loss A/C (Income Statement)</span>
                  <span></span>
                  {{-- <img src="../images/logo/acf-pf.png" alt="acf" style="width: 200px;height: 100px;margin-left: auto;margin-right: auto;"> --}}
                  <span>For Financial Year 2019 - 2020</span>
                </p>
              </div>
              <table class="settlement" width="800" style="table-layout:fixed; border-radius: 0px!important; width: 788px;border: none;border-top: 1px solid #000;margin-top: 0px!important;">
                <tbody>
                  <tr class="">
                    <th>Particulars</th>
                    <th>TK</th>
                    <th>Particulars</th>
                    <th>TK</th>
                  </tr>
                </tbody>
              </table>
              <table class="settlement-table" width="800" style="table-layout:fixed; margin-bottom: 10px; width: 788px;border: none;border-top: 1px solid #000;">
                <tbody>
                  <tr>
                    <td> Prime Finance & Investment Ltd. Loan </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Interest on Loan Payable </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Personal Loan  </td>
                    <td>  </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Sales Commission For Reserve Fund </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                   <tr>
                    <td> Development Cost </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Consultency Fee Payable </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>  </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Previous Years Profit Tk. 20554154 </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>  </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> This Year Profit </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>  </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td> <b> 80242921 </b></td>
                    <td></td>
                   <td> <b> 80242921 </b></td>
                  </tr>
                   
              </tbody>
          </table>
        </div>
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
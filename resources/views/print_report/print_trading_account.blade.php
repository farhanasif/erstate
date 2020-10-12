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
                  <span> Noboudoy Purbachal City <br/>  Trading Account</span>
                  <span></span>
                  {{-- <img src="../images/logo/acf-pf.png" alt="acf" style="width: 200px;height: 100px;margin-left: auto;margin-right: auto;"> --}}
                  <span>For Financial Year 2019 to 2020</span>
                </p>
              </div>
              <table class="settlement" width="900" style="table-layout:fixed; border-radius: 0px!important; width: 788px;border: none;border-top: 1px solid #000;margin-top: 0px!important;">
                <tbody>
                  <tr class="">
                    <th> Particulars (Head Wise Expenditure) </th>
                    <th>TK</th>
                    <th> Particulars (Head Wise Income) </th>
                    <th>TK</th>
                  </tr>
                </tbody>
              </table>
              <table class="settlement-table" width="800" style="table-layout:fixed; margin-bottom: 10px; width: 788px;border: none;border-top: 1px solid #000;">
                <tbody>
                  <tr>
                    <td> Purchase of Land </td>
                    <td> </td>
                    <td> Sales of Land</td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Purchase of Commission </td>
                    <td> </td>
                    <td> Less Com</td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Stammp Cost  </td>
                    <td>  </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Registration Exp. </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                   <tr>
                    <td> Mutation </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Land Case </td>
                    <td> </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Land Aquisition </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td> Gross Profit </td>
                    <td> 0 </td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td>  <b> Total </b></td>
                    <td> </td>
                    <td>  <b> Total </b></td>
                    <td></td>
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

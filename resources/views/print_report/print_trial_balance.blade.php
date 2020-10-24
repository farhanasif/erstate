<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/report_print.css') }}" />
    <title>Trial Balance</title>
  </head>
  <body>
    <br>
    {{-- <button class="print-button ml-5" id="print-button">Print Page</button> --}}
    <button onclick="print_current_page()">Print this page</button>

      <br><br>
      <h3 class="text-center">{{ $data[0]->name }}</h3>
      <h3 class="text-center">Trial Balance (Fund Flow Statement)</h3>
      <h3 class="text-center">For Financial Year 2019 to 2020</h3>
    <br><br>


<div class="card ml-5 mr-5">
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SL NO</th>
                <th scope="col">Particulars</th>
                <th scope="col">Debit</th>
                <th scope="col">Credit</th>
              </tr>
            </thead>
            <tbody>
                @php $cr_sum = 0; $dr_sum = 0; @endphp
                @foreach ($data as $item)
                 @php
                 if ($item->voucher_type == 'CR') {
                  $cr_sum+= $item->amount;
                 }
                 if ($item->voucher_type == 'DR') {
                  $dr_sum+= $item->amount;
                 }
                    // $cr_sum+= $item->voucher_type == 'CR' ? $item->amount : 0;
                    // $dr_sum+= $item->voucher_type == 'DR' ? $item->amount : 0;
                 @endphp
                <tr>
                    <th> {{ $loop->iteration }}</th>
                    <td>{{ $item->ledger_name }}</td>
                    <td>{{ $item->voucher_type == 'DR' ? number_format($item->amount) : '0'}}</td>
                    <td>{{ $item->voucher_type == 'CR' ? number_format($item->amount) : '0'}}</td>
                  </tr>
                @endforeach
    
                <tr>
                    <td></td>
                    <td> <b> Total</b> </td>
                    <td> 
                        <b> {{ number_format($dr_sum )}} </b>
                    </td>
                    <td>
                        <b> {{ number_format($cr_sum)}} </b>
                    </td>
    
                </tr>
    
            </tbody>
          </table>
    </div>

</div>
    <script>
function print_current_page()
{
window.print();
}
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
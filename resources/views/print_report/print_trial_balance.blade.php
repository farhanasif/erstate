<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Trial Balance</title>
  </head>
  <body>
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
                @foreach ($data as $item)
                 @php

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
                    <td>Total</td>
                    <td> 
                    @php
                        
                    @endphp 
                    </td>
                    <td></td>
    
                </tr>
    
            </tbody>
          </table>
    </div>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
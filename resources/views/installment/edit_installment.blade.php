@extends('master')

@section('breadcrumb-title', 'Eidt General Information')

@section('custom_css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit General Information</h3>
        </div>

         @include('message')
        <!-- /.card-header -->
        <form action="{{ route('updateInstallment',$installments) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label> Project</label>
                    <select name="project_name" id="" class="form-control">
                        <option value="">--select project name--</option>
                        @foreach ($projects as $project)
                            <option {{ $project->id == $installments->project_id ? 'selected' : '' }} value="{{ $project->id}}">{{ $project->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('from_project'))
                    <strong class="text-danger">{{ $errors->first('from_project') }}</strong>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Land Owner Name</label>
                    <select name="land_owner_name" id="owner_name" class="form-control">
                      <option value="">--select Owner Name</option>
                      @foreach ($owner_names as $owner_name)
                          <option {{ $owner_name->name == $installments->land_owner_name ? 'selected' : '' }} value="{{ $owner_name->name }}">{{ $owner_name->name }}</option>
                      @endforeach
                    </select>
                    @if($errors->has('land_owner_name'))
                    <strong class="text-danger">{{ $errors->first('land_owner_name') }}</strong>
                    @endif
                    </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label> Bank/Cash</label>
                      <select name="amount_type" id="" class="form-control select2bs4">
                        <option value="">--select</option>
                        @foreach ($banks as $bank)
                            <option {{ $bank->id == $installments->amount_type ? 'selected' : '' }} value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('amount_type'))
                        <strong class="text-danger">{{ $errors->first('amount_type') }}</strong>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Amount</label>
                        <input type="text" name="installment_amount" id="" class="form-control" placeholder="0"  value="{{ $installments->installment_amount }}">
                        @if($errors->has('installment_amount'))
                            <strong class="text-danger">{{ $errors->first('installment_amount') }}</strong>
                        @endif                      
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Combined Amount</label>
                        <input type="text" name="combined_amount" id="" class="form-control" placeholder="0"  value="{{ $installments->combined_amount }}">
                        @if($errors->has('combined_amount'))
                            <strong class="text-danger">{{ $errors->first('combined_amount') }}</strong>
                        @endif                      
                    </div>
                </div>

                    <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Due Amount</label>
                        <input type="text" name="due_amount" class="form-control" placeholder="0"  value="{{ $installments->due_amount }}">
                      @if($errors->has('due_amount'))
                          <strong class="text-danger">{{ $errors->first('due_amount') }}</strong>
                      @endif                      
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Date</label>
                        <input type="text" name="installment_date" id="installment_date" class="form-control" placeholder="Installment Date" value="{{ $installments->installment_date }}">
                        @if($errors->has('installment_date'))
                        <strong class="text-danger">{{ $errors->first('installment_date') }}</strong>
                    @endif
                    </div>
                </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <div class="card-footer">
                 <button type="submit" class="btn btn-success ">Update</button>
                 <a href="{{ url('/installment/create') }}" type="submit" class="btn btn-info">Back</a>
              </div>
        </form>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

  @section('custom_js')

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>

    $(document).ready(function() {
          $("#project_name").change("change", function() {
            // e.preventDefault();
            var project_name = $("#project_name").val();

            var token = "{{ csrf_token() }}";
            var url_data = "{{ url('/land-owner-data') }}";
                $.ajax({
                    method: "GET",
                    url: url_data,
                    dataType: "json",
                    data: {
                        _token: token,
                        project_name: project_name,
                    },
                    success: function(data) {

                        if(data){
                          console.log(data);
                            $("#owner_name").empty();
                            $("#owner_name").append($("<option />").val('').text('select'));
                            $.each(data,function(index,element){
                            $("#owner_name").append($("<option />").val(element.id).text(element.name))
                        })
                        }else{
                        $('#owner_name').empty();
                        }
                                            
                    }
                });
        });
    });

    $(function () {
      $( "#installment_date" ).datepicker({dateFormat: 'yy-mm-dd'});
 })

</script>
    
@endsection
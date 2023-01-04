@extends('layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<div id="content">
  <div class="container-fluid">
    <h3 class="text-dark mb-4" style="margin-top: 20px;">Daily Time Record</h3>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Select Employee</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table mt-2" id="employeeTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="selectEmployee">
            <thead>
              <tr>
                <th>Name</th>
                <th>Employee ID</th>
                <th>Position</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach($emps as $emp)
                  <tr class="clickable-row" data-id="{{$emp->id}}">
                    <td>
                      <img class="rounded-circle me-2" width="30" height="30" src="{{ asset('uploads/' . $emp->image) }}">{{ $emp->firstname }} {{ $emp->lastname }}
                    </td>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->position }}</td>
                    <td>{{ $emp->email }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <h3 class="text-dark mb-4" style="margin-top: 20px;"></h3>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Generate DTR</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="printDTR">
            <thead>
              <tr>
                <th>Date</th>
                <th>Morning In</th>
                <th>Morning Out</th>
                <th>Afternoon In</th>
                <th>Afternoon Out</th>
                {{--<th>Undertime</th>--}}
              </tr>
            </thead>
            <tbody id="second-table">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Scripts for Data Table--> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  
    <script>
      $(document).ready(function() {
          $('#selectEmployee').DataTable( {
          } );
      } );

      $(document).ready(function() {
        $('.clickable-row').click(function() {
          var id = $(this).data('id');
          $.ajax({
            url: '/get-data-for-table',
            type: 'GET',
            success: function(response) {
              // select the second table
              var table = $('#second-table');

              // clear the existing rows
              table.find('tr').remove();

              // add the new rows
              for (var i = 0; i < response.length; i++) {
                // format the date and time strings
                var amin = new Date(response[i].amin).toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                var amout = new Date(response[i].amout).toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                var pmin = new Date(response[i].pmin).toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                var pmout = new Date(response[i].pmout).toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                if (id == response[i].idemp) {
                  // create the table row with the formatted date and time strings
                  var row = '<tr><td>' + response[i].date + '</td><td>' + amin + '</td><td>' + amout + '</td><td>' + pmin + '</td><td>' + pmout + '</td></tr>';
                  table.append(row);
                }
              }

              $('#printDTR').DataTable({
                destroy: true,
                paging: false,
                searching: false,
                dom: 'Bfrtip',
                buttons: ['print']
              });
            }
          });
        });
      });
    </script>
</div>
@endsection

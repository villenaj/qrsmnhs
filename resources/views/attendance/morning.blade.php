@extends('layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div id="content">
  <div class="container-fluid">
    <h3 class="text-dark mb-4" style="margin-top: 20px;">Attendance</h3>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Today's Attendance:</p>
        <p class="text-danger m-0 fw-bold">{{ now()->format('l, F j, Y') }}</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="morningTable">
            <thead>
              <tr>
                <th>Date</th>
                <th>Employee</th>
                <th>Morning In</th>
                <th>Morning Out</th>
                <th>Afternoon In</th>
                <th>Afternoon Out</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mornings as $index => $morning)
                @if($morning->amin)
                  <tr>
                    <td>{{ date('F j, Y', strtotime($morning->date)) }}</td>
                    <td>{{ $employees[$index]->firstname }} {{ $employees[$index]->lastname }}</td>
                    <td>{{ date('H:i', strtotime($morning->amin)) }}</td>
                    @if($morning->amout)
                      <td>{{ date('H:i', strtotime($morning->amout)) }}</td>
                    @else
                      <td></td>
                    @endif
                    @if($morning->pmin)
                      <td>{{ date('H:i', strtotime($morning->pmin)) }}</td>
                    @else
                      <td></td>
                    @endif
                    @if($morning->pmout)
                      <td>{{ date('H:i', strtotime($morning->pmout)) }}</td>
                    @else
                      <td></td>
                    @endif
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts for Data Table--> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/kt-2.8.0/sb-1.4.0/sl-1.5.0/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/kt-2.8.0/sb-1.4.0/sl-1.5.0/datatables.min.js"></script>
  
  <script>
      $(document).ready(function() {
    $('#morningTable').DataTable();
  } );
  </script>
</div>
@endsection
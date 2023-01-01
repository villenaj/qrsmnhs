@extends('layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script> 
<script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script> 
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> 

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">

<div id="content">
  <div class="container-fluid">
    <h3 class="text-dark mb-4" style="margin-top: 20px;">Employee</h3>
    @if (session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
    @endif
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Employee Info
          <button type="button" data-bs-toggle="modal" data-bs-target="#modal-1" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Employee</button>
        </p>
      </div>
      <div class="card-body">
        <div class="table-responsive table mt-2" id="employeeTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="employeeHeader">
            <thead>
              <tr>
                <th>Name</th>
                <th>Employee ID</th>
                <th>Position</th>
                <th>Email</th>
                <th>Phone&nbsp; &nbsp;</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
                <tr>
                  <td>
                    <img class="rounded-circle me-2" width="30" height="30" src="{{ asset('uploads/' . $employee->image) }}">{{ $employee->firstname }} {{ $employee->lastname }}
                  </td>
                  <td>{{ $employee->id }}</td>
                  <td>{{ $employee->position }}</td>
                  <td>{{ $employee->email }}</td>
                  <td>{{ $employee->phone }}</td>
                  <td>
                    <a href="#edit{{$employee->id}}" data-bs-toggle="modal" class="btn btn-success"><i class='fa fa-edit'></i></a> 
                    <a href="#delete{{$employee->id}}" data-bs-toggle="modal" class="btn btn-danger"><i class='fa fa-trash'></i></a>
                    @include('action')
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="text-md-end dataTables_filter" id="dataTable_filter">
            </div>
          </div>
        </div>
      </div>
      @include('modal')
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#employeeHeader').DataTable();
    } );
  </script>
</div>
@endsection
@extends('layout')
@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4" style="margin-top: 20px;">All Events</h3>
    <div class="card shadow">
      <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Events Info
          <button type="button" data-bs-toggle="modal" data-bs-target="#modal-1" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Events</button>
        </p>
      </div>
      <div class="card-body">
      <div class="table-responsive table mt-2" id="employeeTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="eventHeader">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Who</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
                <tr>
                  <td>{{ $event->title }}</td>
                  <td>{{ $event->description }}</td>
                  <td>{{ $event->who }}</td>
                  <td>{{ $event->location }}</td>
                  <td>
                    <button class="btn btn-success" type="button" data-bs-target="#edit{{$event->id}}" data-bs-toggle="modal" style="margin: 10px;">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" data-bs-target="#delete{{$event->id}}" data-bs-toggle="modal" style="margin: 10px;">
                      <i class="fa fa-trash"></i>
                    </button>
                    @include('event/eventaction')
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
    </div>
    @include('event/eventadd')
</div>
@endsection
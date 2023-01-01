@extends('layout')
@section('content')
@include('event/eventscript')

<?php
  // include the getEventCalendar() function
  require 'getEventCal.php';

  // generate the calendar HTML
  $calendar_html = getEventCalendar();
?>

<div id="content">
  <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
      <h3>Events</h3>
    </div>
  </nav>

  <a href ="/event/eventmodify" class="btn btn-primary" type="button" style="margin: 10px;">
    <i class="fa fa-calendar-alt"></i> Modify Event
  </a>

  <div class="container-fluid">
    <!-- Start: Chart -->
    <div class="row">
      <div class="col-lg-7 col-xl-8">
        <div class="card shadow mb-4">
          @include('event/showevent')
          <div class="card-body">
            <div id="txtHint" class="table-responsive">
              <table class="table table-bordered" id="event-table">
                <thead>
                  <tr>
                    <th style="width: 20%;">Attribute</th>
                    <th style="width: 80%;">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Title</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>
                      <div style="height: 100px; overflow: auto;">
                        
                      </div>
                    </td>
                  </tr>
                    <td>Who</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Start</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>End</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Location</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="text-primary fw-bold m-0">Events Calendar</h6>
          </div>
          <div class="card-body">
            <?= $calendar_html ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End: Chart -->
  </div>
</div>
@endsection
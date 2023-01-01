@extends('layout')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  $(document).ready(function()
  {
    setInterval(function() {
      $("#autoloadattend").load("autoloadattend.php");
      $("#presentabsent").load("getStatus.php");
    },10000);
  });
</script>
<style>
  .scrollable-table {
    max-height: 400px; /* Set the maximum height of the table */
    overflow-y: scroll; /* Enable vertical scrolling */
  }
  .preab-table {
    max-height: 400px; /* Set the maximum height of the table */
    overflow-y: scroll; /* Enable vertical scrolling */
  }
</style>

<div id="content">
  <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
      <h3>SMNHS QR Code Attendance</h3>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
      <h3 class="text-dark mb-0">Dashboard</h3>
      <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="/dtr">
        <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report 
      </a>
    </div>
    <div class="row">
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-primary py-2">
          <div class="card-body">
            <div class="row align-items-center no-gutters">
              <div class="col me-2">
                <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                  <span>Log Today: {{ now()->format('l, F j, Y') }}</span>
                </div>
                <div class="text-dark fw-bold h5 mb-0">
                  <span>{{$countday}}</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-success py-2">
          <div class="card-body">
            <div class="row align-items-center no-gutters">
              <div class="col me-2">
                <div class="text-uppercase text-success fw-bold text-xs mb-1">
                  <span>Monthly Log: {{ now()->format('F') }}</span>
                </div>
                <div class="text-dark fw-bold h5 mb-0">
                  <span">{{$countmonth}}</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-table fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-info py-2">
          <div class="card-body">
            <div class="row align-items-center no-gutters">
              <div class="col me-2">
                <div class="text-uppercase text-info fw-bold text-xs mb-1">
                  <span>Employees</span>
                </div>
                <div class="row g-0 align-items-center">
                  <div class="col-auto">
                    <div class="text-dark fw-bold h5 mb-0 me-3">
                      <span>{{$countemp}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-warning py-2">
          <div class="card-body">
            <div class="row align-items-center no-gutters">
              <div class="col me-2">
                <div class="text-uppercase text-warning fw-bold text-xs mb-1">
                  <span>Upcoming Events</span>
                </div>
                <div class="text-dark fw-bold h5 mb-0">
                  <span>{{$countevent}}</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start: Chart -->
    <div class="row">
      <div class="col-lg-7 col-xl-8">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 10px;">
            <h6 class="text-primary fw-bold m-0">Record Info: {{ now()->format('l, F j, Y')}}</h6>
          </div>
          <div class="scrollable-table" style="height: 400px;">
            <div id="autoloadattend"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center" style="margin-top: 10px; margin-bottom: 10px;">
            <h6 class="text-primary fw-bold m-0">Employee Status</h6>
          </div>
          <div class="preab-table" style="height: 355px;">
            <div id="presentabsent"></div>
          </div>
          <div class="text-center small mt-4">
            <span class="me-2">
              <i class="fas fa-circle text-success"></i>&nbsp;Present
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- End: Chart -->
  </div>
</div>
@endsection
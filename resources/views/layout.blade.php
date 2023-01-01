<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMNHS QR Code Attendance</title>
    <link rel="icon" href="{{ url('logosmnhs.png') }}">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=533c8387f24c500d84de071fc73ec933">
    <link rel="stylesheet" href="/assets/bootstrap/css/formstyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=c2cd6f3f03048985338d131849447f65">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    
</head>
<body id="page-top">
    <div id="wrapper">
      <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon">
                <img src="{{ url('logosmnhs.png') }}" alt="..." height="50">
                </div>
                <div class="sidebar-brand-text mx-3">
                    <span>SMNHS</span>
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                @if ($user = Session::get('user'))
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link {{ (request()->is('attendance/morning') || request()->is('attendance/afternoon')) ? 'active' : '' }}" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <i class="fas fa-table"></i>Attendance </a>
                        <div class="dropdown-menu" style="background: var(--bs-blue);border-style: none;">
                            <a class="dropdown-item" href="/attendance/morning" style="color: var(--bs-light);">Today: {{ now()->format('F j, Y') }}</a>
                            <a class="dropdown-item" href="/attendance/afternoon" style="color: var(--bs-light);">Month: {{ now()->format('F') }}</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('employee')) ? 'active' : '' }}" href="/employee">
                            <i class="fas fa-table"></i>
                            <span>Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('event')) ? 'active' : '' }}" href="/event">
                            <i class="far fa-calendar-plus"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#logoutModal" data-bs-toggle="modal">
                          <i class="fas fa-sign-out-alt"></i>
                          <span>Logout</span>
                      </a>
                    </li>
                    <div id="logoutModal" class="modal fade" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger">Logout Confirm</h5><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p class="text-dark">Are you sure to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="/logout" type="button">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="far fa-user-circle"></i>
                            <span>Login</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
      </nav>

      <div class="d-flex flex-column" id="content-wrapper">
        @yield('content')
        <footer class="bg-white sticky-footer">
          <div class="container my-auto">
            <div class="text-center my-auto copyright">
              <span>Copyright © SMNHS 2022</span>
            </div>
          </div>
        </footer>
      </div>
      <a class="border rounded d-inline scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>
</body>
</html>
@extends('layout')
@section('content')
  <body id="page-top">
    <div id="wrapper">
      <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <div class="container-fluid d-flex flex-column p-0">
          <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
              <span>SMNHS</span>
            </div>
          </a>
          <hr class="sidebar-divider my-0">
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
              <a class="nav-link" href="/index.html">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                <i class="fas fa-table"></i>Attendance </a>
              <div class="dropdown-menu" style="background: var(--bs-blue);border-style: none;">
                <a class="dropdown-item" href="/table.html" style="color: var(--bs-light);">Arrival</a>
                <a class="dropdown-item" href="/table2.html" style="color: var(--bs-light);">Departure</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/faculty.html">
                <i class="fas fa-table"></i>
                <span>Faculties</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login.html">
                <i class="far fa-user-circle"></i>
                <span>Login</span>
              </a>
            </li>
          </ul>
          <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
          </div>
        </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
          <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid">
              <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                <i class="fas fa-bars"></i>
              </button>
              <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                  <button class="btn btn-primary py-0" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
              <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown d-sm-none no-arrow">
                  <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                    <i class="fas fa-search"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="me-auto navbar-search w-100">
                      <div class="input-group">
                        <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                        <div class="input-group-append">
                          <button class="btn btn-primary py-0" type="button">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Profile</h3>
            <div class="row mb-3">
              <div class="col-lg-4">
                <div class="card mb-3">
                  <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="/assets/img/dogs/image2.jpeg?h=a0a7d00bcd8e4f84f4d8ce636a8f94d4" width="160" height="160">
                    <div class="mb-3">
                      <button class="btn btn-primary btn-sm" type="button">Change Photo</button>
                    </div>
                  </div>
                </div>
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Projects</h6>
                  </div>
                  <div class="card-body">
                    <h4 class="small fw-bold">Server migration <span class="float-end">20%</span>
                    </h4>
                    <div class="progress progress-sm mb-3">
                      <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                        <span class="visually-hidden">20%</span>
                      </div>
                    </div>
                    <h4 class="small fw-bold">Sales tracking <span class="float-end">40%</span>
                    </h4>
                    <div class="progress progress-sm mb-3">
                      <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                        <span class="visually-hidden">40%</span>
                      </div>
                    </div>
                    <h4 class="small fw-bold">Customer Database <span class="float-end">60%</span>
                    </h4>
                    <div class="progress progress-sm mb-3">
                      <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        <span class="visually-hidden">60%</span>
                      </div>
                    </div>
                    <h4 class="small fw-bold">Payout Details <span class="float-end">80%</span>
                    </h4>
                    <div class="progress progress-sm mb-3">
                      <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                        <span class="visually-hidden">80%</span>
                      </div>
                    </div>
                    <h4 class="small fw-bold">Account setup <span class="float-end">Complete!</span>
                    </h4>
                    <div class="progress progress-sm mb-3">
                      <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                        <span class="visually-hidden">100%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row mb-3 d-none">
                  <div class="col">
                    <div class="card textwhite bg-primary text-white shadow">
                      <div class="card-body">
                        <div class="row mb-2">
                          <div class="col">
                            <p class="m-0">Peformance</p>
                            <p class="m-0">
                              <strong>65.2%</strong>
                            </p>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-rocket fa-2x"></i>
                          </div>
                        </div>
                        <p class="text-white-50 small m-0">
                          <i class="fas fa-arrow-up"></i>&nbsp;5% since last month
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card textwhite bg-success text-white shadow">
                      <div class="card-body">
                        <div class="row mb-2">
                          <div class="col">
                            <p class="m-0">Peformance</p>
                            <p class="m-0">
                              <strong>65.2%</strong>
                            </p>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-rocket fa-2x"></i>
                          </div>
                        </div>
                        <p class="text-white-50 small m-0">
                          <i class="fas fa-arrow-up"></i>&nbsp;5% since last month
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="card shadow mb-3">
                      <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">User Settings</p>
                      </div>
                      <div class="card-body">
                        <form>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="username">
                                  <strong>Username</strong>
                                </label>
                                <input class="form-control" type="text" id="username" placeholder="user.name" name="username">
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="email">
                                  <strong>Email Address</strong>
                                </label>
                                <input class="form-control" type="email" id="email" placeholder="user@example.com" name="email">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="first_name">
                                  <strong>First Name</strong>
                                </label>
                                <input class="form-control" type="text" id="first_name" placeholder="John" name="first_name">
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="last_name">
                                  <strong>Last Name</strong>
                                </label>
                                <input class="form-control" type="text" id="last_name" placeholder="Doe" name="last_name">
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="card shadow">
                      <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Contact Settings</p>
                      </div>
                      <div class="card-body">
                        <form>
                          <div class="mb-3">
                            <label class="form-label" for="address">
                              <strong>Address</strong>
                            </label>
                            <input class="form-control" type="text" id="address" placeholder="Sunset Blvd, 38" name="address">
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="city">
                                  <strong>City</strong>
                                </label>
                                <input class="form-control" type="text" id="city" placeholder="Los Angeles" name="city">
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="country">
                                  <strong>Country</strong>
                                </label>
                                <input class="form-control" type="text" id="country" placeholder="USA" name="country">
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card shadow mb-5">
              <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Forum Settings</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <form>
                      <div class="mb-3">
                        <label class="form-label" for="signature">
                          <strong>Signature</strong>
                          <br>
                        </label>
                        <textarea class="form-control" id="signature" rows="4" name="signature"></textarea>
                      </div>
                      <div class="mb-3">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="formCheck-1">
                          <label class="form-check-label" for="formCheck-1">
                            <strong>Notify me about new replies</strong>
                          </label>
                        </div>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
@endsection
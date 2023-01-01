@extends('layout')
@section('content')
<section>
  <body class="bg-gradient-primary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0" style="height: 584.732px;">
              <div class="row">
                <div class="col-lg-6 d-none d-lg-flex" style="height: 584.732px;">
                  <div class="flex-grow-1 bg-login-image" style="background: url('smnhsbackground.jpg');"></div>
                </div>
                <div class="col-lg-6" style="height: 584.732px;">
                  <div class="p-5" style="margin-top: 50px;">
                    <div class="text-center">
                      <h4 class="text-dark mb-4">Welcome Back!</h4>
                    </div>
                    @if(!session('email'))
                      <form class="user" action="{{ route('checkEmail') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                          <input class="form-control form-control-user" value="{{ Session::get('wrongEmail') }}" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required="">
                        </div>
                        @if (Session::get('error'))
                          <div class="alert alert-danger fade show" role="alert">
                            {{ Session::get('error') }}
                          </div>
                        @endif
                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                        <hr>
                      </form>
                    @endif
                    @if(Session::get('enterpassword'))
                      <form class="user" action="{{ route('userAuth') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                          <input class="form-control form-control-user" value="{{ Session::get('email') }}" type="email" id="exampleInputEmail" name="email" required="">
                        </div>
                        <div class="mb-3">
                          <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required="">
                        </div>
                        @if ($user = Session::get('wrongpassword'))
                          <div class="alert alert-danger">
                            {{ Session::get('wrongpassword') }}
                          </div>
                        @endif
                        @if ($user = Session::get('changeemail'))
                          <div class="alert alert-danger">
                            {{ Session::get('changeemail') }}
                          </div>
                        @endif
                        <div class="mb-3">
                          <div class="custom-control custom-checkbox small">
                            <div class="form-check">
                              <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                              <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                        <hr>
                      </form>
                    @endif
                    <div class="text-center">
                      <a class="small" href="/signup">Register account</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</section>
@endsection
@extends('layout')
@section('content')
<section>
  <body class="bg-gradient-primary">
    <div class="container">
      <div class="card shadow-lg o-hidden border-0 my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-5 d-none d-lg-flex">
              <div class="flex-grow-1 bg-register-image" style="background-image: url(smnhsemblem.jpg);"></div>
            </div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h4 class="text-dark mb-4">Create an Account!</h4>
                </div>
                <form class="user" method="POST" action="{{ route('saveRegistration') }}" accept-charset="utf-8">
                  @csrf
                  @if ($user = Session::get('status'))
                    <div class="alert alert-danger">
                      {{ Session::get('status') }}
                    </div>
                  @endif
                  <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" type="text" id="exampleUsername" placeholder="Username" name="username" required="">
                    </div>
                    <div class="col-sm-6">
                    <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email" required="" value="{{ Session::get('returnEmail') }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" required="">
                    </div>
                    <div class="col-sm-6">
                      <input class="form-control form-control-user" type="password" id="password_confirmation" placeholder="Repeat Password" name="password_confirmation" required="">
                    </div>
                  </div>
                  <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                  <hr>
                  
                  <a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button" href="/login">
                    &nbsp; Already have an account? Login! </a>
                  <hr>
                </form>
                <div class="text-center">
                  <div class="small">Having trouble?</div>
                </div>
                <div class="text-center">
                  <div class="small">Ask the administrator personally.</div>
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

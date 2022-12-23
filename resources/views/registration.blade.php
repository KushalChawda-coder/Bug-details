@extends('layout')
@section('content')

<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>
                        
                            <!-- Modal --> 
                      <div  class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"                  aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Log in</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               @if (Session::has('message1'))
                              <li id="message" class="alert {{ Session::get('alert-class1') }}" role="alert">{{Session::get('message1'); }}</li>
                                @endif
                              <input type="hidden" id="display" value="{{ Session::get('message1');}}">
                              <form action="{{ url('login') }}" method="POST" class="row g-3 mt-1 needs-validation" novalidate>
                                      @csrf
                                <div class="mb-2">
                                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                  <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" required>
                                   <div class="invalid-feedback">
                                    Please enter a valid email address ..
                                  </div>
                                </div>
                                <div class="">
                                  <label for="inputPassword2" class="form-label">Password</label>
                                  <input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password" required>
                                  <div class="invalid-feedback">
                                      Please enter a valid password..
                                  </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                  <a href="registration" class="card-link">Do not have an Account?</a>
                                 <button type="submit" class="btn btn-primary">Log in</button>
                                </div>
                             </form>
                           </div>
                          </div>   
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

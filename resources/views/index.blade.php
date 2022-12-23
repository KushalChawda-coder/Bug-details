  @extends('layout')
  @section('content')
<div class="container">
  <h1 class="display-5">Bug data details</h1>
  @if(Session::has('login_status'))
    <div class="row">
      <div class="col-md-2">
        <div class="shadow-lg p-3 mb-5 bg-light rounded mt-5">
          @if(Session::get('user_type') == "Tester")
          <a href="bug_details" class="btn btn-success link"><i class="fa-solid fa-table-list"></i> Go to dashboard</a>
          @else
          <a href="user_panel" class="btn btn-success link"><i class="fa-solid fa-table-list"></i> Go to dashboard</a>
          @endif
        </div>
      </div>
    </div>
    @endif
  
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
               <button type="submit" class="btn btn-primary">Log in</button>
              <a href="registration" class="card-link">Do not have an Account?</a>
            
            </div>
         </form>
       </div>
      </div>   
    </div>
  </div>
</div>
@endsection
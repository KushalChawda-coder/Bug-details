  @extends('layout')
  @section('content')

<div class="container">
  <h1 class="display-5">Bug data details</h1>
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
          <form action="{{ url('login') }}" method="POST" class="row g-3 mt-3 needs-validation"novalidate>
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
            <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Log in</button>
            </div>
         </form>
       </div>
      </div>   
    </div>
  </div>
</div>

  <script type="text/javascript"> 
    // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })()
  </script> 
  @endsection
@extends('layout')
@section('content')
@if(session()->has('login_status'))
<div class="container">
	<h1 class="display-2"> Update data</h1>
  <form action="{{ url('user_update') }}" method="POST" class="mt-3 needs-validation" novalidate>
     @csrf
      <div class="mb-3">
         <input type="hidden" name="id" value="{{ $bug->id }}">
  <!--        <label for="exampleFormControlInput4" class="form-label">bug category</label>
       <select class="form-select" name="bug_category" id="exampleFormControlInput4"  id="validationCustom05" required>
        @foreach($Bug_type as $category) 
          @if($bug->bug_category_name == $category->bug_category_name)
          <option value="{{ $category->bug_type_id }}" selected> {{ $category->bug_category_name }}</option>
          @else
            <option value="{{ $category->bug_type_id }}" > {{ $category->bug_category_name }}</option>
          @endif
         @endforeach
       </select>
       <div class="invalid-feedback">
          Please choose a Bug.
        </div>
      </div>

      <div class="mb-3">
         <label for="exampleFormControlInput5" class="form-label">bug status</label>
       <select class="form-select" name="bug_status" id="exampleFormControlInput5"  id="validationCustom06" required>
        @foreach($Bug_status as $category) 
          @if($bug->bug_status_name == $category->bug_status_name)
          <option value="{{ $category->bug_status_id }}" selected> {{ $category->bug_status_name }}</option>
          @else
            <option value="{{ $category->bug_status_id }}" > {{ $category->bug_status_name }}</option>
          @endif
         @endforeach
       </select>
       <div class="invalid-feedback">
          Please choose a Bug.
        </div>
      </div> -->

        <div class="mb-3">
         <label for="exampleFormControlInput15" class="form-label">bug comment</label>
       <textarea  name="comment" class="form-control" id="exampleFormControlInput15"  id="validationCustom15" required>{{ $bug->comment }}</textarea>
       <div class="invalid-feedback">
          Please PUT A bug comment.
        </div>
      </div>

      <div class="col-auto ">
	    <button type="submit" class="btn btn-primary">Update</button>
	  </div>
	</form>
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
@endif
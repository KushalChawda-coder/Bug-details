@extends('layout')
@section('content')
@if(session()->has('login_status'))
<div class="container">
	<h1 class="display-2"> Update data</h1>
  <form action="{{ url('update') }}" method="POST" class="mt-3 needs-validation" enctype="multipart/form-data" novalidate>
     @csrf
		<div class="mb-3">
      	 <label for="exampleFormControlInput1" class="form-label">bug Name</label>
      	 <input type="hidden" name="id" value="{{ $bug->id }}">
     	 <input type="text"  name="bug_title" value="{{ $bug->bug_title }}"  class="form-control" id="exampleFormControlInput1" placeholder="enter your name"  id="validationCustom03" required>
     	 <div class="invalid-feedback">
	        Please choose a bug.
	      </div>
    </div>

    <div class="mb-3">
         <label for="exampleFormControlInput2" class="form-label">bug description</label>
       <textarea  name="bug_description" class="form-control" id="exampleFormControlInput2"  id="validationCustom07" required>{{ $bug->bug_description }}</textarea>
       <div class="invalid-feedback">
          Please bug description.
        </div>
    </div>
    
    <div class="mb-3">
         <label for="exampleFormControlInput3" class="form-label">bug url</label>
       <input type="url" name="bug_url" class="form-control" value="{{ $bug->bug_url }}" id="exampleFormControlInput3" placeholder="enter your bug url" id="validationCustom02" required>
       <div class="invalid-feedback">
          Please choose a bug url.
        </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput4" class="form-label">bug Priority</label>
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
          Please choose a Bug Priority.
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput5" class="form-label">bug status</label>
      <select class="form-select" name="bug_status" id="exampleFormControlInput5"  id="validationCustom06" required>
        @foreach($Bug_status as $category2) 
          @if($bug->bug_status_name == $category2->bug_status_name)
          <option value="{{ $category2->bug_status_id }}" selected> {{ $category2->bug_status_name }}</option>
          @else
            <option value="{{ $category2->bug_status_id }}" > {{ $category2->bug_status_name }}</option>
          @endif
        @endforeach
      </select>
      <div class="invalid-feedback">
        Please choose a Bug.
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput11" class="form-label">Assigned to</label>
      <select class="form-select" name="assigned_to" id="exampleFormControlInput11"  id="validationCustom10" required>
        @foreach($user as $user_name) 
          @if($bug->name == $user_name->name)
          <option value="{{ $user_name->uid }}" selected> {{ $user_name->name }}</option>
          @else
          <option value="{{ $user_name->uid }}" > {{ $user_name->name }}</option>
          @endif
        @endforeach
      </select>
      <div class="invalid-feedback">
        Please choose a user.
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput15" class="form-label">bug comment</label>
      <textarea  name="comment" class="form-control" id="exampleFormControlInput15"  id="validationCustom15" required>{{ $bug->comment }}</textarea>
      <div class="invalid-feedback">
        Please put A bug comment.
      </div>
    </div>
      
    <div class="mb-3">
      <label for="Image" class="form-label">bug image</label>
      <input class="form-control" type="file"  name="bug_image" id="Image" id="thumbnail" accept="image/*" onchange="readURL(this)">
      <img class="mt-3" src="{{ asset($bug->bug_image) }}" width="100px" id="show-image"/>
      <div class="invalid-feedback">
        Please choose a Image.
      </div>
    </div>

    <div class="col-auto ">
	    <button type="submit" class="btn btn-primary">Update</button>
	  </div>
	</form>
</div>	

@endsection
@endif
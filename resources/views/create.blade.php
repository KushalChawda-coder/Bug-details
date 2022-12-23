@extends('layout')
@section('content')

<div class="container">
  <h1 class="display-2">Insert new data</h1>
  <form action="{{ url('insert') }}" method="POST" class="mt-3 needs-validation" enctype="multipart/form-data" novalidate>
    @csrf
		<div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">bug Name</label>
     	<input type="text"  name="bug_title" class="form-control" id="exampleFormControlInput1" placeholder="enter your bug name"  id="validationCustom03" required>
      @if ($errors->has('bug_title'))
       <span class="text-danger">{{ $errors->first('bug_title') }}</span>
      @endif
     	<div class="invalid-feedback">
	        Please choose a bug name.
	     </div>
    </div>

    <div class="mb-3">
    	<label for="exampleFormControlInput2" class="form-label">bug description</label>
   	  <textarea  name="bug_description" class="form-control" id="exampleFormControlInput2"  id="validationCustom07" required></textarea>
      @if ($errors->has('bug_description'))
        <span class="text-danger">{{ $errors->first('bug_description') }}</span>
      @endif
   	  <div class="invalid-feedback">
        Please PUT A bug description.
      </div>
    </div>

    <div class="mb-3">
    	<label for="exampleFormControlInput3" class="form-label">bug url</label>
      <input type="url" name="bug_url" class="form-control" id="exampleFormControlInput3" placeholder="enter bug url" id="validationCustom02" required>
      @if ($errors->has('bug_url'))
        <span class="text-danger">{{ $errors->first('bug_url') }}</span>
      @endif
   	  <div class="invalid-feedback">
        Please choose a bug url.
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput4" class="form-label">bug Priority</label>
      <select class="form-select" name="bug_category" id="exampleFormControlInput4"  id="validationCustom05" required>
        <option value=""> select bug Priority </option>
        @foreach($Bug_type as $b_name)
        <option value="{{ $b_name->bug_type_id }}"> {{ $b_name->bug_category_name }}</option>
        @endforeach
      </select>
      @if ($errors->has('bug_category'))
        <span class="text-danger">{{ $errors->first('bug_category') }}</span>
      @endif
      <div class="invalid-feedback">
        Please choose a  bug Priority
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput10" class="form-label">bug status </label>
      <select class="form-select" name="bug_status" id="exampleFormControlInput10"  id="validationCustom10" required>
         <option value=""> select bug status </option>
        @foreach($Bug_status as $b_name)
          <option value="{{ $b_name->bug_status_id }}"> {{ $b_name->bug_status_name }}</option>
         @endforeach
      </select>
      @if ($errors->has('bug_status'))
        <span class="text-danger">{{ $errors->first('bug_status') }}</span>
      @endif
      <div class="invalid-feedback">
        Please choose a  bug status
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput11" class="form-label">Assigned to </label>
      <select class="form-select" name="assigned_to" id="exampleFormControlInput11"  id="validationCustom10" required>
         <option value=""> select Assigned to </option>
        @foreach($user as $u_name)
          <option value="{{ $u_name->uid }}"> {{ $u_name->name }}</option>
         @endforeach
      </select>
      @if ($errors->has('assigned_to'))
        <span class="text-danger">{{ $errors->first('assigned_to') }}</span>
      @endif
      <div class="invalid-feedback">
        Please choose a  user
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput15" class="form-label">bug comment</label>
      <textarea  name="comment" class="form-control" id="exampleFormControlInput15"  id="validationCustom15" required></textarea>
      @if ($errors->has('comment'))
        <span class="text-danger">{{ $errors->first('comment') }}</span>
      @endif
     <div class="invalid-feedback">
        Please PUT A bug comment.
      </div>
    </div>

    <div class="mb-3">
      <label for="Image" class="form-label">please chosse a bug image</label>
      <input class="form-control" type="file" name="bug_image" id="Image" id="validationCustom08" accept="image/*" required  onchange="readURL(this)">
       <img class="mt-3" src="" width="100px" id="show-image"/>
      @if ($errors->has('bug_image'))
        <span class="text-danger">{{ $errors->first('bug_image') }}</span>
      @endif
      <div class="invalid-feedback">
        Please choose a image.
      </div>
    </div>
    <div class="col-auto">
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>	    
@endsection

@extends('layout')
@section('content')
@if(session()->has('login_status'))
<div class="container">
	<h1 class="display-2">Bug  data for Developer panel</h1>
   @php if (session()->has('message')) {  @endphp 
  <li id="message" class="alert {{ Session::get('alert-class') }}" role="alert">{{Session::get('message');}}</li>
  @php   }   @endphp 
	<table class="table table-responsive table-hover">
    <thead>
      <tr>
        <th scope="col">Bug ID</th>
        <th scope="col">Bug Name</th>
        <th scope="col">Bug description</th>
        <th scope="col">Bug URL</th>
        <th scope="col">Bug Priority</th>
        <th scope="col">Bug Status</th>
        <th scope="col">Comment <img  src="https://img.icons8.com/ios-glyphs/30/null/create-new.png"/></th>
        <th scope="col">Screen shot</th>
        <!-- <th scope="col">Action</th> -->
      </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp 
    	@foreach($Bugs_row as $item)
      <tr>
        <th class="id" scope="row">B_{{ $i; }}</th>
        <td>{{$item->bug_title}}</td>
        <td>{{$item->bug_description}}</td>
        <td><a href="{{$item->bug_url}}">{{$item->bug_url}}</a></td>

        <td> <div class="dropdown" >
            @foreach($Bug_type as $bug_priority)
            @if($item->bug_category_name == $bug_priority->bug_category_name)
            <button class="btn btn-light dropdown-toggle btn_text" style="width:100px; height:44px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->bug_category_name }}</button>
               @endif
               @endforeach
           
            <input type="hidden" class="btn_val" name="bug_category" value="{{ $item->id }}">
            <ul class="dropdown-menu parent">
                @foreach($Bug_type as $bug_priority)
              <li > 
                <a class="dropdown-item bug_priority"  tabindex="{{ $bug_priority->bug_type_id }} bug_category" href="#">{{ $bug_priority->bug_category_name }}</a></li>
               @endforeach   
            </ul>
          </div>
        </td>

         <td> <div class="dropdown" >
            @foreach($Bug_status as $bug_status)
            @if($item->bug_status_name == $bug_status->bug_status_name)
            <button class="btn btn-light dropdown-toggle btn_text" style="width:100px; height:44px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->bug_status_name }}</button>
               @endif
               @endforeach
            <input type="hidden" class="btn_val" name="bug_status" value="{{ $item->id }}">
            <ul class="dropdown-menu parent">
                @foreach($Bug_status as $bug_status)
              <li > 
                <a class="dropdown-item bug_priority"  tabindex="{{ $bug_status->bug_status_id }} bug_status" href="#">{{ $bug_status->bug_status_name }}</a></li>
               @endforeach   
            </ul>
          </div>
        </td>
    
         <td class="comment" tabindex="{{ $item->id}}">{{$item->comment}}</td>
         <td > <img class="myImg" src="{{ asset($item->bug_image) }}"  width="100px"></td>

         <!-- The Modal -->
          <div id="myModal" class="modal2">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>
      </tr>
      @php $i++; @endphp
      @endforeach
    </tbody>
  </table>
</div>
@endsection
@endif
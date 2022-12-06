@extends('layout')
@section('content')
@if(session()->has('login_status'))
<div class="container">
	<h1 class="display-2">Bug  data for Tester panel</h1>
	<a href="/create" class="btn btn-success mb-3"> Add New </a>
	<table class="table">
    <thead>
      <tr>
        <th scope="col">Bug ID</th>
        <th scope="col">Bug Name</th>
        <th scope="col">Bug description</th>
        <th scope="col">Bug URL</th>
        <th scope="col">Bug Priority</th>
        <th scope="col">Bug Status</th>
        <th scope="col">Comment</th>
        <th scope="col">Assinged To</th>
        <th scope="col">Screen shot</th>
        <th scope="col" >Action</th>
      </tr>
    </thead>
    <tbody>
    
  @php $i=1; if (Session::has('message')) { @endphp 
        <li id="message" class="alert {{ Session::get('alert-class') }}" role="alert">{{Session::get('message'); }}</li>
   @php }  @endphp 
  	@foreach($Bugs_row as $item)
    <tr>
      <th scope="row">B_{{ $i; }}</th>
      <td>{{$item->bug_title}}</td>
      <td>{{$item->bug_description}}</td>
      <td><a href="{{$item->bug_url}}">{{$item->bug_url}}</a></td>
      <td>{{$item->bug_category_name}}</td>
      <td>{{$item->bug_status_name}}</td>
      <td>{{$item->comment}}</td>
      <td>{{$item->name}}</td>
      <td > <img class="myImg" src="{{ asset($item->bug_image) }}"  width="100px"></td>

       <!-- The Modal -->
      <div id="myModal" class="modal2">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div>
      <td width="200px"><a href="/edit/{{$item->id}} " class="btn btn-primary">Edit</a>
        <a href="Delete/{{$item->id}}" id="delete" onclick="if(confirm('Are you sure want to delete') == false) { event.preventDefault(); }" class="btn btn-danger">Delete</a> </td>
    </tr>
    @php $i++; @endphp
    @endforeach
  </tbody>
</table>
</div>
@endsection
@endif


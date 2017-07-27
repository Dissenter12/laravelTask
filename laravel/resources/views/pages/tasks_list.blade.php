@extends('..layouts/app')

@section('title')
	Welcome
@endsection

@section('content')
	@if(Session::has('message'))
    <div class="alert alert-success">
	  	{{ Session::get('message') }}
    </div>
	@endif
	<div class="panel-group">
		<div class="panel panel-default">
	      <div class="panel-heading">New Task</div>
	      <div class="panel-body">
	      	
	      	<form class="form-horizontal" method="POST" action="/saveNewTask">
				{{ csrf_field() }}
			<div class="col-sm-2">
				Task 
			</div>
			<div class="col-sm-4">
	      	<input type="text" name="name" placeholder="Name" class="form-control">
	      	</div>
	      	<div class="col-sm-4">
	      	<input type="text" name="description" placeholder="Description" class="form-control">
	      	</div>
	      	<div class="col-sm-12">
	      	@if(Auth::user() && Auth::user()->role == 'admin')
	      	<input type="submit" class="btn btn-default btn-md" value="+ Add Task">
	      	@endif
	      	</div>
	      	</form>
	      </div>
	    </div>
	    <div class="panel panel-default">
	      <div class="panel-heading">Current Tasks</div>
	      <div class="panel-body">
	      	<table class="table table-striped">
	      		<thead>
	      		<tr>
				  <th>Name</th>
				  <th>Description</th> 
				  <th></th>
				</tr>
				</thead>
					@foreach($tasks as $task)
					<tr>
						<td>{!! $task-> name !!}</td>
						<td>{!! $task-> description !!}</td>
						@if(Auth::user() && Auth::user()->role == 'admin')
						<td><a href='{{ url("/deleteTask/$task->id") }}'><button type="button" class="btn btn-danger">Delete</button></a></td>
						@endif
					</tr>
					@endforeach
				
	      	</table>
	      </div>
	    </div>
	</div>
@endsection
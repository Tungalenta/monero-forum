@extends('master')
@section('content')
{{ Breadcrumbs::addCrumb('Home', '/') }}
{{ Breadcrumbs::addCrumb('Admin Panel', '/admin') }}
{{ Breadcrumbs::addCrumb('Manage Forums', '/admin/manage/forum') }}
{{ Breadcrumbs::addCrumb($forum->name) }}
	<div class="row admin-panel">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><i class="fa fa-pencil"></i> Editing forum {{ $forum->name }}</h3>
	  </div>
	  <div class="panel-body">
			  {{ Form::open(array('url' => '/admin/edit')) }}
			  	 <input type="hidden" name="type" value="forum">
			  	 <input type="hidden" name="id" value="{{ $forum->id }}">
			  	 <div class="form-group">
			  	 	{{ Form::select('category_id', Category::lists('name', 'id'), $forum->category_id, array('class' => 'form-control')) }}
			  	 </div>
			  	 <div class="form-group">
				    <label>Name</label>
				    <input type="text" class="form-control" name="name" value="{{ $forum->name }}">
				 </div>
				 <div class="form-group">
				    <label>Position</label>
				    <input type="text" class="form-control" name="position" value="{{ $forum->position }}">
				 </div>
				 <div class="form-group">
				    <label>Description</label>
				    <textarea class="form-control" rows="2" name="description">{{ $forum->description }}</textarea>
				 </div>
				 <div class="form-group">
				 	<label>Visible to</label>
				 	{{ Form::select('visibility[]', Role::lists('name','id'), $visible_to, array('multiple', 'class' => 'form-control',)) }}
				 </div>
				 <div class="form-group">
				 	<label>Forum Lock</label>
				 	<br>
				 	<div class="radio">
					 	<label>
						  <input type="radio" name="lock" value="0" checked> No Lock
						</label>
				 	</div>
				 	<div class="radio">
						<label>
						  <input type="radio" name="lock" value="1"> Soft Lock <small>no threads by non-admins / moderators, posts allowed</small>
						</label>
				 	</div>
				 	<div class="radio">
						<label>
						  <input type="radio" name="lock" value="2"> Hard Lock <small>no threads or posts by non-admins / moderators</small>
						</label>
				 	</div>
				 </div>
				 <button type="submit" class="btn btn-md btn-success">Save</button><a href="/admin/delete/forum/{{ $forum->id }}"><button type="button" class="btn btn-md btn-danger">Delete</button></a>
			  {{ Form::close() }}
	  </div>
	</div>
	</div>
@stop
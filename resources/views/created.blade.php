
@extends('layouts.app')

@section('title', 'Add Post')

@section('content')
<!-- Add Post -->
<div id="addEmployeeModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('posts.store') }}" method="POST">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Post</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Post title</label>
						<input name="title" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Post Description</label>
						<textarea name="description" class="form-control" cols="5" rows="4"></textarea>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<!-- Edit Modal HTML -->
<div id="editEmployeeModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title">Edit Post</h4>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Post title</label>
						<input name="title" type="text" class="form-control" value="{{ $post->title }}" required>
					</div>
					<div class="form-group">
						<label>Post Description</label>
						<textarea name="description" class="form-control" cols="10" rows="10">{{ $post->description }}</textarea>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
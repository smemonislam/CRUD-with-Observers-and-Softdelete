@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Post</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('posts.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Post</span></a>
						<a href="{{ route('posts.trashed') }}" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Restore</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SL</th>
						<th>Post Title</th>
						<th>Post Slug</th>
						<th>Post Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

                    @foreach($posts as $post)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->slug }}</td>
						<td>{{ substr($post->description, 0, 30) }} ...</td>
						<td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                            </form>
						</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
            {{ $posts->links() }}
		</div>
	</div>        
</div>
@endsection
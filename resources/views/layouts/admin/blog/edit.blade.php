<x-app-layout>

@if(session()->has('save'))
  <div class="row" id="save">
    <div class="alert alert-success" width="100%">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notification:</strong>{{ session()->get('save') }}
    </div>
  </div>
@endif

<div class="container-fluid mt-5">
		<form method="POST" action="{{ route('post.update', $post->id) }}">
        @csrf
		
        @method('PUT')<!--requesting to update-->

		<div class="row justify-content-center">
		    <div class="col-md-6">
		        <div class="card card-primary">
		            <div class="card-header">
		                <h3 class="card-title">Blog</h3>
		            </div>
		            <!-- /.card-header -->
		            <!-- form start -->
		            <div class="card-body">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div><br />
						@endif
							<div class="form-group">
								<label for="name"><i class="text-danger">*</i>Title:</label>
								<input type="text" class="form-control" name="title" value="{{old('title') ?? $post->title}}" required/>
							</div>
							<div class="form-group">
								<label for="description"><i class="text-danger">*</i>Description:</label>
								<textarea class="form-control" name="description" required>{{ old('description', $post->description) }}</textarea>
							</div>
							<button type="submit" class="btn btn-primary float-left">Save</button>
							<a type="button" href="{{ route('post.index') }}" class="btn btn-danger float-right">Cancel</a>
		            </div>
		            <!-- /.card-body -->
		        </div>
		        <!-- /.card -->
		    </div>
		</div>
	</form>
</div>	
</x-app-layout>
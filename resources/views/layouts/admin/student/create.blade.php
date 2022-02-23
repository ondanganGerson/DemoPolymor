<x-app-layout>
<div class="container-fluid mt-5">
    <form method="post" action="{{ route('classs.store') }}">
		<div class="row justify-content-center">
		    <div class="col-md-6">
		        <div class="card card-primary">
		            <div class="card-header">
		                <h3 class="card-title">Class</h3>
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
						<form method="post" action="{{ route('classs.store') }}">
							<div class="form-group">
								@csrf
								<label for="name"><i class="text-danger">*</i>Name:</label>
								<input type="text" class="form-control" name="name" required/>
							</div>
							<div class="form-group">
								<label for="description"><i class="text-danger">*</i>Lastname:</label>
								<textarea class="form-control" name="lastname" required></textarea>
							</div>
                            <div class="form-group">
								<label for="description"><i class="text-danger">*</i>Address:</label>
								<textarea class="form-control" name="address" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary float-left">Save</button>
							<a type="button" href="{{ route('classs.index') }}" class="btn btn-danger float-right">Cancel</a>
                        </form>
						
		            </div>
		            <!-- /.card-body -->
		        </div>
		        <!-- /.card -->
		    </div>
		</div>
	</form>
</div>	
</x-app-layout>
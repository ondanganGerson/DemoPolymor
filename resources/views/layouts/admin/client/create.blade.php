<x-app-layout>
<div class="container-fluid mt-5">
    <form method="post" action="{{ route('client.store') }}">
	@csrf
		<div class="row justify-content-center">
		    <div class="col-md-6">
		        <div class="card card-primary">
		            <div class="card-header">
		                <h3 class="card-title">New Client</h3>
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
								<label for="name"><i class="text-danger">*</i>Name:</label>
								<input type="text" class="form-control" name="name" required/>
							</div>
							<div class="form-group">
								<label for="lastname"><i class="text-danger">*</i>lastname:</label>
								<textarea class="form-control" name="lastname" required></textarea>
							</div>
                            <div class="form-group">
								<label for="contact"><i class="text-danger">*</i>contact:</label>
								<textarea class="form-control" name="contact" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary float-left">Save</button>
							<a type="button" href="{{ route('client.index') }}" class="btn btn-danger float-right">Cancel</a>				
		            </div>
		            <!-- /.card-body -->
		        </div>
		        <!-- /.card -->
		    </div>
		</div>
	</form>
</div>	
</x-app-layout>
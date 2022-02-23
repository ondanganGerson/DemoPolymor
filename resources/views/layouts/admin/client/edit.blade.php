<x-app-layout>

@if(session()->has('save'))
  <div class="row" id="save">
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notification:</strong>{{ session()->get('save') }}
    </div>
  </div>
@endif

<div class="container-fluid mt-5">
		<form method="POST" action="{{ route('client.update', $client->id) }}">
        @csrf
		
        @method('PUT')<!--requesting to update-->

		<div class="row justify-content-center">
		    <div class="col-md-6">
		        <div class="card card-primary">
		            <div class="card-header">
		                <h3 class="card-title">Client</h3>
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
								<input type="text" class="form-control" name="name" value="{{old('name') ?? $client->name}}" required/>
							</div>
							<div class="form-group">
								<label for="lastname"><i class="text-danger">*</i>Lastname:</label>
								<textarea class="form-control" name="lastname" required>{{ old('lastname', $client->lastname) }}</textarea>
							</div>
                            <div class="form-group">
								<label for="contact"><i class="text-danger">*</i>Contact:</label>
								<textarea class="form-control" name="contact" required>{{ old('contact', $client->contact) }}</textarea>
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
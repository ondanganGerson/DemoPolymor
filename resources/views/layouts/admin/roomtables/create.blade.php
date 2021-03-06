<x-app-layout>
    <div class="container-fluid mt-5"> 
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Room Name</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body"> 
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('roomtables.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">                           
                                    <label for="title"><i class="text-danger">*</i>Name:</label>
                                    <input type="text" class="form-control" name="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="description"><i class="text-danger">*</i>Detail:</label>
                                    <textarea class="form-control" name="detail" required></textarea>
                                </div>
                                <div class="form-group">  
                                    <strong>Room Image:</strong>                    
                                    <input type="file" name="image" class="form-control" placeholder="image"> 
                                </div>
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('roomtables.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </form>                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        
    </div>	
    </x-app-layout>
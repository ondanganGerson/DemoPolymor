<x-app-layout>
    <div class="container-fluid mt-5"> 
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Room Image</h3>
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
                            <form action="{{ route('roomtables.update',$roomTable->id) }}" method="POST" enctype="multipart/form-data"> 
                            @csrf                        
                            @method('PUT')                                                
                                <div class="form-group">                    
                                    <strong>Name:</strong>
                                    <input type="text" name="name" value="{{ $roomTable->name }}" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>Detail:</strong>
                                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $roomTable->detail }}</textarea>
                                </div>                
                                <div class="form-group">                        
                                    <strong>Image:</strong>                        
                                    <input type="file" name="image" class="form-control" placeholder="image">                        
                                    <img src="/image/{{ $roomTable->image }}" width="200px">                        
                                </div>                
                                <button type="submit" class="btn btn-primary">Submit</button>                                   
                
                                <button class="btn btn-danger pull-right" href="{{ route('roomtables.index') }}"> Back</button>
                            </form>                      
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        
    </div>	
    </x-app-layout>
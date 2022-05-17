<x-app-layout>
    <div class="container-fluid mt-5"> 
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Rate Author's Book</h3>
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
                            <div class="form-group">                           
                                <label for="title"><i class="text-danger"></i>Author's Name:</label>
                                <input type="text" class="form-control"  value="{{$author->name}}"/>
                            </div>
                            <div class="form-group">                           
                                <label for="title"><i class="text-danger"></i>Books Name:</label>
                                <input type="text" class="form-control" value="{{$book->name}}"/>
                            </div>
                            
                            <form action="{{ route('rate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">  
                                    <input  type="hidden" class="form-control" name="book_id" value="{{$book->id}}"/>
                                </div>
                                <div class="form-group">                           
                                    <label for="title"><i class="text-danger">*</i>Rate Book:</label>
                                    <input type="number" class="form-control" name="rate" required/>
                                </div>
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('author.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </form>                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        
    </div>	
    </x-app-layout>
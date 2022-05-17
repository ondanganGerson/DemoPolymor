<x-app-layout>

    

    @if ($message = Session::get('success'))

        <div class="alert alert-success " >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <p>{{ $message }}</p>

        </div>

    @endif

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>List of Images</h5>
                <a href="{{route('roomtables.create')}}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>&nbsp;Add Images
                </a>        
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover" id="blog-table">
                    <thead>
                        <tr>

                            <th>No</th>
                
                            <th style="width: 15%">Image</th>
                
                            <th>Name</th>
                
                            <th>Details</th>
                
                            <th width="280px"  style="text-align: center">Action</th>
                
                        </tr>
                        
                    </thead>
                    <tbody>                      
                        @foreach ($room as $rooms)

                            <tr>
                    
                                <td></td>
                    
                                <td><img src="/image/{{ $rooms->image }}" width="100%"></td>
                    
                                <td>{{ $rooms->name }}</td>
                    
                                <td>{{ $rooms->detail }}</td>
                    
                                <td>
                                    <div class="row" style="border: transparent; justify-content:center">
                                        <form action="{{ route('roomtables.destroy',$rooms->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm" title="show" href="{{ route('roomtables.show',$rooms->id) }}">Show</a>
                        
                                            <a class="btn btn-primary btn-sm" title="edit" href="{{ route('roomtables.edit',$rooms->id) }}">Edit</a>
                        
                                        @csrf
                    
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="delete">Delete</button>
                        
                                        </form>
                                    </div>
                                </td>
                    
                            </tr>
                
                        @endforeach
                
                    </tbody>
    
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</x-app-layout>

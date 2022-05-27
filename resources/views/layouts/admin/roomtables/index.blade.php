<x-app-layout>
    @if ($message = Session::get('success'))
        <div class="alert alert-success " >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- for Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                <form id="form_id" action="{{ route('roomtables.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                    <div class="form-group">                           
                        <label for="title"><i class="text-danger">*</i>Name:</label>
                        <input type="text" id="name" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="description"><i class="text-danger">*</i>Detail:</label>
                        <textarea class="form-control" id="detail"  name="detail" ></textarea>
                    </div>
                    <div class="form-group">  
                        <strong>Room Image:</strong>                    
                        <input type="file" name="image" id="image" class="form-control" placeholder="image"> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="load-ajax" class="btn btn-primary float-left">Save</button>
                        <a type="button" href="{{ route('roomtables.index') }}" class="btn btn-danger float-right">Cancel</a>
                      
                    </div>
                </form>     
            </div>           
        </div>
        </div>
    </div> --}}
    <!--end for modal-->

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>List of Images</h5>
                <a href="{{route('roomtables.create')}}" class="btn btn-primary">  <i class="fas fa-user-plus"></i>&nbsp;Add</a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover" id="blog-table">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Name</th>                
                            <th>Details</th>        
                            <th style="width: 15%">Image</th>             
                            <th width="280px"  style="text-align: center">Action</th>                
                        </tr>                        
                    </thead>
                    <tbody>      
                        {{-- @php($counter = 0) --}}
                        @foreach ($room as $rooms)
                            <tr>                    
                                {{-- <td>{{++$counter}}</td> --}}
                                <td>{{ $rooms->name }}</td>
                                <td>{{ $rooms->detail }}</td>                    
                                <td><img src="/image/{{ $rooms->image }}" width="100%"></td>
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
<!--you can separate scripts to another folder-->
<!--for modal and jquery ajax-->
{{-- <script>  
    $(document).ready(function() {
        $('#form_id').submit(function(e) {
            e.preventDefault();    
            var data = {
                'name': $('#name').val(),
                'detail': $('#detail').val(),
                'image': $('#image').val(),
            }     
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //sending request to POST/CREATE
            $.ajax({ 
                url: "{{url('/roomtables.store')}}",
                type: "POST",
                data: data,
                //getting the response from request to POST/CREATE
                success: function(response) {                               
                   if(response) {
                       $('#blog-table tbody').prepend('<tr><td>'+ response.name +'</td><td>'+ response.detail +'</td><td>'+ response.image +'</td></tr>');
                       $('#form_id')[0].reset();
                       $('#exampleModal').modal('hide');
                   }
                }
            });
        });
    });
</script> --}}


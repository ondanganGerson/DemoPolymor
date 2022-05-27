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
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                <label for="description"><i class="text-danger">*</i>Detail:</label>
                                <textarea class="form-control" name="detail" ></textarea>
                            </div>
                            <div class="form-group">  
                                <strong>Room Image:</strong>                    
                                <input type="file" id="file" name="image" class="form-control" placeholder="image"> 
                            </div>
                            <button type="submit" id="load-ajax" class="btn btn-primary float-left">Save</button>
                            <a type="button" href="{{ route('roomtables.index') }}" class="btn btn-danger float-right">Cancel</a>
                        </form>                            
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>        
    </div>	     

 <!--for multiple upload fles jquery-->
    {{-- <div class="container">

        <h3 class="jumbotron">Laravel Multiple File Upload</h3>
        <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        
                <div class="input-group control-group increment" >
                <input type="file" name="filename[]" class="form-control">
                <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
                </div>
                <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn"> 
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
                </div>
        
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
        
        </form>        
    </div> --}}

</x-app-layout>

   <!--for multiple upload fles jquery-->
    {{-- <script type="text/javascript">

        $(document).ready(function() {
    
          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
    
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
    
        });
    
    </script> --}}

    <!--using jquery ajax to prevent loading-->
    <script>    
        $(document).ready(function() {
            $('#load-ajax').click(function(e) {
                e.preventDefault();
                console.log("IT WORKS")
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name="csrf-token"]").attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('/roomtables.store')}}",
                    method: "POST",
                    data: {file:  $('#file').val()},
                    success: function(result) {
                        console.log(result);
                    }
                })
            });
        })
    </script>
    

    
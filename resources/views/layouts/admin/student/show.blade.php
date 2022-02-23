<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    
                    <div class="card-body">
                        @foreach($info as $data)
                        <div class="form-group">
                            <p>name: {{$data->name}}</p>
                            <p>last name: {{$data->lastname}}</p>
                            <p>address: {{$data->address}}</p>
                        </div>

                        <form method="post" action="{{ route('post-comment') }}">
                            @csrf               
                                            <!--model/$fillable-->  <!--posts(database->data(id(43))-->
                            <input type="hidden" name="class_id" value="{{$data->id}}">

                            <div class="form-group">
                                <label for="comment"><i class="text-danger">*</i>Comment:</label>
                                                            <!--model/$fillable-->
                                <textarea class="form-control" name="comment" required></textarea>
                            </div>
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('classs.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>
                        @endforeach
                        <div class="mt-5">
                            <h5><b>Comments</b></h5>
                            
                            @foreach($comments as $comment) <!--$comment (variable)-->
                                <!-- $comment->comment (variable and database column) -->
                                <div>{{$comment->comment}}</div>
                                <p>by: Name:</p>
                            @endforeach

                        </div>
                       
                    </div>
                    <!-- /.card-body -->
                    
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>	
</x-app-layout>
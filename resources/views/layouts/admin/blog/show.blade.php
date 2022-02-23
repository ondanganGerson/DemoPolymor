<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">  <!--$post from index() filled wtih data, from postindex pass to $post-->
                        <h3 class="card-title">{{$post->title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        <div class="form-group">
                           
                            <p>Description: {{$post->description}}</p>
                          
                           
                        </div>
                    <!--requesting to post passing route->controller->if matches pass to controller method then pass to return view as requested)-->
                        <form method="post" action="{{ route('comment-store') }}">
                            @csrf               
                                        <!--model/$fillable-->  <!--posts(database->data(id(43))-->
                            <input type="text" name="post_id" value="{{$post->id}}">

                            <div class="form-group">
                                <label for="comment"><i class="text-danger">*</i>Comment:</label>
                                                            <!--model/$fillable-->
                                <textarea class="form-control" name="comment" required></textarea>
                            </div>
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('post.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>

                        <div>
                            <!-- $post->comments (relationship name) --> 
                            <!--accessing comments through post-->
                            @foreach($post->comments as $comment) <!--$comment (variable)-->
                                <!-- $comment->comment (variable and database column) -->
                                <div>{{$comment->comment}}</div>
                            @endforeach
                    <!-- /.card-body -->
                           
                          
                        </div>
                    </div>  
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>	
</x-app-layout>
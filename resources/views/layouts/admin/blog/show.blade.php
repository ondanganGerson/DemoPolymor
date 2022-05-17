<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">  
                        <h3 class="card-title">{{$post->title}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                           
                            <p>Description: {{$post->description}}</p>
                          
                           
                        </div>
                        <form method="post" action="{{ route('blog-comment') }}">
                            @csrf               
                            <input type="text" name="post_id" value="{{$post->id}}">

                            <div class="form-group">
                                <label for="comment"><i class="text-danger">*</i>Comment:</label>
                                                        
                                <textarea class="form-control" name="comment" required></textarea>
                            </div>
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('post.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>

                        <div>
                         
                            @foreach($post->comments as $comment) 
                                <div>{{$comment->comment}}</div>
                            @endforeach
                  
                        </div>
                    </div>  
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>	
</x-app-layout>
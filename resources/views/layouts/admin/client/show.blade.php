<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Client's Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    
                    <div class="card-body">
                            <!--$data defined by clientcontroller show()-->
                        @foreach($data as $clients)
                        <div class="form-group">
                            <p>name: {{$clients->name}}</p>
                            <hr>
                            <p>last name: {{$clients->lastname}}</p>
                            <hr>
                            <p>contact: {{$clients->contact}}</p>
                            <hr>
                        </div>

                        <form method="post" action="{{ route('client-comment') }}">
                            @csrf               
                                            <!--model/$fillable-->  <!--posts(database->data(id(43))-->
                            <input type="hidden" name="client_id" value="{{$clients->id}}">

                            <div class="form-group">
                                <label for="comment"><i class="text-danger">*</i>Comment:</label>
                                                            <!--model/$fillable-->
                                <textarea class="form-control" name="comment" required></textarea>
                            </div>
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('client.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>
                        @endforeach
                        <div class="mt-5">
                            <h5><b>Comments:</b></h5>
                                <!-- $comments defined by clientcontroller show()-->
                                @foreach($comments as $comment)
                            <p>{{$comment->comment}}</p>
                                       <!--comment database-->
                            <p>by:</p>
                            <br>
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
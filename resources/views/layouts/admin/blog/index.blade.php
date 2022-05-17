<x-app-layout>
  @if(session()->has('save'))
    <div class="row" id="save">
      <div class="alert alert-success" style="width: 100%" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification:</strong>{{ session()->get('save') }}
      </div>
    </div>
  @endif
  @if(session()->has('edit'))
    <div class="row" id="edit">
      <div class="alert alert-info" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification:</strong>{{ session()->get('edit') }}
      </div>
    </div>
  @endif
  @if(session()->has('delete'))
    <div class="row" id="delete">
      <div class="alert alert-warning" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification:</strong>{{ session()->get('delete') }}
      </div>
    </div>
  @endif
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>List of Blog</h5>
          <br>
            <a href="{{route('post.create')}}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>&nbsp;Add Post
            </a>        
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped" id="blog-table">
                <thead>
                    <tr style="background-color:antiquewhite">
                        <th>Date</th>
                        <th>Title</th>
                        <th class="text-center" >Action</th>
                    </tr>
                </thead>
                <tbody>                
                  @foreach($postindex as $post)               
                  <tr>   
                      <td>{{$post->created_at}}</td>      
                      <td>{{$post->title}}</td>          
                      <td >
                        <div class="row" style="border: transparent; justify-content:center">
                          <a href="{{ route('post.show', $post->id)}}" style="color:cadetblue; padding-right: 10px"  title="show">
                              <i class="fas fa-eye" ></i>
                          </a>                                                    
                          <a href="{{ route('post.edit', $post->id)}}" style="color:blue; padding-right: 10px;" title="edit">
                              <i class="fas fa-edit" ></i>
                          </a>   
                          <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" style="color: red">
                                <i class="fas fa-trash" ></i>
                            </button>                          
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
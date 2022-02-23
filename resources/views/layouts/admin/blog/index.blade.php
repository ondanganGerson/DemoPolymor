<x-app-layout>
@if(session()->has('save'))
  <div class="row" id="save">
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notification:</strong>{{ session()->get('save') }}
    </div>
  </div>
@endif

@if(session()->has('edit'))
  <div class="row" id="edit">
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notification:</strong>{{ session()->get('edit') }}
    </div>
  </div>
@endif

@if(session()->has('delete'))
  <div class="row" id="delete">
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Notification:</strong>{{ session()->get('delete') }}
    </div>
  </div>
@endif

<div class="container-fluid">
  <div class="card">
      <div class="card-header">
          <h2>List of Blog</h5>
          <a href="{{route('post.create')}}" class="btn btn-primary pull-right">
          <i class="fas fa-user-plus"></i>&nbsp;Add Post
          </a>        
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table class="table table-bordered table-hover" id="blog-table">
              <thead>
                  <tr class="text-center">
                      <th>Date</th>
                      <th>Title</th>
                      <th >Action</th>
                  </tr>
              </thead>
              <tbody>  
                <!--display table data after adding/creating new post from create.blade to store then back to index.blade -->
                <!--$postindex(has data from index())  as $post(you can name any variable)-->

              @foreach($postindex as $post)                 <!--passing data created from $created_at(database) to $post(variable)-->
                <tr>    <!--access data created from created_at(database) then show to index-->
                    <td>{{$post->created_at}}</td>       <!--showing data from $post(variable)-->
                    <td>{{$post->title}}</td>            <!--showing data from $post(variable)-->
                    <td class='text-right'>

                    <div class="an-settings-button text-center" style="border: transparent;">
                                                   
      <!--it will redirect you to route post.show to controller-->
                      <a href="{{ route('post.show', $post->id)}}" class="btn btn-info" title="show">
                                          <!--get the post id of the $post when click then show to url-->
                          <i class="fas fa-eye" ></i>
                      </a>
                                                   
                      <a href="{{ route('post.edit', $post->id)}}" class="btn btn-primary" title="edit">
                          <i class="fas fa-edit" ></i>
                      </a>

                      <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                          @csrf
                          @method('DELETE')<!--request to delete-->
                          <button type="submit" class="btn btn-danger delete-news" title="Delete">
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
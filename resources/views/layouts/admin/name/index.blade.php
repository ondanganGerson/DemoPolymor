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
          <h5>List of Blog</h5>
              <a href="{{route('name.create')}}" class="btn btn-primary">
          <i class="fas fa-user-plus"></i>&nbsp;Add Post
          </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table class="table table-bordered table-hover" id="blog-table">
              <thead>
                  <tr class="text-center">
                      <th>Date</th>
                      <th>firstname</th>
                      <th>lastname</th>
                      <th>action</th>
                  </tr>
              </thead>
              <tbody>  
                <!--display table data after adding/creating new post from create.blade to store then back to index.blade -->
                <!--$postindex(has data from index())  as $post(you can name any variable)-->
                
                @foreach($name as $names)                 <!--passing data created from $postindex(database) to $post(variable)-->
                <tr> 
                    <td>{{$names->created_at}}</td>       <!--showing data from $post(variable)-->
                    <td>{{$names->first_name}}</td>   
                    <td>{{$names->last_name}}</td> 
                    <td class='text-right'>
                                                          <!--showing data from $post(variable)-->
                    

                    <div class="an-settings-button pull-right" style="border: transparent;">
                                                   
      <!--it will redirect you to route post.show to controller-->
                      <a href="{{ route('name.show', $names->id)}}" class="btn btn-info" title="show">
                                            <!--get the client id of the $post when click then show to url-->
                          <i class="fas fa-eye" ></i>
                      </a>
                                                   
                      <a href="{{ route('client.edit', $names->id)}}" class="btn btn-primary" title="edit">
                          <i class="fas fa-edit" ></i>
                      </a>

                      <form action="{{ route('name.destroy', $names->id) }}" method="POST">
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
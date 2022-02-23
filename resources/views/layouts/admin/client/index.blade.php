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

<div class="container-fluid" >
  <div class="card">
      <div class="card-header">
          <h5>List of Client</h5>
          <div class="dropdown">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Dropdown button
              </button>
              
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Show Client</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
              </div>
             
              <a href="{{route('client.create')}}" class="btn btn-primary pull-right">
                <i class="fas fa-user-plus"></i>&nbsp;Add New Client
              </a>
          </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table class="table table-bordered table-hover" id="blog-table">
              <thead>
                  <tr class="text-center">
                      <th>Date</th>
                      <th>Name</th>
                      <th>Lastname</th>
                      <th>Contact</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody> 
                  <!--display table data after adding/creating new post from create.blade to store then send back to index.blade as requested -->
                <!--$postindex(has data from index())  as $post(you can name any variable)-->

              @foreach($client as $client)                 <!--passing data created from $postindex(database) to $post(variable)-->
                <tr> 
                    <td>{{$client->created_at}}</td>       <!--showing data from $post(variable)-->
                    <td>{{$client->name}}</td>   
                    <td>{{$client->lastname}}</td> 
                    <td>{{$client->contact}}</td>            <!--showing data from $post(variable)-->
                    <td class='text-right'>

                    <div class="an-settings-button pull-right" style="border: transparent;">
                                                   
      <!--it will redirect you to route post.show to controller-->
                      <a href="{{ route('client.show', $client->id)}}" class="btn btn-info" contact="show">
                                            <!--get the client id of the $post when click then show to url-->
                          <i class="fas fa-eye" ></i>
                      </a>
                                                   
                      <a href="{{ route('client.edit', $client->id)}}" class="btn btn-primary" title="edit">
                          <i class="fas fa-edit" ></i>
                      </a>

                      <form action="{{ route('client.destroy', $client->id) }}" method="POST">
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
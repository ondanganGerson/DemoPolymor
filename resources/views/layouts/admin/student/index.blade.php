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
          <h5>List of Student</h5>
              <a href="{{route('classs.create')}}" class="btn btn-primary">
          <i class="fas fa-user-plus"></i>&nbsp;Add New Student
          </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table class="table table-bordered table-hover" id="blog-table">
              <thead>
                  <tr class="text-center">
                      <th>Date</th>
                      <th>Name</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>  
                 
                <!--$post(databasea)  as $post(you can name any variable)-->
                
                @foreach($varclasss as $student)                 <!--passing data created from $posts(database) to $post(variable)-->
                <tr> 
                    <td>{{$student->created_at}}</td>       <!--showing data from $post(variable)-->
                    <td>{{$student->name}}</td>            <!--showing data from $post(variable)-->
                    <td class='text-right'>

                    <div class="an-settings-button pull-right" style="border: transparent;">

                      <a href="{{ route('classs.show', $student->id)}}" class="btn btn-info" title="show">
                          <i class="fas fa-eye" ></i>
                      </a>
                                                   
                      <a href="{{ route('classs.edit', $student->id)}}" class="btn btn-primary" title="edit">
                          <i class="fas fa-edit" ></i>
                      </a>

                      <form action="{{ route('classs.destroy', $student->id) }}" method="POST">
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
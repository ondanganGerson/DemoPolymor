

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
          <h5>List of Cars</h5>
          <a href="{{route('car.create')}}" class="btn btn-primary pull-right">
           <i class="fas fa-user-plus "></i>&nbsp;Add New Cars
         </a>                 
            <!--this foreach is from car-->
            
           <div class="btn-group">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" id="options"> <span id="opt">Chose option</span> <span class="caret"></span>
              </button>
              @foreach($car as $cars)
            
              @endforeach   
           
          </div>     
                 
    
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table class="table table-bordered table-hover" id="blog-table">
              <thead>
                  <tr class="text-center">
                      <th>Date</th>
                      <th>Name</th>
                      <th>Founded</th>
                      <th>Description</th>
                      <th>Action</th>
                  </tr>
              </thead>  
              <tbody> 
                  <!--display table data after adding/creating new post from create.blade to store then send back to index.blade as requested -->
                <!--$postindex(has data from index())  as $post(you can name any variable)-->

              @foreach($car as $cars)                 <!--passing data created from $postindex(database) to $post(variable)-->
                <tr> 
                    <td>{{$cars->created_at}}</td>       <!--showing data from $post(variable)-->
                    <td>{{$cars->name}}</td>   
                    <td>{{$cars->founded}}</td> 
                    <td>{{$cars->description}}</td>            <!--showing data from $post(variable)-->
                    <td class='text-right'>

                    <div class="an-settings-button pull-right" style="border: transparent;">
                                                   
                  <!--it will redirect you to route post.show to controller-->
                      <a href="{{ route('car.show', $cars->id)}}" class="btn btn-info" title="show">
                                            <!--get the cars id of the $post when click then show to url-->
                          <i class="fas fa-eye" ></i>
                      </a>
                                                   
                      <a href="{{ route('car.edit', $cars->id)}}" class="btn btn-primary" title="edit">
                          <i class="fas fa-edit" ></i>
                      </a>

                      <form action="{{ route('car.destroy', $cars->id) }}" method="POST">
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
@section('scripts_here')
<script>
$(function(){
  $("#1").click(function () {
  $("#opt").text($(this).text());
  });
  $("#2").click(function () {
  $("#opt").text($(this).text());
  });
  $("#3").click(function () {
  $("#opt").text($(this).text());
  });
  $("#4").click(function () {
  $("#opt").text($(this).text());
  });
});
</script>


@endsection
</x-app-layout>



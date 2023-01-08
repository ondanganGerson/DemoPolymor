<x-app-layout>
    @if(session()->has('save'))
    <div class="row" id="save">
      <div class="alert alert-success" style="width: 100%" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification: </strong>{{ session()->get('save') }}
      </div>
    </div>
  @endif
  @if(session()->has('edit'))
    <div class="row" id="edit">
      <div class="alert alert-info" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification: </strong>{{ session()->get('edit') }}
      </div>
    </div>
  @endif
  @if(session()->has('delete'))
    <div class="row" id="delete">
      <div class="alert alert-warning" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification: </strong>{{ session()->get('delete') }}
      </div>
    </div>
  @endif
  @if(session()->has('book'))
    <div class="row" id="book">
      <div class="alert alert-success" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification: </strong>{{ session()->get('book') }}
      </div>
    </div>
  @endif
  @if(session()->has('rate'))
    <div class="row" id="rate">
      <div class="alert alert-success" style="width: 100%">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Notification: </strong>{{ session()->get('rate') }}
      </div>
    </div>
  @endif
    <div class="container-fluid">
        <div class="card">           
            <div class="card-header">
                <h2>Books Author </h2>
                <br>
                <a class="btn btn-info" href="{{route('author.create')}}"> <i class="fas fa-plus"> </i> Add New Author</a>
              
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Books</th>
                            <th>Ratings</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>                      
                        @foreach($author as $key => $authors)

                        <tr>                          
                            <td>{{ date('Y-m-d', strtotime($authors['created_at']))}}</td>
                            <td>{{ $authors['name'] ?? null}}</td>  

                            <!--if authors has many books-->                              
                              {{-- <td>     
                                @foreach($authors['get_books'] as $books)                            
                                {{ $books['name'] }} <i class="fas fa-book"></i>  
                                @endforeach
                              </td> --}}
                                <!--get only first element of data in array, same as pluck and first method-->
                            <td>{{ array_merge(...$authors['get_books'])['name'] ?? 'No Published' }} <i class="fas fa-book"></i> </td>
                            <td>{{ array_merge(...$authors['rate'])['rate'] ?? 0 }}  <i class="fas fa-star"></i></td>
                            <td>
                              <div class="row" style="justify-content: center">    
                                @isset(array_merge(...$authors['get_books'])['id'])      
                                  <a href="{{ route('book.show', array_merge(...$authors['get_books'])['id']) }}" title="Rate Books" class="btn btn-warning"> <i class="fas fa-star"></i></a>
                                @else
                                  <a href="#" title="Rate Books" class="btn btn-warning" disabled> <i class="fas fa-star"></i></a>
                                @endisset                                        
                                <a href="{{route('author.show', $authors['id'])}}" title="Add Books" class="btn btn-primary"> <i class="fas fa-book"></i></a>
                                <a href="{{route('author.edit', $authors['id'])}}" title="Edit" class="btn btn-info"> <i class="fas fa-edit"></i> </a>
                                <form action="{{route('author.destroy', $authors['id'])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Delete"><i class="fas fa-trash"></i> </button>
                                </form>
                              </div>
                            </td>   
                        </tr>                         
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer">
              <!--footer-->
            </div>
        </div>
    </div>
</x-app-layout>
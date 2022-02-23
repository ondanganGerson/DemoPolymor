<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Car's Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    
                    <div class="card-body">
                            <!--$data defined by clientcontroller show()-->
                        @foreach($car as $cars)
                        <div class="form-group">
                            <p>name: {{$cars->name}}</p>
                            <hr>
                            <p>founded: {{$cars->founded}}</p>
                            <hr>
                            <p>description: {{$cars->description}}</p>
                            <hr>
                        </div>

                        <form method="post" action="{{ route('car-model') }}">
                            @csrf               
                                            <!--model/$fillable-->  <!--posts(database->data(id(43))-->
                            <input type="hidden" name="car_id" value="{{$cars->id}}">

                            <div class="form-group">
                                <label for="model_name"><i class="text-danger">*</i>Model:</label>
                                                            <!--model/$fillable-->
                                <textarea class="form-control" name="model_name" required></textarea>
                            </div>
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary float-left">Save</button>
                                <a type="button" href="{{ route('car.index') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>
                        <div class="mt-5">
                            <h5><b>Car Models:</b></h5>
                                          
                            @foreach($cars->carmodels as $models)
                            <ul>
                                <li>{{$models->model_name}}</li>
                            </ul>
                            @endforeach
                        </div>

                        @endforeach
                       
                    </div>
                    <!-- /.card-body -->
                    
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>	
</x-app-layout>
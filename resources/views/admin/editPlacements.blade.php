@extends('admin/master')
@section('jha')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto border border-2 p-3">
                <form action="{{route('placement.update',$placement)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                        <div class=" mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$placement->name}}" class="form-control ">
                        </div>
                        <div class=" mb-3">
                            <label for="">Position</label>
                            <input type="text" name="position" value="{{$placement->position}}" class="form-control ">
                        </div>
                        <div class=" mb-3">
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" value="{{$placement->company_name}}" class="form-control ">
                        </div>
                        <div class="mb-2">
                            <label for="">Image</label>
                            <input type="file" name="image" value="{{$placement->image}}"  class="form-control " >
                            
                        </div>
                        <div class="">
                            <input type="submit" value="Update" class="bg-green-800 hover:bg-green-900 text-white px-3 py-2 text-2xl rounded">
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('admin/master')
@section('jha')
<div class="content">
    <div class="container mt-2 mx-auto">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="text-center py-0 my-0">Insert course</h5>
                        <hr>
                        <form action="{{route('placement.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="mb-2">
                                 <label for="">Name</label>
                                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                 @error('name')
                                     <p class="text-danger small">{{$message}}</p>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label for="">Company Name</label>
                                 <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{old('company_name')}}">
                                 @error('company_name')
                                     <p class="text-danger small">{{$message}}</p>
                                 @enderror
                             </div>
                             <div class="mb-3">
                                 <label for=""> Position</label>
                                 <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{old('position')}}">
                                 @error('position')
                                     <p class="text-danger small">{{$message}}</p>
                                 @enderror
                             </div>
                             <div class="mb-2 col-12">
                                <label for="">Image</label>
                                <input type="file" name="image"  class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">
                                @error('image')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror
                            </div>

                             <div class="mb-2">
                                 <input type="submit" name="submit" class="btn btn-success w-100">
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
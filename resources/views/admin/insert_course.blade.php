@extends('admin/master')
@section('jha')
   <div class="content">
       <div class="container mt-2 mx-auto">
           <div class="row">
            <div class="col-3"><div class="btn-group">
                <a href="{{route('courseDetail.insert')}}" class="btn btn-success">Insert Course Detaile</a>
             </div></div>
               <div class="col-6 offset-3">
                   <div class="card shadow">
                       <div class="card-body">
                           <h5 class="text-center py-0 my-0">Insert course</h5>
                           <hr>
                           <form action="{{route('course.store')}}" method="post"  enctype="multipart/form-data">
                               @csrf
                                <div class="mb-2">
                                    <label for="">title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                                    @error('title')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="">Instructor</label>
                                    <input type="text" name="instructor" class="form-control @error('instructor') is-invalid @enderror" value="{{old('instructor')}}">
                                    @error('instructor')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="mb-2 col">
                                        <label for="">price</label>
                                        <input type="text" name="fee" class="form-control @error('fee') is-invalid @enderror" value="{{old('price')}}">
                                        @error('fee')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-2 col">
                                        <label for="">discount_price</label>
                                        <input type="text" name="discount_fee" class="form-control @error('discount_fee') is-invalid @enderror" value="{{old('discount_fee')}}">
                                        @error('discount_fee')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="mb-2 col-12">
                                                <label for="">duration</label>
                                                <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{old('duration')}}">
                                                @error('duration')
                                                    <p class="text-danger small">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-2 col-12">
                                                <label for="">Image</label>
                                                <input type="file" name="cover"  class="form-control @error('cover') is-invalid @enderror" value="{{old('cover')}}">
                                                @error('cover')
                                                    <p class="text-danger small">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 col-6">
                                        <label for="">description</label>
                                        
                                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="description">{{old('description')}}</textarea>
                                        @error('description')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
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
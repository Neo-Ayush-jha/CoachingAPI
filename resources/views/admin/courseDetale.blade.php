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
                           <form action="{{route('course.store')}}" method="post"  enctype="multipart/form-data">
                               @csrf
                                <div class="mb-2">
                                    <label for="">Course Title</label>

                                    <input type="text" name="course_id" class="form-control" placeholder="course_id">
                                </div>
                                <div class="mb-2">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                                    @error('title')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
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

                                        </div>
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
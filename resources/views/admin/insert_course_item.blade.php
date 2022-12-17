{{-- manage_course_item.blade --}}
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
                           <form action="{{route('courseDetail.store')}}" method="post"  enctype="multipart/form-data">
                               @csrf
                                <div class="mb-2">
                                    <label for="">title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                                    @error('title')
                                        <p class="text-danger small">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Parint id</label>
                                    <select name="parent_id" id="" class="form-select">
                                        @foreach ($course_details as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=""> Course</label>
                                    <select name="course_id" value="{{ old('course_id') }}" id="" class="form-select">
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <p class="small text-danger">{{ $message }}</p>
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
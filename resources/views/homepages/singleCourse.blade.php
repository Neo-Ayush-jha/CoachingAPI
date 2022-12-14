@extends('homepages/base')
@section('ayush')
   <div class="content">
       <div class="container mt-5 mb-5">
           <div class="row">
            <div class="col-3">
                    <div class="d-inline-flex">
                        <h5 class="border-0 border-primary h2 border-3 border-bottom px-2" style="border-radius: 5px">Our Courses</h5>
                    </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        {{-- @foreach ($courses as $item) --}}
                        <div class="card shadow-lg my-3 p-2" style="border-radius: 2rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <h1 class="display-6 fs-1 fw-bold">{{ $courses->title }}</h1>
                                        <div class="d-flex mt-4">
                                            <p class="h6 "><strong>Course Fee: </strong> ₹ {{ $courses->fee }}</p>
                                            <p class="h6 ms-3"><strong>Duration : </strong>{{ $courses->duration }} months</p>
                                            <p class="h6 ms-3"><strong>Instructor : </strong>{{ $courses->instructor }}</p>
                                            {{-- <p class=" ms-3"><strong>Description : </strong>{{ $courses->description }}</p> --}}
                                        </div>
                                        <p class="small text-justify"><strong>Description :     </strong>{{ $courses->description }}</p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-striped table-bordered border-secondary border border-1 rounded">
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Title</th>
                                                        <th>Sub title</th>
                                                        <th>Course name</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    @foreach ($courseDetails as $pay)
                                                        @if ($courses->id == $pay->course_id )
                                                            <tr>

                                                                <td>{{ $pay->id }}</td>
                                                                <td>{{ $pay->title }}</td>
                                                                <td>
                                                                    @if ($pay->parent_id != 0)
                                                                         {{$pay->course_details->title}}
                                                                    @else
                                                                        main
                                                                    @endif
                                                                </td>
                                                                <td>{{  $courses->title }}</td>
                                                                <td>
                                                                    <a href="{{route('course.addCourse')}} " class="btn btn-success "><i class="bi bi-eye"></i> Attend</a>                                                                        
                                                                    {{-- @if ($student->status == "1")
                                                                        <a href="" class="btn btn-success "><i class="bi bi-eye"></i> Attend</a>                                                                        
                                                                        @else
                                                                        @endif 
                                                                    </td> --}}
                                                                    {{-- <a href="" class="btn btn-success disabled"><i class="bi bi-eye"></i> Attend</a>                                                                         --}}
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-3 mt-5">
                                        <img src="{{ asset('cover/' . $courses->cover) }}" alt="" class="card-img-top shadow-lg " style="border-radius: 1.5rem">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>   
           </div>
       </div>
   </div>
@endsection

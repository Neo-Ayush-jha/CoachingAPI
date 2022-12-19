@extends('homepages/base')
@section('ayush')
   <div class="content">
       <div class="container mt-5 mb-5">
           <div class="row">
            <div class="col-3">
                <div class="card shadow border-0">
                    <div class="card-body ">
                            <div class="d-inline-flex">
                                <h3 class="ps-2 h2 px-2 text-danger"style="border-left:6px solid #32393f">Our Courses</h3>                       
                            </div>
                        </div>
                    </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        @foreach ($courses as $item)
                        <div class="card shadow-lg my-3 p-2" style="border-radius: 2rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <h1 class="display-6 fs-1 fw-bold">{{ $item->title }}</h1>
                                        <p class="text-justify mt-4">{{substr($item->description,0,300)}}...</p>
                                        <div class="d-flex mt-3 mx-auto">
                                            <p class="fs-3 "><strong>Course Fee: </strong><del> ₹ {{$item->discount_fee}}</del> ₹ {{ $item->fee }}</p>
                                            <p class="fs-3 ms-2"><strong>Duration : </strong>{{ $item->duration }} months</p>
                                            <p class="fs-3 ms-2"><strong>Instructor : </strong>{{ $item->instructor }}</p>
                                            {{-- <p class="h6 ms-3"><strong>Category : </strong>{{ $item->description }}</p> --}}
                                        </div>
                                        <div class="row mt-4 mx-auto">
                                                        {{-- <a href="{{route("addCourse",['id'=>$item->id])}}" class="btn btn-danger btn-sm p-0"><i class="bi bi-trash"></i></a> --}}
                                                        <div class="col-5 mx-auto">
                                                            <div class="row text-center">
                                                                <div class="col"><a href="{{route("course.addCourse",['id'=>$item->id])}}  " class="btn btn-success  "><i class="bi bi-check"></i>Add</a></div>
                                                                <div class="col"><a href="{{route("addCourse",['id'=>$item->id])}} " class="btn btn-warning "><i class="bi bi-eye"></i>View detales</a></div>
                                                            </div>
                                                        </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-3 mt-3">
                                        <img src="{{ asset('cover/' . $item->cover) }}" alt="" class="card-img-top shadow-lg " style="border-radius: 1.5rem">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>   
           </div>
       </div>
   </div>
@endsection

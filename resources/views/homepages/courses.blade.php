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
                        @foreach ($courses as $item)
                        <div class="card shadow-lg my-3 p-2" style="border-radius: 2rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <h1 class="display-6 fs-1 fw-bold">{{ $item->title }}</h1>
                                        <p class="small text-justify">{{ $item->description }}</p>
                                        <div class="d-flex mt-4 mx-auto">
                                            <p class="h5 "><strong>Course Fee: </strong> ₹ {{ $item->fee }}</p>
                                            <p class="h5 ms-3"><strong>Duration : </strong>{{ $item->duration }} months</p>
                                            <p class="h5 ms-3"><strong>Instructor : </strong>{{ $item->instructor }}</p>
                                            {{-- <p class="h6 ms-3"><strong>Category : </strong>{{ $item->description }}</p> --}}
                                        </div>
                                        <div class="row mt-3 mx-auto">
                                                        {{-- <a href="{{route("addCourse",['id'=>$item->id])}}" class="btn btn-danger btn-sm p-0"><i class="bi bi-trash"></i></a> --}}
                                                        <div class="col-5 mx-auto">
                                                            <div class="row text-center">
                                                                <div class="col"><a href="{{route("addCourse",['id'=>$item->id])}}  " class="btn btn-success  "><i class="bi bi-check"></i>Add</a></div>
                                                                <div class="col"><a href="{{route("addCourse",['id'=>$item->id])}} " class="btn btn-warning "><i class="bi bi-eye"></i>View detales</a></div>
                                                            </div>
                                                        </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-3 mt-5">
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

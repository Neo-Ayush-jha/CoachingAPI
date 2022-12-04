@extends('homepages/base')
@section('ayush')
   <div class="content">
       <div class="container mt-5 mb-5">
           <div class="ROW">
            <div class="col-3">
                    <div class="d-inline-flex">
                        <h5 class="border-0 border-primary h2 border-3 border-bottom px-2" style="border-radius: 5px">Our Courses</h5>
                    </div>
            </div>
           </div>
           <div class="row">
               <div class="col-12">
                   {{-- @foreach ($courses as $item)
                   <div class="card shadow-lg my-3 p-2" style="border-radius: 2rem">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h1 class="display-6">{{ $item->title }}</h1>
                                <p class="small text-justify">{{ $item->description }}</p>
                                <div class="d-flex mt-4">
                                    <p class="h6 "><strong>Course Fee: </strong> ₹ 4500</p>
                                    <p class="h6 ms-3"><strong>Duration : </strong>{{ $item->duration }} months</p>
                                    <p class="h6 ms-3"><strong>Instructor : </strong>Syed Sadique Hussain</p>
                                    <p class="h6 ms-3"><strong>Category : </strong>{{ $item->category }}</p>
                                </div>
                            </div>
                            <div class="col-3 ">
                                <img src="{{ asset('image/' . $item->image) }}" alt="" class="card-img-top shadow-lg" style="border-radius: 1.5rem">
                            </div>
                        </div>
                    </div>
                </div>
                   @endforeach --}}
               </div>
               
           </div>
       </div>
   </div>
@endsection

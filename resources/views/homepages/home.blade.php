@extends('homepages/base')
@section('ayush')
    @auth
        <h1 style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important" class="my-0 text-warning text-center  py-0">Test Havo</h1>
    @endauth
    @guest
       <h1 style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important" class="my-0 text-warning text-center  py-0">Yeh Guest User Hai</h1> 
    @endguest
    <div class="container-fluid text-white py-5"style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
        <div class="container py-5 ">
            <h5 class="display-6 text-light" style="font-size:80px;font-family:Nunito;">Skill Hai! To Future Hai!</h5> 
            <p class="lead text-light mt-3 fs-4" >"CWS is an on-demand marketplace for top Programming engineers, developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web programming freelancers or learn from expert mentors with team training & coaching experiences in Project based training."</p>
        </div>
    </div>  
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <div class="card shadow border-0">
                    <div class="card-body ">
                        <h3 class="ps-2"style="border-left:6px solid #32393f">Our Courses  </h3>                       
                        {{-- <p class="m-0 fw-bolder">Rs. 6000/- <del>Rs. 9000/-</del></p>               {{route("addCourse",['id'=>$item->id])}}   --}}
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($courses as $item)
                <div class="col-lg-2 col-6 mb-3 ">
                    <a href="{{route("addCourse",['id'=>$item->id])}}" class="text-dark">
                        <div class="card border text-center  shadow-lg h-100">
                            <img src="{{ asset('cover/' . $item->cover) }}" alt="" class="card-img-top  shadow-lg img-fluid h-75">
                            <div class="card-body p-2 pb-0  mb-0">
                                <h3 class="h6  mb-0">{{ $item->title }}</h3>
                            </div>
                            <div class="card-footer">
                                <h3 class="mb-0 small"><strong>Duration : {{ $item->duration }} months</strong></h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
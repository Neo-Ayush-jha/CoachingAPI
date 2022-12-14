@extends('homepages/base')
@section('ayush')
    @auth
        <h1 style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important"
            class="my-0 text-warning text-center  py-0">Hello Dear {{ Auth::user()->name }}</h1>
    @endauth
    @guest
        <h1 style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important"
            class="my-0 text-warning text-center  py-0">Pleace go and login</h1>
    @endguest
    <div
        class="container-fluid text-white py-5"style="background: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
        <div class="container py-1 ">
            <div class="row">
                <div class="col-lg-9 col-sm-3">
                    <h5 class="display-6 text-light" style="font-size:75px;font-family:Nunito;text-shadow:2.5px 2.5px rgb(170, 54, 54)">Skill Hai! To Future Hai!
                    </h5>
                    <p class="lead text-light mt-3 fs-4" style="font-family: Handlee, cursive;">"CWS is an on-demand marketplace for top Programming engineers,
                        developers, consultants, architects, programmers, and tutors. Get your projects built by vetted web
                        programming freelancers or learn from expert mentors with team training & coaching experiences in
                        Project based training."</p>
                        <p class="display-7 font-weight-bold text-white text-end me-5 fs-4 " style="text-shadow:2.5px 2.5px rgb(170, 54, 54)">~ SadiQ Hussan ~</p>
                </div>
                <div class="col-lg-3 col-sm-6"><img src="{{ asset('cover/' . 'home.svg') }}" alt=""
                        class="img-fluid card-img-top shadow-lg mt-2" style="border-radius: 1.5rem;height:auto">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-sm-5">
                <div class="card shadow border-0">
                    <div class="card-body ">
                        <h3 class="ps-2"style="border-left:6px solid #32393f">Our Courses </h3>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @foreach ($courses as $item)
                    <div class="col-lg-2 col-6 mb-3 ">
                        <a href="{{ route('addCourse', ['id' => $item->id]) }}" class="text-dark">
                            <div class="card border text-center  shadow-lg h-100">
                                <img src="{{ asset('cover/' . $item->cover) }}" alt=""
                                    class="card-img-top  shadow-lg img-fluid h-75">
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-sm-5">
                <div class="card shadow border-0">
                    <div class="card-body ">
                        <h3 class="ps-2"style="border-left:6px solid #32393f">Our Placements </h3>
                    </div>
                </div>
            </div>
            <div class="row mt-5" >
                @foreach ($placement as $item)
                    <div class="col-lg-2 col-6 mb-3 " >
                        <div class="card border text-center  shadow-lg h-90">
                            <img src="{{ asset('/cover/' . $item->image) }}" class="card-img-top  shadow-lg img-fluid " style="height: 200px"
                                alt="">
                    <div class="card-body  pb-0  mb-0">
                        <h2 class="h4 mb-0">{{ $item->name }}</h2>
                    {{-- </div>
                    <div class="card-footer p-0 m-0"> --}}
                        <p class="fst-italic mb-0">{{ $item->position }}</p>
                    </div>
                    <div class="card-footer p-0 m-0">
                        <p class="fw-lighter text-secondary  text-sm m-0">@ {{ $item->company_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
@endsection

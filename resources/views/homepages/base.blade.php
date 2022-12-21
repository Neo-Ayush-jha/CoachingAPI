<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CWSportal</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body style="background-color: #ddd">
    <nav class="navbar navbar-expand-lg text-light"
        style="background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
        <div class="container-fluid ">
            <a class="navbar-brand " href="/"><a href=""
                    class="navbar-brand font-weight-bold  text-secondary"
                    style="font-size: 35px; font-family: Handlee, cursive;">
                    <p class="my-0 " style="color: #17a2b8;"><img
                            src="https://boomi.com/wp-content/uploads/cws-logo.png" alt=""
                            class=" navbar-brand px-3 my-0 py-1 text-gray-500"
                            style="width:120px;background-color:rgb(180, 236, 255);border-radius: 2rem">
                    </p>
                </a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between fs-5 ms-5 px-5" id="navbarScroll">
                    <ul class="navbar-nav font-weight-bold me-auto my-2 my-lg-0 mx-5"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link text-dark active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark active" aria-current="page"
                                href="{{ route('courses') }}">Courses</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark active" aria-current="page"
                                    href="{{ route('onlinePayment') }}">Online
                                    Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active btn btn-success sm-px-5" aria-current="page"
                                    href="{{ route('register') }}" style="border-radius: 2rem">Apply for Join Us</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ route('login') }} " class="nav-link text-dark text-dark btn btn-warning"
                                    style="border-radius: 2rem">Login</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                {{-- <a class="nav-link text-dark active" aria-current="page" href="{{route("sincleUser",['id'->id])}} " >My profile</a> --}}
                                <a class="nav-link text-dark active" aria-current="page" href="/my_profile">My profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active " aria-current="page"
                                    href="{{ route('onlinePayment') }}">Online
                                    Payment</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="btn btn-danger -text-light mx-3" style="border-radius: 2rem">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
    </nav>

    @section('ayush')

    @show
    <div class="container-fluid">
        <div
            class="row text-light"style="background: linear-gradient(144deg, rgb(59, 55, 106) 20.00%, rgb(0, 143, 186) 71.87%, rgb(255, 149, 213) 100.00%) 100% !important">
            <h4 class="text-center mb-5 mt-3 ">CodeWithSadiQ</h4>
            <div class="col-3 mx-auto my-auto">
                {{-- <div class="col my-auto"> --}}
                <p class="fs-5">Quick link</p>
                <p class="fw-light">Home</p>
                <p class="fw-light">About</p>
                <p class="fw-light">Project</p>
                <p class="fw-light">Workshop</p>
                <p class="fw-light">Hire us</p>
                {{-- </div> --}}
            </div>
            <div class="col-3 mx-auto my-auto">
                <p class="fs-5">About Class</p>
                <p class="fw-light">About Instructor</p>
                <p class="fw-light">MileStones</p>
                <p class="fw-light">Community</p>
                <p class="fw-light">Our Tea,</p>
            </div>
            <div class="col-3 mx-auto my-auto">
                <p class="fs-5">Ramavtar Market, Near Dog Hospital</p>
                <p class="fw-light">Thana Chowk, Gandhinagar, Madhubani, Purnea - 854301</p>
                <p class="fw-light">+91 95 4680 5580</p>
                <p class="fw-light">www.codewithsadiq.com</p>
            </div>

            <p class="fw-light text-center">© Code with SadiQ, All rights reserved</p>
        </div>
    </div>
</body>

</html>

   {{-- <nav class="navbar navbar-expand-lg navbar-dark "
        style="background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
        <div class="container mx-5">
                <img src="https://boomi.com/wp-content/uploads/cws-logo.png"  alt="" class=" navbar-brand px-3 my-0 py-1 text-gray-500"  style="width:120px;background-color:rgb(180, 236, 255);border-radius: 2rem">
            <ul class="navbar-nav"> --}}
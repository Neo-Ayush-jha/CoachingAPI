<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#333131;">
        <div class="container">
          <a class="navbar-brand" href="">Admin| portal</a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route("admin.dashboard")}}">Home</a>
            </li>
                @auth
                <li class="nav-item">
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <input type="submit" value="logout" class="btn btn-danger border-0">
                    </form>
                </li>
                @endauth
              
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group sh">
                    <a href="{{route('admin.dashboard')}}" class="list-group-item shadow list-group-item-action">Dashboard</a>
                    <a href="{{route('admin.manage.student.active')}}" class="list-group-item shadow list-group-item-action">Manage Student</a>
                    <a href="{{route('admin.manage.student.new')}}" class="list-group-item shadow list-group-item-action">New Admission</a>
                    <a href="{{route('admin.manage.payment.due')}}" class="list-group-item shadow list-group-item-action">Manage Payment</a>
                    <a href="{{route('course.index')}}" class="list-group-item shadow list-group-item-action">Manage Courses</a>
                    <a href="" class="list-group-item shadow list-group-item-action">Manage Placement</a>
                </div>
            </div>
            <div class="col-9">
                @section('jha')
        
                @show
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row text-light" style="margin-top:100px;background: #333131;margin-top:90px;height:380px;">
            <h4 class="text-center mb-5 mt-3 ">CodeWithSadiQ</h4>
            <div class="col-3 mx-auto my-auto">
                {{-- <div class="col my-auto"> --}}
                    <p class="fs-5 ">Quick link</p>
                    <p class="fw-light"><a href="/" class="text-light text-decoration-none">Home</a></p>
                    <p class="fw-light"><a href="/" class="text-light text-decoration-none">About</a></p>
                    <p class="fw-light"><a href="/" class="text-light text-decoration-none">Project</a></p>
                    <p class="fw-light"><a href="/" class="text-light text-decoration-none">Workshop</a></p>
                    <p class="fw-light"><a href="/" class="text-light text-decoration-none">Hire us</a></p>
                   
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
            
            <hr>
            <p class="fw-light text-center">© Code with SadiQ, All rights reserved</p>
        </div>
    </div>
</body>
</html>
@extends('homepages/base')
@section('ayush')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-lg-4 col-sm-8 mx-auto">
                <div class="card border shadow">
                    <div class="card-body p-0">
                        <table class="table ">
                            <tr class="bg-primary text-white text-center mt-3"><th colspan="4">STUDENT DETAILS</th>
                        </tr>
                            <tr>
                                <th colspan="2">NAME</th>
                                <td colspam="2">{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Gender</th>
                                <td colspam="2">{{$user->gender}}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Date of Birth</th>
                                <td colspam="2">{{$user->dob}}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Contact no.</th>
                                <td colspam="2">{{$user->contact}}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Address</th>
                                <td colspam="2">{{$user->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8 mt-3 mx-auto">
                    <h5 class="bg-primary text-white text-center py-2 ">STUDENT COURSE DETAILS</h5>
                    <table class="table border bottom-2 border-dark">
                        <tr>
                            <th >Course table name</th> 
                            <th >Course duration</th>
                            <th >Course fee</th>
                            <th >Course View</th>
                            <th >Course payment status</th>
                        </tr>
                        @foreach ($userDetal as $item)
                        <tr>
                            <td >{{$item->course->title}}</td>
                            <td >{{$item->course->duration}} months</td>
                            <td >{{$item->course->fee *  $item->no_of_time}}</td>
                            <td ><a href="{{route("addCourse",['id'=>$item->id])}} " class="btn btn-warning "><i class="bi bi-eye"></i>View detales</a></td>
                            <td ><a href="{{route('onlinePayment')}}  " class="btn btn-success  "><i class="bi bi-check"></i>Pay</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            <a href="" class="btn btn-info d-print-none w-100" onClick="window.print()"> PRINT MARKSHEET<i class="bi bi-printer-fill ms-3 "></i></a>
        </div>
    </div>    
@endsection

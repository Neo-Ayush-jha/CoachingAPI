@extends('admin/master')
@section('jha')
    <div class="row">
        <div class="col-4">
            <div class="card  border border-primary text-primary">
                <div class="card-body shadow">
                    <h2 class="display-4">{{$user}}+</h2>
                    <h6>Total Students</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card  border border-success text-success">
                <div class="card-body shadow">
                    <h2 class="display-4">{{$countCourde}}+</h2>
                    <h6>Total Course</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card  border border-danger text-danger">
                <div class="card-body shadow">
                    <h2 class="display-4">50+</h2>
                    <h6>Total Due</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="btn btn-success mt-3">Payment lest</h2>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Amount</th>
                    <th>Payment Contact Number</th>
                    <th>Pay through</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($due_payment as $due)
                    <tr>
                        <td>{{$due->id}}</td>
                        <td>{{$due->user->name}}</td>
                        <td>{{$due->course->title}}</td>
                        <td>{{$due->amount}}</td>
                        <td>{{$due->payment_contact_number}}</td>
                        <td>{{$due->wallet}}</td>
                        <td>{{$due->dateOfPayment}}</td>
                        <td><span class="badge bg-danger rounded-pill">{{$due->status}}</span></td>
                        {{-- <td><a href="{{route('admin.make.cashpayment',['std_id'=>$due->student_id,'id'=>$due->id])}}" class="btn btn-success">Pay</a></td> --}}
                        <td><a href="" class="btn btn-success">Pay</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection